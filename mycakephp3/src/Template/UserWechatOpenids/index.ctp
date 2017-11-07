<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\App\Model\Entity\UserWechatOpenid[]|\Cake\Collection\CollectionInterface $userWechatOpenids
  */
?>
    <!-- Content Header -->
    <section class="content-header">
        <h1><?= __('User Wechat Openids') ?><small></small></h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        	<li class="active"><?= __('User Wechat Openids') ?></li>
        </ol>
    </section>
    <!-- /Content Header -->

    <!-- Main content -->
    <section class="content">
    	<div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= __('User Wechat Openids') ?></h3>
                <div class="box-tools">
                	<a class="btn btn-skin btn-sm"
                        <?= $this->Html->link(__('New User Wechat Openids'), ['action' => 'add']) ?>
                    </a>
    			</div>
            </div>
        	<div class="box-body no-padding ">

          		<table class="table table-striped">
          		  <thead>
                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('user_wechat_id') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('wechat_gzh_id') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('openid') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('uuid') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
            		<tbody>
                        <?php foreach ($userWechatOpenids as $userWechatOpenid): ?>
                                    <tr>
                                                                <td><?= $this->Number->format($userWechatOpenid->id) ?></td>
                                                                <td><?= $userWechatOpenid->has('user_wechat') ? $this->Html->link($userWechatOpenid->user_wechat->id, ['controller' => 'UserWechats', 'action' => 'view', $userWechatOpenid->user_wechat->id]) : '' ?></td>
                                                                <td><?= $userWechatOpenid->has('wechat_gzh') ? $this->Html->link($userWechatOpenid->wechat_gzh->name, ['controller' => 'WechatGzhs', 'action' => 'view', $userWechatOpenid->wechat_gzh->id]) : '' ?></td>
                                                                <td><?= h($userWechatOpenid->openid) ?></td>
                                                                <td><?= h($userWechatOpenid->uuid) ?></td>
                                                                <td><?= $this->Number->format($userWechatOpenid->status) ?></td>
                                                                <td><?= h($userWechatOpenid->created) ?></td>
                                                                <td><?= h($userWechatOpenid->modified) ?></td>
                                                                <td class="actions">
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $userWechatOpenid->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userWechatOpenid->id]) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userWechatOpenid->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userWechatOpenid->id)]) ?>
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



