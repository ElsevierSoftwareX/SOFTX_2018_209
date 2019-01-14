<?php

class Exceptions extends ActiveRecord
{

	public function tableName()
	{
		return 'exceptions';
	}

	public function rules()
	{
		return array(
			array('word, phrase', 'safe'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'word' => 'Word',
			'phrase' => 'Phrase',
		);
	}

}
