<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'schooldirectory',
    'tx_schooldirectory_domain_model_school',
    'category'
);
