<?php

class AdminCWordMaster extends CWord {

    public function getForm() {
        return array (
            'title' => 'C Word Master',
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
                'linkBar' => array (),
                'title' => 'Daftar Kata',
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
                        'label' => 'Kata',
                        '$showDF' => false,
                        'defaultOperator' => '',
                        'defaultValue' => '',
                        'isCustom' => 'No',
                        'resetable' => 'Yes',
                    ),
                    array (
                        'filterType' => 'string',
                        'name' => 'tagset',
                        'label' => 'Tagset',
                        '$showDF' => false,
                        'defaultOperator' => '',
                        'defaultValue' => '',
                    ),
                    array (
                        'filterType' => 'string',
                        'name' => 'count',
                        'label' => 'Total',
                        '$showDF' => false,
                        'defaultOperator' => '',
                        'defaultValue' => '',
                        'isCustom' => 'No',
                        'resetable' => 'Yes',
                    ),
                ),
                'type' => 'DataFilter',
            ),
            array (
                'name' => 'dataSource1',
                'params' => array (
                    'where' => 'dataFilter1',
                    'paging' => 'gridView1',
                    'order' => 'gridView1',
                ),
                'relationTo' => 'currentModel',
                'type' => 'DataSource',
            ),
            array (
                'type' => 'GridView',
                'name' => 'gridView1',
                'datasource' => 'dataSource1',
                'columns' => array (
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'word',
                        'label' => 'Kata',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td ng-class=\"rowClass(row, \'word\', \'string\')\" >
    <div class=\'editable\' ng-include=\'\"row-state-template\"\'></div>
    
    <div ceditable=\"true\" style=\"padding-right: 0px;padding-left: 8px;\" ng-paste=\"paste($event, row, $index, \'word\', 0)\" ng-model=\"row[\'word\']\"
         ng-keydown=\"editKey($event)\"></div>
</td>',
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'tagset',
                        'label' => 'Tagset',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td ng-class=\"rowClass(row, \'tagset\', \'string\')\" >
    
    <div ceditable=\"true\"  ng-paste=\"paste($event, row, $index, \'tagset\', 4)\" ng-model=\"row[\'tagset\']\"
         ng-keydown=\"editKey($event)\"></div>
</td>',
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'count',
                        'label' => 'Total',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td ng-class=\"rowClass(row, \'count\', \'string\')\" >
    
    <div ceditable=\"true\"  ng-paste=\"paste($event, row, $index, \'count\', 1)\" ng-model=\"row[\'count\']\"
         ng-keydown=\"editKey($event)\"></div>
</td>',
                    ),
                ),
            ),
        );
    }

}