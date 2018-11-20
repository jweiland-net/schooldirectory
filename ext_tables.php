<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_schooldirectory_domain_model_school',
    'EXT:schooldirectory/Resources/Private/Language/locallang_csh_tx_schooldirectory_domain_model_school.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_schooldirectory_domain_model_holder',
    'EXT:schooldirectory/Resources/Private/Language/locallang_csh_tx_schooldirectory_domain_model_holder.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_schooldirectory_domain_model_type',
    'EXT:schooldirectory/Resources/Private/Language/locallang_csh_tx_schooldirectory_domain_model_type.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_schooldirectory_domain_model_profilecontent',
    'EXT:schooldirectory/Resources/Private/Language/locallang_csh_tx_schooldirectory_domain_model_profilecontent.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_schooldirectory_domain_model_careform',
    'EXT:schooldirectory/Resources/Private/Language/locallang_csh_tx_schooldirectory_domain_model_careform.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_schooldirectory_domain_model_schooldistrict',
    'EXT:schooldirectory/Resources/Private/Language/locallang_csh_tx_schooldirectory_domain_model_schooldistrict.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_schooldirectory_domain_model_street',
    'EXT:schooldirectory/Resources/Private/Language/locallang_csh_tx_schooldirectory_domain_model_street.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_schooldirectory_domain_model_district',
    'EXT:schooldirectory/Resources/Private/Language/locallang_csh_tx_schooldirectory_domain_model_district.xlf'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_schooldirectory_domain_model_school');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_schooldirectory_domain_model_holder');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_schooldirectory_domain_model_type');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_schooldirectory_domain_model_profilecontent');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_schooldirectory_domain_model_careform');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_schooldirectory_domain_model_schooldistrict');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_schooldirectory_domain_model_street');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_schooldirectory_domain_model_district');
