<?php

class PaperController extends Controller
{	
	
	 public function filters() 
    { 
        return array( 
            'accessControl', // 实现CRUD操作的访问控制。 
        ); 
    } 

    protected function getUser(){
	    $tmp=Yii::app()->user->getName();
	    if($tmp=='Guest'){
	    	$tmp='admin';
	    }
		return array($tmp);
	}
	

	 public function accessRules()  //这里就是访问规则的设置。 
    {   
        $users=$this->getUser();
        return array( 
          	
            array('allow',                      // 只允许经过验证的用户执行create, update动作。 
                'actions'=>array('index','add','editor'), 
                'users'=>$users,       // @号指所有登录的用户，guest除外 
            ), 
            array('deny',  // 拒绝所有的访问。 
                'users'=>array('*'), 
            ), 

            
        ); 
    } 


	public function actionIndex()
	{	
		$paper = new Paper;
		$criteria = new CDbCriteria();
		$criteria->order = 'id DESC'; 
		$data = $paper::model()->findAll($criteria);
		$this->render('index',array('model'=>$data));
	}

	public function actionAdd(){
		 $model=new PaperForm;
	     if(isset($_POST['PaperForm'])){
	    	$model->attributes=$_POST['PaperForm'];
	    	$model->time=intval(time());
	    	if($model->validate()){
	    	   
	    	  $paper=new Paper;
	    	  foreach ($model as $k => $v) {
	    	  	$paper->$k=$v;
	    	  }
	    	 	    	 
	    		  if($paper->save()) {
	    		  	$this->redirect(array('paper/index'));
	    		  } 
               

	    		
	    	}
	    }

		$this->render('add',array('title'=>'添加报刊','model'=>$model));
	}

	public function actionEditor(){
		$this->render('editor');
	}


}