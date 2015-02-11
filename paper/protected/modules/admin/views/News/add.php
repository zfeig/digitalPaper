<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl ?>/assets/Public/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl ?>/assets/Public/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl ?>/assets/Public/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/jquery.js"></script>
<style>
.position{margin: 10px 0px;padding: 5px;}
.position input{display: inline-block;width: 60px;}
a{color: #fff}
.createPosition{margin:2px 2px;color:#fff;font-family:'微软雅黑';padding:  8px 10px;text-decoration: none;text-align: center;border: 1px solid #5CB85C;background: #5CB85C;border-radius: 4px;}
.createPosition:hover{background: #449D44;color:#fff;}
.createPosition:active{background: #449D44;color:#fff;}
</style>
	<h1><?php echo '添加版面文章'; ?></h1>

	<?php

echo "<div class='newsForm'>";
 $form=$this->beginWidget('CActiveForm', array(
 'htmlOptions'=>array(
'id'=>'banmian',
'enableAjaxValidation'=>false,
)));
echo $form->LabelEx($model,'title');
echo $form->textField($model,'title')."<br/>";
echo $form->error($model,'title');

echo $form->LabelEx($model,'subtitle');
echo $form->textField($model,'subtitle')."<br/>";
echo $form->error($model,'subtitle');


echo "<div class='position'><a class='createPosition' href='javascript:void(0);'>创建位置</a></div>";
echo "<div class='position'><span>文章位置：</span>";
echo $form->LabelEx($model,'top');
echo $form->textField($model,'top')."&nbsp;&nbsp;";
echo $form->error($model,'top');

echo $form->LabelEx($model,'left');
echo $form->textField($model,'left')."&nbsp;&nbsp;";
echo $form->error($model,'left');

echo $form->LabelEx($model,'width');
echo $form->textField($model,'width')."&nbsp;&nbsp;";
echo $form->error($model,'width');

echo $form->LabelEx($model,'height');
echo $form->textField($model,'height');
echo $form->error($model,'height');

echo "</div>";
echo $form->LabelEx($model,'content');
echo $form->textarea($model,'content')."<br/>";
echo $form->error($model,'content');


echo $form->hiddenField($model,'bid');
echo CHtml::submitButton('提交'); 
 $this->endWidget();

 echo "</div><br/>";


?>
<script type="text/javascript">
	    var ue=UE.getEditor('NewsForm_content');
</script>
<script type="text/javascript">
	

	$(function(){
		
		$(".createPosition").click(function(){
			$id=<?php echo $_GET['id'] ?>;
			$url="<?php echo $this->createUrl('news/position',array('id'=>$_GET['id'])) ?>";
			window.open($url);
		})

	})
</script>
