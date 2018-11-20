<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'School Directory',
    'description' => 'schooldirectory',
    'category' => 'plugin',
    'author' => 'Stefan Froemken',
    'author_email' => 'froemken@gmail.com',
    'author_company' => 'jweiland.net',
    'shy' => '',
    'priority' => '',
    'module' => '',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '1',
    'createDirs' => '',
    'modify_tables' => '',
    'clearCacheOnLoad' => 0,
    'lockType' => '',
    'version' => '2.2.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-8.7.99',
            'maps2' => '4.2.0-4.9.99'
        ],
        'conflicts' => [],
        'suggests' => []
    ]
];
