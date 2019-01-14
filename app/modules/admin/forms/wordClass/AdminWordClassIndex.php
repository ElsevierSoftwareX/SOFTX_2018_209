<?php

class AdminWordClassIndex extends WordClass {

    public function getForm() {
        return array (
            'title' => 'Daftar Word Class ',
            'layout' => array (
                'name' => 'full-width',
                'data' => array (
                    'col1' => array (
                        'type' => 'mainform',
                    ),
                ),
            ),
        );
    }

    public function getFields() {
        return array (
            array (
                'linkBar' => array (
                    array (
                        'label' => 'Tambah Word Class',
                        'buttonType' => 'success',
                        'icon' => 'plus',
                        'options' => array (
                            'href' => 'url:/admin/wordClass/new',
                        ),
                        'type' => 'LinkButton',
                    ),
                ),
                'title' => 'Daftar Word Class',
                'showSectionTab' => 'No',
                'type' => 'ActionBar',
            ),
            array (
                'name' => 'dataFilter1',
                'datasource' => 'dataSource1',
                'filters' => array (
                    array (
                        'filterType' => 'string',
                        'name' => 'word',
                        'label' => 'Word',
                        '$showDF' => false,
                        'defaultOperator' => '',
                        'defaultValue' => '',
                    ),
                    array (
                        'filterType' => 'string',
                        'name' => 'class',
                        'label' => 'Class',
                        '$showDF' => false,
                        'defaultOperator' => '',
                        'defaultValue' => '',
                    ),
                ),
                'type' => 'DataFilter',
            ),
            array (
                'name' => 'dataSource1',
                'sql' => 'SELECT id, word, STRING_AGG(DISTINCT a.class, \'| \') AS class
FROM (
  SELECT w.id,word, UNNEST(STRING_TO_ARRAY(m.description, \',\')) AS class
  FROM word_class w
  INNER JOIN m_tagset m ON m.code = w.class
  {[where]}
) a
GROUP BY word, id
{[order]} {[paging]}',
                'postData' => 'No',
                'enablePaging' => 'Yes',
                'pagingSQL' => 'SELECT COUNT(word)
FROM (
  SELECT word, UNNEST(STRING_TO_ARRAY(m.description, \',\')) AS class
  FROM word_class w
  INNER JOIN m_tagset m ON m.code = w.class
  {[where]}
) a',
                'relationTo' => 'currentModel',
                'type' => 'DataSource',
            ),
            array (
                'type' => 'GridView',
                'name' => 'gridView1',
                'label' => 'GridView',
                'datasource' => 'dataSource1',
                'columns' => array (
                    array (
                        'name' => '',
                        'label' => 'No.',
                        'options' => array (
                            'mode' => 'sequence',
                        ),
                        'mergeSameRow' => 'No',
                        'mergeSameRowWith' => '',
                        'mergeSameRowMethod' => 'Default',
                        'html' => '',
                        'columnType' => 'string',
                        'typeOptions' => array (
                            'string' => array (
                                'html',
                            ),
                        ),
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'cellMode' => 'default',
                    ),
                    array (
                        'name' => 'word',
                        'label' => 'Word',
                        'html' => '',
                        'columnType' => 'string',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                    ),
                    array (
                        'name' => 'class',
                        'label' => 'Class',
                        'html' => '',
                        'columnType' => 'string',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                    ),
                    array (
                        'name' => '_',
                        'label' => '_',
                        'options' => array (
                            'mode' => 'edit-button',
                            'editUrl' => '/admin/wordClass/update&id={{row[\'id\']}}',
                        ),
                        'mergeSameRow' => 'No',
                        'mergeSameRowWith' => '',
                        'mergeSameRowMethod' => 'Default',
                        'html' => '',
                        'columnType' => 'string',
                        'typeOptions' => array (
                            'string' => array (
                                'html',
                            ),
                        ),
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'cellMode' => 'default',
                    ),
                ),
            ),
            array (
                'type' => 'Text',
            ),
        );
    }

}