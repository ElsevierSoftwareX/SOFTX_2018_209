<?php

class AppBak extends CPhrase {

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
                'type' => 'Text',
                'value' => '<style>
    .default-content-panel {
        background-color: rgba(255, 255, 255, 0.8);
        margin:30px 15px 0px 15px;
        padding:20px;
    }
    body {
     background-color: #f5f5f5;
     background-image:url(\'app/static/img/bg.png\');
     background-repeat: repeat; 
     background-attachment: fixed;    
     background-position: bottom;
     background-size: 30%;
    }
    #content > div > .stretch {
        top: 0px !important;
    }
/* The side navigation menu */
.sidenav {
    height: 100%; /* 100% Full-height */
    width: 0; /* 0 width - change this with JavaScript */
    position: fixed; /* Stay in place */
    z-index: 6; /* Stay on top */
    top: 0; /* Stay at the top */
    left: 0;
    background-color: #111; /* Black*/
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 60px; /* Place content 60px from the top */
    transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}

/* The navigation menu links */
.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
    color: #f1f1f1;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
    transition: margin-left .5s;
    padding: 20px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
    
    #sidebar-btn{
    	display:inline-block;
    	vertical-align: middle;
    	width:20px;
    	height:15px;
    	cursor:pointer;
    	margin:20px;
    	position:absolute;
    	top:0px;
    	left:0px;
    	
      display: inline-block;
	    text-transform: uppercase;
      text-decoration: none;
	/* letter-spacing: 5px; */
	color: #FAFAFA;
	padding: 33px;
  
	transform: translate(-50%, -50%);
	-webkit-transform: translate(-50%, -50%);
	-moz-transform: translate(-50%, -50%);
	-ms-transform: translate(-50%, -50%);
	-o-transform: translate(-50%, -50%);
	background: rgba(0,0,0,0.5);
	@include fade-transition(background);

	&:hover {
		background: rgba(8,97,76,0.6);
	}
    }

    
    #sidebar-btn i {
/*   positioning */
		position: absolute;
		opacity: 0;
		top: 0;
		left: 0;
  
/*   gradient   */
		background: -moz-linear-gradient(left,  rgba(255,255,255,0) 0%, rgba(255,255,255,0.03) 1%, rgba(255,255,255,0.6) 30%, rgba(255,255,255,0.85) 50%, rgba(255,255,255,0.85) 70%, rgba(255,255,255,0.85) 71%, rgba(255,255,255,0) 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(255,255,255,0)), color-stop(1%,rgba(255,255,255,0.03)), color-stop(30%,rgba(255,255,255,0.85)), color-stop(50%,rgba(255,255,255,0.85)), color-stop(70%,rgba(255,255,255,0.85)), color-stop(71%,rgba(255,255,255,0.85)), color-stop(100%,rgba(255,255,255,0))); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(left,  rgba(255,255,255,0) 0%,rgba(255,255,255,0.03) 1%,rgba(255,255,255,0.6) 30%,rgba(255,255,255,0.85) 50%,rgba(255,255,255,0.85) 70%,rgba(255,255,255,0.85) 71%,rgba(255,255,255,0) 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(left,  rgba(255,255,255,0) 0%,rgba(255,255,255,0.03) 1%,rgba(255,255,255,0.6) 30%,rgba(255,255,255,0.85) 50%,rgba(255,255,255,0.85) 70%,rgba(255,255,255,0.85) 71%,rgba(255,255,255,0) 100%); /* Opera 11.10+ */
		background: -ms-linear-gradient(left,  rgba(255,255,255,0) 0%,rgba(255,255,255,0.03) 1%,rgba(255,255,255,0.6) 30%,rgba(255,255,255,0.85) 50%,rgba(255,255,255,0.85) 70%,rgba(255,255,255,0.85) 71%,rgba(255,255,255,0) 100%); /* IE10+ */
		background: linear-gradient(to right,  rgba(255,255,255,0) 0%,rgba(255,255,255,0.03) 1%,rgba(255,255,255,0.6) 30%,rgba(255,255,255,0.85) 50%,rgba(255,255,255,0.85) 70%,rgba(255,255,255,0.85) 71%,rgba(255,255,255,0) 100%); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#00ffffff\', endColorstr=\'#00ffffff\',GradientType=1 ); /* IE6-9 */
    
/*  forming the shine element
    play around with the width, skew and gradient to get different effects
  */
		width: 15%;
		height: 100%;
     transform: skew(-10deg,0deg);
		-webkit-transform: skew(-10deg,0deg);
     -moz-transform: skew(-10deg,0deg);
     -ms-transform: skew(-10deg,0deg);
     -o-transform: skew(-10deg,0deg);
  
/*  animating it  */
     animation: move 2s;
		animation-iteration-count: infinite;
		animation-delay: 1s;
		-webkit-animation: move 2s;
		-webkit-animation-iteration-count: infinite;
		-webkit-animation-delay: 1s;
		-moz-transform: skew(-10deg,0deg);
		-moz-animation: move 2s;
		-moz-animation-iteration-count: infinite;
		-moz-animation-delay: 1s;
		-ms-transform: skew(-10deg,0deg);
		-ms-animation: move 2s;
		-ms-animation-iteration-count: infinite;
		-ms-animation-delay: 1s;
		-o-transform: skew(-10deg,0deg);
		-o-animation: move 2s;
		-o-animation-iteration-count: infinite;
		-o-animation-delay: 1s;
	}

