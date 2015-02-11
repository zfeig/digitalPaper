<?php

class PaperController extends Controller{
	
	public function actionNode($time,$id){
		/*获取版块名，建议缓存*/
		$title= Paper::model()->find('id=:id',array(':id'=>$id));

		if(!$title){
			throw new CHttpException(404,'报刊还未创建！'); 
		}

		$t=$title->pname;
		$time=date('Ymd',$title->time);

		/* 获取当前期刊下所有版块名，建议缓存*/
		$banmian=new Banmian;
		$sql="SELECT * FROM {{banmian}} WHERE pid=$id ORDER BY id ASC";
		$data=$banmian::model()->findAllBysql($sql);

		if(!$data){
			throw new CHttpException(404,'报刊还未创建！'); 
		}
		//print_r($data);

		/* 获取头版下面的文章列表 */
		$bid=$data[0]->id;
		$news=new News;
		$article=$news::model()->findAll('bid=:bid',array(':bid'=>$bid));
		
		$this->renderPartial('node',array('time'=>$time,'ban'=>$data,'news'=>$article,'title'=>$t));
	}

	public function actionBan($time,$id){
		
		/*读取版面信息*/
		$banmian=new Banmian;
		$sql="SELECT * FROM {{banmian}} WHERE id=$id ORDER BY id ASC LIMIT 1";
		$da=$banmian::model()->findBysql($sql);

		if(!$da){
			throw new CHttpException(404,'报刊还未创建！'); 
		}

		/*报刊名称-》考虑使用缓存处理*/
		$pid=$da->pid;
		$title= Paper::model()->find('id=:id',array(':id'=>$pid));
		$t=$title->pname;
		$time=date('Ymd',$title->time);

		/*读取期刊下对应全部版块名-》考虑使用缓存处理*/
		$data=$banmian::model()->findAll('pid=:pid',array(':pid'=>$pid));
		//print_r($data);
		
		/*读取版面文章列表*/
		$news=new News;
		$article=$news::model()->findAll('bid=:bid',array(':bid'=>$id));

		/*版块导航 获取上一版块，下一版块*/
		$sqlprev="SELECT id,btitle FROM {{banmian}} WHERE pid=$pid AND id<$id ORDER BY id DESC";
		
		$sqlnext="SELECT id,btitle FROM {{banmian}} WHERE pid=$pid AND id>$id";
		
		$prev=$banmian::model()->findBysql($sqlprev);
		$next=$banmian::model()->findBysql($sqlnext);
		

		$this->renderPartial('ban',array('time'=>$time,'cur'=>$da,'ban'=>$data,'news'=>$article,'title'=>$t,'prev'=>$prev,'next'=>$next));
	}

	public function actionNew($id){

		$news= new News;
		$data=$news::model()->find('id=:id',array(':id'=>$id));
		$this->renderPartial('new',array('data'=>$data));
	}

	public function actionDetail($time,$id,$bid){
		
		/*获取版块背景*/
		$banmian= new Banmian;
		$bm=$banmian::model()->find(array(
		  'select'=>array('pid','bg','btitle'),
		  'condition' => 'id=:bid',
		  'params' => array(':bid' =>$bid),
         ));

         if(!$bm){
         	throw new CHttpException(404,'Not found');  
         }

         $cur=$bm;
         

         /*获取当前版面期刊id,标题*/
         $pid=$bm->pid;
         $title= Paper::model()->find('id=:id',array(':id'=>$pid));
		 $t=$title->pname;
         $time=date('Ymd',$title->time);

         /*获取所在版块全部新闻列表*/
		$news= new News;
		$article=$news::model()->findAll('bid=:bid',array(':bid'=>$bid));


		

		/*获取当前新闻id在数组中的key*/
		foreach ($article as $k => $v) {
			if($v->id==$id){
			$key=$k;break;
			}
		}

		if(!isset($key)){
			throw new CHttpException(404,'Not found');  
		}

		/*获取当前新闻信息*/
		$detail=$article[$key];

		/*获取导航信息，上一版，下一版*/
		$sqlprev="SELECT id,btitle FROM {{banmian}} WHERE pid=$pid AND id<$bid ORDER BY id DESC";
		$sqlnext="SELECT id,btitle FROM {{banmian}} WHERE pid=$pid AND id>$bid";
		
		$prev=$banmian::model()->findBysql($sqlprev);
		$next=$banmian::model()->findBysql($sqlnext);

		//print_r($article);
		$this->renderPartial('detail',array('time'=>$time,'bid'=>$bid,'detail'=>$detail,'cur'=>$cur,'news'=>$article,'title'=>$t,'prev'=>$prev,'next'=>$next));
	}


	protected function sum($a,$b){
		$num1=Intval($a);
		$num2=Intval($b);
		return $num1+$num2;
	}


}

?>