<?php

class AdminIndex extends Form {

    public function getForm() {
        return array (
            'title' => 'Daftar File',
            'layout' => array (
                'name' => 'full-width',
                'data' => array (
                    'col1' => array (
                        'type' => 'mainform',
                        'size' => '100',
                    ),
                ),
            ),
            'inlineJS' => 'index.js',
        );
    }

    public function getFields() {
        return array (
            array (
                'linkBar' => array (
                    array (
                        'label' => 'Add',
                        'buttonType' => 'success',
                        'icon' => 'plus',
                        'options' => array (
                            'ng-url' => '/admin/index/tambahfile',
                            'ng-if' => '!service.running(\'SyncFile\')',
                        ),
                        'type' => 'LinkButton',
                    ),
                    array (
                        'label' => 'Sync',
                        'buttonType' => 'info',
                        'icon' => 'refresh',
                        'options' => array (
                            'ng-url' => 'admin/index/sync',
                            'ng-if' => '!service.running(\'SyncFile\')',
                        ),
                        'type' => 'LinkButton',
                    ),
                    array (
                        'label' => 'Processing... {{processSync}}',
                        'buttonType' => 'info',
                        'icon' => 'refresh fa-spin',
                        'options' => array (
                            'ng-if' => 'service.running(\'SyncFile\')',
                        ),
                        'type' => 'LinkButton',
                    ),
                ),
                'showSectionTab' => 'No',
                'type' => 'ActionBar',
            ),
            array (
                'totalColumns' => '1',
                'column1' => array (
                    array (
                        'type' => 'Text',
                        'value' => '<div class=\\"default-content-panel\\">',
                    ),
                    array (
                        'name' => 'dataSource1',
                        'sql' => 'SELECT f.*, to_char(cast(f.created_date as date),\'DD Mon YYYY\') date FROM file f
{[where]} {[order]} {[paging]}',
                        'postData' => 'No',
                        'enablePaging' => 'Yes',
                        'pagingSQL' => 'SELECT COUNT(1)
FROM file
{[where]}',
                        'type' => 'DataSource',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                    array (
                        'name' => 'dataFilter1',
                        'datasource' => 'dataSource1',
                        'filters' => array (
                            array (
                                'name' => 'name',
                                'label' => 'Name',
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
                                '$listViewName' => 'filters',
                            ),
                            array (
                                'name' => 'category',
                                'label' => 'Category',
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
                                '$listViewName' => 'filters',
                            ),
                            array (
                                'name' => 'created_date',
                                'label' => 'Created Date',
                                'listExpr' => '',
                                'filterType' => 'date',
                                'isCustom' => 'No',
                                'options' => array (),
                                'resetable' => 'Yes',
                                'defaultValue' => '',
                                'defaultValueFrom' => '',
                                'defaultValueTo' => '',
                                'defaultOperator' => '',
                                'showOther' => 'No',
                                'otherLabel' => '',
                                'queryOperator' => '',
                                '$showDF' => false,
                                '$listViewName' => 'filters',
                            ),
                            array (
                                'name' => 'content',
                                'label' => 'Content',
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
                                '$listViewName' => 'filters',
                            ),
                        ),
                        'type' => 'DataFilter',
                    ),
                    array (
                        'type' => 'GridView',
                        'name' => 'gridView1',
                        'label' => 'GridView',
                        'datasource' => 'dataSource1',
                        'columns' => array (
                            array (
                                'name' => 'name',
                                'label' => 'Name',
                                'html' => '',
                                'columnType' => 'string',
                                '$listViewName' => 'columns',
                                '$showDF' => false,
                            ),
                            array (
                                'name' => 'category',
                                'label' => 'Category',
                                'html' => '',
                                'columnType' => 'string',
                                '$listViewName' => 'columns',
                                '$showDF' => false,
                            ),
                            array (
                                'name' => 'date',
                                'label' => 'Created Date',
                                'html' => '<td ng-class=\"rowClass(row, \'date\', \'string\')\" style = \'text-align:center;\'>
    {{row[\'date\']}}
</td>',
                                'columnType' => 'string',
                                '$listViewName' => 'columns',
                                '$showDF' => false,
                                'mergeSameRow' => 'No',
                                'cellMode' => 'custom',
                            ),
                            array (
                                'name' => 'is_checked',
                                'label' => 'Edited',
                                'options' => array (),
                                'mergeSameRow' => 'No',
                                'mergeSameRowWith' => '',
                                'mergeSameRowMethod' => 'Default',
                                'html' => '<td ng-class=\"rowClass(row, \'is_checked\', \'string\')\" style = \'text-align:center\'>
    <span class = \'label label-success\' ng-if=\'row.is_checked==\"Y\"\'>Yes</span>
    <span class = \'label label-default\' ng-if=\'row.is_checked==\"N\"\'>No</span>
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
                            array (
                                'name' => '_',
                                'label' => '',
                                'options' => array (),
                                'mergeSameRow' => 'No',
                                'mergeSameRowWith' => '',
                                'mergeSameRowMethod' => 'Default',
                                'html' => '<td style=\"width:20px;\" ng-class=\"rowClass(row, \'_\', \'string\')\" >
    <a ng-url = \"admin/index/check&id={{row.id}}\"  title=\"Check\" ng-if = \"!service.running(\'SyncFile\')\"
    class=\"btn btn-info btn-xs\"><i class=\"fa fa-search\"></i></a>
    <a ng-if = \"service.running(\'SyncFile\')\" class = \'btn-default btn-xs\'><i class=\"fa fa-search\"></i></a>
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
                            array (
                                'name' => '_',
                                'label' => '',
                                'options' => array (),
                                'mergeSameRow' => 'No',
                                'mergeSameRowWith' => '',
                                'mergeSameRowMethod' => 'Default',
                                'html' => '<td style=\"width:20px;\" ng-class=\"rowClass(row, \'_\', \'string\')\" >
    <a ng-if=\"(!row.$type || row.$type === \'r\')&&!service.running(\'SyncFile\')\" ng-url=\"admin/index/delete&id={{row.id}}\"
    onClick=\"return confirm(\'Are you sure?\')\"
    class=\"btn-block btn btn-danger btn-xs\"><i class=\"fa fa-trash\"></i></a>
    <a ng-if = \"service.running(\'SyncFile\')\" class = \'btn-block btn-default btn-xs\'><i class=\"fa fa-trash\"></i></a>
</td>',
                                'columnType' => 'string',
                                'typeOptions' => array (
                                    'string' => array (
                                        'html',
                                    ),
                                ),
                                '$listViewName' => 'columns',
                                '$showDF' => true,
                                'cellMode' => 'custom',
                            ),
                        ),
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
        );
    }

}