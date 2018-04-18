<!--搜索-->
<?= $this->Form->create(null, ['url' => ['controller' => $this->request->param('controller'), 'action' => 'index'],'class'=>'hidden-xs hidden-sm','novalidate'=>'novalidate']); ?>
<table class="table table-search">
    <tbody>
    <?php
    $textIndex = 0;
    foreach ($fields as $eachFields => $type):
    ?>
    <?php if ($type == 'string'): ?>
    <tr>
        <td class="left">
            <?php
            if (isset($text) && isset($text[$textIndex]))//设置了显示text
                echo $text[$textIndex];
            else//未设置显示text
                echo __($eachFields); ?>:
        </td>
        <td>
            <div class="input text required">
                <input type="text" value="<?php echo isset($searchName['name'])?$searchName['name']:''; ?>" name='<?= $this->request->param('controller') . '[' . $eachFields . ']' ?>' class="form-control" />
            </div>
        </td>
        <?php endif; ?>

        <?php if ($type == 'date'): ?>


            <td class="left">
                <div class="form-li">
                    <?php
                    if (isset($text) && isset($text[$textIndex]))//设置了显示text
                        echo $text[$textIndex];
                    else//未设置显示text
                        echo __($eachFields); ?>:
            </td>
            <td>
                <input type="text" name="<?= $this->request->param('controller') . '[' . $eachFields . ']' ?>"
                       class="form-control datepicker"/>
                </div>
            </td>
        <?php endif; ?>
        <?php if ($type == 'from-to'): ?>

            <td class="left">
                <div class="form-li">
                    <?php
                    if (isset($text) && isset($text[$textIndex]))//设置了显示text
                        echo $text[$textIndex];
                    else//未设置显示text
                        echo __($eachFields); ?>:
            </td>
            <td colspan="3">
                <div class="input text select-time form-small40 display-inline">
                    <input type="text" value="<?php echo isset($searchName['from'])?$searchName['from']:'';?>" name="<?= $this->request->param('controller') . '[' . $eachFields . '][from]' ?>" class="form-control datepicker" />
                    <span class="input-time">
                        <span class="glyphicon glyphicon-calendar">

                        </span>
                    </span>
                </div>
                <div class="display-inline">-</div>
                <div class="input text select-time form-small40 display-inline">
                    <input type="text" value="<?php echo isset($searchName['to'])?$searchName['to']:'';?>" name="<?= $this->request->param('controller') . '[' . $eachFields . '][to]' ?>" class="form-control datepicker" />
                    <span class="input-time">
                        <span class="glyphicon glyphicon-calendar">

                        </span>
                    </span>
                </div>
            </td>
            </div>
        <?php endif; ?>

        <?php
        $textIndex++;
        endforeach;
        ?>
        <td colspan="3"><?= $this->Form->button(__('搜索'), ['type' => 'submit', 'class' => 'btn btn-skin btn-sm']) ?>
        </td>
    </tr>
    </tbody>
</table>

<?= $this->Form->end() ?>

<!--搜索-->