<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\App\Model\Entity\Action $action
  */
?>

<!-- Content Header -->
<section class="content-header">
    <h1><?= __('Actions')?><small></small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> <?= __('Actions')?></a></li>
        <li class="active"><?= __('Actions')?> details</li>
    </ol>
</section>
<!-- /Content Header -->

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= __('Actions')?> details</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered view-t">
                <tbody>
                                                                <tr>
                    <th scope="row"><?= __('Name') ?></th>
                    <td><?= h($action->name) ?></td>
                </tr>
                                                                <tr>
                    <th scope="row"><?= __('Controller') ?></th>
                    <td><?= h($action->controller) ?></td>
                </tr>
                                                                <tr>
                    <th scope="row"><?= __('Action') ?></th>
                    <td><?= h($action->action) ?></td>
                </tr>
                                                                                                                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($action->id) ?></td>
                </tr>
                                                                                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($action->created) ?></td>
                </tr>
                                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= h($action->modified) ?></td>
                </tr>
                                                

                </tbody></table>


        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="<?= $this->Url->build(['action'=>'index',$action->id]) ?>">返回</a>
        </div>
    </div>
</section>