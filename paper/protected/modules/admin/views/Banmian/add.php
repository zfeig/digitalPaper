<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>后台管理</title>
</head>
<body>
	<?php echo '添加版面'; ?>

	<?php

echo "<div class='banmianForm'>";
 $form=$this->beginWidget('CActiveForm', array(
 'htmlOptions'=>array('enctype'=>'multipart/form-data'),
'id'=>'banmian',
'enableAjaxValidation'=>false,
));
echo $form->LabelEx($model,'btitle');
echo $form->textField($model,'btitle')."<br/>";
echo $form->error($model,'btitle');

echo $form->LabelEx($model,'bg');
echo $form->fileField($model,'bg')."<br/>";
echo $form->error($model,'bg');

echo $form->LabelEx($model,'pdf');
echo $form->fileField($model,'pdf')."<br/>";
echo $form->error($model,'pdf');


echo $form->hiddenField($model,'pid');
echo CHtml::submitButton('提交'); 
 $this->endWidget();

 echo "</div><br/>";


?>
</body>
</html>