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
	<h1><?php echo '编辑版面文章'; ?></h1>

	<?php

echo "<div class='newsForm'>";
 $form=$this->beginWidget('CActiveForm', array(
 'htmlOptions'=>array(
'id'=>'article',
'enableAjaxValidation'=>false,
)));
echo "<table>";
echo "<tr><td>".$form->LabelEx($model,'title')."</td></tr>";
echo "<tr><td>".$form->textField($model,'title');
echo $form->error($model,'title')."</td></tr>";

echo "<tr><td>".$form->LabelEx($model,'subtitle')."</td></tr>";
echo "<tr><td>".$form->textField($model,'subtitle');
echo $form->error($model,'subtitle')."</td></tr>";


echo "<tr><td><div class='position'><a class='createPosition' href='javascript:void(0);'>创建位置</a></div></td></tr>";
echo "<tr><td><div class='position'><span>文章位置：</span></td></tr>";
echo "<tr><td>".$form->LabelEx($model,'top');
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

echo "</div></td></tr>";

echo "<tr><td>".$form->LabelEx($model,'content')."<td></tr>";
echo "<tr><td>".$form->textarea($model,'content');
echo $form->error($model,'content')."</td></tr>";


echo $form->hiddenField($model,'bid');
echo "<tr><td>".CHtml::submitButton('提交')."</td></tr>"; 
 $this->endWidget();

echo "</table></div><br/>";


?>

<script type="text/javascript">
	    var ue=UE.getEditor('News_content');
</script>
<script type="text/javascript">
	

	$(function(){
		/*传递版块id和文章在版块所在位置参数*/
		$(".createPosition").click(function(){
		   <?php $pram=$model->top.'_'.$model->left.'_'.$model->width.'_'.$model->height;?>;
			$url="<?php echo $this->createUrl('news/editPosition',array('draw'=>$pram,'id'=>$model->bid)) ?>";
			window.open($url);
		})

	})
</script>