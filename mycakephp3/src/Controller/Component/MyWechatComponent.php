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

        $this->application = new Application($this->wxConfig);
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
}