<?= $this->Form->create(null, ['url' => ['controller' => $this->request->param('controller'), 'action' => 'index']]); ?>
<?php
$textIndex = 0;
foreach ($fields as $eachFields => $type):
    ?>

    <?php if ($type == 'string'): ?>
    <!--字符筛选-->
    <div class="form-li">
        <?php
        if (isset($text) && isset($text[$textIndex]))//设置了显示text
            echo $text[$textIndex];
        else//未设置显示text
            echo __($eachFields); ?>:
        <input type="text" name='<?= $this->request->param('controller') . '[' . $eachFields . ']' ?>'
               class=" input-default">
    </div>
<?php endif; ?>

    <?php if ($type == 'date'): ?>
    <!--时间筛选-->
    <div class="form-li">
        <?php
        if (isset($text) && isset($text[$textIndex]))//设置了显示text
            echo $text[$textIndex];
        else//未设置显示text
            echo __($eachFields); ?>:
        <input type="text" name="<?= $this->request->param('controller') . '[' . $eachFields . ']' ?>"
               class="calendar"/>
    </div>
<?php endif; ?>

    <?php if ($type == 'from-to'): ?>
    <!--时间范围筛选-->
    <div class="form-li">
        <?php
        if (isset($text) && isset($text[$textIndex]))//设置了显示text
            echo $text[$textIndex];
        else//未设置显示text
            echo __($eachFields); ?>:
        <input type="text" name="<?= $this->request->param('controller') . '[' . $eachFields . '][from]' ?>"
               class="calendar"/>-
        <input type="text" name="<?= $this->request->param('controller') . '[' . $eachFields . '][to]' ?>"
               class="calendar"/>
    </div>
<?php endif; ?>

    <?php
    $textIndex++;
endforeach;
?>
<?= $this->Form->button(__('搜索'), ['type' => 'submit', 'class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>
<script>
    BUI.use('bui/calendar', function (Calendar) {
        var datepicker = new Calendar.DatePicker({
            trigger: '.calendar',
            showTime: false,
            autoRender: true
        });
    });
</script>
