<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
  */
?>
    <!-- Content Header -->
    <section class="content-header">
        <h1><?= __('Users') ?><small></small></h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        	<li class="active"><?= __('Users') ?></li>
        </ol>
    </section>
    <!-- /Content Header -->

    <!-- Main content -->
    <section class="content">
    	<div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= __('Users') ?></h3>
                <div class="box-tools">
                	<a class="btn btn-skin btn-sm"
                        <?= $this->Html->link(__('New Users'), ['action' => 'add']) ?>
                    </a>
    			</div>
            </div>
        	<div class="box-body no-padding ">

          		<table class="table table-striped">
          		  <thead>
                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('head_img') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('from_where') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('if_active') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
            		<tbody>
                        <?php foreach ($users as $user): ?>
                                    <tr>
                                                                <td><?= $this->Number->format($user->id) ?></td>
                                                                <td><?= h($user->username) ?></td>
                                                                <td><?= h($user->password) ?></td>
                                                                <td><?= $this->Number->format($user->head_img) ?></td>
                                                                <td><?= h($user->from_where) ?></td>
                                                                <td><?= h($user->if_active) ?></td>
                                                                <td><?= h($user->created) ?></td>
                                                                <td><?= h($user->modified) ?></td>
                                                                <td class="actions">
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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



