<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!-- Content Header -->
<?= $this->element('content_header');?>
<!-- /Content Header -->

<!-- Main content -->
<section class="content">
    <div class="box">

    <?= $this->Form->create($user) ?>
        <div class="box-body">

            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('username',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('password',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('head_img',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('from_where',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('if_active');
                        ?>
                    </div>
                </div>
            </div>

                        <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
            <?php
            echo $this->Form->control('roles._ids', ['options' => $roles, 'class'=>'form-control']);
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
