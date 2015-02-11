<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class PaperForm extends CFormModel
{
	public $pname;
	public $brief;
	public $time;
	

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			
			array('pname, brief', 'required','message'=>'该字段不能为空！'),
			
			array('pname', 'length','max'=>40,'message'=>'标题长度不得长于40'),
			

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
			'pname'=>'标题',
			'brief'=>'描述',
		);
	}
	
}