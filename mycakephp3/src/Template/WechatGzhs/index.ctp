<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Wechat Gzh'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Wechat Openids'), ['controller' => 'UserWechatOpenids', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Wechat Openid'), ['controller' => 'UserWechatOpenids', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="wechatGzhs index large-9 medium-8 columns content">
    <h3><?= __('Wechat Gzhs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('appid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('secret') ?></th>
                <th scope="col"><?= $this->Paginator->sort('token') ?></th>
                <th scope="col"><?= $this->Paginator->sort('oauth_scopes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('oauth_callback') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($wechatGzhs as $wechatGzh): ?>
            <tr>
                <td><?= $this->Number->format($wechatGzh->id) ?></td>
                <td><?= h($wechatGzh->name) ?></td>
                <td><?= h($wechatGzh->appid) ?></td>
                <td><?= h($wechatGzh->secret) ?></td>
                <td><?= h($wechatGzh->token) ?></td>
                <td><?= h($wechatGzh->oauth_scopes) ?></td>
                <td><?= h($wechatGzh->oauth_callback) ?></td>
                <td><?= h($wechatGzh->created) ?></td>
                <td><?= h($wechatGzh->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $wechatGzh->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $wechatGzh->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wechatGzh->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wechatGzh->id)]) ?>
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
