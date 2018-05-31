<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\App\Model\Entity\SysMenu $sysMenu
  */
?>

<!-- Content Header -->
<section class="content-header">
    <h1><?= __('Sys Menus')?><small></small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> <?= __('Sys Menus')?></a></li>
        <li class="active"><?= __('Sys Menus')?> details</li>
    </ol>
</section>
<!-- /Content Header -->

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= __('Sys Menus')?> details</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered view-t">
                <tbody>
                                                                <tr>
                    <th scope="row"><?= __('Name') ?></th>
                    <td><?= h($sysMenu->name) ?></td>
                </tr>
                                                                <tr>
                    <th scope="row"><?= __('Parent Sys Menu') ?></th>
                    <td><?= $sysMenu->has('parent_sys_menu') ? $this->Html->link($sysMenu->parent_sys_menu->name, ['controller' => 'SysMenus', 'action' => 'view', $sysMenu->parent_sys_menu->id]) : '' ?></td>
                </tr>
                                                                <tr>
                    <th scope="row"><?= __('Controller') ?></th>
                    <td><?= h($sysMenu->controller) ?></td>
                </tr>
                                                                <tr>
                    <th scope="row"><?= __('Action') ?></th>
                    <td><?= h($sysMenu->action) ?></td>
                </tr>
                                                                <tr>
                    <th scope="row"><?= __('Icon') ?></th>
                    <td><?= h($sysMenu->icon) ?></td>
                </tr>
                                                                                                                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sysMenu->id) ?></td>
                </tr>
                                <tr>
                    <th scope="row"><?= __('Lft') ?></th>
                    <td><?= $this->Number->format($sysMenu->lft) ?></td>
                </tr>
                                <tr>
                    <th scope="row"><?= __('Rght') ?></th>
                    <td><?= $this->Number->format($sysMenu->rght) ?></td>
                </tr>
                                <tr>
                    <th scope="row"><?= __('Menuorder') ?></th>
                    <td><?= $this->Number->format($sysMenu->menuorder) ?></td>
                </tr>
                                                                                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($sysMenu->created) ?></td>
                </tr>
                                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= h($sysMenu->modified) ?></td>
                </tr>
                                                

                </tbody></table>


        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="<?= $this->Url->build(['action'=>'index',$sysMenu->id]) ?>">返回</a>
        </div>
    </div>
</section>