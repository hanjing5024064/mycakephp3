<!--  
	日期输入格式插件

	使用方法：
	1.需输入日期的页面引入
	//加载日期输入插件 
	<?//= $this->element('date_time_picker'); ?>

	2.input 增加class=>form_date 更改type=>text
	<?php
    //echo $this->Form->input('signed', ['label' => false, 'class' => 'form-control form_date','empty'=>true,'type'=>'text']);
    ?>

    3.css 样式 因Bootstrap版本 修复箭头图标 显示正常则不加
    /*datetimepicker 日期时间样式 手动加载图标*/
	/*.icon-arrow-left:before{content:"\e091"}
	.icon-arrow-right:before{content:"\e092"}*/
	[class*=" datetimepicker-dropdown"]::before {top: -8px;}
-->

<script type="text/javascript" src="<?= $this->Url->webroot('datetimepicker/bootstrap-datetimepicker.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->Url->webroot('datetimepicker/bootstrap-datetimepicker.zh-CN.js') ?>"></script>

<script type="text/javascript">
$(function(){
	var datetimepicker_css='<link rel="stylesheet" type="text/css" href="<?= $this->Url->webroot('datetimepicker/bootstrap-datetimepicker.min.css') ?>">';
	$('head').append(datetimepicker_css);

    $(".form_date").datetimepicker({
        format: "yyyy-mm-dd",//显示时间类型  yyyy-mm-dd hh:ii:ss
        todayBtn: true,//底部显示今天按钮
        todayHighlight: true,//当前日期高亮
        forceParse: true,//当选择器关闭的时候，是否强制解析输入框中的值。
        minView: 2,//插件可以精确到那个时间，比如1的话就只能选择到天，不能选择小时了 0、小时1、天2、月3、年4、十年，默认值2
        autoclose: true,//当选择一个日期之后是否立即关闭此日期时间选择器
        forceParse: true,//当选择器关闭的时候，是否强制解析输入框中的值。????
        pickerPosition: "bottom",//显示的位置
        startView: 2,//点开插件后显示的界面。0、小时1、天2、月3、年4、十年，默认值2
        language: 'zh-CN'
    });
    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss",//显示时间类型  yyyy-mm-dd hh:ii:ss
        todayBtn: true,//底部显示今天按钮
        todayHighlight: true,//当前日期高亮
        forceParse: true,//当选择器关闭的时候，是否强制解析输入框中的值。
        minView: 0,//插件可以精确到那个时间，比如1的话就只能选择到天，不能选择小时了 0、小时1、天2、月3、年4、十年，默认值2
        autoclose: true,//当选择一个日期之后是否立即关闭此日期时间选择器
        forceParse: true,//当选择器关闭的时候，是否强制解析输入框中的值。????
        pickerPosition: "bottom",//显示的位置
        startView: 2,//点开插件后显示的界面。0、小时1、天2、月3、年4、十年，默认值2
        language: 'zh-CN'
    });
});

</script>