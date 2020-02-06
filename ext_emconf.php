<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'School Directory',
    'description' => 'This is a TYPO3 extension to manage schools',
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
    'version' => '3.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.5.99',
            'maps2' => '7.1.3-7.99.99'
        ],
        'conflicts' => [],
        'suggests' => []
    ]
];
