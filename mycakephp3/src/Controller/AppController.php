<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('MySearch');

        //移动端访问
        $this->isMobile();

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');

        $this->loadComponent('Auth', [
            'authorize' => [
                'controller'
            ],
            'authenticate' => [
                'Form' => [
                    'finder' => 'auth'
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
                'home'
            ]
        ]);

        $this->viewBuilder()->setLayout('pc');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    /**
     * 检查是否通过移动端访问
     * 移动端访问不通过HomepageMb控制器
     * @return type
     */
    public function isMobile()
    {
        /**
         * 移动端访问时, 特殊处理
         * 微信端自动登录
         */
        $this->loadComponent('MyUtil');
        if ($this->MyUtil->isMobile()) {
            //判断访问来源,微信则自动登录,初始化移动端权限
            if($this->MyUtil->isWechat() && !$this->request->session()->check('userId')){
                //当前访问链接, 用于登录后跳转
                $nowAction = empty($this->request->param('action'))?'index':$this->request->param('action');
                $nowController = $this->request->param('controller');

                $nowWechatGzh = $this->MyWechat->getWechatGzhId();

                //授权回调函数直接返回
                if($nowController === 'HomepageWC' && $nowAction === 'oauthCallback')return true;

                $this->MyWechat->login("/$nowController/$nowAction?hwId=".$nowWechatGzh);
            }
        }
    }

    public function isAuthorized(){
        //Admin can access every action
        $nowAction = empty($this->request->getParam('action'))?'index':$this->request->getParam('action');
        $nowControllerAction = $this->request->getParam('controller').'-'.$nowAction;
        $roleActions = $this->request->session()->read('roleActions');
        if(in_array($nowControllerAction, $roleActions)){
            return true;
        }

        //Default deny
        return false;
    }
}
