<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserWechatOpenid Entity
 *
 * @property int $id
 * @property int $user_wechat_id
 * @property int $wechat_gzh_id
 * @property string $openid
 * @property string $uuid
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\UserWechat $user_wechat
 * @property \App\Model\Entity\WechatGzh $wechat_gzh
 */
class UserWechatOpenid extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_wechat_id' => true,
        'wechat_gzh_id' => true,
        'openid' => true,
        'uuid' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'user_wechat' => true,
        'wechat_gzh' => true
    ];
}
