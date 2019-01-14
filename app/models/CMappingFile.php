<?php

class CMappingFile extends ActiveRecord
{

	public function tableName()
	{
		return 'c_mapping_file';
	}

	public function rules()
	{
		return array(
			array('file_id', 'required'),
			array('file_id, count, position', 'numerical', 'integerOnly'=>true),
			array('tagset', 'length', 'max'=>50),
			array('word, phrase, is_ignored', 'safe'),
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
			'file_id' => 'File',
			'word' => 'Word',
			'phrase' => 'Phrase',
			'count' => 'Count',
			'is_ignored' => 'Is Ignored',
			'tagset' => 'Tagset',
			'position' => 'Position',
		);
	}
	
	public function getWords(){
	    $sql = "SELECT a.id, a.word, a.tagset, STRING_AGG(DISTINCT m.description, '- ') AS tagset_desc, a.position, a.isword
                FROM (
                  SELECT cm.id, cm.tagset, COALESCE(word, phrase) word, UNNEST(STRING_TO_ARRAY(cm.tagset, ',')) AS tagsetx, (CASE WHEN word IS NULL THEN 'N' ELSE 'Y' END) isword, position
                  FROM c_mapping_file cm
                  WHERE cm.file_id = 70) a
                LEFT JOIN m_tagset m ON a.tagsetx = '|'||m.code||'|'
                GROUP BY a.id, a.word, a.tagset, a.position, a.isword
                ORDER BY a.position ASC";
        $result = Yii::app()->db->createCommand($sql)->queryAll();
        return $result;
	}
	
	public function getWordsCount(){
	    $sql = "SELECT COUNT(1) FROM (SELECT a.id, a.word, a.tagset, STRING_AGG(DISTINCT m.description, '- ') AS tagset_desc, a.position, a.isword
                FROM (
                  SELECT cm.id, cm.tagset, COALESCE(word, phrase) word, UNNEST(STRING_TO_ARRAY(cm.tagset, ',')) AS tagsetx, (CASE WHEN word IS NULL THEN 'N' ELSE 'Y' END) isword, position
                  FROM c_mapping_file cm
                  WHERE cm.file_id = 70) a
                LEFT JOIN m_tagset m ON a.tagsetx = '|'||m.code||'|'
                GROUP BY a.id, a.word, a.tagset, a.position, a.isword) x";
        $result = Yii::app()->db->createCommand($sql)->queryScalar();
        return $result;
	}

}
