<?php

class UpdateWord extends ActiveRecord
{

	public function tableName()
	{
		return 'update_word';
	}

	public function rules()
	{
		return array(
			array('old_word, tagset_old, new_word, tagset_new, created_date', 'required'),
			array('tagset_old, tagset_new', 'length', 'max'=>50),
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
			'old_word' => 'Old Word',
			'tagset_old' => 'Tagset Old',
			'new_word' => 'New Word',
			'tagset_new' => 'Tagset New',
			'created_date' => 'Created Date',
		);
	}
	
	public function getTagset($params){
	    vdump($params);
	    return '';
	}

}
