<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrganizationStructures Controller
 *
 * @property \App\Model\Table\OrganizationStructuresTable $OrganizationStructures
 */
class HomepageWCController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('MyWechat');
        $this->Auth->allow();
    }

    /**
     * 公众号接入
     */
    public function join(){
        $this->MyWechat->join();
    }

    /**
     * 微信服务处理
     */
    public function index(){
        $this->MyWechat->index();
    }

    /**
     * 设置微信菜单
     */
    public function setMenu(){
        $this->MyWechat->setMenu();
    }

}
