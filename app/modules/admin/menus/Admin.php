<?php 

## AUTOGENERATED OPTIONS - DO NOT EDIT
$options = array (
    'mode' => 'normal',
);
## END OF AUTOGENERATED OPTIONS

return array (
    array (
        'label' => 'Pencarian',
        'icon' => 'fa-search',
        'url' => '/admin/search',
        'formattedUrl' => '/index.php?r=admin/search',
    ),
    array (
        'label' => 'Pengelolaan',
        'icon' => '',
        'url' => '#',
        'state' => 'collapsed',
        'items' => array (
            array (
                'label' => 'File',
                'icon' => '',
                'url' => '/admin/index',
                'formattedUrl' => '/index.php?r=admin/index',
            ),
            array (
                'label' => 'Kamus Kata',
                'icon' => '',
                'url' => 'admin/wordClass',
            ),
            array (
                'label' => 'Master Tagset',
                'icon' => '',
                'url' => '/admin/mTagset',
                'formattedUrl' => '/index.php?r=admin/mTagset',
            ),
        ),
    ),
);