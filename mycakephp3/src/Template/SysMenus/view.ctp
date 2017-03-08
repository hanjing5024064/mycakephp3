<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sys Menu'), ['action' => 'edit', $sysMenu->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sys Menu'), ['action' => 'delete', $sysMenu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sysMenu->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sys Menus'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sys Menu'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Sys Menus'), ['controller' => 'SysMenus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Sys Menu'), ['controller' => 'SysMenus', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sysMenus view large-9 medium-8 columns content">
    <h3><?= h($sysMenu->name) ?></h3>
    <table class="vertical-table">
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
            <th scope="row"><?= __('Menuorder') ?></th>
            <td><?= h($sysMenu->menuorder) ?></td>
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
    </table>
    <div class="related">
        <h4><?= __('Related Sys Menus') ?></h4>
        <?php if (!empty($sysMenu->child_sys_menus)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Lft') ?></th>
                <th scope="col"><?= __('Rght') ?></th>
                <th scope="col"><?= __('Controller') ?></th>
                <th scope="col"><?= __('Action') ?></th>
                <th scope="col"><?= __('Menuorder') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sysMenu->child_sys_menus as $childSysMenus): ?>
            <tr>
                <td><?= h($childSysMenus->id) ?></td>
                <td><?= h($childSysMenus->name) ?></td>
                <td><?= h($childSysMenus->parent_id) ?></td>
                <td><?= h($childSysMenus->lft) ?></td>
                <td><?= h($childSysMenus->rght) ?></td>
                <td><?= h($childSysMenus->controller) ?></td>
                <td><?= h($childSysMenus->action) ?></td>
                <td><?= h($childSysMenus->menuorder) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SysMenus', 'action' => 'view', $childSysMenus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SysMenus', 'action' => 'edit', $childSysMenus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SysMenus', 'action' => 'delete', $childSysMenus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childSysMenus->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
