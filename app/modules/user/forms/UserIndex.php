<?php

class UserIndex extends Form {

    public function getForm() {
        return array (
            'title' => 'Daftar ',
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
        );
    }

}