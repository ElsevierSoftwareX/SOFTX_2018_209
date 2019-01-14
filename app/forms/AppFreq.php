<?php

class AppFreq extends Form {

    public function getForm() {
        return array (
            'title' => 'Freq',
            'layout' => array (
                'name' => 'full-width',
                'data' => array (
                    'col1' => array (
                        'type' => 'mainform',
                        'size' => '100',
                    ),
                ),
            ),
            'inlineJS' => 'freq.js',
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
                'name' => 'dsFreq',
                'sql' => 'SELECT COUNT(p.word) as freq, p.word, f.category
FROM c_phrase p
INNER JOIN file f ON f.id = p.file_id AND p.tagset_word != \'|t|\' {AND [where]}
GROUP BY f.category, p.word
ORDER BY freq DESC
{[paging]}',
                'postData' => 'No',
                'enablePaging' => 'Yes',
                'pagingSQL' => 'SELECT COUNT(1) FROM (SELECT COUNT(p.word) as freq, p.word, f.category
FROM c_phrase p
INNER JOIN file f ON f.id = p.file_id AND p.tagset_word != \'|t|\' {AND [where]}
GROUP BY f.category, p.word
) x',
                'execMode' => 'after',
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
                        'value' => '<h2>Frekuensi</h2>
<hr>',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<div ng-if=\"dsFreq.loading && dsFreq.data.length == 0\">
    <h1>Loading <i class=\"fa fa-spinner fa-spin\"></i></h1> 
</div>',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<div ng-show=\\"dsFreq.data.length > 0\\">',
                    ),
                    array (
                        'name' => 'dataFilter0',
                        'datasource' => 'dsFreq',
                        'filters' => array (
                            array (
                                'name' => 'word',
                                'label' => 'Cari',
                                'listExpr' => '',
                                'filterType' => 'string',
                                'isCustom' => 'No',
                                'options' => array (),
                                'resetable' => 'Yes',
                                'defaultValue' => '',
                                'defaultOperator' => '',
                                'showOther' => 'No',
                                'otherLabel' => '',
                                'queryOperator' => '',
                                '$showDF' => false,
                            ),
                            array (
                                'name' => 'category',
                                'label' => 'Kategori',
                                'listExpr' => '[\'Fisika\' => \'Fisika\' , \'Hayati\' => \'Hayati\' , \'Kesehatan\' => \'Kesehatan\', \'Sosial\' => \'Sosial\']',
                                'filterType' => 'list',
                                'isCustom' => 'No',
                                'options' => array (),
                                'resetable' => 'Yes',
                                'defaultValue' => '',
                                'showOther' => 'No',
                                'otherLabel' => '',
                                'queryOperator' => '',
                                '$showDF' => false,
                                'list' => array (
                                    'Fisika' => 'Fisika',
                                    'Hayati' => 'Hayati',
                                    'Kesehatan' => 'Kesehatan',
                                    'Sosial' => 'Sosial',
                                ),
                            ),
                        ),
                        'type' => 'DataFilter',
                    ),
                    array (
                        'type' => 'GridView',
                        'name' => 'gridView0',
                        'label' => 'GridView',
                        'datasource' => 'dsFreq',
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
                                'label' => 'Kata',
                                'html' => '<td ng-class=\"rowClass(row, \'word\', \'string\')\" >
    {{row[\'word\']}}
</td>',
                                'columnType' => 'string',
                                '$listViewName' => 'columns',
                                '$showDF' => false,
                                'mergeSameRow' => 'No',
                                'cellMode' => 'default',
                            ),
                            array (
                                'name' => 'freq',
                                'label' => 'Frekuensi',
                                'html' => '<td ng-class=\"rowClass(row, \'freq\', \'string\')\" >
    {{row[\'freq\']}}
</td>',
                                'columnType' => 'string',
                                '$listViewName' => 'columns',
                                '$showDF' => false,
                                'mergeSameRow' => 'No',
                                'cellMode' => 'default',
                            ),
                            array (
                                'name' => 'category',
                                'label' => 'Kategori',
                                'html' => '<td ng-class=\"rowClass(row, \'category\', \'string\')\" >
    {{row[\'category\']}}
</td>',
                                'columnType' => 'string',
                                '$listViewName' => 'columns',
                                '$showDF' => true,
                                'mergeSameRow' => 'No',
                                'cellMode' => 'default',
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