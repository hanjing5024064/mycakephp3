<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Wechat'), ['action' => 'edit', $userWechat->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Wechat'), ['action' => 'delete', $userWechat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userWechat->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Wechats'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Wechat'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Wechat Openids'), ['controller' => 'UserWechatOpenids', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Wechat Openid'), ['controller' => 'UserWechatOpenids', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userWechats view large-9 medium-8 columns content">
    <h3><?= h($userWechat->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userWechat->has('user') ? $this->Html->link($userWechat->user->id, ['controller' => 'Users', 'action' => 'view', $userWechat->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nickname') ?></th>
            <td><?= h($userWechat->nickname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Headimgurl') ?></th>
            <td><?= h($userWechat->headimgurl) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userWechat->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userWechat->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userWechat->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related User Wechat Openids') ?></h4>
        <?php if (!empty($userWechat->user_wechat_openids)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Wechat Id') ?></th>
                <th scope="col"><?= __('Wechat Gzh Id') ?></th>
                <th scope="col"><?= __('Openid') ?></th>
                <th scope="col"><?= __('Uuid') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($userWechat->user_wechat_openids as $userWechatOpenids): ?>
            <tr>
                <td><?= h($userWechatOpenids->id) ?></td>
                <td><?= h($userWechatOpenids->user_wechat_id) ?></td>
                <td><?= h($userWechatOpenids->wechat_gzh_id) ?></td>
                <td><?= h($userWechatOpenids->openid) ?></td>
                <td><?= h($userWechatOpenids->uuid) ?></td>
                <td><?= h($userWechatOpenids->status) ?></td>
                <td><?= h($userWechatOpenids->created) ?></td>
                <td><?= h($userWechatOpenids->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserWechatOpenids', 'action' => 'view', $userWechatOpenids->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserWechatOpenids', 'action' => 'edit', $userWechatOpenids->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserWechatOpenids', 'action' => 'delete', $userWechatOpenids->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userWechatOpenids->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
