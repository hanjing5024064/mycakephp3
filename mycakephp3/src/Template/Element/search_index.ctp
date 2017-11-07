<?= $this->Form->create(null, ['url' => ['controller' => $this->request->param('controller'), 'action' => 'index'],'class' => 'fl top-form']); ?>
<?php
$searchHistory = $this->request->session()->read('searchArray.'.$this->request->param('controller'));
$textIndex = 0;

//check parameters
if(!is_array($fields) || count($fields) < 1)return;

foreach ($fields as $eachFields => $type):

    //session 中查询条件
    $sessionSearch = '';
    if(is_array($searchHistory) && array_key_exists($eachFields, $searchHistory))$sessionSearch = $searchHistory[$eachFields];
    ?>

    <?php if ($type == 'foreignKey'): ?>
    <!--外键筛选-->
    <div class="form-li">
        <?php
        if (isset($text) && isset($text[$textIndex]))//设置了显示text
            echo $text[$textIndex].':';
        else//未设置显示text
            echo __($eachFields).':';

        $temArray = explode('_id', $eachFields);
        ?>
        <select name="<?= $this->request->param('controller') . '[' . $eachFields . ']' ?>" class="input-normal bui-form-field-select bui-form-field searchSelect" aria-disabled="false" aria-pressed="false">
            <?php
            if(count($temArray) > 0){
                echo "<option value='all' selected>全部</option>";
                foreach($$temArray[0] as $key=>$value){
                    if($sessionSearch == $key)echo "<option value='$key' selected>$value</option>";
                    else echo "<option value='$key'>$value</option>";
                }
            }
            ?>
        </select>
    </div>
<?php endif; ?>

    <?php if ($type == 'string'): ?>
    <!--字符筛选-->
    <div class="form-li">
        <?php
        if (isset($text) && isset($text[$textIndex]))//设置了显示text
            echo $text[$textIndex];
        else//未设置显示text
            echo __($eachFields); ?>:
        <input type="text" name='<?= $this->request->param('controller') . '[' . $eachFields . ']' ?>'
               class=" input-default searchInput" value="<?= $sessionSearch?>">
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
               class="calendar searchInput"/>
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
               class="calendar searchInput" value="<?php if(isset($sessionSearch['from']))$sessionSearch['from']?>"/>-
        <input type="text" name="<?= $this->request->param('controller') . '[' . $eachFields . '][to]' ?>"
               class="calendar searchInput" value="<?php if(isset($sessionSearch['to']))$sessionSearch['to']?>"/>
    </div>
<?php endif; ?>

    <?php
    $textIndex++;
endforeach;
?>
<button class="btn btn-primary" id="resetSearch">清空查询条件</button>
<?= $this->Form->button(__('搜索'), ['type' => 'submit', 'class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>

<script>
//    BUI.use('bui/calendar', function (Calendar) {
//        var datepicker = new Calendar.DatePicker({
//            trigger: '.calendar',
//            showTime: false,
//            autoRender: true
//        });
//    });
    $(function(){
        $('#resetSearch').click(function(){
            $('.searchSelect').removeProp('selected');
            $('.searchSelect option:first').prop('selected', 'selected');;
            $('.searchInput').val('');
            return false;
        });
    });
</script>
