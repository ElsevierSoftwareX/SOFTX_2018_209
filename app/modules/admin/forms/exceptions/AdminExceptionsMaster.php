<?php

class AdminExceptionsMaster extends Exceptions {

    public function getForm() {
        return array (
            'title' => 'Exceptions Master',
            'layout' => array (
                'name' => 'full-width',
                'data' => array (
                    'col1' => array (
                        'type' => 'mainform',
                        'size' => '100',
                    ),
                ),
            ),
            'inlineJS' => 'ex.js',
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
                'title' => 'Perkecualian',
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
                        'name' => '_',
                        'label' => '#',
                        'columnType' => 'string',
                        'cellMode' => 'default',
                        'options' => array (),
                        '$listViewName' => 'columns',
                        '$showDF' => true,
                        'mergeSameRow' => 'No',
                        'html' => '<td ng-class=\"rowClass(row, \'_\', \'string\')\" >
    {{row[\'_\']}}
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
                        'label' => 'Kata',
                        'name' => 'word',
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
                        'renderInEditor' => 'Yes',
                        'type' => 'Text',
                        'value' => '                </div>
                <div class=\"col-sm-12\">
                    <br/>
                    <a class = \"btn btn-success\" ng-click=\"setUpdate()\" style = \'float:right;\'>
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