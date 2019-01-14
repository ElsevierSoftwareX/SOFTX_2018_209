<?php

class AdminMTagsetMaster extends MTagset {

    public function getForm() {
        return array (
            'title' => 'M Tagset Master',
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
                        'label' => 'Simpan ',
                        'buttonType' => 'success',
                        'icon' => 'check',
                        'options' => array (
                            'ng-click' => 'form.submit(this)',
                        ),
                        'type' => 'LinkButton',
                    ),
                ),
                'title' => 'Master Tagset',
                'showSectionTab' => 'No',
                'type' => 'ActionBar',
            ),
            array (
                'name' => 'dataFilter1',
                'datasource' => 'dataSource1',
                'filters' => array (
                    array (
                        'filterType' => 'string',
                        'name' => 'code',
                        'label' => 'Code',
                        '$showDF' => false,
                        'defaultOperator' => '',
                        'defaultValue' => '',
                    ),
                    array (
                        'filterType' => 'string',
                        'name' => 'description',
                        'label' => 'Description',
                        '$showDF' => false,
                        'defaultOperator' => '',
                        'defaultValue' => '',
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
                'relationCriteria' => array (
                    'select' => '',
                    'distinct' => 'false',
                    'alias' => 't',
                    'condition' => '{[where]}',
                    'order' => '{[order], code ASC}',
                    'paging' => '{[paging]}',
                    'group' => '',
                    'having' => '',
                    'join' => '',
                ),
                'type' => 'DataSource',
            ),
            array (
                'type' => 'GridView',
                'name' => 'gridView1',
                'datasource' => 'dataSource1',
                'columns' => array (
                    array (
                        'name' => '',
                        'label' => '#',
                        'columnType' => 'string',
                        'options' => array (
                            'mode' => 'sequence',
                        ),
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'code',
                        'label' => 'Code',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td ng-class=\"rowClass(row, \'code\', \'string\')\" >
    
    <div ceditable=\"true\"  ng-paste=\"paste($event, row, $index, \'code\', 1)\" ng-model=\"row[\'code\']\"
         ng-keydown=\"editKey($event)\"></div>
</td>',
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (
                            'mode' => 'editable',
                        ),
                        'name' => 'description',
                        'label' => 'Description',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                    ),
                ),
            ),
            array (
                'type' => 'Text',
                'value' => '<br/>
<br/>',
            ),
        );
    }

}