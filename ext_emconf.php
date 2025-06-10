<?php

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

$EM_CONF[$_EXTKEY] = [
    'title' => 'School Directory',
    'description' => 'This is a TYPO3 extension to manage schools',
    'category' => 'plugin',
    'author' => 'Stefan Froemken, Hoja Mustaffa Abdul Latheef',
    'author_email' => 'projects@jweiland.net',
    'author_company' => 'jweiland.net',
    'state' => 'stable',
    'version' => '7.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.9-12.4.99',
            'maps2' => '11.0.0-0.0.0',
            'glossary2' => '6.0.0-0.0.0',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
