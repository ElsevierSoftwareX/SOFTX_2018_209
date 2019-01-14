<?php

class AdminSubformsearch extends Form {

    public function getForm() {
        return array (
            'title' => 'Subformsearch',
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
                'name' => 'tag',
                'labelWidth' => '0',
                'fieldWidth' => '12',
                'modelClass' => 'app.models.MTagset',
                'idField' => 'code',
                'labelField' => 'description',
                'type' => 'RelationField',
            ),
        );
    }

}