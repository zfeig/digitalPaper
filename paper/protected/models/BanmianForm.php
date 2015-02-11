<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class BanmianForm extends CFormModel
{
	public $pid;
	public $btitle;
	public $pdf;
	public $bg;
	public $bgthumb;
	

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			
			array('btitle', 'required','message'=>'该字段不能为空！'),
			array('bg', 'file','types'=>'jpg,gif,png,jpeg','message'=>'没有上传或者类型不符'),
			array('pdf', 'file','types'=>'pdf','message'=>'没有上传或者类型不符'),
			array('pid','numerical','integerOnly'=>true),
			//array('pdf,bgthumb', 'safe'),
			
		);
	}

	/*
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	 
	public function attributeLabels()
	{
		return array(
			'btitle'=>'版面标题',
			'bg'=>'版面地图',
			'pdf'=>'版面pdf文件',
		);
	}
	
}