<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SysMenu Entity
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property int $lft
 * @property int $rght
 * @property string $controller
 * @property string $action
 * @property string $menuorder
 *
 * @property \App\Model\Entity\SysMenu $parent_sys_menu
 * @property \App\Model\Entity\SysMenu[] $child_sys_menus
 */
class SysMenu extends Entity
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
