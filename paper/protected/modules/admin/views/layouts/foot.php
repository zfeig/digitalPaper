<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>yii</title>
	
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseurl;?>/assets/admin/css/public.css" />
</head>
<body>
<div class="main">
<div id="header">
	<div id="logo">报刊后台管理系统</div>
</div>
<div class='top'>
	<ul>
		<li><a href="<?php echo $this->createUrl('default/index');?>">后台首页</a></li>
		<li><a href="<?php echo  $this->createUrl('paper/add');?>">添加报刊</a></li>
		<li><a href="<?php echo $this->createUrl('paper/index');?>">期刊列表</a></li>
		<li><a href="<?php echo  $this->createUrl('/index/index');?>">前台首页</a></li>
		<li>
		<a href="<?php echo  $this->createUrl('/index/logout');?>"><?php echo Yii::app()->user->name; ?>,退出</a>
		</li>
		<div style='clear:both'></div>
	</ul>
</div>
<div id="main"><?php echo $content;?></div>
	

<div id="footer">
	<p>数字报刊管理系统后台</p>
</div>
</div>
</body>
</html>