<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>画线框</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Author" content="Sheneyan" />
<script type="text/javascript">
var ns4 = document.layers;
var ns6 = document.getElementById && !document.all;
var ie4 = document.all;
var resizing=false;//是否正在画框
var curPositionX;//当前位置x坐标
var curPositionY;//当前位置y坐标
var startPointX;//起点x坐标
var startPointY;//起点y坐标
var endPointX;//终点x坐标
var endPointY;//终点y坐标
var border=null;//框，就是div
//获取鼠标位置
function moveToMouseLoc(e){
  if(ns4||ns6){
    curPositionX=e.pageX
    curPositionY=e.pageY;
  }
  else{
    curPositionX=event.x + document.body.scrollLeft;
    curPositionY=event.y + document.documentElement.scrollTop;
  }
  return true;
}
function init(){
    if(ns4) document.captureEvents(Event.MOUSEMOVE);
    document.onmousemove=onResize;
    document.onmouseup=onMouseUp;
    document.onmousedown=onMouseDown;
    border=document.createElement("div");
    border.className="sizable_Sheneyan";
    border.id="sizable_Sheneyan";
    document.body.appendChild(border);

}
function onMouseUp(e){
    if (resizing){
        drawBorder();
        resizing=false;
    }

    var main = document.getElementById("main");
    var mainTop = main.offsetTop+document.body.scrollTop;//大框top值
    var mainLeft = main.offsetLeft+document.body.scrollLeft;//大框left值

    var left = parseInt(border.style.left);//矩形实际top值
    var top = parseInt(border.style.top);//矩形实际left值

    //判断最终top，left值
    var finalLeft=left-mainLeft>=0?(left-mainLeft):(left);
    var finalTop=top-mainTop>=0?(top-mainTop):(top);
   
   if(left-mainLeft>=0 && top-mainTop>=0){
    alert("宽度："+border.style.width+" 高度："+border.style.height+" left："+finalLeft+" top:"+finalTop);
        window.opener.document.getElementById("News_top").value=finalTop+"px";
        window.opener.document.getElementById("News_left").value=finalLeft+"px";
        window.opener.document.getElementById("News_width").value=border.style.width;
        window.opener.document.getElementById("News_height").value=border.style.height;
   }

    
}
function onResize(e){
    moveToMouseLoc(e);
    if (resizing==false)
        return true;
    drawBorder();
}

function onMouseDown(e){
    if (resizing==true)
        return true;
    resizing=true;
    startPointX=curPositionX;
    startPointY=curPositionY;
    drawBorder();
}
function drawBorder(){
    var main = document.getElementById("main");
    var mainTop = main.offsetTop+document.body.scrollTop;
    var mainLeft = main.offsetLeft+document.body.scrollLeft;

    endPointX=curPositionX;
    endPointY=curPositionY;

    tp=Math.min(startPointY,endPointY);
    lf=Math.min(startPointX,endPointX);


    if(tp>= mainTop && lf>=mainLeft){

        with(border.style){
            width=Math.abs(startPointX-endPointX)+"px";
            height=Math.abs(startPointY-endPointY)+"px";
            left=Math.min(startPointX,endPointX)+"px";
            top=Math.min(startPointY,endPointY)+"px";
        }

    }


}
</script>
<style type="text/css">
.sizable_Sheneyan{overflow:hidden;position:absolute;border:solid 1px #111;}

#main{width: 900px;height: 800px;margin: 20px auto;border: 1px solid #555;}
<?php echo "#main{background: url(/".$model->bg.") no-repeat 0 0;}"?>
</style>
</head>
<script>
    function draw(){
        
     <?php 
            if(isset($_GET['draw'])){
                
                $pos=explode('_', $_GET['draw']);
                echo "var main=document.getElementById('main');";
                echo "var mainTop = main.offsetTop+document.body.scrollTop;";
                echo "var mainLeft = main.offsetLeft+document.body.scrollLeft;";
                

                echo " var border=document.getElementById('sizable_Sheneyan');";

                //echo "var top=parseInt($pos[0])+parseInt(mainTop);";
                //echo "var left='".intval($pos[1])."';";

                echo "var top=".intval($pos[0]).";";
                echo "var tops=parseInt(mainTop);";
                echo "top+=tops;";

                echo "var left=".intval($pos[1]).";";
                echo "var lefts=parseInt(mainLeft);";
                echo "left+=lefts;";

               

                echo "border.style.top=top+'px';";
                echo "border.style.left=left+'px';";
                echo "border.style.width='".$pos[2]."';";
                echo "border.style.height='".$pos[3]."';";
                echo "border.style.borderColor='red';";
            }
         ?>
    }
</script>
<body onload="init();draw()">

<div id="main"></div>

</body>
</html>