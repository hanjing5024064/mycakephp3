<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
use Composer\Config;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;

class MyUtilComponent extends Component
{
    /**
     * 是否微信浏览器访问
     * @return bool
     */
    public function isWeChat(){
        //判断是否微信访问
        if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
            return true;
        }else return false;
    }

    /**
     * 简单判断是否是移动端访问
     */
    public function isMobile()
    {
        $mobile = false;
        if (stripos(env('HTTP_USER_AGENT'), 'iphone') !== false ||
            stripos(env('HTTP_USER_AGENT'), 'android') !== false) {
            
            $mobile = true;
        }
        return $mobile;
    }
}