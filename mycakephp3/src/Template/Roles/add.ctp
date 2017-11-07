<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<!-- Content Header -->
<?= $this->element('content_header'); ?>
<!-- /Content Header -->

<!-- Main content -->
<section class="content">
    <div class="box">

        <?= $this->Form->create($role) ?>
        <div class="box-body">
            <?php
            ?>

            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                        echo $this->Form->control('name', ['class' => 'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                        echo $this->Form->control('actions._ids', ['options' => $actions, 'class' => 'form-control']);
                        ?>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                        echo $this->Form->control('users._ids', ['options' => $users, 'class' => 'form-control']);
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
