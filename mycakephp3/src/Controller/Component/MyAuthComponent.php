<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class MyAuthComponent extends Component
{
    private $controller;

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->controller = $controller = $this->_registry->getController();

    }

    //初始化移动端访问权限
    public function initMBAuth($user){
        $this->controller->request->session()->write('wechat_user', $user);

        //新增用户
        $userId = $this->controller->MyUser->checkUserOpenid($user['id']);

        //设置当前用户用户及授权操作
        $this->controller->request->session()->write('userId', $userId);
        $this->controller->request->session()->write('roleActions', ['HomepageMb-liveShow']);
    }
    public function initMBAuthV2($userId){
        //设置当前用户用户及授权操作
        $this->controller->request->session()->write('userId', $userId);
    }

    /**
     * @param null $role
     * @return array ['controllername-actionname', 'controllername-actionname'...]
     */
    public function getRoleActions($role = null){
        //授权的操作
        $roleAction = array();

        //没有指定角色,从session中读取
        if($role === null){
            $role = $this->request->session()->read('User.role');
        }

        //无法确定角色, 直接返回空array
        if($role === null)return $roleAction;

        //获得角色授权数组
        $this->controller->loadModel('Roles');
        $this->controller->loadModel('Actions');
        $roleRecord = $this->controller->Roles->findByName($role)->contain([
            'Actions'
        ])->toArray();

        //角色未进行任何授权
        if(empty($roleRecord))return $roleAction;

        //遍历actions
        if(isset($roleRecord[0]) && isset($roleRecord[0]['actions']))
            $actions = $roleRecord[0]['actions'];

        foreach($actions as $action){
            $roleAction[] = $action['controller'].'-'.$action['action'];
        }

        return $roleAction;
    }

    /**
     * 根据角色获得菜单访问权限
     */
    public function getRoleMenus($role = null){
        //授权的菜单
        $menuList = array();

        //没有指定角色,从session中读取
        if($role === null){
            $role = $this->request->session()->read('User.role');
        }

        //无法确定角色, 直接返回空array
        if($role === null)return $menuList;

        //获得角色授权菜单
        $roleAction = $this->getRoleActions($role);//获得角色授权操作
        $this->controller->loadModel('SysMenus');
        $menus = $this->controller->SysMenus->find('all')
            ->where(['SysMenus.controller' => 'ooo'])
            ->order(['SysMenus.menuorder'])
            ->toArray();//获得一级菜单\
        $menuCount = 0;
        foreach($menus as $menu){
            $hasChildMenu = false;//是否拥有获得授权的二级菜单
            $childMenus = $this->controller->SysMenus->find('all')
                ->where(['parent_id' => $menu['id']])
                ->order(['SysMenus.menuorder'])
                ->toArray();//获得二级菜单
            $childMenuList = array();
            foreach ($childMenus as $childMenu) {//根据权限组织二级菜单
                if(in_array($childMenu['controller'].'-'.$childMenu['action'], $roleAction)){
                    $hasChildMenu = true;
                    $childMenuList[] = $childMenu;
                }
            }
            if($hasChildMenu){
                $menuList[$menuCount]['name'] = $menu['name'];
                $menuList[$menuCount]['icon'] = $menu['icon'];
                $menuList[$menuCount]['childMenu'] = $childMenuList;
                $menuCount++;
            }
        }
        return $menuList;
    }

    //get user actions
    public function getActionsByRoles($roles = ''){
        $actions = array();
        if($roles === '')return $actions;

        //get each role's action and array_merge
        foreach($roles as $role){
            $eachRoleActions = $this->getRoleActions($role['name']);
            $actions = array_merge($actions, $eachRoleActions);
        }

        return $actions;
    }

    //get user menus
    public function getMenusByRoles($roles = ''){
        $actions = array();
        if($roles === '')return $actions;

        //get each role's action and array_merge
        foreach($roles as $role){
            $eachRoleMenus = $this->getRoleMenus($role['name']);
            $actions = array_merge($actions, $eachRoleMenus);
        }

        return $actions;
    }

    /**
     * @param array $roles Roles Object Array
     */
    public function initRoleAuth(Array $roles){
        if($roles === array())return;

        $actions = $this->getActionsByRoles($roles);
        $menus = $this->getMenusByRoles($roles);
        $this->controller->request->session()->write('roleActions', $actions);
        $this->controller->request->session()->write('menuActions', $menus);
    }
    public function rmRoleAuth(){
        $this->controller->request->session()->delete('User');
        $this->controller->request->session()->delete('roleActions');
        $this->controller->request->session()->delete('menuActions');
    }

    public function setNowMenu(){
        $nowAction = empty($this->controller->request->param('action')) ? 'index' : $this->request->param('action');
        $nowController = $this->controller->request->param('controller');
        if(!$this->request->session()->check('nowMenu'))$this->request->session()->write('nowMenu', ['o', 'o']);
        $i = 0;
        $menuActions = $this->request->session()->read('menuActions');
        if(!$menuActions)return false;
        $open = false;
        foreach ($menuActions as $menu){
            $open = false;

            $j = 0;
            foreach ($menu['childMenu'] as $childMenu) {
                if ($nowController === $childMenu['controller'] && $nowAction === $childMenu['action']){
                    $open = true;
                    $menuActiveTwo = $j;
                }
                if($open)break;
                $j++;
            }
            if($open){
                $menuActiveOne = $i;
                break;
            }

            $i++;
        }
        if($open)$this->request->session()->write('nowMenu', [$menuActiveOne, $menuActiveTwo]);
    }
}