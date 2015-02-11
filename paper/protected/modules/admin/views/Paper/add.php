<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>后台管理</title>
</head>
<body>
	<?php echo '添加报刊'; ?>

	<?php

echo "<div class='paperForm'>";
 $form=$this->beginWidget('CActiveForm', array(
'id'=>'paper',
'enableAjaxValidation'=>false,
));
echo $form->LabelEx($model,'pname');
echo $form->textField($model,'pname')."<br/>";
echo $form->error($model,'pname');

echo $form->LabelEx($model,'brief');
echo $form->textField($model,'brief')."<br/>";
echo $form->error($model,'brief');

echo CHtml::submitButton('提交'); 
 $this->endWidget();

 echo "</div><br/>";


?>
</body>
</html>