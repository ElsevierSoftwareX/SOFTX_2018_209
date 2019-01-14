<?php

class AppSearch extends CPhrase {

    public function getForm() {
        return array (
            'title' => 'Search',
            'layout' => array (
                'name' => 'full-width',
                'data' => array (
                    'col1' => array (
                        'type' => 'mainform',
                        'size' => '100',
                    ),
                ),
            ),
            'inlineJS' => 'searchKam.js',
        );
    }

    public function getFields() {
        return array (
            array (
                'type' => 'Text',
                'value' => '<style>
    .required {
        display: none;
    }
</style>',
            ),
            array (
                'linkBar' => array (
                    array (
                        'label' => 'Save',
                        'buttonType' => 'success',
                        'options' => array (
                            'ng-if' => 'false',
                        ),
                        'type' => 'LinkButton',
                    ),
                ),
                'title' => 'KOIN (Korpus Indonesia)',
                'showSectionTab' => 'No',
                'type' => 'ActionBar',
            ),
            array (
                'name' => 'dsPhrase',
                'fieldType' => 'phpsql',
                'sql' => 'SELECT *
FROM c_phrase
{[where]} {[order]} {[paging]}',
                'php' => 'CPhrase::searchKelasKata($params)',
                'postData' => 'No',
                'params' => array (
                    ':word' => 'js:model.word',
                    ':cbl' => 'js:model.cbl',
                    ':kolokat' => 'js:model.kolokat',
                    ':kelas' => 'js:model.kelas',
                ),
                'enablePaging' => 'Yes',
                'pagingSQL' => 'SELECT COUNT(1)
FROM c_phrase
{[where]}',
                'pagingPHP' => 'CPhrase::searchKelasKataCount($params)',
                'relationTo' => 'currentModel',
                'execMode' => 'manual',
                'type' => 'DataSource',
            ),
            array (
                'totalColumns' => '1',
                'column1' => array (
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<div class=\\"default-content-panel\\">',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<h2>Kelas Kata</h2>
<hr>',
                    ),
                    array (
                        'column1' => array (
                            array (
                                'type' => 'Text',
                                'value' => '<column-placeholder></column-placeholder>',
                            ),
                            array (
                                'label' => 'Cari',
                                'name' => 'word',
                                'labelWidth' => '2',
                                'fieldWidth' => '10',
                                'modelClass' => 'app.models.CWord',
                                'criteria' => array (
                                    'select' => 'word',
                                    'distinct' => 'true',
                                    'alias' => 't',
                                    'condition' => '{[search]}',
                                    'order' => '',
                                    'group' => '',
                                    'having' => '',
                                    'join' => '',
                                ),
                                'idField' => 'word',
                                'labelField' => 'word',
                                'type' => 'TextField',
                            ),
                            array (
                                'label' => 'Kategori',
                                'name' => 'cbl',
                                'list' => array (
                                    'Fisika' => 'Fisika',
                                    'Sosial' => 'Sosial',
                                    'Kesehatan' => 'Kesehatan',
                                    'Hayati' => 'Hayati',
                                ),
                                'itemLayout' => 'Horizontal',
                                'labelWidth' => '2',
                                'type' => 'CheckboxList',
                            ),
                            array (
                                'column1' => array (
                                    array (
                                        'label' => 'Kolokat',
                                        'name' => 'kolokat',
                                        'defaultType' => 'first',
                                        'list' => array (
                                            '-' => 'Semua',
                                            'l2' => 'Kiri Kedua',
                                            'l1' => 'Kiri Pertama',
                                            'r1' => 'Kanan Pertama',
                                            'r2' => 'Kanan Kedua',
                                        ),
                                        'layout' => 'Vertical',
                                        'type' => 'DropDownList',
                                    ),
                                    array (
                                        'type' => 'Text',
                                        'value' => '<column-placeholder></column-placeholder>',
                                    ),
                                ),
                                'column2' => array (
                                    array (
                                        'type' => 'Text',
                                        'value' => '<column-placeholder></column-placeholder>',
                                    ),
                                    array (
                                        'label' => 'Kelas Kata',
                                        'name' => 'kelas',
                                        'relationCriteria' => array (
                                            'select' => '',
                                            'distinct' => 'false',
                                            'alias' => 't',
                                            'condition' => 'code != \'s\' {AND [search]}',
                                            'order' => '',
                                            'group' => '',
                                            'having' => '',
                                            'join' => '',
                                        ),
                                        'options' => array (
                                            'ng-if' => 'model.kolokat != \'-\'',
                                        ),
                                        'layout' => 'Vertical',
                                        'modelClass' => 'app.models.MTagset',
                                        'idField' => 'code',
                                        'labelField' => 'description',
                                        'type' => 'RelationField',
                                    ),
                                ),
                                'column3' => array (
                                    array (
                                        'type' => 'Text',
                                        'value' => '<column-placeholder></column-placeholder>',
                                    ),
                                ),
                                'w1' => '50%',
                                'w2' => '50%',
                                'w3' => '33%',
                                'w4' => '20%',
                                'type' => 'ColumnField',
                            ),
                        ),
                        'column2' => array (
                            array (
                                'buttonType' => 'primary',
                                'icon' => 'search',
                                'options' => array (
                                    'ng-click' => 'searchWord()',
                                ),
                                'type' => 'LinkButton',
                            ),
                            array (
                                'type' => 'Text',
                                'value' => '<column-placeholder></column-placeholder>',
                            ),
                        ),
                        'w1' => '50%',
                        'w2' => '50%',
                        'type' => 'ColumnField',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<div ng-if=\"dsPhrase.loading && dsPhrase.data.length == 0\">
    <h1>Loading <i class=\"fa fa-spinner fa-spin\"></i></h1> 
</div>',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<div ng-show=\\"dsPhrase.data.length > 0\\">',
                    ),
                    array (
                        'type' => 'GridView',
                        'name' => 'gdPhrase',
                        'label' => 'GridView',
                        'datasource' => 'dsPhrase',
                        'gridOptions' => array (
                            'rowHeaders' => '2',
                        ),
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
                                'headers' => array (
                                    'r2' => array (
                                        'colSpan' => 1,
                                        'label' => '',
                                    ),
                                ),
                            ),
                            array (
                                'name' => 'category',
                                'label' => 'Bidang Ilmu',
                                'options' => array (),
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
                                'headers' => array (
                                    'r2' => array (
                                        'colSpan' => 1,
                                        'label' => '',
                                    ),
                                ),
                            ),
                            array (
                                'name' => 'word_l2',
                                'label' => 'Kata',
                                'options' => array (),
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
                                'headers' => array (
                                    'r2' => array (
                                        'colSpan' => 2,
                                        'label' => 'Kiri Kedua',
                                    ),
                                ),
                            ),
                            array (
                                'name' => 'tagset_word_l2',
                                'label' => 'Kelas Kata',
                                'options' => array (),
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
                                'headers' => array (
                                    'r2' => array (
                                        'colSpan' => -1,
                                        'label' => '',
                                    ),
                                ),
                            ),
                            array (
                                'name' => 'word_l1',
                                'label' => 'Kata',
                                'options' => array (),
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
                                'headers' => array (
                                    'r2' => array (
                                        'colSpan' => 2,
                                        'label' => 'Kiri Pertama',
                                    ),
                                ),
                            ),
                            array (
                                'name' => 'tagset_word_l1',
                                'label' => 'Kelas Kata',
                                'options' => array (),
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
                                'headers' => array (
                                    'r2' => array (
                                        'colSpan' => -1,
                                        'label' => '',
                                    ),
                                ),
                            ),
                            array (
                                'name' => 'word',
                                'label' => 'Kata',
                                'options' => array (),
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
                                'headers' => array (
                                    'r2' => array (
                                        'colSpan' => 2,
                                        'label' => 'Pencarian',
                                    ),
                                ),
                            ),
                            array (
                                'name' => 'tagset_word',
                                'label' => 'Kelas Kata',
                                'options' => array (),
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
                                'headers' => array (
                                    'r2' => array (
                                        'colSpan' => -1,
                                        'label' => '',
                                    ),
                                ),
                            ),
                            array (
                                'name' => 'word_r1',
                                'label' => 'Kata',
                                'options' => array (),
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
                                'headers' => array (
                                    'r2' => array (
                                        'colSpan' => 2,
                                        'label' => 'Kanan Pertama',
                                    ),
                                ),
                            ),
                            array (
                                'name' => 'tagset_word_r1',
                                'label' => 'Kelas Kata',
                                'options' => array (),
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
                                'headers' => array (
                                    'r2' => array (
                                        'colSpan' => -1,
                                        'label' => '',
                                    ),
                                ),
                            ),
                            array (
                                'name' => 'word_r2',
                                'label' => 'Kata',
                                'options' => array (),
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
                                'headers' => array (
                                    'r2' => array (
                                        'colSpan' => 2,
                                        'label' => 'Kanan Kedua',
                                    ),
                                ),
                            ),
                            array (
                                'name' => 'tagset_word_r2',
                                'label' => 'Kelas Kata',
                                'options' => array (),
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
                                'headers' => array (
                                    'r2' => array (
                                        'colSpan' => -1,
                                        'label' => '',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '</div>',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '</div>',
                    ),
                ),
                'w1' => '100%',
                'w2' => '50%',
                'type' => 'ColumnField',
            ),
            array (
                'type' => 'Text',
                'value' => '<br/>
<br/>
<?php
    include(\'footer.php\');
?>',
            ),
        );
    }

}