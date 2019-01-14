<?php

class AdminCheckingPhrase extends Form {

    public function getForm() {
        return array (
            'title' => 'Checking Phrase',
            'layout' => array (
                'name' => 'full-width',
                'data' => array (
                    'col1' => array (
                        'type' => 'mainform',
                        'size' => '100',
                    ),
                ),
            ),
            'inlineJS' => 'checkphrase.js',
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
                'linkBar' => array (),
                'title' => '{{dsFile.data.length==1?\\"File Detail\\":\\"Phrase List\\"}}',
                'firstTabName' => 'Kata',
                'showSectionTab' => 'No',
                'type' => 'ActionBar',
            ),
            array (
                'name' => 'dsPhrase',
                'sql' => 'SELECT * FROM c_mapping_file
WHERE word IS NULL {AND file_id = :id}
ORDER BY position ASC
{[paging]}',
                'php' => 'MappingFile::getFilePhrase($params)',
                'postData' => 'No',
                'params' => array (
                    ':id' => 'js:params.id',
                ),
                'enablePaging' => 'Yes',
                'pagingSQL' => 'SELECT COUNT(1) 
FROM c_mapping_file
WHERE word IS NULL {AND file_id = :id}',
                'pagingPHP' => 'MappingFile::getCountFilePhrase($params)',
                'type' => 'DataSource',
            ),
            array (
                'name' => 'dsFile',
                'sql' => 'SELECT *, to_char(f.created_date, \'DD Mon YYYY\') date
FROM file f 
{WHERE f.id = :id}',
                'postData' => 'No',
                'params' => array (
                    ':id' => 'js:params.id',
                ),
                'type' => 'DataSource',
            ),
            array (
                'renderInEditor' => 'Yes',
                'type' => 'Text',
                'value' => '<div ng-if = \'dsFile.data.length==1\'  class = \'col-md-12\' style = \'padding:30px;\'>
    <div class = \'col-md-12\'>
        <div class = \'col-md-2\'>
            <h5><b>File</b></h5>
        </div> 
        <div class = \'col-md-10\'>
            <h5>: {{dsFile.data[0].name}}</h5>
        </div>
    </div>
    <div class = \'col-md-12\'>
        <div class = \'col-md-2\'>
            <h5><b>Category</b></h5>
        </div> 
        <div class = \'col-md-10\'>
            <h5>: {{dsFile.data[0].category}}</h5>
        </div>
    </div>
    <div class = \'col-md-12\'>
        <div class = \'col-md-2\'>
            <h5><b>Created Date</b></h5>
        </div> 
        <div class = \'col-md-10\'>
            <h5>: {{dsFile.data[0].date}}</h5>
        </div>
    </div>
    <div class = \'col-md-12\'>
        <div class = \'col-md-2\'>
            <h5><b>Content</b></h5>
        </div> 
        <div class = \'col-sm-1\' style = \"padding-right: 0px;width:20px;\">
            <h5>: </h4> 
        </div>
        <div class = \'col-md-9\' style = \'padding-left: 5px;\'>
            <h5 style = \'line-height: 150%;margin-top: 7px; text-align:justify;\'><span ng-bind_html=\'dsFile.data[0].content\'></span></h5>
        </div>
    </div>
</div>',
            ),
            array (
                'type' => 'Text',
                'value' => '<div class = \'col-md-12\'>
    <br/>',
            ),
            array (
                'totalColumns' => '1',
                'column1' => array (
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                    array (
                        'label' => 'Word',
                        'buttonType' => 'warning',
                        'buttonSize' => 'btn-lg',
                        'options' => array (
                            'ng-url' => 'admin/index/check&id={{params.id}}',
                        ),
                        'type' => 'LinkButton',
                    ),
                    array (
                        'label' => 'Phrase',
                        'buttonSize' => 'btn-lg',
                        'options' => array (
                            'ng-url' => 'admin/index/checkPhrase&id={{params.id}}',
                            'style' => 'box-shadow: 0 0px 16px 0 rgba(0,0,0,0.1), 0 6px 20px 0 rgba(0,0,0,0.19);',
                        ),
                        'type' => 'LinkButton',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '</div>',
                    ),
                    array (
                        'title' => '<div ng-if = \'dsFile.data.length==1\'>
Phrase List
</div>',
                        'type' => 'SectionHeader',
                    ),
                    array (
                        'name' => 'dataFilter0',
                        'datasource' => 'dsPhrase',
                        'filters' => array (
                            array (
                                'name' => 'word',
                                'label' => 'Phrase',
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
                                'name' => 'tagset_word',
                                'label' => 'Tagset',
                                'listExpr' => '',
                                'filterType' => 'relation',
                                'isCustom' => 'No',
                                'options' => array (),
                                'resetable' => 'Yes',
                                'defaultValue' => '',
                                'showOther' => 'No',
                                'otherLabel' => '',
                                'relParams' => array (),
                                'relCriteria' => array (
                                    'select' => 't.description, CONCAT(\'|\',code,\'|\') code',
                                    'distinct' => 'false',
                                    'alias' => 't',
                                    'condition' => '{[search]}',
                                    'order' => 'description',
                                    'group' => '',
                                    'having' => '',
                                    'join' => '',
                                ),
                                'relModelClass' => 'app.models.MTagset',
                                'relIdField' => 'code',
                                'relLabelField' => 'description',
                                'queryOperator' => '',
                                '$showDF' => false,
                                '$showDFR' => true,
                                'list' => 0,
                                'count' => 0,
                            ),
                            array (
                                'name' => 'wordcount',
                                'label' => 'Count',
                                'listExpr' => '',
                                'filterType' => 'number',
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
                        ),
                        'type' => 'DataFilter',
                    ),
                    array (
                        'type' => 'GridView',
                        'name' => 'gridView1',
                        'label' => 'GridView',
                        'datasource' => 'dsPhrase',
                        'columns' => array (
                            array (
                                'name' => 'phrase',
                                'label' => 'Phrase',
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
                                'name' => 'tagset',
                                'label' => 'Tagset',
                                'html' => '<td ng-class=\"rowClass(row, \'tagset\', \'string\')\" >
    {{row[\'tagset\']}}
</td>',
                                'columnType' => 'string',
                                '$listViewName' => 'columns',
                                '$showDF' => false,
                                'mergeSameRow' => 'No',
                                'cellMode' => 'default',
                            ),
                            array (
                                'name' => '_',
                                'label' => '',
                                'options' => array (),
                                'mergeSameRow' => 'No',
                                'mergeSameRowWith' => '',
                                'mergeSameRowMethod' => 'Default',
                                'html' => '<td style=\"width:20px;\" ng-class=\"rowClass(row, \'_\', \'string\')\" >
    <a ng-click = \'openModalUpdate(row)\'  title=\"Update\" 
    class=\"btn btn-warning btn-xs\"><i class=\"fa fa-edit\"></i></a>
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
                        'value' => '<br/>
<br/>
<br/>',
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
                        'name' => 'id',
                        'type' => 'HiddenField',
                    ),
                    array (
                        'totalColumns' => '1',
                        'column1' => array (
                            array (
                                'type' => 'Text',
                                'value' => '<column-placeholder></column-placeholder>',
                            ),
                            array (
                                'label' => 'Word',
                                'name' => 'word',
                                'labelWidth' => '3',
                                'fieldWidth' => '9',
                                'type' => 'TextField',
                            ),
                            array (
                                'type' => 'TagField',
                                'name' => 'tag',
                                'suggestion' => 'php',
                                'sugPHP' => 'MTagset::getTagSuggestion($search);',
                                'label' => 'Tagset',
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
                    <a ng-show = \'false\' class = \"btn btn-danger\" ng-click=\"setUpdateAll()\" style = \'float:right;\'>Update in All Files</a>
                    <a class = \"btn btn-warning\" ng-click=\"setUpdate()\" style = \'float:right;\'>Update Only this File</a>
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
                    array (
                        'type' => 'Text',
                        'value' => '<!-- Approval Modal-->
<div ng-if=\"modalIgnore\" class=\"modal\" style=\"display:block;\">
    <div class=\"modal-content\">
        <div class=\"modal-header-green\">
              <span class=\"close\" ng-click=\"closeModalIgnore($event)\">&times;
              </span>
             <h3>Ignore Word</h3>
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
                        'name' => 'id',
                        'type' => 'HiddenField',
                    ),
                    array (
                        'totalColumns' => '1',
                        'column1' => array (
                            array (
                                'type' => 'Text',
                                'value' => '<column-placeholder></column-placeholder>',
                            ),
                            array (
                                'renderInEditor' => 'Yes',
                                'type' => 'Text',
                                'value' => '                <h3 style = \'text-align:center;\'>Ignore Phrase in...</h3>
                
                </div>
                <div class=\"col-md-12\">
                    <br/>
                    <div class = \'col-md-3\'>
                        <br/>
                    </div>
                    <div class = \'col-md-3\' style = \'text-align:center;\'>
                        <a class = \"btn btn-warning\" ng-click=\"setIgnore()\">Only this File</a>
                    </div>
                    <div class = \'col-md-3\'style = \'text-align:center;\'>
                        <a class = \"btn btn-danger\" ng-click=\"setIgnoreAll()\">In All Files</a>
                    </div>
                    <div class = \'col-md-3\'>
                        <br/>
                    </div>
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
                ),
                'w1' => '100%',
                'w2' => '50%',
                'type' => 'ColumnField',
            ),
        );
    }

}