<?php
class BanmianController extends Controller{
	
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
                'actions'=>array('index','add','edit'), 
                'users'=>$users,       // @号指所有登录的用户，guest除外 
            ), 
            array('deny',  // 拒绝所有的访问。 
                'users'=>array('*'), 
            ), 
            
        ); 
    } 


	public function actionIndex($id){
		$banmian = new Banmian;
		$paper = new Paper;
		$week = $paper::model()->find("id=:id",array(':id'=>$id));
		$sql="SELECT * FROM {{banmian}} WHERE pid = $id ORDER BY id";
		$data = $banmian::model()->findAllBysql($sql);
		$this->render('index',array('model'=>$data,'week'=>$week,'id'=>$id));
	}	

	public function actionAdd($id){
		$model=new BanmianForm;
		$model->pid=$id;
	    if(isset($_POST['BanmianForm'])){	 

	    	//上传背景图
		    	$model->bg = CUploadedFile::getInstance($model, 'bg');
		    	if($model->bg){
					$imgName = time() . '.' . $model->bg->extensionName;
					$model->bg->saveAs('uploads/' . $imgName);
					$model->bg = 'uploads/'.$imgName;
					
				}	

				//上传pdf
				$model->pdf = CUploadedFile::getInstance($model, 'pdf');
		    	if($model->pdf){
					$imgName = time() . '.' . $model->pdf->extensionName;
					$model->pdf->saveAs('uploads/pdf/' . $imgName);
					$model->pdf = 'uploads/pdf/'.$imgName;
				}	


		    	$model->attributes=$_POST['BanmianForm'];   	
	    	
		    	if($model->validate()){
			    	  $banmian=new Banmian;
			    	  foreach ($model as $k => $v) {
			    	  	$banmian->$k=$v;
			    	  }  
		    	  }

	    	   
	    		  if($banmian->save()) {
	    		    //$n= $banmian->attributes['id'];//获取插入新纪录
	    		   
	    		  	$this->redirect($this->createUrl('banmian/index',array('id'=>$id)));

	    		  }
	    	
	    }

		$this->render('add',array('title'=>'添加报刊','model'=>$model,'id'=>$id));
	}



}
?>