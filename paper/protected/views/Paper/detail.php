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
		
		$(this).addClass("active").siblings(".items").removeClass("active");
		var prefix="<?php echo 'http://'.$_SERVER['HTTP_HOST']; ?>";
		var loadUrl = prefix+$(this).attr("loadUrl");
		//alert(loadUrl);
		window.location.href=loadUrl;
	  })
 })
 </script>
</head>
<style>
   ul,li{list-style: none;}
	.main{
	background: transparent url(<?php echo "http://".$_SERVER['HTTP_HOST'].Yii::app()->request->baseUrl."/".$cur->bg;?>) no-repeat scroll 0% 0%;
	position: relative; 
	width: 409px; 
	height: 597px;
	float:left;}
	.newscontent p{color: #404040}
	.newscontent p img{width: 100%;}
	#info-date-weather{position: relative;height: auto;}
	#info-date-weather .date{display: block;float: left;margin-right: 0px;width: 168px;overflow: hidden;}
	#info-date-weather .weather{color:#fff;display:block;width: 150px;position: absolute;top:-15px;left: 240px;height: auto}
	
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

		<div class="items  <?php if($v->id ==$_GET['id']){ echo 'active';}?>" style="left:<?php echo $v->left;?>; top:<?php echo $v->top ?>; width:<?php echo $v->width ?>; height: <?php  echo $v->height;?>;" loadUrl="<?php echo $this->createUrl('paper/detail',array('bid'=>$v->bid,'id'=>$v->id,'time'=>$time));?>"></div>

		<?php }?>
		<div class="tool">
			<div class="tleft"><a href="<?php echo $this->createUrl('paper/ban',array('id'=>$bid,'time'=>$time)) ?>"><?php echo $cur->btitle;?></a></div>
			<div class="tright">
			<?php if($prev){?>
		<a href="<?php echo $this->createUrl('paper/ban',array('id'=>$prev->id,'time'=>$time));?>">上一版</a>
		<?php }?>
		<?php if($next){?>
		<a href="<?php echo $this->createUrl('paper/ban',array('id'=>$next->id,'time'=>$time));?>">下一版</a>
		<?php }?>
			</div>
			<div style='claer:both'></div>
		</div>

	</div>
	<!--导航区-->
    <div class="middle">
        <div class="nav"><a href="<?php echo $this->createUrl('index/index')?>">首页</a></div>
		<div class="nav"><a href="<?php echo $this->createUrl('paper/ban',array('id'=>$bid,'time'=>$time))?>">返回版面</a></div>
		<?php if($prev){?>
		<div class="nav"><a href="<?php echo $this->createUrl('paper/ban',array('id'=>$prev->id,'time'=>$time));?>">上一版面</a></div>
		<?php }?>
		<?php if($next){?>
		<div class="nav"><a href="<?php echo $this->createUrl('paper/ban',array('id'=>$next->id,'time'=>$time));?>">下一版面</a></div>
		<?php }?>
	</div>
	<!-- 详细内容区域 -->
	<div class="mainDetais">
			<div class="head">
			<h1><?php echo $title?></h1>
			<div id='info-date-weather'>
			<div class="date"><p><?php $week=array("日","一","二","三","四","五","六");echo date('Y年m月d日',time()).'&nbsp星期'.$week[date('w')]; ?></p></div>
			<div class='weather'><iframe name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=48" width="340" height="45" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe></div>
			<div style='clear:both'></div>
			</div>
		   </div>
		<div class="loading"></div>
		<div class="news">

			<div class="center">

	           <div class="title"><?php echo  $detail->title;?></div>
            </div>
			<div class="authors center">本报讯</div>
			<div class="newscontent">
				<p><?php echo $detail->content;?></p>
				
			</div>
		</div>
	</div>

	<div class="foot">
		<p>深圳报业集团版权所有，未经书面授权禁止使用 Copyright©2006 by www.sznews.com. all rights reserved.
浏览本网主页，建议将电脑显示屏的分辨率调为1024×768 </p>
	</div>
</div>
</body>

</html>