/*  */
@keyframes move {
	0%  { left: 0; opacity: 0; }
	5% {opacity: 0.0}
	48% {opacity: 0.2}
	80% {opacity: 0.0}
	100% { left: 82%}
}

@-webkit-keyframes move {
	0%  { left: 0; opacity: 0; }
	5% {opacity: 0.0}
	48% {opacity: 0.2}
	80% {opacity: 0.0}
	100% { left: 82%}
}

@-moz-keyframes move {
	0%  { left: 0; opacity: 0; }
	5% {opacity: 0.0}
	48% {opacity: 0.2}
	80% {opacity: 0.0}
	100% { left: 88%}
}

@-ms-keyframes move {
	0%  { left: 0; opacity: 0; }
	5% {opacity: 0.0}
	48% {opacity: 0.2}
	80% {opacity: 0.0}
	100% { left: 82%}
}

@-o-keyframes move {
	0%  { left: 0; opacity: 0; }
	5% {opacity: 0.0}
	48% {opacity: 0.2}
	80% {opacity: 0.0}
	100% { left: 82%}
}
</style>',
            ),
            array (
                'type' => 'Text',
                'value' => '<div id=\"mySidenav\" class=\"sidenav\">
  <a href=\"javascript:void(0)\" class=\"closebtn\" ng-click=\"closeNav()\">&times;</a>
  <a ng-url=\"/site/search\">Beranda</a>
  <a ng-url=\"/site/about\">Tentang</a>
  <a ng-url=\"/site/login\">Log In</a>
</div>

<div id=\"sidebar-btn\" ng-click=\"openNav()\">
	<div class=\"fa fa-bars fa-2x\" style=\"margin-top: -15px; margin-left: -7px;\"></div>
	<i></i>
</div>

	',
            ),
            array (
                'display' => 'all-line',
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
                'name' => 'cbl',
                'list' => array (
                    'Fisika' => 'Fisika',
                    'Sosial' => 'Sosial',
                    'Kesehatan' => 'Kesehatan',
                    'Hayati' => 'Hayati',
                ),
                'layout' => 'Vertical',
                'itemLayout' => 'Horizontal',
                'type' => 'CheckboxList',
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
                'value' => '<div class = \'btn btn-default btn-xs\' ng-click = \'openBox()\' style = \'margin-left:20px;color:blue; font-size:11pt; border:none;\'>Pencarian Lebih Lanjut</div>',
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
    <div class = \'col-md-8\' style = \'border:5px solid green; background: white;\'>
',
            ),
            array (
                'display' => 'all-line',
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
                'templateForm' => 'app.forms.AppSubform',
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
                'display' => 'all-line',
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
\'match\'=>\'Match\']',
                'type' => 'RadioButtonList',
            ),
            array (
                'display' => 'all-line',
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
                'templateForm' => 'app.forms.AppSubform',
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
\'match\'=>\'Match\']',
                'type' => 'RadioButtonList',
            ),
            array (
                'display' => 'all-line',
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
                'templateForm' => 'app.forms.AppSubform',
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
\'match\'=>\'Match\']',
                'type' => 'RadioButtonList',
            ),
            array (
                'display' => 'all-line',
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
                'templateForm' => 'app.forms.AppSubform',
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
\'match\'=>\'Match\']',
                'type' => 'RadioButtonList',
            ),
            array (
                'display' => 'all-line',
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
                'templateForm' => 'app.forms.AppSubform',
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
        <i class = \'fa fa-search\'></i> Cari
    </div>
</div>
<br/>',
            ),
            array (
                'display' => 'all-line',
                'type' => 'Text',
                'value' => '
    </div>
    <div class = \'col-md-2\'></div>
</div>',
            ),
            array (
                'display' => 'all-line',
                'type' => 'Text',
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
                    ':cbl' => 'js:model.cbl',
                ),
                'enablePaging' => 'Yes',
                'pagingSQL' => 'SELECT COUNT(1)
