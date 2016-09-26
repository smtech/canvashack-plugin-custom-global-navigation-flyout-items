<?php

require_once __DIR__ . '/../common.inc.php';

if (file_exists(__DIR__ . '/manifest.xml')) {
    $manifest = simplexml_load_string(file_get_contents(__DIR__ . '/manifest.xml'));
}

$pluginMetadata = new Battis\AppMetadata($sql, (string) $manifest->id);

/*
$pluginMetadata['ITEMS'] = [
    [
        'menu' => '#global_nav_profile_header',
        'title' => 'Arc',
        'url' => '/users/@USER_ID/external_tools/1260'
    ],
    [
        'menu' => '#global_nav_profile_header',
        'title' => 'My Badges',
        'url' => '/users/@USER_ID/external_tools/1218'
    ]
];
*/
