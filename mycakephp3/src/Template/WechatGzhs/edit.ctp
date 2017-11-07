<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WechatGzh $wechatGzh
 */
?>
<!-- Content Header -->
<?= $this->element('content_header');?>
<!-- /Content Header -->

<!-- Main content -->
<section class="content">
    <div class="box">

    <?= $this->Form->create($wechatGzh) ?>
        <div class="box-body">

            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('name',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('appid',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('secret',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('token',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('oauth_scopes',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('oauth_callback',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('payment',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('menu',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('template',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('subscribemsg',['class'=>'form-control']);
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
