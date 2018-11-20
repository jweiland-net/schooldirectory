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
        'versioningWS' => true,
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
        'iconfile' => 'EXT:schooldirectory/Resources/Public/Icons/tx_schooldirectory_domain_model_street.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, street, number_from, letter_from, number_to, letter_to, district'
    ],
    'types' => [
        '1' => [
            'showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden,
            street, number_from, letter_from, number_to, letter_to, district,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access, 
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access'
        ]
    ],
    'palettes' => [
        'access' => [
            'showitem' => 'starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
        ]
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ],
                ],
                'default' => 0,
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_schooldirectory_domain_model_street',
                'foreign_table_where' => 'AND tx_schooldirectory_domain_model_street.pid=###CURRENT_PID### AND tx_schooldirectory_domain_model_street.sys_language_uid IN (-1,0)',
                'fieldWizard' => [
                    'selectIcons' => [
                        'disabled' => true,
                    ],
                ],
                'default' => 0,
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => ''
            ]
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => 0
            ]
        ],
        'cruser_id' => [
            'label' => 'cruser_id',
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'pid' => [
            'label' => 'pid',
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'crdate' => [
            'label' => 'crdate',
            'config' => [
                'type' => 'passthrough',
            ]
        ],
        'tstamp' => [
            'label' => 'tstamp',
            'config' => [
                'type' => 'passthrough',
            ]
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 16,
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 16,
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'street' => [
            'exclude' => true,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_street.street',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'number_from' => [
            'exclude' => true,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_street.number_from',
            'config' => [
                'type' => 'input',
                'size' => 11,
                'eval' => 'int'
            ]
        ],
        'letter_from' => [
            'exclude' => true,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_street.letter_from',
            'config' => [
                'type' => 'input',
                'size' => 5,
                'eval' => 'trim'
            ]
        ],
        'number_to' => [
            'exclude' => true,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_street.number_to',
            'config' => [
                'type' => 'input',
                'size' => 11,
                'eval' => 'int'
            ]
        ],
        'letter_to' => [
            'exclude' => true,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_street.letter_to',
            'config' => [
                'type' => 'input',
                'size' => 5,
                'eval' => 'trim'
            ]
        ],
        'district' => [
            'exclude' => true,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_street.district',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_schooldirectory_domain_model_schooldistrict',
                'minitems' => 0,
                'maxitems' => 1
            ]
        ]
    ]
];
