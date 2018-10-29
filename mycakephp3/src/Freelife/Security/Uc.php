<?php
namespace App\Freelife\Security;
/**
 * Created by PhpStorm.
 * User: zhangjun
 * Date: 2018/10/29
 * Time: 3:04 PM
 */
class Uc
{
    private static $_debug = true;
    private static $_subsystemSecret = ['yourAppId' => 'yourAppSecret'];

    /**
     * check signature from other plantform through url
     * @return bool
     */
    public static function checkSignatureFromUrl(){
        if(Uc::$_debug === true)return true;

        $appId = $_GET['appId'];
        $signature = $_GET['signature'];
        $timestamp = $_GET['timestamp'];

        return Uc::checkSignature($appId, $signature, $timestamp);
    }

    /**
     * check signature
     * @param $appId
     * @param $signature
     * @param $timestamp
     * @return bool
     */
    public static function checkSignature($appId, $signature, $timestamp){
        return true;
        if(Uc::$_debug === true)return true;

        $secret = Uc::$_subsystemSecret[$appId];
        $tmpArr = array($appId, $secret, $timestamp);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        return $tmpStr === $signature;
    }

    /**
     * get signature
     * @param $appId = subsystem's appId
     * @param $timestamp = strtotime(now)
     * @return string
     */
    public static function getSignature($appId = '', $timestamp = ''){
        if(array_key_exists($appId, Uc::$_subsystemSecret))
            $secret = Uc::$_subsystemSecret[$appId];

        $tmpArr = array($appId, $secret, $timestamp);
        sort($tmpArr, SORT_STRING);
        $signature = implode( $tmpArr );
        $signature = sha1($signature);

        return $signature;
    }
}