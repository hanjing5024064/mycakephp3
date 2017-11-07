<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\App\Model\Entity\WechatGzh[]|\Cake\Collection\CollectionInterface $wechatGzhs
  */
?>
    <!-- Content Header -->
    <section class="content-header">
        <h1><?= __('Wechat Gzhs') ?><small></small></h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        	<li class="active"><?= __('Wechat Gzhs') ?></li>
        </ol>
    </section>
    <!-- /Content Header -->

    <!-- Main content -->
    <section class="content">
    	<div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= __('Wechat Gzhs') ?></h3>
                <div class="box-tools">
                	<a class="btn btn-skin btn-sm"
                        <?= $this->Html->link(__('New Wechat Gzhs'), ['action' => 'add']) ?>
                    </a>
    			</div>
            </div>
        	<div class="box-body no-padding ">

          		<table class="table table-striped">
          		  <thead>
                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('appid') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('secret') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('token') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('oauth_scopes') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('oauth_callback') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
            		<tbody>
                        <?php foreach ($wechatGzhs as $wechatGzh): ?>
                                    <tr>
                                                                <td><?= $this->Number->format($wechatGzh->id) ?></td>
                                                                <td><?= h($wechatGzh->name) ?></td>
                                                                <td><?= h($wechatGzh->appid) ?></td>
                                                                <td><?= h($wechatGzh->secret) ?></td>
                                                                <td><?= h($wechatGzh->token) ?></td>
                                                                <td><?= h($wechatGzh->oauth_scopes) ?></td>
                                                                <td><?= h($wechatGzh->oauth_callback) ?></td>
                                                                <td><?= h($wechatGzh->created) ?></td>
                                                                <td><?= h($wechatGzh->modified) ?></td>
                                                                <td class="actions">
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $wechatGzh->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $wechatGzh->id]) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wechatGzh->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wechatGzh->id)]) ?>
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



