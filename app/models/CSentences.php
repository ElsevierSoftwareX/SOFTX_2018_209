<?php

class CSentences extends ActiveRecord
{

	public function tableName()
	{
		return 'c_sentences';
	}

	public function rules()
	{
		return array(
			array('file_id, sentence, position', 'required'),
			array('file_id, position', 'numerical', 'integerOnly'=>true),
		);
	}

	public function relations()
	{
		return array(
			'file' => array(self::BELONGS_TO, 'File', 'file_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'file_id' => 'File',
			'sentence' => 'Sentence',
			'position' => 'Position',
		);
	}
	
	public function search($params){
	    
	    
	}

}
