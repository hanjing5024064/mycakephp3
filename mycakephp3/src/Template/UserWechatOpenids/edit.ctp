<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserWechatOpenid $userWechatOpenid
 */
?>
<!-- Content Header -->
<?= $this->element('content_header');?>
<!-- /Content Header -->

<!-- Main content -->
<section class="content">
    <div class="box">

    <?= $this->Form->create($userWechatOpenid) ?>
        <div class="box-body">

            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('user_wechat_id', ['options' => $userWechats, 'empty' => true, 'class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('wechat_gzh_id', ['options' => $wechatGzhs, 'empty' => true, 'class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('openid',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('uuid',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('status',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
        </div>
        <div class="box-footer">
            <?= $this->Form->button(__('提交'), ['type' => 'submit', 'class' => 'btn btn-primary']) ?>
            <?= $this->Form->button(__('重置'), ['type' => 'reset', 'class' => 'btn']) ?>
        </div>

    <?= $this->Form->end() ?>

    </div>
</section>
<!-- /Main content -->
