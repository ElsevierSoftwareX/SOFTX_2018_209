<?php

class AppHome extends Form {

    public function getForm() {
        return array (
            'title' => 'Home',
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
                'type' => 'Text',
                'value' => '<style>
/* body {
    background: url(\"app/static/img/pabrik.jpg\") no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
} */
.outer {
    display: table;
    position: absolute;
    height: 100%;
    width: 100%;
}

.middle {
    display: table-cell;
    vertical-align: middle;
}

.inner {
    margin-left: auto;
    margin-right: auto; 
    margin-top:-10%;
    
}
.default-content-panel {
    background-color: rgba(255, 255, 255, 0.3);
    margin:30px 15px 0px 15px;
    padding:20px;
}
.column-field-cell {
    vertical-align: middle !important;
}
</style>',
            ),
            array (
                'type' => 'Text',
                'value' => '<div class=\"outer\">
  <div class=\"middle\">
    <div class=\"inner\">
',
            ),
            array (
                'totalColumns' => '3',
                'column2' => array (
                    array (
                        'type' => 'Text',
                        'value' => '<div class=\\"default-content-panel\\" style=\\"background-color: rgba(255, 255, 255, 0.6);\\">',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<div style=\"text-align: center;\">
    <img src=\"app/static/img/logo.png\" width=\"230\">
</div>
<br>
<h1>
    Selamat datang!
    <br>
    <small>
        Ini adalah laman resmi pencarian kata dalam Korpus Indonesia (KOIN).
    </small>
</h1>
<br>
<hr>
<br>
<h3 style=\"text-align: center;\">Pilihan menu pencarian:</h3>
<div class=\"row\">
    <a class=\"btn btn-default col-md-3\" ng-url=\"/site/freq\">Frekuensi</a>
    <a class=\"btn btn-default col-md-3\" ng-url=\"/site/sentences\">Kalimat</a>
    <a class=\"btn btn-default col-md-3\" ng-url=\"/site/kolokat\">Kolokat</a>
    <a class=\"btn btn-default col-md-3\" ng-url=\"/site/search\">Kelas Kata</a>
</div>
',
                    ),
                    array (
                        'type' => 'Text',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '</div>',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                ),
                'w1' => '20%',
                'w2' => '60%',
                'w3' => '20%',
                'type' => 'ColumnField',
            ),
            array (
                'type' => 'Text',
                'value' => '
    </div>
  </div>
</div>',
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