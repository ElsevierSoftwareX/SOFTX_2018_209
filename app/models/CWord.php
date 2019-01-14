<?php

class CWord extends ActiveRecord
{

	public function tableName()
	{
		return 'c_word';
	}

	public function rules()
	{
		return array(
			array('word, count, tagset', 'required'),
			array('count', 'numerical', 'integerOnly'=>true),
			array('tagset', 'length', 'max'=>50),
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
			'count' => 'Count',
			'tagset' => 'Tagset',
		);
	}

}
