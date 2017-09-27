<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_street',
        'label' => 'street',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'default_sortby' => 'ORDER BY street',
        'versioningWS' => 2,
        'versioning_followPages' => true,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime'
        ],
        'searchFields' => 'street',
        'dynamicConfigFile' => 'EXT:schooldirectory/Configuration/TCA/Street.php',
        'iconfile' => 'EXT:schooldirectory/Resources/Public/Icons/tx_schooldirectory_domain_model_street.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, street, number_from, letter_from, number_to, letter_to, district'
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, street, number_from, letter_from, number_to, letter_to, district,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime']
    ],
    'palettes' => [
        '1' => ['showitem' => '']
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => [
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1],
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0]
                ]
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'items' => [
                    ['', 0]
                ],
                'foreign_table' => 'tx_schooldirectory_domain_model_street',
                'foreign_table_where' => 'AND tx_schooldirectory_domain_model_street.pid=###CURRENT_PID### AND tx_schooldirectory_domain_model_street.sys_language_uid IN (-1,0)'
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255
            ]
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check'
            ]
        ],
        'starttime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ]
            ]
        ],
        'endtime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ]
            ]
        ],
        'street' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_street.street',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'number_from' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_street.number_from',
            'config' => [
                'type' => 'input',
                'size' => 11,
                'eval' => 'int'
            ]
        ],
        'letter_from' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_street.letter_from',
            'config' => [
                'type' => 'input',
                'size' => 5,
                'eval' => 'trim'
            ]
        ],
        'number_to' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_street.number_to',
            'config' => [
                'type' => 'input',
                'size' => 11,
                'eval' => 'int'
            ]
        ],
        'letter_to' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_street.letter_to',
            'config' => [
                'type' => 'input',
                'size' => 5,
                'eval' => 'trim'
            ]
        ],
        'district' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_street.district',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_schooldirectory_domain_model_schooldistrict',
                'minitems' => 0,
                'maxitems' => 1
            ]
        ]
    ]
];
