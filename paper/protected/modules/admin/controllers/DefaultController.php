<?php

class DefaultController extends Controller
{	

	 public function filters() 
    { 
        return array( 
            'accessControl', // 实现CRUD操作的访问控制。 
        ); 
    } 


	 public function accessRules()  //这里就是访问规则的设置。 
    {   
        $users=$this->getUser();
        return array( 
          	
            array('allow',                      // 只允许经过验证的用户执行create, update动作。 
                'actions'=>array('index','getUser'), 
                'users'=>$users,       // @号指所有登录的用户，guest除外 
            ), 
            array('deny',  // 拒绝所有的访问。 
                'users'=>array('*'), 
            ), 

            
        ); 
    } 


	public function actionIndex()
	{   
		
		$this->render('index');
	}

	protected function getUser(){
	    $tmp=Yii::app()->user->getName();
	    if($tmp=='Guest'){
	    	$tmp='admin';
	    }
		return array($tmp);
	}
}