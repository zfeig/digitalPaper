<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>版面管理</title>
</head>
<style>
	ul,li{padding: 0;margin: 0;list-style:none}
	.content{padding: 10px;}
	.content li{line-height: 30px;}
	.content li a{text-decoration: none;color: #48A5C6}
	.content li a:hover{color: #2189AD}
	.content h1 span{margin-right: 5px;color: #ED3B36;font-family: '微软雅黑'}
	p{line-height: 30px;margin-top:20px; }
	.create{color:#fff;font-family:'微软雅黑';padding:  10px 15px;text-decoration: none;text-align: center;border: 1px solid #3E95E3;background: #3E95E3;border-radius: 4px;}
	.create:hover{background: #3071A9;color:#fff;}
	.add{margin:5px 2px;color:#fff;font-family:'微软雅黑';padding:  8px 10px;text-decoration: none;text-align: center;border: 1px solid #5CB85C;background: #5CB85C;border-radius: 4px;}
	.add:hover{background: #449D44;color:#fff;}
	table{margin-top: 30px;width: 100%;font-size: 13px;}
	table tr td{border-bottom: 1px solid #ccc;padding: 5px 3px;}
</style>
<body>
<div class="content">
	<h1><span><?php if($week){echo "<a href='".$this->createUrl('banmian/index',array('id'=>$week->pid))."'>".$week->btitle."</a>";}?></span>版面管理</h1>
	<?php if($model!=null){?>
	<table>
		<tr>
			<td>文章名</td>
			<td>left</td>
			<td>top</td>
			<td>width</td>
			<td>height</td>
			<td>编辑</td>
		</tr>
		<?php foreach ($model as $k => $v) {?>
		<tr>
		<td><?php echo  $v->title; ?></td>
		<td><?php echo $v->left;?></td>
		<td><?php echo $v->top; ?></td>
		<td><?php echo $v->width; ?></td>
		<td><?php echo $v->height; ?></td>
		<td><a href="<?php echo $this->createUrl('news/edit',array('id'=>$v->id))?>">修改</a></td>
		</tr>
		<?php };?>
	</table>
	<?php }?>
		
</div>
	

</body>
</html>