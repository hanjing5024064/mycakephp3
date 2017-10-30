<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userWechatOpenid->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userWechatOpenid->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Wechat Openids'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Wechats'), ['controller' => 'UserWechats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Wechat'), ['controller' => 'UserWechats', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Wechat Gzhs'), ['controller' => 'WechatGzhs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wechat Gzh'), ['controller' => 'WechatGzhs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userWechatOpenids form large-9 medium-8 columns content">
    <?= $this->Form->create($userWechatOpenid) ?>
    <fieldset>
        <legend><?= __('Edit User Wechat Openid') ?></legend>
        <?php
            echo $this->Form->control('user_wechat_id', ['options' => $userWechats, 'empty' => true]);
            echo $this->Form->control('wechat_gzh_id', ['options' => $wechatGzhs, 'empty' => true]);
            echo $this->Form->control('openid');
            echo $this->Form->control('uuid');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
