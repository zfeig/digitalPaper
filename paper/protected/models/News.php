<?php

class News extends CActiveRecord{

	public static function model($className=__CLASS__){
		return  parent::model($className);
	}


	public function tableName(){
		return '{{news}}';
	}

	public function attributeLabels()
	{
		return array(
			'title'=>'新闻标题:',
			'content'=>'新闻内容:',
			'subtitle'=>'子标题:',
			'left'=>'left值:',
			'top'=>'top值:',
			'width'=>'width值:',
			'height'=>'height值:',
		);
	}
	
}




?>