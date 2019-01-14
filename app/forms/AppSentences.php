<?php

class AppSentences extends Form {

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
                'totalColumns' => '1',
                'column1' => array (
                    array (
                        'type' => 'Text',
                        'value' => '<div class=\"default-content-panel\">
    
',
                    ),
                    array (
                        'display' => 'all-line',
                        'type' => 'Text',
                        'value' => '<h2>Kalimat</h2>
<hr>',
                    ),
                    array (
                        'column1' => array (
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
                                'convertToString' => 'No',
                                'options' => array (
                                    'ng-change' => 'explodeCat();',
                                ),
                                'type' => 'CheckboxList',
                            ),
                            array (
                                'type' => 'Text',
                                'value' => '<column-placeholder></column-placeholder>',
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
                        'value' => '<!-- <pre>{{model.cbl}}</pre> -->',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                    array (
                        'name' => 'dsPhrase',
                        'sql' => 'SELECT s.sentence, f.name, f.category 
FROM c_sentences s
INNER JOIN file f ON f.id = s.file_id
{AND s.sentence ILIKE :word} {AND f.category IN(:cat)}
{[paging]}',
                        'php' => 'CPhrase::searchSentences($params)',
                        'postData' => 'No',
                        'params' => array (
                            ':word' => 'js: \'%\'+model.word +\'%\'',
                            ':cat' => 'js: whereCat',
                        ),
                        'enablePaging' => 'Yes',
                        'pagingSQL' => 'SELECT COUNT(1) FROM c_sentences s
INNER JOIN file f ON f.id = s.file_id
{WHERE s.sentence LIKE :word} {AND f.category IN(:cat)}',
                        'pagingPHP' => 'CPhrase::searchSentences($params)',
                        'relationTo' => 'currentModel',
                        'execMode' => 'manual',
                        'type' => 'DataSource',
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
                            'rowHeaders' => 1,
                        ),
                        'columns' => array (
                            array (
                                'name' => '',
                                'label' => 'No',
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
                                'name' => 'name',
                                'label' => 'berkas',
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
                                'name' => 'category',
                                'label' => 'bidang ilmu',
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
                                'name' => 'sentence',
                                'label' => 'Kalimat',
                                'options' => array (),
                                'mergeSameRow' => 'No',
                                'mergeSameRowWith' => '',
                                'mergeSameRowMethod' => 'Default',
                                'html' => '<td ng-class=\"rowClass(row, \'sentence\', \'string\')\" >
    <div ng-bind-html=\"markSearch(row[\'sentence\'])\">
        
    </div>
    
</td>',
                                'columnType' => 'string',
                                'typeOptions' => array (
                                    'string' => array (
                                        'html',
                                    ),
                                ),
                                '$listViewName' => 'columns',
                                '$showDF' => false,
                                'cellMode' => 'custom',
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