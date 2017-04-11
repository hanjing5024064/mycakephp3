<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Composer\Config;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;

class MyWechatComponent extends Component
{
    private $controller;

    private $wxConfig;
    private $wxButtons;

    private $application;

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->controller = $controller = $this->_registry->getController();

        //微信配置参数
        $this->wxConfig = Configure::read('wx_config');
        $this->wxButtons = Configure::read('wx_buttons');

        //模板消息ID数组
        $this->templates = Configure::read('wx_template');

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
                    case 'subscribe':
                        //新增用户
                        return $this->subscribeMsg($message->FromUserName);
                        break;
                    default:
                        break;
                }
            }
        });
        $response = $server->serve();
        $response->send();
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
    public function sendTemplageMessage($data, $receiver, $templateType){
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
        $result = $notice->uses($templateId)->andData($data)->andReceiver($openId)->send();
        return $result;
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

        $menu->add($this->wxButtons);
        exit();
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

    //设置关注消息
    public function subscribeMsg($openid = null) {
        $msg = '';
        if($openid) {
            //获取微信用户基本信息
            $userSer = $this->application->user;
            $user = $userSer->get($openid);

            //存储当前用户信息
            $userId = $this->controller->MyUser->checkUserOpenid($openid);//查看是否已存在用户
            $this->controller->request->session()->write('userId', $userId);//保存当前用户ID
            $this->controller->MyUser->updateWCInfo($userId, $user, $openid);//更新用户信息
            $msg .= '欢迎您，'.$user->nickname."！\n";
        }
        $msg .= '感谢您关注**，我们将为您提供优质的**服务！'."\n\n";
        $msg .= '[首页]：***；'."\n";
        $msg .= '[微站]：***'."\n";
        $msg .= '[我的]：查看个人信息，随时掌握；'."\n\n";
        $msg .= '服务热线：********';

        return $msg;
    }

}