FROM c_phrase
{[where]}',
                'pagingPHP' => 'CPhrase::getCountSearch($params)',
                'relationTo' => 'currentModel',
                'execMode' => 'manual',
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
                    ':cbl' => 'js:model.cbl',
                ),
                'pagingSQL' => 'SELECT COUNT(1)
FROM c_phrase
{[where]}',
                'pagingPHP' => 'CPhrase::getCountSearch($params)',
                'relationTo' => 'currentModel',
                'type' => 'DataSource',
            ),
            array (
                'name' => 'kolokatRsatu',
                'fieldType' => 'phpsql',
                'php' => 'CPhrase::getKolokatRsatu($params);',
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
                    ':cbl' => 'js:model.cbl',
                ),
                'type' => 'DataSource',
            ),
            array (
                'name' => 'kolokatLsatu',
                'fieldType' => 'phpsql',
                'php' => 'CPhrase::getKolokatLsatu($params);',
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
                    ':cbl' => 'js:model.cbl',
                ),
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
                        'display' => 'all-line',
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
                            ),
                        ),
                        'options' => array (
                            'ng-show' => 'true',
                        ),
                        'type' => 'DataFilter',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<div ng-if=\\"dsPhrase.data.length > 0\\">',
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
                            array (
                                'name' => 'count',
                                'label' => 'Jumlah',
                                'html' => '<td ng-class=\"rowClass(row, \'count\', \'string\')\" >
    {{row[\'count\']}}
</td>',
                                'columnType' => 'string',
                                '$listViewName' => 'columns',
                                '$showDF' => false,
                                'headers' => array (
                                    'r2' => array (
                                        'colSpan' => 1,
                                        'label' => '',
                                    ),
                                ),
                                'mergeSameRow' => 'No',
                                'cellMode' => 'default',
                            ),
                            array (
                                'name' => 'category',
                                'label' => 'Kategori',
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
                        ),
                    ),
                    array (
                        'column1' => array (
                            array (
                                'display' => 'all-line',
                                'type' => 'Text',
                                'value' => '<blockquote>
    <h2>
        Kolokat L1 (25 teratas)
    </h2>
    <ol>
        <li  ng-repeat=\"n in kolokatLsatu.data\">{{n.word_l1}} ({{n.count}})</li>
    </ol>
</blockquote>',
                            ),
                            array (
                                'type' => 'Text',
                                'value' => '<column-placeholder></column-placeholder>',
                            ),
                        ),
                        'column2' => array (
                            array (
                                'display' => 'all-line',
                                'type' => 'Text',
                                'value' => '<blockquote>
    <h2>
        Kolokat R1 (25 teratas)
    </h2>
    <ol>
        <li ng-repeat=\"n in kolokatRsatu.data\">{{n.word_r1}} ({{n.count}})</li>
    </ol>
</blockquote>',
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
                        'value' => '</div>',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '</div>',
                    ),
                ),
                'w1' => '100%',
                'w2' => '50%',
                'options' => array (
                    'ng-show' => 'dsPhrase.data.length > 0',
                ),
                'type' => 'ColumnField',
            ),
            array (
                'type' => 'Text',
                'value' => '<br/>
<br/>',
            ),
        );
    }

}