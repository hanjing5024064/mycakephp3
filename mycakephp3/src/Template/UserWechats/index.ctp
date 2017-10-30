<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Wechat'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Wechat Openids'), ['controller' => 'UserWechatOpenids', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Wechat Openid'), ['controller' => 'UserWechatOpenids', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userWechats index large-9 medium-8 columns content">
    <h3><?= __('User Wechats') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nickname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('headimgurl') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userWechats as $userWechat): ?>
            <tr>
                <td><?= $this->Number->format($userWechat->id) ?></td>
                <td><?= $userWechat->has('user') ? $this->Html->link($userWechat->user->id, ['controller' => 'Users', 'action' => 'view', $userWechat->user->id]) : '' ?></td>
                <td><?= h($userWechat->nickname) ?></td>
                <td><?= h($userWechat->headimgurl) ?></td>
                <td><?= h($userWechat->created) ?></td>
                <td><?= h($userWechat->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userWechat->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userWechat->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userWechat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userWechat->id)]) ?>
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
