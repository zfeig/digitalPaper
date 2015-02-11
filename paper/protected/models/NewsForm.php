<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class NewsForm extends CFormModel
{
	public $bid;
	public $title;
	public $subtitle;
	public $content;
	public $left;
	public $top;
	public $width;
	public $height;
	

	public function rules()
	{
		return array(
			
			array('title', 'required','message'=>'新闻名称不能为空！'),
			array('content', 'required','message'=>'新闻内容不能为空！'),
			array('left', 'required','message'=>'left值不能为空！'),
			array('top', 'required','message'=>'top值不能为空！'),
			array('width', 'required','message'=>'width值不能为空！'),
			array('height', 'required','message'=>'height值不能为空！'),
	
		);
	}

	
	 
	public function attributeLabels()
	{
		return array(
			'title'=>'新闻标题',
			'content'=>'新闻内容',
			'subtitle'=>'子标题',
			'left'=>'left值',
			'top'=>'top值',
			'width'=>'width值',
			'height'=>'height值',
		);
	}
	
}