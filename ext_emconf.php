<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'School Directory',
    'description' => 'This is a TYPO3 extension to manage schools',
    'category' => 'plugin',
    'author' => 'Stefan Froemken',
    'author_email' => 'froemken@gmail.com',
    'author_company' => 'jweiland.net',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '5.1.5',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.19-10.4.99',
            'maps2' => '8.0.0-0.0.0',
            'glossary2' => '5.0.0-0.0.0'
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
