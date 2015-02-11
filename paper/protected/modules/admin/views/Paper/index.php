<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>后台管理</title>
</head>
<style>
	ul,li{padding: 0;margin: 0;list-style:none}
	.content{padding: 10px;}
	.content li{line-height: 30px;}
	.content li a{text-decoration: none;color: #48A5C6}
	.content li a:hover{color: #2189AD}
	.add{margin:5px 2px;color:#fff;font-family:'微软雅黑';padding:  8px 10px;text-decoration: none;text-align: center;border: 1px solid #5CB85C;background: #5CB85C;border-radius: 4px;}
	.add:hover{background: #449D44;color:#fff;}
	.pp{line-height: 30px;margin-top: 30px;}
</style>
<body>
	<?php echo '报刊创建'; ?>
	<div class="content">
		<ul>
		<?php foreach ($model as $k => $v) {?>
			<li><a href="<?php echo  $this->createUrl('banmian/index',array('id'=>$v->id))?>"><?php echo  $v->pname; ?></a></li>
		<?php };?>
		</ul>
		<p class='pp'><a class='add' href="<?php echo $this->createUrl('paper/add'); ?>">创建报刊</a></p>
	</div>
</body>
</html>