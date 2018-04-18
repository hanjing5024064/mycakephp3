<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Moments Controller
 *
 * @method \App\Model\Entity\Moment[] paginate($object = null, array $settings = [])
 */
class TestController extends AppController
{
    public function initialize(){
        parent::initialize();
        $this->Auth->allow();
    }

    public function bootstrap(){
        $this->viewBuilder()->setLayout('pc_bootstrap');
    }

    public function test(){
        $this->viewBuilder()->setLayout(false);
        $this->loadModel('UserWechatOpenids');
        $user = $this->UserWechatOpenids
            ->find()
            ->where(['openid' => 'abcde', 'wechat_gzh_id' => 1])
            ->first();

        if($user === null)echo 'no this user';
        debug($user);
    }
}
