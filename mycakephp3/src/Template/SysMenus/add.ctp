<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SysMenu $sysMenu
 */
?>
<!-- Content Header -->
<?= $this->element('content_header');?>
<!-- /Content Header -->

<!-- Main content -->
<section class="content">
    <div class="box">

    <?= $this->Form->create($sysMenu) ?>
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
                                    echo $this->Form->control('parent_id', ['options' => $parentSysMenus, 'empty' => true, 'class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('controller',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('action',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('menuorder',['class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                                    echo $this->Form->control('icon',['class'=>'form-control']);
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
