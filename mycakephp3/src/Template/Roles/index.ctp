<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
  */
?>
    <!-- Content Header -->
    <section class="content-header">
        <h1><?= __('Roles') ?><small></small></h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        	<li class="active"><?= __('Roles') ?></li>
        </ol>
    </section>
    <!-- /Content Header -->

    <!-- Main content -->
    <section class="content">
    	<div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= __('Roles') ?></h3>
                <div class="box-tools">
                	<a class="btn btn-skin btn-sm"
                        <?= $this->Html->link(__('New Roles'), ['action' => 'add']) ?>
                    </a>
    			</div>
            </div>
        	<div class="box-body no-padding ">

          		<table class="table table-striped">
          		  <thead>
                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
            		<tbody>
                        <?php foreach ($roles as $role): ?>
                                    <tr>
                                                                <td><?= $this->Number->format($role->id) ?></td>
                                                                <td><?= h($role->name) ?></td>
                                                                <td><?= h($role->created) ?></td>
                                                                <td><?= h($role->modified) ?></td>
                                                                <td class="actions">
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $role->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $role->id]) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?>
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



