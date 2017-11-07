<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\App\Model\Entity\UserWechat[]|\Cake\Collection\CollectionInterface $userWechats
  */
?>
    <!-- Content Header -->
    <section class="content-header">
        <h1><?= __('User Wechats') ?><small></small></h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        	<li class="active"><?= __('User Wechats') ?></li>
        </ol>
    </section>
    <!-- /Content Header -->

    <!-- Main content -->
    <section class="content">
    	<div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= __('User Wechats') ?></h3>
                <div class="box-tools">
                	<a class="btn btn-skin btn-sm"
                        <?= $this->Html->link(__('New User Wechats'), ['action' => 'add']) ?>
                    </a>
    			</div>
            </div>
        	<div class="box-body no-padding ">

          		<table class="table table-striped">
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



