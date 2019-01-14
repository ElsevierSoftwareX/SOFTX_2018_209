<?php

class WordClass extends ActiveRecord
{

	public function tableName()
	{
		return 'word_class';
	}

	public function rules()
	{
		return array(
			array('word, class', 'required'),
			array('word, class', 'length', 'max'=>256),
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
			'class' => 'Class',
		);
	}

}
