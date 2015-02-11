
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl ?>/assets/Public/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl ?>/assets/Public/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl ?>/assets/Public/lang/zh-cn/zh-cn.js"></script>

<!--内容部分-->

	<h1>表单上传</h1>
	<form action="" method='post'>
	用户名：<input type="text" name="title"><br/>
    描  述：<textarea name="brief" id="content" cols="30" rows="10"></textarea>
	<input type="submit" value="提交" name='btn'>
	</form>

<script type="text/javascript">
	    var ue=UE.getEditor('content');
</script>

<!--内容结束-->
