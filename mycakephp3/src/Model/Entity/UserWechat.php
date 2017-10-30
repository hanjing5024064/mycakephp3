<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserWechat Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $nickname
 * @property string $headimgurl
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\UserWechatOpenid[] $user_wechat_openids
 */
class UserWechat extends Entity
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
        '*' => true,
        'id' => false
    ];
}
