<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\App\Model\Entity\UserWechat $userWechat
  */
?>

<!-- Content Header -->
<section class="content-header">
    <h1><?= __('User Wechats')?><small></small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> <?= __('User Wechats')?></a></li>
        <li class="active"><?= __('User Wechats')?> details</li>
    </ol>
</section>
<!-- /Content Header -->

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= __('User Wechats')?> details</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered view-t">
                <tbody>
                                                                <tr>
                    <th scope="row"><?= __('User') ?></th>
                    <td><?= $userWechat->has('user') ? $this->Html->link($userWechat->user->id, ['controller' => 'Users', 'action' => 'view', $userWechat->user->id]) : '' ?></td>
                </tr>
                                                                <tr>
                    <th scope="row"><?= __('Nickname') ?></th>
                    <td><?= h($userWechat->nickname) ?></td>
                </tr>
                                                                <tr>
                    <th scope="row"><?= __('Headimgurl') ?></th>
                    <td><?= h($userWechat->headimgurl) ?></td>
                </tr>
                                                                                                                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userWechat->id) ?></td>
                </tr>
                                                                                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($userWechat->created) ?></td>
                </tr>
                                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= h($userWechat->modified) ?></td>
                </tr>
                                                

                </tbody></table>


        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="<?= $this->Url->build(['action'=>'index',$userWechat->id]) ?>">返回</a>
        </div>
    </div>
</section>