<?php
class IndexController extends Controller{
	public function actionIndex(){

		$paper = new Paper;
		$time=time();
		$sql="SELECT * FROM {{paper}} WHERE time<$time ORDER BY time DESC";
		$data = $paper::model()->findAllBysql($sql);
		$da = $paper::model()->findBysql($sql);
		
		$id=$da->id;
		$time=date('Ymd',$da->time);
		$this->redirect($this->createUrl('paper/node',array('id'=>$id,'time'=>$time)));
		
		$this->renderPartial('index',array('model'=>$data));
	}	


	public function actionLogin()
	{
		if (!defined('CRYPT_BLOWFISH')||!CRYPT_BLOWFISH)
			throw new CHttpException(500,"This application requires that PHP was compiled with Blowfish support for crypt().");

		$model=new LoginForm;

		// if it is ajax validation request
		//这里是异步验证，也可以封装成一个验证函数，login-form指表单id:
		   //$this->beginWidget('CActiveForm', array(
	      //'id'=>'login-form',
	     //'enableAjaxValidation'=>true,
        //));
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);//调用父类验证器
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
			//验证通过，跳转到指定页面
				//$this->redirect(Yii::app()->user->returnUrl);
				$this->redirect(array("admin/default/index"));
		}
		// display the login form
		
		$this->render('login',array('model'=>$model));
	}

	function actionLogout(){  
        //删除session变量  
        Yii::app()->session->clear();  
          
        //删除服务器session信息  
        Yii::app()->session->destroy();  
          
        //页面重定向到登录页面  
       $this->redirect(array("index/login"));
    }  

    function actionAbout(){

    	$this->render('about');
    }




}
?>