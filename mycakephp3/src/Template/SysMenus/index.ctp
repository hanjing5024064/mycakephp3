<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\App\Model\Entity\SysMenu[]|\Cake\Collection\CollectionInterface $sysMenus
  */
?>
    <!-- Content Header -->
    <section class="content-header">
        <h1><?= __('Sys Menus') ?><small></small></h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        	<li class="active"><?= __('Sys Menus') ?></li>
        </ol>
    </section>
    <!-- /Content Header -->

    <!-- Main content -->
    <section class="content">
    	<div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= __('Sys Menus') ?></h3>
                <div class="box-tools">
                	<a class="btn btn-skin btn-sm"
                        <?= $this->Html->link(__('New Sys Menus'), ['action' => 'add']) ?>
                    </a>
    			</div>
            </div>
        	<div class="box-body no-padding ">

          		<table class="table table-striped">
          		  <thead>
                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('parent_id') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('controller') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('action') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('menuorder') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
            		<tbody>
                        <?php foreach ($sysMenus as $sysMenu): ?>
                                    <tr>
                                                                <td><?= $this->Number->format($sysMenu->id) ?></td>
                                                                <td><?= h($sysMenu->name) ?></td>
                                                                <td><?= $sysMenu->has('parent_sys_menu') ? $this->Html->link($sysMenu->parent_sys_menu->name, ['controller' => 'SysMenus', 'action' => 'view', $sysMenu->parent_sys_menu->id]) : '' ?></td>
                                                                <td><?= h($sysMenu->controller) ?></td>
                                                                <td><?= h($sysMenu->action) ?></td>
                                                                <td><?= h($sysMenu->menuorder) ?></td>
                                                                <td class="actions">
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $sysMenu->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sysMenu->id]) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sysMenu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sysMenu->id)]) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
          			</tbody>
          		</table>
        	</div>
        	<div class="box-footer clearfix">
        		<p class="pull-left"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>

                <ul class="pagination pagination-sm no-margin pull-right">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
            </div>
    	</div>
    </section>

    <!-- /Main content -->



