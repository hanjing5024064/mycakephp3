<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Wechat Openid'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Wechats'), ['controller' => 'UserWechats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Wechat'), ['controller' => 'UserWechats', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Wechat Gzhs'), ['controller' => 'WechatGzhs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wechat Gzh'), ['controller' => 'WechatGzhs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userWechatOpenids index large-9 medium-8 columns content">
    <h3><?= __('User Wechat Openids') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_wechat_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wechat_gzh_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('openid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('uuid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userWechatOpenids as $userWechatOpenid): ?>
            <tr>
                <td><?= $this->Number->format($userWechatOpenid->id) ?></td>
                <td><?= $userWechatOpenid->has('user_wechat') ? $this->Html->link($userWechatOpenid->user_wechat->id, ['controller' => 'UserWechats', 'action' => 'view', $userWechatOpenid->user_wechat->id]) : '' ?></td>
                <td><?= $userWechatOpenid->has('wechat_gzh') ? $this->Html->link($userWechatOpenid->wechat_gzh->name, ['controller' => 'WechatGzhs', 'action' => 'view', $userWechatOpenid->wechat_gzh->id]) : '' ?></td>
                <td><?= h($userWechatOpenid->openid) ?></td>
                <td><?= h($userWechatOpenid->uuid) ?></td>
                <td><?= $this->Number->format($userWechatOpenid->status) ?></td>
                <td><?= h($userWechatOpenid->created) ?></td>
                <td><?= h($userWechatOpenid->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userWechatOpenid->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userWechatOpenid->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userWechatOpenid->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userWechatOpenid->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
