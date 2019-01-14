<?php

class AdminSubform extends File {

    public function getForm() {
        return array (
            'title' => 'Subform',
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
                'label' => 'Kategori',
                'name' => 'category',
                'defaultType' => 'first',
                'list' => array (
                    'Fisika' => 'Fisika',
                    'Hayati' => 'Hayati',
                    'Kesehatan' => 'Kesehatan',
                    'Sosial' => 'Sosial',
                ),
                'type' => 'DropDownList',
            ),
            array (
                'name' => 'file_url',
                'label' => 'Upload File',
                'fileType' => 'txt',
                'showFileName' => 'Yes',
                'type' => 'UploadFile',
            ),
        );
    }

}