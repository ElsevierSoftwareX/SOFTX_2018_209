<?php

class AdminSearch extends CPhrase {

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
            'inlineJS' => 'search.js',
        );
    }

    public function getFields() {
        return array (
            array (
                'linkBar' => array (
                    array (
                        'type' => 'Text',
                    ),
                ),
                'showSectionTab' => 'No',
                'type' => 'ActionBar',
            ),
            array (
                'type' => 'Text',
                'value' => '<br/>
<br/>
<div class = \'col-md-3\'></div>',
            ),
            array (
                'type' => 'Text',
                'value' => '
<div class = \'col-md-6\'>',
            ),
            array (
                'name' => 'word',
                'labelWidth' => '',
                'fieldWidth' => '12',
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
                'type' => 'Text',
                'value' => '</div>
<div class = \'col-md-3\' style = \'padding-left:0px;\'>',
            ),
            array (
                'buttonType' => 'primary',
                'icon' => 'search',
                'options' => array (
                    'ng-click' => 'searchWord()',
                ),
                'type' => 'LinkButton',
            ),
            array (
                'renderInEditor' => 'Yes',
                'type' => 'Text',
                'value' => '<div class = \'btn btn-default btn-xs\' ng-click = \'openBox()\' style = \'margin-left:20px;color:blue; font-size:11pt; border:none;\'>Advance Search</div>',
            ),
            array (
                'type' => 'Text',
                'value' => '</div>',
            ),
            array (
                'type' => 'Text',
                'value' => '<div class = \'col-md-12\' ng-if = \'openAs\' style = \'padding:20px; margin:50px;\'>
        ',
            ),
            array (
                'type' => 'Text',
                'value' => '    <div class = \'col-md-2\'></div>
    <div class = \'col-md-8\' style = \'border:5px solid green\'>
',
            ),
            array (
                'type' => 'Text',
                'value' => '<div class = \'col-md-12\'>
    <div class = \'col-md-3\'><br/></div>
    <div class = \'col-md-6\'><br/>',
            ),
            array (
                'label' => 'Tag Operator',
                'name' => 'tagoperatornode',
                'defaultType' => 'first',
                'list' => array (
                    'empty' => '==Empty==',
                    'or' => 'OR',
                    'and' => 'AND',
                ),
                'labelWidth' => '3',
                'fieldWidth' => '9',
                'type' => 'DropDownList',
            ),
            array (
                'name' => 'tagsearchnode',
                'fieldTemplate' => 'form',
                'templateForm' => 'app.modules.admin.forms.AdminSubformsearch',
                'label' => 'Tag Node',
                'labelWidth' => '3',
                'fieldWidth' => '9',
                'singleViewOption' => array (
                    'name' => 'val',
                    'fieldType' => 'text',
                    'labelWidth' => 0,
                    'fieldWidth' => 12,
                    'fieldOptions' => array (
                        'ng-delay' => 500,
                    ),
                ),
                'type' => 'ListView',
            ),
            array (
                'type' => 'Text',
                'value' => '    <br/></div>
    <div class = \'col-md-3\'><br/></div>
</div>',
            ),
            array (
                'type' => 'Text',
                'value' => '<div class = \'col-md-6\'>',
            ),
            array (
                'label' => 'Second Left Word',
                'name' => 'rbl2',
                'listExpr' => '[\'anything\'=>\'Anything\',
\'empty\'=>\'Is Empty\',
\'match\'=>\'Match\']',
                'type' => 'RadioButtonList',
            ),
            array (
                'type' => 'Text',
                'value' => '<div ng-if = \"model.rbl2==\'match\'\" class = \'col-md-12\' style = \'border-left:5px solid yellow; margin-bottom: 20px;\'>
 <br/>
    
    ',
            ),
            array (
                'label' => 'Word',
                'name' => 'word_l2',
                'labelWidth' => '3',
                'fieldWidth' => '9',
                'options' => array (
                    'ng-if' => 'model.rbl2==\'match\'',
                ),
                'type' => 'TextField',
            ),
            array (
                'label' => 'Tag Operator',
                'name' => 'tagoperatorl2',
                'options' => array (
                    'ng-if' => 'model.rbl2==\'match\'',
                ),
                'defaultType' => 'first',
                'list' => array (
                    'empty' => '==Empty==',
                    'or' => 'OR',
                    'and' => 'AND',
                ),
                'labelWidth' => '3',
                'fieldWidth' => '9',
                'type' => 'DropDownList',
            ),
            array (
                'name' => 'tagsearchl2',
                'fieldTemplate' => 'form',
                'templateForm' => 'app.modules.admin.forms.AdminSubformsearch',
                'label' => 'Tag',
                'labelWidth' => '3',
                'fieldWidth' => '9',
                'options' => array (
                    'ng-if' => 'model.rbl2==\'match\'',
                ),
                'singleViewOption' => array (
                    'name' => 'val',
                    'fieldType' => 'text',
                    'labelWidth' => 0,
                    'fieldWidth' => 12,
                    'fieldOptions' => array (
                        'ng-delay' => 500,
                    ),
                ),
                'type' => 'ListView',
            ),
            array (
                'type' => 'Text',
                'value' => '<br/>
</div>',
            ),
            array (
                'label' => 'First Left Word',
                'name' => 'rbl1',
                'listExpr' => '[\'anything\'=>\'Anything\',
\'empty\'=>\'Is Empty\',
\'match\'=>\'Match\']',
                'type' => 'RadioButtonList',
            ),
            array (
                'type' => 'Text',
                'value' => '<div ng-if = \"model.rbl1==\'match\'\" class = \'col-md-12\' style = \'border-left:5px solid yellow; margin-bottom: 20px;\'>
 <br/>
    
    ',
            ),
            array (
                'label' => 'Word',
                'name' => 'word_l1',
                'labelWidth' => '3',
                'fieldWidth' => '9',
                'type' => 'TextField',
            ),
            array (
                'label' => 'Tag Operator',
                'name' => 'tagoperatorl1',
                'defaultType' => 'first',
                'list' => array (
                    'empty' => '==Empty==',
                    'or' => 'OR',
                    'and' => 'AND',
                ),
                'labelWidth' => '3',
                'fieldWidth' => '9',
                'type' => 'DropDownList',
            ),
            array (
                'name' => 'tagsearchl1',
                'fieldTemplate' => 'form',
                'templateForm' => 'app.modules.admin.forms.AdminSubformsearch',
                'label' => 'Tag',
                'labelWidth' => '3',
                'fieldWidth' => '9',
                'singleViewOption' => array (
                    'name' => 'val',
                    'fieldType' => 'text',
                    'labelWidth' => 0,
                    'fieldWidth' => 12,
                    'fieldOptions' => array (
                        'ng-delay' => 500,
                    ),
                ),
                'type' => 'ListView',
            ),
            array (
                'type' => 'Text',
                'value' => '<br/>
</div>',
            ),
            array (
                'type' => 'Text',
                'value' => '</div>',
            ),
            array (
                'type' => 'Text',
                'value' => '<div class = \'col-md-6\'>',
            ),
            array (
                'label' => 'First Right Word',
                'name' => 'rbr1',
                'listExpr' => '[\'anything\'=>\'Anything\',
\'empty\'=>\'Is Empty\',
\'match\'=>\'Match\']',
                'type' => 'RadioButtonList',
            ),
            array (
                'type' => 'Text',
                'value' => '<div ng-if = \"model.rbr1==\'match\'\" class = \'col-md-12\' style = \'border-left:5px solid yellow; margin-bottom: 20px;\'>
 <br/>
    
    ',
            ),
            array (
                'label' => 'Word',
                'name' => 'word_r1',
                'labelWidth' => '3',
                'fieldWidth' => '9',
                'type' => 'TextField',
            ),
            array (
                'label' => 'Tag Operator',
                'name' => 'tagoperatorr1',
                'defaultType' => 'first',
                'list' => array (
                    'empty' => '==Empty==',
                    'or' => 'OR',
                    'and' => 'AND',
                ),
                'labelWidth' => '3',
                'fieldWidth' => '9',
                'type' => 'DropDownList',
            ),
            array (
                'name' => 'tagsearchr1',
                'fieldTemplate' => 'form',
                'templateForm' => 'app.modules.admin.forms.AdminSubformsearch',
                'label' => 'Tag',
                'labelWidth' => '3',
                'fieldWidth' => '9',
                'singleViewOption' => array (
                    'name' => 'val',
                    'fieldType' => 'text',
                    'labelWidth' => 0,
                    'fieldWidth' => 12,
                    'fieldOptions' => array (
                        'ng-delay' => 500,
                    ),
                ),
                'type' => 'ListView',
            ),
            array (
                'type' => 'Text',
                'value' => '<br/>
</div>',
            ),
            array (
                'label' => 'Second Right Word',
                'name' => 'rbr2',
                'listExpr' => '[\'anything\'=>\'Anything\',
\'empty\'=>\'Is Empty\',
\'match\'=>\'Match\']',
                'type' => 'RadioButtonList',
            ),
            array (
                'type' => 'Text',
                'value' => '<div ng-if = \"model.rbr2==\'match\'\" class = \'col-md-12\' style = \'border-left:5px solid yellow; margin-bottom: 20px;\'>
 <br/>
    
    ',
            ),
            array (
                'label' => 'Word',
                'name' => 'word_r2',
                'labelWidth' => '3',
                'fieldWidth' => '9',
                'type' => 'TextField',
            ),
            array (
                'label' => 'Tag Operator',
                'name' => 'tagoperatorr2',
                'defaultType' => 'first',
                'list' => array (
                    'empty' => '==Empty==',
                    'or' => 'OR',
                    'and' => 'AND',
                ),
                'labelWidth' => '3',
                'fieldWidth' => '9',
                'type' => 'DropDownList',
            ),
            array (
                'name' => 'tagsearchr2',
                'fieldTemplate' => 'form',
                'templateForm' => 'app.modules.admin.forms.AdminSubformsearch',
                'label' => 'Tag',
                'labelWidth' => '3',
                'fieldWidth' => '9',
                'singleViewOption' => array (
                    'name' => 'val',
                    'fieldType' => 'text',
                    'labelWidth' => 0,
                    'fieldWidth' => 12,
                    'fieldOptions' => array (
                        'ng-delay' => 500,
                    ),
                ),
                'type' => 'ListView',
            ),
            array (
                'type' => 'Text',
                'value' => '<br/>
</div>',
            ),
            array (
                'type' => 'Text',
                'value' => '</div>',
            ),
            array (
                'renderInEditor' => 'Yes',
                'type' => 'Text',
                'value' => '<div class = \'col-md-12\' style = \'text-align:center;margin-bottom:20px;\'>
    <div class = \'btn btn-success btn-xl\' ng-click = \'searchASWord()\'>
        <i class = \'fa fa-search\'></i> Search
    </div>
</div>
<br/>',
            ),
            array (
                'type' => 'Text',
                'value' => '
    </div>
    <div class = \'col-md-2\'></div>
</div>',
            ),
            array (
                'type' => 'Text',
                'value' => '<br/>
<br/>
<br/>
<br/>',
            ),
            array (
                'type' => 'Text',
                'value' => '<div class = \'row\'>
    <div class = \'col-md-4\'></div>
    <div class = \'col-md-4\' style = \'background-color:white; text-align:center;\'>
        <h2>Total:{{dssum.data[0].sum}}</h2>
    </div>
    <div class = \'col-md-4\'></div>
</div>',
            ),
            array (
                'name' => 'dataFilter1',
                'datasource' => 'dsPhrase',
                'filters' => array (
                    array (
                        'name' => 'word_l2',
                        'label' => 'Word L2',
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
                        'name' => 'tagset_word_l2',
                        'label' => 'Tagset Word L2',
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
                        'name' => 'word_l1',
                        'label' => 'Word L1',
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
                        'name' => 'tagset_word_l1',
                        'label' => 'Tagset Word L1',
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
                        'name' => 'word',
                        'label' => 'Word',
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
                        'name' => 'tagset_word',
                        'label' => 'Tagset Word',
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
                        'name' => 'word_r1',
                        'label' => 'Word R1',
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
                        'name' => 'tagset_word_r1',
                        'label' => 'Tagset Word R1',
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
                        'name' => 'word_r2',
                        'label' => 'Word R2',
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
                        'name' => 'tagset_word_r2',
                        'label' => 'Tagset Word R2',
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
                        'name' => 'count',
                        'label' => 'Count',
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
                'name' => 'dsPhrase',
                'fieldType' => 'phpsql',
                'sql' => 'SELECT *
FROM c_phrase
{[where]} {[order]} {[paging]}',
                'php' => 'CPhrase::getSearch($params)',
                'postData' => 'No',
                'params' => array (
                    ':word_l2' => 'js:dataFilter1.filters[0].value',
                    ':word_l1' => 'js:dataFilter1.filters[2].value',
                    ':word' => 'js:dataFilter1.filters[4].value',
                    ':word_r1' => 'js:dataFilter1.filters[6].value',
                    ':word_r2' => 'js:dataFilter1.filters[8].value',
                    ':tagset_word' => 'js:model.tagsearchnode',
                    ':tagset_word_l2' => 'js:model.tagsearchl2',
                    ':tagset_word_l1' => 'js:model.tagsearchl1',
                    ':tagset_word_r1' => 'js:model.tagsearchr1',
                    ':tagset_word_r2' => 'js:model.tagsearchr2',
                    ':tagop_word' => 'js:model.tagoperatornode',
                    ':tagop_word_l1' => 'js:model.tagoperatorl1',
                    ':tagop_word_l2' => 'js:model.tagoperatorl2',
                    ':tagop_word_r1' => 'js:model.tagoperatorr1',
                    ':tagop_word_r2' => 'js:model.tagoperatorr2',
                ),
                'enablePaging' => 'Yes',
                'pagingSQL' => 'SELECT COUNT(1)
FROM c_phrase
{[where]}',
                'pagingPHP' => 'CPhrase::getCountSearch($params)',
                'relationTo' => 'currentModel',
                'type' => 'DataSource',
            ),
            array (
                'name' => 'dssum',
                'fieldType' => 'phpsql',
                'sql' => 'SELECT *
FROM c_phrase
{[where]} {[order]} {[paging]}',
                'php' => 'CPhrase::getSumSearch($params)',
                'postData' => 'No',
                'params' => array (
                    ':word_l2' => 'js:dataFilter1.filters[0].value',
                    ':word_l1' => 'js:dataFilter1.filters[2].value',
                    ':word' => 'js:dataFilter1.filters[4].value',
                    ':word_r1' => 'js:dataFilter1.filters[6].value',
                    ':word_r2' => 'js:dataFilter1.filters[8].value',
                    ':tagset_word' => 'js:model.tagsearchnode',
                    ':tagset_word_l2' => 'js:model.tagsearchl2',
                    ':tagset_word_l1' => 'js:model.tagsearchl1',
                    ':tagset_word_r1' => 'js:model.tagsearchr1',
                    ':tagset_word_r2' => 'js:model.tagsearchr2',
                    ':tagop_word' => 'js:model.tagoperatornode',
                    ':tagop_word_l1' => 'js:model.tagoperatorl1',
                    ':tagop_word_l2' => 'js:model.tagoperatorl2',
                    ':tagop_word_r1' => 'js:model.tagoperatorr1',
                    ':tagop_word_r2' => 'js:model.tagoperatorr2',
                ),
                'pagingSQL' => 'SELECT COUNT(1)
FROM c_phrase
{[where]}',
                'pagingPHP' => 'CPhrase::getCountSearch($params)',
                'relationTo' => 'currentModel',
                'type' => 'DataSource',
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
                        'name' => 'phrase',
                        'label' => 'Phrase',
                        'html' => '',
                        'columnType' => 'string',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'headers' => array (
                            'r2' => array (
                                'colSpan' => 1,
                                'label' => '',
                            ),
                        ),
                        'options' => array (
                            'width' => '',
                        ),
                    ),
                    array (
                        'name' => 'word_l2',
                        'label' => 'Word',
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
                                'label' => 'Second Left',
                            ),
                        ),
                    ),
                    array (
                        'name' => 'tagset_word_l2',
                        'label' => 'Tagset',
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
                        'label' => 'Word',
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
                                'label' => 'First Left',
                            ),
                        ),
                    ),
                    array (
                        'name' => 'tagset_word_l1',
                        'label' => 'Tagset',
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
                        'label' => 'Word',
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
                                'label' => 'Node',
                            ),
                        ),
                    ),
                    array (
                        'name' => 'tagset_word',
                        'label' => 'Tagset',
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
                        'label' => 'Word',
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
                                'label' => 'First Right',
                            ),
                        ),
                    ),
                    array (
                        'name' => 'tagset_word_r1',
                        'label' => 'Tagset',
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
                        'label' => 'Word',
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
                                'label' => 'Second Right',
                            ),
                        ),
                    ),
                    array (
                        'name' => 'tagset_word_r2',
                        'label' => 'Tagset',
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
                        'name' => 'count',
                        'label' => 'Count',
                        'html' => '',
                        'columnType' => 'string',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'headers' => array (
                            'r2' => array (
                                'colSpan' => 1,
                                'label' => '',
                            ),
                        ),
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