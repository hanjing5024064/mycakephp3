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
                ['action' => 'delete', $userWechat->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userWechat->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Wechats'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Wechat Openids'), ['controller' => 'UserWechatOpenids', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Wechat Openid'), ['controller' => 'UserWechatOpenids', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userWechats form large-9 medium-8 columns content">
    <?= $this->Form->create($userWechat) ?>
    <fieldset>
        <legend><?= __('Edit User Wechat') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('nickname');
            echo $this->Form->control('headimgurl');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
