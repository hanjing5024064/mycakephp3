<!-- 1. add id = editor for html element -->
<?php //echo $this->Form->input('content', array('label' =>  false, 'id' => 'editor', 'style' => 'width:1024px;height:500px;'));?>
<!-- <textarea name="data[Article][content]" id="editor" style="width:1024px;height:500px;"></textarea> -->
<!-- 2. add these code in the last of .ctp file -->
<!-- add ueditor by baidu -->
<?php //echo $this->element('html_ueditor');?>
<!-- 3. change ueditor/php/config.json url according your project-->

<!--官方文档 http://fex.baidu.com/ueditor-->
<!-- 1. create folder: upload/ueditor -->
<!-- 2. make sure upload/ueditor writable-->
<!-- 加载编辑器的容器 -->
<script id="ueditor" name="content" type="text/plain">
    <?= $content ?>
</script>

<!-- 配置文件 -->
<script type="text/javascript" src="<?php echo $this->Url->build('/assets/ueditor/ueditor.config.js')?>"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="<?php echo $this->Url->build('/assets/ueditor/ueditor.all.min.js')?>"></script>
<!--语言文件-->
<script type="text/javascript" src="<?php echo $this->Url->build('/assets/ueditor/lang/zh-cn/zh-cn.js')?>"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('ueditor', {
        initialFrameWidth: 800,
        initialFrameHeight: 500
    });
</script>