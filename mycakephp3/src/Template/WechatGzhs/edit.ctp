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
                ['action' => 'delete', $wechatGzh->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $wechatGzh->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Wechat Gzhs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Wechat Openids'), ['controller' => 'UserWechatOpenids', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Wechat Openid'), ['controller' => 'UserWechatOpenids', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="wechatGzhs form large-9 medium-8 columns content">
    <?= $this->Form->create($wechatGzh) ?>
    <fieldset>
        <legend><?= __('Edit Wechat Gzh') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('appid');
            echo $this->Form->control('secret');
            echo $this->Form->control('token');
            echo $this->Form->control('oauth_scopes');
            echo $this->Form->control('oauth_callback');
            echo $this->Form->control('payment');
            echo $this->Form->control('menu');
            echo $this->Form->control('template');
            echo $this->Form->control('subscribemsg');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
