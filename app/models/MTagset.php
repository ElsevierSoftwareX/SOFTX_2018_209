<?php

class MTagset extends ActiveRecord
{

	public function tableName()
	{
		return 'm_tagset';
	}

	public function rules()
	{
		return array(
			array('code, description', 'required'),
			array('code', 'length', 'max'=>10),
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
			'code' => 'Code',
			'description' => 'Description',
		);
	}
    
    public function getTagSuggestion($search)
	{
	    $tag = [];
	    $tg = MTagset::model()->findAll(
	        ['condition' => 'description LIKE :tag', 'params' => array(':tag' => '%' . $search . '%')],
	        ['limit' => 10]
        );
	    foreach($tg as $k => $v) {
	        $tag['|'.$v['code'].'|'] = $v['description'];
	    }
	    return $tag;
	}
	
	public function getTagMapper($values = [])
	{   
	    $list = [];
	    foreach($values as $k => $v) {
	        $target = str_replace('|', '', $v);
	        $tag = MTagset::model()->findByAttributes(['code' => $target]);
	        $list[$v] = isset($tag['description']) ? $tag['description'] : $v;
	    }
	    return $list;
	}
}
