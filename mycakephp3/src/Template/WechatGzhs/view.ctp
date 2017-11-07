<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\App\Model\Entity\WechatGzh $wechatGzh
  */
?>

<!-- Content Header -->
<section class="content-header">
    <h1><?= __('Wechat Gzhs')?><small></small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> <?= __('Wechat Gzhs')?></a></li>
        <li class="active"><?= __('Wechat Gzhs')?> details</li>
    </ol>
</section>
<!-- /Content Header -->

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= __('Wechat Gzhs')?> details</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered view-t">
                <tbody>
                                                                <tr>
                    <th scope="row"><?= __('Name') ?></th>
                    <td><?= h($wechatGzh->name) ?></td>
                </tr>
                                                                <tr>
                    <th scope="row"><?= __('Appid') ?></th>
                    <td><?= h($wechatGzh->appid) ?></td>
                </tr>
                                                                <tr>
                    <th scope="row"><?= __('Secret') ?></th>
                    <td><?= h($wechatGzh->secret) ?></td>
                </tr>
                                                                <tr>
                    <th scope="row"><?= __('Token') ?></th>
                    <td><?= h($wechatGzh->token) ?></td>
                </tr>
                                                                <tr>
                    <th scope="row"><?= __('Oauth Scopes') ?></th>
                    <td><?= h($wechatGzh->oauth_scopes) ?></td>
                </tr>
                                                                <tr>
                    <th scope="row"><?= __('Oauth Callback') ?></th>
                    <td><?= h($wechatGzh->oauth_callback) ?></td>
                </tr>
                                                                                                                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($wechatGzh->id) ?></td>
                </tr>
                                                                                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($wechatGzh->created) ?></td>
                </tr>
                                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= h($wechatGzh->modified) ?></td>
                </tr>
                                                

                </tbody></table>


        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="<?= $this->Url->build(['action'=>'index',$wechatGzh->id]) ?>">返回</a>
        </div>
    </div>
</section>