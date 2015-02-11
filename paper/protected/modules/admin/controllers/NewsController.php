<?php
class NewsController extends Controller{
    
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
                'actions'=>array('index','add','editPosition','position','edit'), 
                'users'=>$users,       // @号指所有登录的用户，guest除外 
            ), 
            array('deny',  // 拒绝所有的访问。 
                'users'=>array('*'), 
            ), 

            
        ); 
    } 

	
	public function actionIndex($id){
		$news = new News;
		$sql="SELECT * FROM {{news}} WHERE bid = $id";

		$banmian = new Banmian;
		$week=$banmian::model()->find("id=:id",array(':id'=>$id)); 

		$data=$news::model()->findAllBysql($sql);
		$this->render('index',array('model'=>$data,'week'=>$week));
	}

	public function actionPosition($id){
		$banmian = new Banmian;
		$sql="SELECT * FROM {{banmian}} WHERE id=$id";
		$data = $banmian::model()->findBysql($sql);
		//print_r($data);
		$this->renderPartial('position',array('model'=>$data));
	}

	public function actionEditPosition($id){
		$banmian = new Banmian;
		$sql="SELECT * FROM {{banmian}} WHERE id=$id";
		$data = $banmian::model()->findBysql($sql);
		//print_r($data);
		$this->renderPartial('editPosition',array('model'=>$data));
	}

	public function actionAdd($id){
		$model=new NewsForm;
		$model->bid=$id;
	    if(isset($_POST['NewsForm'])){	 

		    	$model->attributes=$_POST['NewsForm'];   	
	    	
		    	if($model->validate()){
			    	  $news=new News;
			    	  foreach ($model as $k => $v) {
			    	  	$news->$k=$v;
			    	  }  
		    	  }

	    	   
	    		  if($news->save()) {
	    		  	$this->redirect($this->createUrl('news/index',array('id'=>$id)));
	    		  }
	    	
	    }

		$this->render('add',array('title'=>'添加文章','model'=>$model,'id'=>$id));
	}

	public function actionEdit($id){

		$news= new News;
		$model= $news::model()->find('id=:id',array(':id'=>$id));

		 if(isset($_POST['News'])){	 

		    	$model->attributes=$_POST['News'];   	
	    	
		    	foreach($_POST['News'] as $k => $v) {
		    		$model->$k=$v; 	  
	            }

	             if($model->save()) {
	    		  	$this->redirect($this->createUrl('news/index',array('id'=>$model->bid)));
	    		  }
	 }
	 $this->render('edit',array('model'=>$model));
    }

}
?>