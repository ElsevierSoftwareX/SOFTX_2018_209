<?php

class File extends ActiveRecord
{

	public function tableName()
	{
		return 'file';
	}

	public function rules()
	{
		return array(
			array('name, file_url, content, category, created_date', 'required'),
			array('c_word_ok, is_sentences_ok', 'numerical', 'integerOnly'=>true),
			array('name, file_url, category', 'length', 'max'=>256),
			array('is_checked', 'length', 'max'=>1),
		);
	}

	public function relations()
	{
		return array(
			'cSentences' => array(self::HAS_MANY, 'CSentences', 'file_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'file_url' => 'File Url',
			'content' => 'Content',
			'category' => 'Category',
			'created_date' => 'Created Date',
			'is_checked' => 'Is Checked',
			'c_word_ok' => 'C Word Ok',
			'is_sentences_ok' => 'Is Sentences Ok',
		);
	}

}
