<h1>自定义小挂件的使用</h1>
<?php $this->widget('application.widgets.DbWidget',array('num'=>5));?>

<script>
	window.onload = function() {
    if(document.hasOwnProperty("ontouchstart")) {
     	alert(1);
    }else{
       alert(2);
    }
};
</script>
