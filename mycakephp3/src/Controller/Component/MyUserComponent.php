<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class MyUserComponent extends Component
{
    private $controller;

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->controller = $controller = $this->_registry->getController();

    }

    public function checkUserOpenid($openid = null){
        if($openid === null)return null;

        //查找手机已注册用户
        $this->controller->loadModel('Users');
        $user = $this->controller->Users->findByWxopenid($openid)->toArray();
        if(!empty($user))return $user[0]['id'];

        //没有则新增用户
        $userTable = TableRegistry::get('Users');
        $user = $userTable->newEntity();
        $user->wxopenid = $openid;
        $user->password = 'defaultPassword';
        $user->fromwhere = '公众号-关注';
        if($userTable->save($user)){
            return $user->id;
        }else return null;
    }

    /**
     * 更新用户微信信息:nickname, headurl, openid
     * @param null $userId
     * @param null $wxUser
     * @param string $openid
     * @return null
     */
    public function updateWCInfo($userId = null, $wxUser = null, $openid = ''){
        if($userId === null || $wxUser === null)return null;

        //查找手机已注册用户
        $this->controller->loadModel('Users');
        $user = $this->controller->Users->get($userId);
        if(!empty($user)){
            $user->wxnickname = $wxUser->nickname;
            $user->wxheadimgurl = $wxUser->headimgurl;
            $user->wxopenid = $openid;
            $this->controller->Users->save($user);
        }
        return null;
    }
}