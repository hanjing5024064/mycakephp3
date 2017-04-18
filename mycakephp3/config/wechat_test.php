<?php
/**
 * Created by PhpStorm.
 * User: zhangjun
 * Date: 3/4/17
 * Time: 11:37 AM
 */
return [
    'wx_config' => [
        'debug'  => true,
        'app_id' => 'wx90728656203b30c9',
        'secret' => '90134286074bd506f7e8d53a48dd932c',
        'token'  => 'rmMlzMkRRywfNbA4QrWrmMKSKnvyZ0kW',
        // 'aes_key' => null, // 可选
        'log' => [
            'level' => 'debug',
            'file'  => '/tmp/easywechat.log', // XXX: 绝对路径！！！！
        ],
        'oauth' => [
            'scopes'   => ['snsapi_base'],
            'callback' => '/wc/oauth_callback',
        ],
    ],
    'wx_buttons' => [
        [
            'type' => 'view',
            'name' => '推广',
            'url'  => 'http://your.com.cn/wc/index'
        ],
        [
            'name'       => '功能',
            'sub_button' => [
                [
                    'type' => 'view',
                    'name' => '移动端',
                    'url'  => 'http://your.com.cn/wc/index'
                ],
                [
                    'type' => 'view',
                    'name' => '微站',
                    'url'  => 'http://your.com.cn/wc/index'
                ],
            ],
        ],
    ],
    'wx_templates' => [
        'NewRepairOrder'  => 'templateID',
    ],
];