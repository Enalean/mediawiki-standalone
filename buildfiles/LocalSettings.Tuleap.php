<?php

### Farm Instance Configuration Dispatcher - START ###
$GLOBALS['wgTuleapPreSharedKey'] = getenv( 'tuleap_farm_psk' );
$GLOBALS['wgTuleapInstancesDir'] = getenv( 'tuleap_farm_instances_dir' );
// This will load the specific instance configuration and set required paths
require_once( $GLOBALS['IP'] . '/extensions/TuleapWikiFarm/TuleapWikiFarm.setup.php' );
### Farm Instance Configuration Dispatcher - END ###

### Third Party Extensions - START ###
// ERM27085 - Extensions that were enabled in MediaWiki 1.23
wfLoadExtensions( [
	'CategoryTree',
	'Cite',
	'ImageMap',
	'InputBox',
	#'LabeledSectionTransclusion'
	'ParserFunctions',
	'SyntaxHighlight_GeSHi',
	'WikiEditor',
	'VisualEditor'
] );
$GLOBALS['wgPFEnableStringFunctions'] = true;

$GLOBALS['wgDefaultUserOptions']['usebetatoolbar']     = 1;
$GLOBALS['wgDefaultUserOptions']['usebetatoolbar-cgd'] = 1;
$GLOBALS['wgDefaultUserOptions']['wikieditor-preview'] = 1;
$GLOBALS['wgDefaultUserOptions']['wikieditor-publish'] = 1;

// Additional extensions
wfLoadExtensions( [
	'CodeEditor',
	'Gadgets',
	'MultimediaViewer',
	'PageImages',
	'PdfHandler',
	'ReplaceText',
	'Scribunto',
	'TemplateData',
	'TextExtracts'
] );
### Third Party Extensions - END ###

### MediaWiki Core default settings - START ###
$GLOBALS['wgExternalLinkTarget'] = '_blank';
$GLOBALS['wgUrlProtocols'][] = 'file://';
$GLOBALS['wgUrlProtocols'][] = 'redis://'; // From old MediaWiki 1.23
### MediaWiki Core default settings - END ###

### Tuleap Specific - START ###
wfLoadExtension( 'TuleapIntegration' );
$GLOBALS['wgTuleapUrl'] = getenv( 'tuleap_url' );
$GLOBALS['wgTuleapOAuth2Config'] = [
	'clientId' => getenv( 'tuleap_auth_client_id' ),
	'clientSecret' => getenv( 'tuleap_auth_client_secret' ),
	// May need to be adapted, based on the article path of the final wiki
	'redirectUri' => $GLOBALS['wgServer'] . $GLOBALS['wgScriptPath'] . '/index.php/Special:TuleapLogin/callback'
];

wfLoadSkin( 'TuleapSkin' );
### Tuleap Specific - END ###