<?php

class AdminUpdateWordMaster extends UpdateWord {

    public function getForm() {
        return array (
            'title' => 'Update Word Master',
            'layout' => array (
                'name' => 'full-width',
                'data' => array (
                    'col1' => array (
                        'type' => 'mainform',
                        'size' => '100',
                    ),
                ),
            ),
            'inlineJS' => 'updateword.js',
        );
    }

    public function getFields() {
        return array (
            array (
                'type' => 'Text',
                'value' => '<style>
    .modal {
       display: none; /* Hidden by default */
       position: fixed; /* Stay in place */
       z-index: 1; /* Sit on top */
       padding-top: 100px; /* Location of the box */
       left: 0;
       top: 0;
       width: 100%; /* Full width */
       height: 100%; /* Full height */
       overflow: auto; /* Enable scroll if needed */
       background-color: rgb(0,0,0); /* Fallback color */
       background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        z-index:100;
    }
    
    /* Modal Content */
    .modal-content {
       position: relative;
       background-color: #fefefe;
       margin: auto;
       padding: 0;
       border: 1px solid #888;
       width: 80%;
       box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
       -webkit-animation-name: animatetop;
       -webkit-animation-duration: 0.4s;
       animation-name: animatetop;
       animation-duration: 0.4s;
       z-index:100;
    }
    
    /* Add Animation */
    @-webkit-keyframes animatetop {
       from {top:-300px; opacity:0} 
       to {top:0; opacity:1}
    }
    
    @keyframes animatetop {
       from {top:-300px; opacity:0}
       to {top:0; opacity:1}
    }
    
       /* Add Animation */
    @-webkit-keyframes animatebot {
       from {bottom:-300px; opacity:0} 
       to {bottom:50px; opacity:1}
    }
    
    @keyframes animatebot {
       from {bottom:-300px; opacity:0}
       to {bottom:50px; opacity:1}
    }
    /* The Close Button */
    .close {
       color: white;
       opacity: 1;
       margin-top: 15px;
       float: right;
       font-size: 28px;
       font-weight: bold;
    }
    
    .close:hover,
    .close:focus {
       color: #ececeb;
       text-decoration: none;
       cursor: pointer;
    }
    
    .modal-header-red {
       padding: 2px 16px;
       background-color: red;
       color: white;
    }
    
    .modal-header-green {
       padding: 2px 16px;
       background-color: #5cb85c;
       color: white;
    }
    
    .modal-header-yellow {
       padding: 2px 16px;
       background-color: orange;
       color: white;
    }
    
    .modal-body {padding: 20px 16px;}
    
    .modal-footer {
       padding: 2px 16px;
       background-color: #5cb85c;
       color: white;
    }
    
    .btnAppr {
        padding: 5px 10px;
        line-height: 1.5;
        border-radius: 3px;
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c;
    }
    .btnAppr:hover {
        color: #fff;
        background-color: #449d44;
        border-color: #398439;
    }
</style>',
            ),
            array (
                'linkBar' => array (
                    array (
                        'label' => 'Sync',
                        'buttonType' => 'info',
                        'icon' => 'refresh',
                        'options' => array (
                            'ng-click' => 'syncDoc()',
                            'ng-if' => '!service.running(\'MappingFile\')',
                        ),
                        'type' => 'LinkButton',
                    ),
                    array (
                        'label' => 'Sync',
                        'buttonType' => 'info',
                        'icon' => 'spinner fa-spin',
                        'options' => array (
                            'ng-if' => 'service.running(\'MappingFile\')',
                        ),
                        'type' => 'LinkButton',
                    ),
                    array (
                        'label' => 'Tambah',
                        'buttonType' => 'success',
                        'icon' => 'plus',
                        'options' => array (
                            'ng-click' => 'openModalUpdate()',
                        ),
                        'type' => 'LinkButton',
                    ),
                ),
                'title' => 'Master Perubahan Kata & Frase',
                'showSectionTab' => 'No',
                'type' => 'ActionBar',
            ),
            array (
                'name' => 'dataFilter1',
                'datasource' => 'dataSource1',
                'filters' => array (
                    array (
                        'filterType' => 'string',
                        'name' => 'old_word',
                        'label' => 'Kata Lama',
                        '$showDF' => false,
                        'defaultOperator' => '',
                        'defaultValue' => '',
                        '$listViewName' => 'filters',
                        'isCustom' => 'No',
                        'resetable' => 'Yes',
                    ),
                    array (
                        'filterType' => 'string',
                        'name' => 'tagset_old',
                        'label' => 'Tagset Lama',
                        '$showDF' => false,
                        'defaultOperator' => '',
                        'defaultValue' => '',
                        '$listViewName' => 'filters',
                        'isCustom' => 'No',
                        'resetable' => 'Yes',
                    ),
                    array (
                        'filterType' => 'string',
                        'name' => 'new_word',
                        'label' => 'Kata Baru',
                        '$showDF' => false,
                        'defaultOperator' => '',
                        'defaultValue' => '',
                        '$listViewName' => 'filters',
                        'isCustom' => 'No',
                        'resetable' => 'Yes',
                    ),
                    array (
                        'filterType' => 'string',
                        'name' => 'tagset_new',
                        'label' => 'Tagset Baru',
                        '$showDF' => true,
                        'defaultOperator' => '',
                        'defaultValue' => '',
                        '$listViewName' => 'filters',
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
                        'name' => 'old_word',
                        'label' => 'Kata Lama',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td ng-class=\"rowClass(row, \'old_word\', \'string\')\" >
    
    <div ceditable=\"true\"  ng-paste=\"paste($event, row, $index, \'old_word\', 1)\" ng-model=\"row[\'old_word\']\"
         ng-keydown=\"editKey($event)\"></div>
</td>',
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'tagset_old',
                        'label' => 'Tagset Lama',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td ng-class=\"rowClass(row, \'tagset_old\', \'string\')\" >
    
    <div ceditable=\"true\"  ng-paste=\"paste($event, row, $index, \'tagset_old\', 2)\" ng-model=\"row[\'tagset_old\']\"
         ng-keydown=\"editKey($event)\"></div>
</td>',
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'new_word',
                        'label' => 'Kata Baru',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td ng-class=\"rowClass(row, \'new_word\', \'string\')\" >
    
    <div ceditable=\"true\"  ng-paste=\"paste($event, row, $index, \'new_word\', 3)\" ng-model=\"row[\'new_word\']\"
         ng-keydown=\"editKey($event)\"></div>
</td>',
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'tagset_new',
                        'label' => 'Tagset Baru',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td ng-class=\"rowClass(row, \'tagset_new\', \'string\')\" >
    
    <div ceditable=\"true\"  ng-paste=\"paste($event, row, $index, \'tagset_new\', 4)\" ng-model=\"row[\'tagset_new\']\"
         ng-keydown=\"editKey($event)\"></div>
</td>',
                    ),
                    array (
                        'name' => '_',
                        'label' => '#',
                        'columnType' => 'string',
                        'cellMode' => 'custom',
                        'options' => array (),
                        '$listViewName' => 'columns',
                        '$showDF' => true,
                        'mergeSameRow' => 'No',
                        'html' => '<td style=\"width:20px;\" ng-class=\"rowClass(row, \'\', \'string\')\" >
    <div ng-url=\"admin/updateWord/delete&id={{row.id}}\" title=\"Remove\" 
    class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash\"></i></div>
</td>',
                    ),
                ),
            ),
            array (
                'type' => 'Text',
                'value' => '<!-- Approval Modal-->
<div ng-if=\"modalUpdate\" class=\"modal\" style=\"display:block;\">
    <div class=\"modal-content\">
        <div class=\"modal-header-green\">
              <span class=\"close\" ng-click=\"closeModalUpdate($event)\">&times;
              </span>
             <h3>Update Word</h3>
        </div>
        ',
            ),
            array (
                'type' => 'Text',
                'value' => '        <div class=\"modal-body\">
            <div class=\"form-vertical\">
                <div class=\"form-group\">
                    <div class=\"col-sm-12\">',
            ),
            array (
                'totalColumns' => '1',
                'column1' => array (
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                    array (
                        'label' => 'Kata Lama',
                        'name' => 'old_word',
                        'relationCriteria' => array (
                            'select' => '',
                            'distinct' => 'false',
                            'alias' => 't',
                            'condition' => '{[search]}',
                            'order' => 'word',
                            'group' => '',
                            'having' => '',
                            'join' => '',
                        ),
                        'list' => array (),
                        'labelWidth' => '3',
                        'fieldWidth' => '9',
                        'modelClass' => 'app.models.CWord',
                        'idField' => 'word',
                        'labelField' => 'word',
                        'type' => 'RelationField',
                    ),
                    array (
                        'label' => 'Tagset Lama',
                        'name' => 'tagset_old',
                        'relationCriteria' => array (
                            'select' => '',
                            'distinct' => 'false',
                            'alias' => 't',
                            'condition' => '{[search] AND } {word = :w}',
                            'order' => '',
                            'group' => '',
                            'having' => '',
                            'join' => '',
                        ),
                        'params' => array (
                            ':w' => 'js:model.old_word',
                        ),
                        'fieldOptions' => array (
                            'ng-disabled' => 'dis',
                        ),
                        'labelWidth' => '3',
                        'fieldWidth' => '9',
                        'modelClass' => 'app.models.CWord',
                        'idField' => 'tagset',
                        'labelField' => 'tagset',
                        'type' => 'RelationField',
                    ),
                    array (
                        'label' => 'Kata Baru',
                        'name' => 'new_word',
                        'labelWidth' => '3',
                        'fieldWidth' => '9',
                        'type' => 'TextField',
                    ),
                    array (
                        'type' => 'TagField',
                        'name' => 'tag',
                        'suggestion' => 'php',
                        'sugPHP' => 'MTagset::getTagSuggestion($search);',
                        'label' => 'Tagset Baru',
                        'layout' => 'Horizontal',
                        'labelWidth' => '3',
                        'fieldWidth' => '9',
                        'tagMapper' => 'MTagset::getTagMapper($values);',
                        'tagMapperMode' => 'insert',
                    ),
                    array (
                        'renderInEditor' => 'Yes',
                        'type' => 'Text',
                        'value' => '                </div>
                <div class=\"col-sm-12\">
                    <br/>
                    <a ng-disabled = \'!cansave\' class = \"btn btn-success\" ng-click=\"setUpdate()\" style = \'float:right;\'>
                        <i class = \'fa fa-save\'> Save </i></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>',
                    ),
                ),
                'w1' => '100%',
                'w2' => '50%',
                'type' => 'ColumnField',
            ),
        );
    }
}