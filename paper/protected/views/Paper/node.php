<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>心创联盟大四川报</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/index/css/my.css" rel="stylesheet" />
 <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/index/js/jquery.js" type="text/javascript" ></script>
 <script type="text/javascript">
 $(function(){
	$("div.main .items").hover(function(){
		$(this).addClass("hover");
		$(this).prev().show();
	},function(){
		$(this).removeClass("hover");
		$(this).prev().hide();
	}).click(function(){
		$(".loading").show();
		$(".news").hide();
		$(this).addClass("active").siblings(".items").removeClass("active");
		var loadUrl = $(this).attr("loadUrl");
		$(".mainDetais .news").load(loadUrl,function(){
			$(".loading").hide();
			$(".news").show();
		});
	});


	$(".bleft li:even").addClass('light');
	$(".bleft li:odd").addClass('dark');

	$(".bright li:even").addClass('light');
	$(".bright li:odd").addClass('dark');
 })
 </script>
</head>
<style>
   ul,li{list-style: none;}
	.main{
	background: transparent url(<?php echo "http://".$_SERVER['HTTP_HOST'].Yii::app()->request->baseUrl."/".$ban[0]->bg;?>) no-repeat scroll 0% 0%;
	position: relative; 
	width: 409px; 
	height: 597px;
	float:left;}
	.newscontent p{color: #404040}
	#info-date-weather{position: relative;height: auto;}
	#info-date-weather .date{display: block;float: left;margin-right: 0px;width: 168px;overflow: hidden;}
	#info-date-weather .weather{color:#fff;display:block;width: 150px;position: absolute;top:-15px;left: 240px;height: auto}
    .mleft .wtname a{color: #ffffff}
	
}
</style>
<body>
<div class="content">
	<!--<h1><?php echo $title?></h1>-->
	<div class="main">
		<!--新闻阴影背景-->
		<div class="wrap"></div>
		<?php foreach ($news as $k => $v) {?>
			
		
		<div class="hideDiv" style="left:<?php echo $v->left;?>;top:<?php echo $this->sum($v->top,$v->height);?>px;width:210px;">
			<div class="tips"><img src="http://<?php echo $_SERVER['HTTP_HOST'].Yii::app()->request->baseUrl; ?>/assets/index/images/tip.gif"/></div>
			<div class="tipsText">
				<span class="textBold"><?php echo $v->title;?></span>
			</div>
		</div> 

		<div class="items" style="left:<?php echo $v->left;?>; top:<?php echo $v->top ?>; width:<?php echo $v->width ?>; height: <?php  echo $v->height;?>;" loadUrl="<?php echo $this->createUrl('paper/new',array('id'=>$v->id));?>"></div>

		<?php }?>
		

	</div>
	<!--导航区-->
    <div class="middle">
    	 <div class="nav"><a href="<?php echo $this->createUrl('index/index')?>">首页</a></div>
		<div class="nav"><a href="javascript:window.location.reload()">返回版面</a></div>
	</div>
	<!-- 详细内容区域 -->
	<div class="mainDetais">
		<div class="head">
			<h1><?php echo $title?></h1>
			<div id='info-date-weather'>
			<div class="date"><p><?php $week=array("日","一","二","三","四","五","六");echo date('Y年m月d日',time()).'&nbsp星期'.$week[date('w')]; ?></p></div>
			<div class='weather'>
			<iframe name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=48" width="340" height="45" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe></div>
			<div style='clear:both'></div>
			</div>
		</div>
		<div class="loading"></div>
		<div class="news">
		<div class="seprator"></div>
			<div class="bleft">
			<p class='header'>文章导航</p>
			<ul>
			<?foreach ($news as $k => $v) {?>
				<li><a href="<?php echo $this->createUrl('paper/detail',array('bid'=>$v->bid,'id'=>$v->id,'time'=>$time))?>"><?php echo $v->title ?></a></li>
				<?php }?>
			</ul>
				
			</div>
			<div class="bright">
			<p class='header'>版面导航</p>
			<ul>
			<?foreach ($ban as $k => $v) {?>
				<li><a href="<?php echo $this->createUrl('paper/ban',array('id'=>$v->id,'time'=>$time)) ?>"><?php echo $v->btitle ?></a></li>
				<?php }?>
			</ul>
			</div>
			<div style='clear:both'></div>
		</div>
	</div>

	<div class="foot">
		<p>深圳报业集团版权所有，未经书面授权禁止使用 Copyright©2006 by www.sznews.com. all rights reserved.
浏览本网主页，建议将电脑显示屏的分辨率调为1024×768 </p>
	</div>
</div>
</body>

</html>

