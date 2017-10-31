<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
use Composer\Config;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;

class MyWechatComponent extends Component
{
    private $controller;

    private $wxConfig;
    private $wxButtons;

    private $application;

    private $templates;//模板消息
    private $subscribeMsg;//关注后欢迎文字

    private $WechatGzhId = 1;//默认应用第一个公众号的参数

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->controller = $controller = $this->_registry->getController();

        //微信配置参数
        $this->wxConfig = Configure::read('wx_config');
        $this->wxButtons = Configure::read('wx_buttons');
        $this->wxIndex = Configure::read('wx_index');
        $this->baseURL = Configure::read('wx_base_url');
        //模板消息ID数组
        $this->templates = Configure::read('wx_templates');

        //初始化微信配置参数
        $this->initConfig();

        $this->application = new Application($this->wxConfig);
    }

    //微信服务处理
    public function index(){
        $app = $this->application;
        $server = $app->server;
        $server->setMessageHandler(function($message){
            // 注意，这里的 $message 不仅仅是用户发来的消息，也可能是事件
            // 当 $message->MsgType 为 event 时为事件
            if ($message->MsgType == 'event') {
                switch ($message->Event) {
                    case 'subscribe'://用户关注
                        //新增用户
                        return $this->subscribeMsg($message->FromUserName);
                        break;
                    case 'unsubscribe'://用户取消关注
                        //新增用户
                        return $this->unsubscribeMsg($message->FromUserName);
                        break;
                    case 'CLICK':
                        return 'key: '.$message->EventKey;
                        break;
                    default:
                        break;
                }
            }

            //回复其他消息类型
            switch($message->MsgType){
                case 'text':
                    switch($message->Content){
                        case 'info':
                            $userSer = $this->application->user;
                            $user = $userSer->get($message->FromUserName);
                            return 'Nickname:'."\n".$user->nickname . "\n" .'HeaderImg:'."\n".$user->headimgurl . "\n" .'UnionID:'."\n".$user->unionid . "\n" .'OpenID:'. "\n" .$user->openid;
                            break;
                        default:
                            return 'I  cant understand you.';
                            break;
                    }
                    break;
                default:
                    return 'fine';
                    break;
            }
        });
        $response = $server->serve();
        $response->send();
    }

    //处理关注逻辑,发送欢迎消息
    public function subscribeMsg($openid = null) {
        $msg = '';
        if($openid) {
            //获取微信用户基本信息, 更新到用户表
            $userSer = $this->application->user;
            $user = $userSer->get($openid);

            //处理用户信息
            $this->controller->loadComponent('MyUser');
            $userInfo = ['uuid'=>$openid, 'nickname'=>$user->nickname, 'avatar'=>$user->headimgurl];
            $userId = $this->controller->MyUser->checkUserOpenidV2($userInfo, $this->WechatGzhId);
            //保存当前用户ID到Session中
            if($userId !== false)
                $this->controller->request->session()->write('userId', $userId);

            $msg .= '欢迎您，'.$user->nickname."！\n";
        }
//        $msg .= '感谢您关注行行好，我们将为您提供优质的用车服务！'."\n\n";
//        $msg .= '服务热线：021-88888888';
        $msg .= $this->subscribeMsg;

        return $msg;
    }

    //处理取消关注逻辑
    public function unsubscribeMsg($openid = null) {
        if($openid) {
            //处理用户取消关注操作
            $this->controller->loadComponent('MyUser');
            $this->controller->MyUser->dealUserAction($openid, 'unsubscribe');
        }
        return false;
    }

    //发送模板消息
    /*
     * $templateType 模板消息类别, 新维修订单-NewRepairOrder
     * $receiver 接收者userId
     * $data = array(
            "first"    => array("恭喜你购买成功！", '#555555'),
            "keynote1" => array("巧克力", "#336699"),
            "keynote2" => array("39.8元", "#FF0000"),
            "keynote3" => array("2014年9月16日", "#888888"),
            "remark"   => array("欢迎再次购买！", "#5599FF"),
        );
     */
    public function sendTemplageMessage($data, $receiver, $templateType, $url = null){
        //获得receiver的openid
        $openId = $this->getOpenid($receiver);
        if($openId === '')return false;

        //获得模板消息ID
        $templateId = '';
        if(isset($this->templates[$templateType]))$templateId = $this->templates[$templateType];
        if($templateId === '')return false;

        //发送模板消息
//        $data = array(
//            "first"  => "恭喜你购买成功！",
//            "name"   => "巧克力",
//            "price"  => "39.8元",
//            "remark" => "欢迎再次购买！",
//        );
        $notice = $this->application->notice;
        if ($url) {
            $result = $notice->uses($templateId)->url($url)->andData($data)->andReceiver($openId)->send();
        } else {
            $result = $notice->uses($templateId)->andData($data)->andReceiver($openId)->send();
        }
        return $result;
    }

    //上传素材
    public function uploadImg(){
        $app = $this->application;
        // 永久素材
        $material = $app->material;
        // 临时素材
//        $temporary = $app->material_temporary;

        $result = $material->uploadImage("/path/to/your/image.jpg");  // 请使用绝对路径写法！除非你正确的理解了相对路径（好多人是没理解对的）！
        echo($result);
        exit();
    }

    //微信自动登录
    public function login($targetUrl = '/mb'){
        $app = $this->application;
        $oauth = $app->oauth;

        $this->controller->request->session()->write('target_url', $targetUrl);
        //return $oauth->redirect();
        // 这里不一定是return，如果你的框架action不是返回内容的话你就得使用
        $oauth->redirect()->send();
        exit();
    }
    public function oauthCallback(){
        $app = $this->application;
        $oauth = $app->oauth;
        // 获取 OAuth 授权结果用户信息
        $user = $oauth->user();
        $userInfo = ['uuid'=>$user->getId(), 'nickname'=>$user->getNickname(), 'avatar'=>$user->getAvatar()];
        $this->controller->loadComponent('MyUser');
        $userId = $this->controller->MyUser->checkUserOpenidV2($userInfo, $this->WechatGzhId);

        //初始化用户权限
        $this->controller->loadComponent('MyAuth');
        $this->controller->MyAuth->initMBAuth($userId);

//        $this->controller->request->session()->write('userId', 16);
//        return 'http://rm.shhwxx.com.cn/MB/index?hwId=3';
        return empty($this->controller->request->session()->read('target_url')) ? '/' : $this->controller->request->session()->read('target_url');
    }

    //接入
    public function join(){
        $app = $this->application;
        $response = $app->server->serve();

        // 将响应输出
        $response->send();
        exit();
    }

    //设置菜单
    public function setMenu(){
        $app = $this->application;
        $menu = $app->menu;

        $result = $menu->add($this->getButtons());
        echo($result.$this->WechatGzhId);
        exit();
    }
    //获得自定义菜单数据
    public function getButtons(){
        $this->wxButtons = [
            [
                'type' => 'view',
                'name' => '资源清单',
                'url'  => 'http://rm.shhwxx.com.cn/MB/index?hwId='.$this->WechatGzhId
            ],
            [
                'type' => 'view',
                'name' => '发布资源',
                'url'  => 'http://rm.shhwxx.com.cn/MB/create-moment/?hwId='.$this->WechatGzhId
            ],
        ];
//        $this->controller->loadModel('WechatGzhs');
//        $wechatGzh = $this->controller->WechatGzhs->get($this->WechatGzhId);
//        $this->wxButtons = json_decode($wechatGzh->menu, true);
        return $this->wxButtons;
    }

    //生成订单
    public function newOrder($payPrice, $payOrder){
        $openId = $this->getOpenid();
        if(!$openId)return;
        
        $app = new Application($this->wxConfig);
        $payment = $app->payment;

        $attributes = [
            'trade_type'       => 'JSAPI', // JSAPI，NATIVE，APP...
            'body'             => '服务',
            'detail'           => '服务',
            'out_trade_no'     => $payOrder,
            'total_fee'        => $payPrice,
            'notify_url'       => 'http://ytzht.shhwxx.com.cn/mb', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'openid'           => $openId, // trade_type=JSAPI，此参数必传，用户在商户appid下的唯一标识，
            // ...
        ];

//        $attributes = [
//            'trade_type'       => 'JSAPI', // JSAPI，NATIVE，APP...
//            'body'             => '服务',
//            'detail'           => '服务',
//            'out_trade_no'     => '234321',
//            'total_fee'        => '100',
//            'notify_url'       => 'http://ytzht.shhwxx.com.cn/mb', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
//            'openid'           => 'oaqaDwVOjgcuhZXlB6glfQohe7uQ', // trade_type=JSAPI，此参数必传，用户在商户appid下的唯一标识，
//            // ...
//        ];

        $order = new Order($attributes);
        $result = $payment->prepare($order);
        
        $json = '';
        if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS'){
            $prepayId = $result->prepay_id;
            $json = $payment->configForPayment($prepayId);
        }
        return $json;
    }
    public function handlePayReturn(){
        $app = $this->application;
        $response = $app->payment->handleNotify(function($notify, $successful){
            // 使用通知里的 "微信支付订单号" 或者 "商户订单号" 去自己的数据库找到订单
            $this->controller->loadModel('ServiceOrders');
            $order = $this->controller->ServiceOrders->findByOrderCode($notify->transaction_id);
            if (!$order) { // 如果订单不存在
                return 'Order not exist.'; // 告诉微信，我已经处理完了，订单没找到，别再通知我了
            }
            // 如果订单存在
            // 检查订单是否已经更新过支付状态
            if ($order->paid_at) { // 假设订单字段“支付时间”不为空代表已经支付
                return true; // 已经支付成功了就不再更新了
            }
            // 用户是否支付成功
            if ($successful) {
                // 不是已经支付状态则修改为已经支付状态
                $order->paid_at = time(); // 更新支付时间为当前时间
                $this->controller->loadModel('ServiceOrderStatuses');
                $order->service_order_status_id = $this->controller->ServiceOrderStatuses->findByName('已支付')->id;
            } else { // 用户支付失败
                $order->status = 'paid_fail';
            }
            $this->controller->ServiceOrders->save($order); // 保存订单
            return true; // 返回处理完成
        });
        $response->send();
    }

    /**
     * 根据登录用户的userId返回openid, 用户通过微信访问系统会自动保存openid
     * @return string
     */
    public function getOpenid($userId = ''){
        $openId = '';

        if($userId === '')
            $userId = $this->controller->request->session()->read('userId');
        if($userId){
            $this->controller->loadModel('Users');
            $userData = $this->controller->Users->get($userId);
            if($userData){
                $openId = $userData->wxopenid;
            }
        }
        return $openId;
    }
    
    
    /**
     * 
     * 创建微信支付订单
     * @param decimal $payPrice  支付金额
     * @param string $payOrder   订单号
     * @param string $callbackUrl 回调处理地址
     * @return json
     */
    public function buildOrder($payPrice, $payOrder, $callbackUrl)
    {
        $openId = $this->getOpenid();
        if(!$openId) {
            return false;
        }
        
        $app = new Application($this->wxConfig);
        $payment = $app->payment;

        $attributes = [
            'trade_type'       => 'JSAPI', // JSAPI，NATIVE，APP...
            'body'             => '服务',
            'detail'           => '服务',
            'out_trade_no'     => $payOrder,
            'total_fee'        => $payPrice,
            'notify_url'       => $callbackUrl, // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'openid'           => $openId, // trade_type=JSAPI，此参数必传，用户在商户appid下的唯一标识，
            // ...
        ];

//        $attributes = [
//            'trade_type'       => 'JSAPI', // JSAPI，NATIVE，APP...
//            'body'             => '服务',
//            'detail'           => '服务',
//            'out_trade_no'     => '234321',
//            'total_fee'        => '100',
//            'notify_url'       => 'http://ytzht.shhwxx.com.cn/mb', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
//            'openid'           => 'oaqaDwVOjgcuhZXlB6glfQohe7uQ', // trade_type=JSAPI，此参数必传，用户在商户appid下的唯一标识，
//            // ...
//        ];

        $order = new Order($attributes);
        $result = $payment->prepare($order);
        $json = '';
        if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS'){
            $prepayId = $result->prepay_id;
            $json = $payment->configForPayment($prepayId);
        }
        return $json;        
    }

	//获取JSSDK
	public function getWxJs() {
		$app = $this->application;
		return $app->js;
	}
	
	//获取临时素材接口
	public function getTemporary() {
		$app = $this->application;
		return $app->material_temporary;
	}

    //初始化微信配置参数
    public function initConfig(){
        $this->WechatGzhId = $this->getWechatGzhId();
        $this->wxConfig = [
            'debug'  => true,
//            'app_id' => 'wx5698c52e2fdd9ce0',
//            'secret' => '99d107454b2482ff70ff183fbfa70e67',
//            'token'  => 'cisleIKf34kjvlL',
            // 'aes_key' => null, // 可选
//        'log' => [
//            'level' => 'debug',
//            'file'  => '/tmp/easywechat.log', // XXX: 绝对路径！！！！
//        ],
            'oauth' => [
                'scopes'   => ['snsapi_base'],
                'callback' => 'http://rm.shhwxx.com.cn/wc/oauth_callback?hwId='.$this->WechatGzhId,
            ],
        ];

        $this->controller->loadModel('WechatGzhs');
        $wechatGzh = $this->controller->WechatGzhs->get($this->WechatGzhId);
        $this->wxConfig['app_id'] = $wechatGzh->appid;
        $this->wxConfig['secret'] = $wechatGzh->secret;
        $this->wxConfig['token'] = $wechatGzh->token;
        $this->subscribeMsg = $wechatGzh->subscribemsg;
    }

    public function getWechatGzhId(){
        $hwId = $this->controller->request->getQuery('hwId');
        if($hwId)$wechatGzhId = $hwId;
        else $wechatGzhId = 1;
        return $wechatGzhId;
    }
}