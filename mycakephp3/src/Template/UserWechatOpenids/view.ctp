<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Wechat Openid'), ['action' => 'edit', $userWechatOpenid->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Wechat Openid'), ['action' => 'delete', $userWechatOpenid->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userWechatOpenid->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Wechat Openids'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Wechat Openid'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Wechats'), ['controller' => 'UserWechats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Wechat'), ['controller' => 'UserWechats', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Wechat Gzhs'), ['controller' => 'WechatGzhs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wechat Gzh'), ['controller' => 'WechatGzhs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userWechatOpenids view large-9 medium-8 columns content">
    <h3><?= h($userWechatOpenid->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User Wechat') ?></th>
            <td><?= $userWechatOpenid->has('user_wechat') ? $this->Html->link($userWechatOpenid->user_wechat->id, ['controller' => 'UserWechats', 'action' => 'view', $userWechatOpenid->user_wechat->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wechat Gzh') ?></th>
            <td><?= $userWechatOpenid->has('wechat_gzh') ? $this->Html->link($userWechatOpenid->wechat_gzh->name, ['controller' => 'WechatGzhs', 'action' => 'view', $userWechatOpenid->wechat_gzh->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Openid') ?></th>
            <td><?= h($userWechatOpenid->openid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Uuid') ?></th>
            <td><?= h($userWechatOpenid->uuid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userWechatOpenid->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($userWechatOpenid->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userWechatOpenid->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userWechatOpenid->modified) ?></td>
        </tr>
    </table>
</div>
