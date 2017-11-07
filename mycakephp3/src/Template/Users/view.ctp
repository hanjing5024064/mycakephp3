<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\App\Model\Entity\User $user
  */
?>

<!-- Content Header -->
<section class="content-header">
    <h1><?= __('Users')?><small></small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> <?= __('Users')?></a></li>
        <li class="active"><?= __('Users')?> details</li>
    </ol>
</section>
<!-- /Content Header -->

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= __('Users')?> details</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered view-t">
                <tbody>
                                                                <tr>
                    <th scope="row"><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                                                                <tr>
                    <th scope="row"><?= __('Password') ?></th>
                    <td><?= h($user->password) ?></td>
                </tr>
                                                                <tr>
                    <th scope="row"><?= __('From Where') ?></th>
                    <td><?= h($user->from_where) ?></td>
                </tr>
                                                                                                                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                                <tr>
                    <th scope="row"><?= __('Head Img') ?></th>
                    <td><?= $this->Number->format($user->head_img) ?></td>
                </tr>
                                                                                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
                                                                                <tr>
                    <th scope="row"><?= __('If Active') ?></th>
                    <td><?= $user->if_active ? __('Yes') : __('No'); ?></td>
                </tr>
                                

                </tbody></table>


        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="<?= $this->Url->build(['action'=>'index',$user->id]) ?>">返回</a>
        </div>
    </div>
</section>