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
        $this->controller = $this->_registry->getController();

    }

    /**
     * 处理用户操作逻辑
     * @param null $userId
     * @param string $action , unsubscribe-取消关注
     * @return bool
     */
    public function dealUserAction($userId = null, $action = '')
    {
        $result = false;
        switch ($action) {
            case 'subscribe'://关注公众号
                $result = $this->dealUserSubscribe($userId);
                break;
            case 'unsubscribe'://取消关注公众号
                $result = $this->dealUserUnsubscribe($userId);
                break;
            default:
                break;
        }
        return $result;
    }

    /**
     * 处理用户关注操作
     * @param null $openid
     * @return bool
     */
    public function dealUserSubscribe($openid = null)
    {
        //公众号用户信息
        $this->controller->loadModel('UserWechatOpenids');
        $userWechatOpenidsTable = $this->controller->UserWechatOpenids;
        $userData = $userWechatOpenidsTable
            ->find()
            ->where(['openid' => $openid])
            ->first();
        if ($userData->id) {
            $userData->status = 1;//取消关注公众号
            if ($userWechatOpenidsTable->save($userData))
                return $userData->id;
        }
        return false;
    }

    /**
     * 处理用户取消关注操作
     * @param null $openid
     * @return bool
     */
    public function dealUserUnsubscribe($openid = null)
    {
        //公众号用户信息
        $this->controller->loadModel('UserWechatOpenids');
        $userWechatOpenidsTable = $this->controller->UserWechatOpenids;
        $userData = $userWechatOpenidsTable
            ->find()
            ->where(['openid' => $openid])
            ->first();
        if ($userData->id) {
            $userData->status = 0;//取消关注公众号
            if ($userWechatOpenidsTable->save($userData))
                return $userData->id;
        }
        return false;
    }

    /**
     * 检测openid是否已经保存, 然后更新或新增用户数据
     * @param null $openid 用户公众号openid
     * @param array $userWXData 用户微信信息
     * @return bool 保存成功返回用户id, 否则返回false
     */
    public function checkUserOpenid($openid = null, $userWXData = [])
    {
        if ($openid === null) return false;

        //查找openid已注册用户
        $this->controller->loadModel('Users');//用户信息
        $usersTable = $this->controller->Users;
        $this->controller->loadModel('UserWechats');//用户微信信息
        $userWechatsTable = $this->controller->UserWechats;
        $this->controller->loadModel('UserWechatOpenids');//用户公众号信息
        $userWechatOpenidsTable = $this->controller->UserWechatOpenids;
        $userData = $userWechatOpenidsTable
            ->find()
            ->where(['openid' => $openid])
            ->first();

        //公众号用户不存在,则新增用户信息-微信用户信息
        if (!$userData->id) {
            //新增用户
            $user = $usersTable->newEntity();
            $user->username = $openid;
            $user->password = $openid;
            if ($usersTable->save($user)) {
                $userId = $user->id;
            } else {
                return false;
            }

            //新增微信用户
            $userWechats = $userWechatsTable->newEntity();
            $userWechats->user_id = $userId;
            $userWechats->nickname = $userWXData->nickname;
            $userWechats->headimgurl = $userWXData->headimgurl;
            if ($userWechatsTable->save($userWechats)) {
                $userWechatId = $userWechats->id;
            } else {
                return false;
            }

            //新增公众号用户
            $userWechatOpenids = $userWechatOpenidsTable->newEntity();
            $userWechatOpenids->user_wechat_id = $userWechatId;
            $userWechatOpenids->wechat_gzh_id = 1;//@todo 默认第一个公众号
            $userWechatOpenids->openid = $openid;
            $userWechatOpenids->uuid = $userWXData->uuid;
            $userWechatOpenids->status = 1;//关注公众号
            if ($userWechatOpenidsTable->save($userWechatOpenids))
                return $userId;
            else
                return false;
        } else//公众号用户已经存在,则更新微信用户信息
        {
            //更新关注状态
            $userData->status = 1;
            $userWechatOpenidsTable->save($userData);

            $userWechats = $userWechatsTable
                ->find()
                ->where(['id' => $userData->user_wechat_id])
                ->first();
            if (!empty($userWechats)) {
                $userWechats->nickname = $userWXData->nickname;
                $userWechats->headimgurl = $userWXData->headimgurl;
                $userWechatsTable->save($userWechats);
                $userId = $userWechats->user_id;
            }
        }

        return $userId;
    }

    public function checkUserOpenidV2($userInfo = [], $wechatGzhId = 1)
    {
        if (!array_key_exists('uuid', $userInfo) || empty($userInfo['uuid'])) return false;
        if(array_key_exists('nickname', $userInfo) && !empty($userInfo['nickname']))$nickname = $userInfo['nickname'];
        else $nickname = '未设置';

        if(array_key_exists('avatar', $userInfo) && !empty($userInfo['avatar']))$avatar = $userInfo['avatar'];
        else $avatar = '未设置';

        $uuid = $userInfo['uuid'];

        //查找openid已注册用户
        $this->controller->loadModel('Users');//用户信息
        $usersTable = $this->controller->Users;
        $this->controller->loadModel('UserWechats');//用户微信信息
        $userWechatsTable = $this->controller->UserWechats;
        $this->controller->loadModel('UserWechatOpenids');//用户公众号信息
        $userWechatOpenidsTable = $this->controller->UserWechatOpenids;

        $userData = $userWechatOpenidsTable
            ->find()
            ->where(['openid' => $uuid, 'wechat_gzh_id' => $wechatGzhId])
            ->first();

        //公众号用户不存在,则新增用户信息-微信用户信息
        if (!$userData) {
            //新增用户
            $user = $usersTable->newEntity();
            $user->username = $uuid;
            $user->password = $uuid;
            if ($usersTable->save($user)) {
                $userId = $user->id;

                //新增微信用户
                $userWechats = $userWechatsTable->newEntity();
                $userWechats->user_id = $userId;
                $userWechats->nickname = $nickname;
                $userWechats->headimgurl = $avatar;
                if ($userWechatsTable->save($userWechats)) {
                    $userWechatId = $userWechats->id;

                    //新增公众号用户
                    $userWechatOpenids = $userWechatOpenidsTable->newEntity();
                    $userWechatOpenids->user_wechat_id = $userWechatId;
                    $userWechatOpenids->wechat_gzh_id = $wechatGzhId;//@todo 默认第一个公众号
                    $userWechatOpenids->openid = $uuid;
//                    $userWechatOpenids->uuid = $uuid;
                    $userWechatOpenids->status = 1;//关注公众号
                    if ($userWechatOpenidsTable->save($userWechatOpenids))
                        return $userId;
                }
            }
        } else//公众号用户已经存在,则更新微信用户信息
        {
            //更新关注状态
            $userData->status = 1;
            $userWechatOpenidsTable->save($userData);

            $userWechats = $userWechatsTable
                ->find()
                ->where(['id' => $userData->user_wechat_id])
                ->first();
//            if (!empty($userWechats) && $nickname!== '未设置' && $avatar !== '未设置') {
            if (!empty($userWechats)) {
                $userWechats->nickname = $nickname;
                $userWechats->headimgurl = $avatar;
                $userWechatsTable->save($userWechats);
                $userId = $userWechats->user_id;
            }
        }

        return $userId;
    }

    //获得用户维修单数量
    public function getUserServiceRepairCount($userId = null)
    {
        //园区id
        $parkId = $this->controller->request->session()->read('wechat_user_park_id');
        $myAcl = $this->controller->loadComponent('Acl');

        //没有传入userId则从session中获得
        if ($userId === null) $userId = $this->request->session()->read('userId');
        if (empty($userId)) return false;

        //报修订单数量
        $orderNumber = 0;

        $serviceOrderRepaires = $this->controller->loadModel('ServiceOrderRepaires');
        //具有管理维修订单权限的用户
        $repairManageUser = $myAcl->getRepairManageUser($parkId);
        //具有接单权限的用户
        $maintainUser = $myAcl->getMaintainUser($parkId);

        //管理人员
        if (in_array($userId, $repairManageUser)) {
            $orderNumber = $serviceOrderRepaires->find()
                ->contain(['ServiceOrders', 'ServiceOrderRepaireTs'])
                ->where(['ServiceOrders.service_order_status_id != ' => 4, 'ServiceOrderRepaireTs.sys_organization_structure_id' => $parkId])
                ->count();
        } //维修人员
        elseif (in_array($userId, $maintainUser)) {
            $orderNumber = $serviceOrderRepaires->find()->contain([
                'ServiceOrders', 'ServiceOrderRepaireTs'
            ])->where([
                'ServiceOrders.owner_id' => $userId,
                'ServiceOrderRepaireTs.sys_organization_structure_id' => $parkId
            ])->count();
        } //普通报修人员, 获得自己的报修订单
        else {
            $orderNumber = $serviceOrderRepaires->find()->contain([
                'ServiceOrders', 'ServiceOrderRepaireTs'
            ])->where([
                'ServiceOrders.user_id' => $userId,
                'ServiceOrderRepaireTs.sys_organization_structure_id' => $parkId
            ])->count();
        }
        return $orderNumber;
    }

    //获得用户信息
    public function getUserInfo($userId = null)
    {
        //没有传入userId则从session中获得
        if ($userId === null) $userId = $this->request->session()->read('userId');
        if (empty($userId)) return false;

        //获得用户信息
        $userModel = $this->controller->loadModel('Users');
        $userInfo = $userModel->get($userId);

        //获得用户头像
        if ($userInfo->head_img) {
            $this->controller->loadModel('SysAttachments');
            $attachment = $this->controller->SysAttachments->get($userInfo->head_img);
            $userInfo->headImg = '../' . $attachment['url'];
        } elseif (isset($userInfo->wxheadimgurl)) {
            $userInfo->headImg = $userInfo->wxheadimgurl;
        }

        return $userInfo;
    }

    //获取用户头像
    public function getUserHeadImg($userId = null)
    {
        if ($userId === null) return null;

        $userHeadImg = '';
        $userModel = $this->controller->loadModel('Users');
        $userInfo = $userModel->get($userId);
        if ($userInfo->head_img) {
            $this->controller->loadModel('SysAttachments');
            $attachment = $this->controller->SysAttachments->get($userInfo->head_img);
            $userHeadImg = '../' . $attachment['url'];
        } elseif (isset($userInfo->wxheadimgurl)) {
            $userHeadImg = $userInfo->wxheadimgurl;
        }
        return $userHeadImg;
    }

    public function checkUserCellphone($cellphone = null)
    {
        if ($cellphone === null) return null;

        //查找手机已注册用户
        $this->controller->loadModel('Users');
        $user = $this->controller->Users->findByCellphone($cellphone)->toArray();
        if (!empty($user)) return $user[0]['id'];

        //没有则新增用户
        $userTable = TableRegistry::get('Users');
        $user = $userTable->newEntity();
        $user->cellphone = $cellphone;
        $user->password = 'dfjk3478';

        $from = $this->controller->name;
        switch ($from) {
            case 'ApplyVisits':
                $from = 'PC-来访申请';
                break;
        }
        $user->fromwhere = $from;
        if ($userTable->save($user)) {
            return $user->id;
        } else return null;
    }

    public function getSysCustomerId()
    {
        return $this->request->session()->read('sys_customer');
    }

    public function updateWCInfo($userId = null, $wxUser = null)
    {
        if ($userId === null || $wxUser === null) return null;

        //查找手机已注册用户
        $this->controller->loadModel('Users');
        $user = $this->controller->Users->get($userId);
        if (!empty($user)) {
            $user->wxnickname = $wxUser->nickname;
            $user->wxheadimgurl = $wxUser->headimgurl;
            $user->wxuuid = $wxUser->unionid;
            $this->controller->Users->save($user);
        }
        return null;
    }

    /**
     * 获取用户角色信息
     * @param int $userId
     * @return array
     */
    public function getUserRole($userId = null)
    {
        //没有传入userId则从session中获得
        if ($userId === null) {
            /*
            $myWechatComponent = $this->controller->loadComponent('MyWechat');
            //微信端
            if ($myWechatComponent->isWechat()) {
                $userId = $this->request->session()->read('userId');
            } else {
                $userId = $this->request->session()->read('Auth.User.id');
            }
             * 
             */
            $userId = $this->request->session()->read('userId');
        }

        if (empty($userId)) {
            return false;
        }

        $this->controller->loadModel('UsersRoles');
        $userRole = $this->controller->UsersRoles->find('list', ['valueField' => 'role_id'])->where(['user_id' => $userId])->toArray();
        return $userRole;
    }

    /**
     * 根据用户id返回用户数据
     * @param array|int $userId
     * @return array|[]
     */
    public function getUserData($userId)
    {
        $userModel = $this->controller->loadModel('Users');
        //用户id为数组
        if (is_array($userId)) {
            $userArr = $userModel->find()->hydrate(false)
                ->where(['id IN' => $userId])->toList();
        } else {
            $userArr = $userModel->find()->hydrate(false)
                ->where(['id' => $userId])->toList();
        }
        //用户id作为键值
        $result = \Cake\Utility\Hash::combine($userArr, '{n}.id', '{n}');
        return $result;

    }


    /**
     * 获取维修工人列表
     * @return array
     */
    public function getMaintain($parkId = null)
    {
        $myAcl = $this->controller->loadComponent('Acl');
        //具有接单权限的用户id
        $maintainUser = $myAcl->getMaintainUser($parkId);
        if (empty($maintainUser)) {
            return [];
        }

        //查找用户id 用户名
        $userArr = $this->getUserData($maintainUser);
        return $userArr;
    }

    /**
     * 获取维修定单管理人员id
     * @return array | []
     */
    public function getRepairManage($parkId = null)
    {
        $myAcl = $this->controller->loadComponent('Acl');
        //具有管理维修订单的用户id
        $manageUser = $myAcl->getRepairManageUser($parkId);
        if (empty($manageUser)) {
            return [];
        }

        //查找用户id 用户名
        $userArr = $this->getUserData($manageUser);
        return $userArr;
    }

    /**
     * 获取用户申请记录数量
     */
    public function getServiceApplyOrder()
    {
        $this->controller->loadComponent('Acl');
        //园区id
        $parkId = $this->controller->request->session()->read('wechat_user_park_id');
        //获取用户角色
        $userInfo = $this->getUserInfo();
        $orderNumber = 0;

        /*
        $organizationCompanyApplyOrdersModel = $this->controller->loadModel('OrganizationCompanyApplyOrders');
        //用户是金融谷物业工程\金融谷物业总经办\超级管理员, 可以查看所有未完成订单
        if(array_intersect($userRole, [17, 18, 1])){
            $orderNumber = $organizationCompanyApplyOrdersModel->find()->count();
        }
         * 
         */
        $organizationCompanyApplyOrdersModel = $this->controller->loadModel('OrganizationCompanyApplyOrders');
        if ($this->controller->Acl->checkRepairManage($parkId)) {
            $orderNumber = $organizationCompanyApplyOrdersModel->find()
                ->where(['sys_organization_structure_id' => $parkId])
                ->count();
        } //普通申请人员, 获得自己的申请订单
        else {
            $orderNumber = $organizationCompanyApplyOrdersModel->find()->where([
                'user_id' => $userInfo->id, 'sys_organization_structure_id' => $parkId
            ])->count();
        }
        return $orderNumber;
    }

    /**
     * 从session中获取用户的企业id
     * @return string
     */
    public function getCompanyId()
    {
        $companyInfo = $this->controller->request->session()->read('organization_company');
        if ($companyInfo) {
            return $companyInfo['id'];
        }
        return '';
    }

    /**
     * 判断用户是否加入企业
     */
    public function ifJoinCompany()
    {
        //检测该用户是否绑定企业
//        $userComponent = $this->controller->loadComponent('MyUser');
        $userInfo = $this->getUserInfo();
        if ($userInfo['status'] !== 3) {
            if ($userInfo['status'] == 2) {
                $this->controller->Flash->success(__('加入企业正在审核，请稍后再试！'));
                $this->controller->redirect(['controller' => 'HomepageMb', 'action' => 'member']);
            }

            $this->controller->Flash->success(__('请先加入企业！'));
            $this->controller->redirect(['controller' => 'HomepageMb', 'action' => 'chooseCompany']);
        }
    }

    /**
     * 新增微信用户
     */

    /**
     * 新增公众号用户
     */
}