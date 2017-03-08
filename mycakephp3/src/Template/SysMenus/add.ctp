<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sys Menus'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Sys Menus'), ['controller' => 'SysMenus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Sys Menu'), ['controller' => 'SysMenus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sysMenus form large-9 medium-8 columns content">
    <?= $this->Form->create($sysMenu) ?>
    <fieldset>
        <legend><?= __('Add Sys Menu') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('parent_id', ['options' => $parentSysMenus, 'empty' => true]);
            echo $this->Form->control('controller');
            echo $this->Form->control('action');
            echo $this->Form->control('menuorder');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
