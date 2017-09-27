<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'default_sortby' => 'ORDER BY title',
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
        'searchFields' => 'title,leader,street,zip,city,telephone,telephone_alternative,email,email_alternative,website,profile_title,notes,additional_informations',
        'iconfile' => 'EXT:schooldirectory/Resources/Public/Icons/tx_schooldirectory_domain_model_school.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, leader, street, house_number, zip, city, district, telephone, telephone_alternative, fax, email, email_alternative, website, logo, images, amount_of_students, profile_title, school_way_plan, notes, additional_informations, holder, types, profile_contents, care_forms, school_district, tx_maps2_uid, facebook, twitter, google'
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, leader, street, house_number, zip, city, district, telephone, telephone_alternative, fax, email, email_alternative, website, logo, images, amount_of_students, profile_title, school_way_plan, notes, additional_informations,--div--;LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tabs.relations, holder, types, profile_contents, care_forms, school_district, tx_maps2_uid,--div--;LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tabs.social, facebook, twitter, google,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime']
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
                'foreign_table' => 'tx_schooldirectory_domain_model_school',
                'foreign_table_where' => 'AND tx_schooldirectory_domain_model_school.pid=###CURRENT_PID### AND tx_schooldirectory_domain_model_school.sys_language_uid IN (-1,0)'
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
        'title' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'leader' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.leader',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'street' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.street',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'house_number' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.house_number',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'zip' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.zip',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'city' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.city',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'district' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.district',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_schooldirectory_domain_model_district',
                'foreign_table_where' => 'ORDER BY tx_schooldirectory_domain_model_district.district',
                'items' => [
                    ['', '']
                ],
                'minitems' => 0,
                'maxitems' => 1
            ]
        ],
        'telephone' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.telephone',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'telephone_alternative' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.telephone_alternative',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'fax' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.fax',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'email' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'email_alternative' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.email_alternative',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'website' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.website',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'wizards' => [
                    '_PADDING' => 2,
                    'link' => [
                        'type' => 'popup',
                        'title' => 'Link',
                        'icon' => 'link_popup.gif',
                        'script' => 'browse_links.php?mode=wizard',
                        'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                        'module' => [
                            'name' => 'wizard_link'
                        ]
                    ]
                ],
                'softref' => 'typolink[linkList]'
            ]
        ],
        'logo' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.logo',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'logo',
                [
                    'minitems' => 0,
                    'maxitems' => 1
                ]
            )
        ],
        'images' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.images',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'images',
                [
                    'minitems' => 0,
                    'maxitems' => 5
                ]
            )
        ],
        'amount_of_students' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.amount_of_students',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'profile_title' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.profile_title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'school_way_plan' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.school_way_plan',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'wizards' => [
                    '_PADDING' => 2,
                    'link' => [
                        'type' => 'popup',
                        'title' => 'Link',
                        'icon' => 'link_popup.gif',
                        'script' => 'browse_links.php?mode=wizard',
                        'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                        'module' => [
                            'name' => 'wizard_link'
                        ]
                    ]
                ],
                'softref' => 'typolink[linkList]'
            ]
        ],
        'notes' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.notes',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'wizards' => [
                    'RTE' => [
                        'icon' => 'wizard_rte2.gif',
                        'notNewRecords' => 1,
                        'RTEonly' => 1,
                        'script' => 'wizard_rte.php',
                        'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
                        'type' => 'script',
                        'module' => [
                            'name' => 'wizard_rte'
                        ]
                    ]
                ]
            ],
            'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]'
        ],
        'additional_informations' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.additional_informations',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'wizards' => [
                    'RTE' => [
                        'icon' => 'wizard_rte2.gif',
                        'notNewRecords' => 1,
                        'RTEonly' => 1,
                        'script' => 'wizard_rte.php',
                        'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
                        'type' => 'script',
                        'module' => [
                            'name' => 'wizard_rte'
                        ]
                    ]
                ]
            ],
            'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]'
        ],
        'holder' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.holder',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_schooldirectory_domain_model_holder',
                'minitems' => 0,
                'maxitems' => 1
            ]
        ],
        'types' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.types',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_schooldirectory_domain_model_type',
                'MM' => 'tx_schooldirectory_school_type_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'wizards' => [
                    '_PADDING' => 1,
                    '_VERTICAL' => 1,
                    'add' => [
                        'type' => 'script',
                        'title' => 'Create new',
                        'icon' => 'add.gif',
                        'params' => [
                            'table' => 'tx_schooldirectory_domain_model_type',
                            'pid' => '###CURRENT_PID###',
                            'setValue' => 'prepend'
                        ],
                        'script' => 'wizard_add.php',
                        'module' => [
                            'name' => 'wizard_add'
                        ]
                    ],
                    'edit' => [
                        'type' => 'popup',
                        'title' => 'Edit',
                        'script' => 'wizard_edit.php',
                        'icon' => 'edit2.gif',
                        'popup_onlyOpenIfSelected' => 1,
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'module' => [
                            'name' => 'wizard_edit'
                        ]
                    ]
                ]
            ]
        ],
        'profile_contents' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.profile_contents',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_schooldirectory_domain_model_profilecontent',
                'MM' => 'tx_schooldirectory_school_profilecontent_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'wizards' => [
                    '_PADDING' => 1,
                    '_VERTICAL' => 1,
                    'add' => [
                        'type' => 'script',
                        'title' => 'Create new',
                        'icon' => 'add.gif',
                        'params' => [
                            'table' => 'tx_schooldirectory_domain_model_profilecontent',
                            'pid' => '###CURRENT_PID###',
                            'setValue' => 'prepend'
                        ],
                        'script' => 'wizard_add.php',
                        'module' => [
                            'name' => 'wizard_add'
                        ]
                    ],
                    'edit' => [
                        'type' => 'popup',
                        'title' => 'Edit',
                        'script' => 'wizard_edit.php',
                        'icon' => 'edit2.gif',
                        'popup_onlyOpenIfSelected' => 1,
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'module' => [
                            'name' => 'wizard_edit'
                        ]
                    ]
                ]
            ]
        ],
        'care_forms' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.care_forms',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_schooldirectory_domain_model_careform',
                'MM' => 'tx_schooldirectory_school_careform_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'wizards' => [
                    '_PADDING' => 1,
                    '_VERTICAL' => 1,
                    'add' => [
                        'type' => 'script',
                        'title' => 'Create new',
                        'icon' => 'add.gif',
                        'params' => [
                            'table' => 'tx_schooldirectory_domain_model_careform',
                            'pid' => '###CURRENT_PID###',
                            'setValue' => 'prepend'
                        ],
                        'script' => 'wizard_add.php',
                        'module' => [
                            'name' => 'wizard_add'
                        ]
                    ],
                    'edit' => [
                        'type' => 'popup',
                        'title' => 'Edit',
                        'script' => 'wizard_edit.php',
                        'icon' => 'edit2.gif',
                        'popup_onlyOpenIfSelected' => 1,
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'module' => [
                            'name' => 'wizard_edit'
                        ]
                    ]
                ]
            ]
        ],
        'school_district' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.school_district',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_schooldirectory_domain_model_schooldistrict',
                'minitems' => 0,
                'maxitems' => 1,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ]
            ]
        ],
        'tx_maps2_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xlf:tx_maps2_uid',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_maps2_domain_model_poicollection',
                'prepend_tname' => false,
                'show_thumbs' => false,
                'size' => 1,
                'maxitems' => 1,
                'wizards' => [
                    'suggest' => [
                        'type' => 'suggest',
                        'default' => [
                            'searchWholePhrase' => true
                        ]
                    ]
                ]
            ]
        ],
        'facebook' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.facebook',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'twitter' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.twitter',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'google' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:tx_schooldirectory_domain_model_school.google',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ]
    ]
];
