<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Wechat Gzh'), ['action' => 'edit', $wechatGzh->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Wechat Gzh'), ['action' => 'delete', $wechatGzh->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wechatGzh->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Wechat Gzhs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wechat Gzh'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Wechat Openids'), ['controller' => 'UserWechatOpenids', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Wechat Openid'), ['controller' => 'UserWechatOpenids', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="wechatGzhs view large-9 medium-8 columns content">
    <h3><?= h($wechatGzh->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($wechatGzh->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Appid') ?></th>
            <td><?= h($wechatGzh->appid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Secret') ?></th>
            <td><?= h($wechatGzh->secret) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Token') ?></th>
            <td><?= h($wechatGzh->token) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Oauth Scopes') ?></th>
            <td><?= h($wechatGzh->oauth_scopes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Oauth Callback') ?></th>
            <td><?= h($wechatGzh->oauth_callback) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($wechatGzh->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($wechatGzh->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($wechatGzh->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Payment') ?></h4>
        <?= $this->Text->autoParagraph(h($wechatGzh->payment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Menu') ?></h4>
        <?= $this->Text->autoParagraph(h($wechatGzh->menu)); ?>
    </div>
    <div class="row">
        <h4><?= __('Template') ?></h4>
        <?= $this->Text->autoParagraph(h($wechatGzh->template)); ?>
    </div>
    <div class="row">
        <h4><?= __('Subscribemsg') ?></h4>
        <?= $this->Text->autoParagraph(h($wechatGzh->subscribemsg)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Wechat Openids') ?></h4>
        <?php if (!empty($wechatGzh->user_wechat_openids)): ?>
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
            <?php foreach ($wechatGzh->user_wechat_openids as $userWechatOpenids): ?>
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
