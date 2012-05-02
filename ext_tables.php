<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

/***************
 * Embed TypoScript
 */
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/Development', 'Theme EXT:modernpackage DEVELOPMENT');
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/Production', 'Theme EXT:modernpackage PRODUCTION');

/***************
 * Make backend-layout selector multilanguage aware
 */
t3lib_div::requireOnce(t3lib_extMgm::extPath($_EXTKEY) . 'Classes/Hooks/ItemsProcFunc.php');
$GLOBALS['TCA']['backend_layout']['ctrl']['label_alt_force'] = 1;
$GLOBALS['TCA']['backend_layout']['ctrl']['label_userFunc'] = 'Tx_Modernpackage_Hooks_ItemsProcFunc->getLabel';

/***************
 * Include CSS styling for backend/login
 */
$GLOBALS['TBE_STYLES']['inDocStyles_TBEstyle'] .= '@import "' . t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Backend/css/login.css";';
?>