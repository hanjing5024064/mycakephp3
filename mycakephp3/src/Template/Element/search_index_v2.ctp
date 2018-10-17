<!-- 加载日期输入插件 -->
<?= $this->element('date_time_picker'); ?>

<?php
if (isset($controller) && isset($action))
    echo $this->Form->create(null, ['url' => ['controller' => $controller, 'action' => $action], 'class' => 'fl top-form']);
else
    echo $this->Form->create(null, ['url' => ['controller' => $this->request->param('controller'), 'action' => 'index'], 'class' => 'fl top-form']);
?>
<!--搜索区域 start -->
<?php
$searchHistory = $this->request->session()->read('s' . $this->request->param('controller'));
$element = 0;
foreach ($fields as $eachField):

    //该字段的历史查询条件
    $sessionSearch = '';
    if($searchHistory){
        switch ($eachField['type']) {
            case 'dateRegion':
            case 'foreignDateRegion':
                $sessionSearch = ['start' => '', 'end' => ''];
                if(array_key_exists($eachField['type'].'-'.$eachField['column'].'-start', $searchHistory)) {
                        $sessionSearch['start'] = $searchHistory[$eachField['type'].'-'.$eachField['column'].'-start'];
                }
                if(array_key_exists($eachField['type'].'-'.$eachField['column'].'-end', $searchHistory)) {
                        $sessionSearch['end'] = $searchHistory[$eachField['type'].'-'.$eachField['column'].'-end'];
                }
                break;
            case 'br':
                break;
            default:
                if(array_key_exists($eachField['type'].'-'.$eachField['column'], $searchHistory)) {
                        $sessionSearch = $searchHistory[$eachField['type'].'-'.$eachField['column']];
                }
                break;
        }
    }

    if($eachField['type'] !== 'dateRegion' && $eachField['type'] !== 'foreignDateRegion')
        {
    if($searchHistory && $eachField['type'] !== 'br' && array_key_exists($eachField['type'].'-'.$eachField['column'], $searchHistory)) {

            $sessionSearch = $searchHistory[$eachField['type'].'-'.$eachField['column']];
    }
    }
        else{

        }

    $element++;
    ?>
    <?php if($element%$elementInEachRow === 1):?>
    <div class="row">
    <?php endif;?>

<!--字符查询,sql: like = '%string%'-->
        <?php if($eachField['type'] === 'string' || $eachField['type'] === 'foreignString'):?>
        <div class="col-md-2">
            <label for="" class="control-label">
                <?= $eachField['label']; ?>
            </label>
            <div class="form-group">
                <?php
                echo $this->Form->input(
                    $this->request->param('controller') . '[' . $eachField['type'] . '-' . $eachField['column'] . ']',
                    [
                        'placeholder' => $eachField['label'],
                        'label' => false,
                        'class' => 'form-control searchInput',
                        'value' => $sessionSearch
                    ]
                );
                ?>
            </div>
        </div>
        <?php endif;?>

<!--为空查询,选中后,sql:  is not null-->
        <?php if($eachField['type'] === 'isNotNull' || $eachField['type'] === 'isNull'):?>
        <div class="col-md-2">
            <div class="form-group" style="margin-top: 10px;font-weight: 900;">
                <?php
                echo $this->Form->checkbox(
                    $this->request->param('controller') . '[' . $eachField['type'] . '-' . $eachField['column'] . ']',
                    [
                        'id' => $this->request->param('controller') . '[' . $eachField['type'] . '-' . $eachField['column'] . ']',
                        'hiddenField' => false,
                        'value' => 1,
                        'checked' => $sessionSearch?true:false,
                        'class' => 'searchCheckbox'
                    ]
                );
                ?>
                <label for="<?php echo $this->request->param('controller') . '[' . $eachField['type'] . '-' . $eachField['column'] . ']'?>"><?= $eachField['label'];?></label>
            </div>
        </div>
        <?php endif;?>

<!--    日期区间查询,sql: >= '2017-01-01' and <= '2017-01-02'-->
        <?php if($eachField['type'] === 'dateRegion' || $eachField['type'] === 'foreignDateRegion'):?>
        <div class="col-md-2">
            <label for="" class="control-label">
                <?= $eachField['label']; ?>大于
            </label>
            <div class="form-group">
                <?php
                echo $this->Form->input(
                    $this->request->param('controller') . '[' . $eachField['type'] . '-' . $eachField['column'] . '-start]',
                    [
                        'placeholder' => $eachField['label'].'大于',
                        'label' => false,
                        'class' => 'form-control form_date searchInput',
                        'value' => ($sessionSearch && array_key_exists('start', $sessionSearch))?$sessionSearch['start']:''
                    ]
                );
                ?>
            </div>
        </div>
        <div class="col-md-2">
            <label for="" class="control-label">
                <?= $eachField['label']; ?>小于
            </label>
            <div class="form-group">
                <?php
                $element++;
                echo $this->Form->input(
                    $this->request->param('controller') . '[' . $eachField['type'] . '-' . $eachField['column'] . '-end]',
                    [
                        'placeholder' => $eachField['label'].'小于',
                        'label' => false,
                        'class' => 'form-control form_date searchInput',
                        'value' => ($sessionSearch && array_key_exists('end', $sessionSearch))?$sessionSearch['end']:''
                    ]
                );
                ?>
            </div>
        </div>
        <?php endif;?>

    <!--下拉查询,sql: id = 1-->
    <?php if($eachField['type'] === 'list' || $eachField['type'] === 'foreignList'):?>
        <div class="col-md-2">
            <label for="" class="control-label">
                <?= $eachField['label']; ?>
            </label>
            <div class="">
                <?php
                echo $this->Form->input(
                    $this->request->param('controller') . '[' . $eachField['type'] . '-' . $eachField['column'] . ']',
                    [
                        'options' => $eachField['option'],
                        'empty' => __('all'),
                        'label' => false,
                        'class' => 'form-control searchSelect',
                        'value' => $sessionSearch
                    ]
                );
                ?>
            </div>
        </div>
    <?php endif;?>

<!--        换行-->
        <?php if($eachField['type'] === 'br'){
            while($element%$elementInEachRow !== 0){
                echo '<div class="col-md-2"></div>';
                $element++;
            }
        }?>


    <?php if($element%$elementInEachRow === 0):?>
    </div>
    <?php endif;?>
<?php endforeach; ?>
<?php if($element%$elementInEachRow !== 0):?>
</div>
<?php endif;?>
<!--搜索区域 end -->

<!--操作按钮 satart-->
<div class="row">
    <div class="col-md-12">
        <div style="float: left; margin-right: 10px;">
            <?= $this->Form->button(__('搜索'), ['type' => 'submit', 'class' => 'btn btn-primary']) ?>
        </div>
        <div style="float: left; margin-right: 10px;">
            <span class="btn btn-primary" id="resetSearch">清空查询条件</span>
            </divn>
            <?php if (isset($excel)): ?>
                <div style="float: left; margin-right: 10px;">
                    <label><a class="btn btn-primary" style="color:white;"
                              href="<?php echo $this->Url->build($excel) ?>">
                            导出信息
                        </a>
                    </label>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!--操作按钮 end-->
<?= $this->Form->end() ?>

    <script>
        $(function () {
            $('#resetSearch').click(function () {
                $(".searchSelect").find("option:first").prop("selected", true);
                $('.searchSelect').change();

                $('.searchInput').val('');

                $('.searchCheckbox').prop("checked",false);
                return false;
            });
        });
    </script>
