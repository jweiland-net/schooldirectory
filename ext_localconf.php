<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'JWeiland.' . $_EXTKEY,
    'List',
    [
        'School' => 'list, show, search'
    ],
    // non-cacheable actions
    [
        'School' => 'list, search'
    ]
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'JWeiland.' . $_EXTKEY,
    'Search',
    [
        'District' => 'search, list'
    ],
    // non-cacheable actions
    [
        'District' => 'list'
    ]
);
// use hook to automatically add a map record to current yellow page
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][]
    = \JWeiland\Schooldirectory\Tca\CreateMap::class;
