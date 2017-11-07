<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\App\Model\Entity\UserWechatOpenid $userWechatOpenid
  */
?>

<!-- Content Header -->
<section class="content-header">
    <h1><?= __('User Wechat Openids')?><small></small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> <?= __('User Wechat Openids')?></a></li>
        <li class="active"><?= __('User Wechat Openids')?> details</li>
    </ol>
</section>
<!-- /Content Header -->

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= __('User Wechat Openids')?> details</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered view-t">
                <tbody>
                                                                <tr>
                    <th scope="row"><?= __('User Wechat') ?></th>
                    <td><?= $userWechatOpenid->has('user_wechat') ? $this->Html->link($userWechatOpenid->user_wechat->id, ['controller' => 'UserWechats', 'action' => 'view', $userWechatOpenid->user_wechat->id]) : '' ?></td>
                </tr>
                                                                <tr>
                    <th scope="row"><?= __('Wechat Gzh') ?></th>
                    <td><?= $userWechatOpenid->has('wechat_gzh') ? $this->Html->link($userWechatOpenid->wechat_gzh->name, ['controller' => 'WechatGzhs', 'action' => 'view', $userWechatOpenid->wechat_gzh->id]) : '' ?></td>
                </tr>
                                                                <tr>
                    <th scope="row"><?= __('Openid') ?></th>
                    <td><?= h($userWechatOpenid->openid) ?></td>
                </tr>
                                                                <tr>
                    <th scope="row"><?= __('Uuid') ?></th>
                    <td><?= h($userWechatOpenid->uuid) ?></td>
                </tr>
                                                                                                                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userWechatOpenid->id) ?></td>
                </tr>
                                <tr>
                    <th scope="row"><?= __('Status') ?></th>
                    <td><?= $this->Number->format($userWechatOpenid->status) ?></td>
                </tr>
                                                                                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($userWechatOpenid->created) ?></td>
                </tr>
                                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= h($userWechatOpenid->modified) ?></td>
                </tr>
                                                

                </tbody></table>


        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="<?= $this->Url->build(['action'=>'index',$userWechatOpenid->id]) ?>">返回</a>
        </div>
    </div>
</section>