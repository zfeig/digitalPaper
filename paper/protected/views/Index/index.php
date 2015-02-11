<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
</head>
<style>
	ul,li{padding: 0;margin: 0;list-style: none;}
	.content{width: 900px;margin: 30px auto;border: 1px dotted #666;padding: 40px;}
	h2{font-family: '微软雅黑';color:#ED3B36;}
	ul li{line-height: 35px;width: 100%;}
	ul li a{display: block;width: 100%;color: #1A93C6}
	ul li a:hover{color: #126486}
	ul li a span{display: block;float: left;}
	ul li a em{display: block;float: right;font-style: normal;}
	ul li a u{display: block;clear: both;}
</style>
<body>
<div class="content">
	<h2>请选择期刊</h2>
	<ul>
	<?php foreach ($model as $k => $v) { ?>
		<li><a href="<?php echo $this->createUrl('paper/node',array('id'=>$v->id,'time'=>date('Ymd',$v->time)));?>"><span><?php echo $v->pname ?></span><em><?php echo date("Y-m-d",$v->time); ?></em><u></u></a></li>
	<?php }?>
	</ul>
	<div class="sh">
		<input type="text" /><input type="button" value='搜索' />
	</div>
</div>
	
</body>
</html>