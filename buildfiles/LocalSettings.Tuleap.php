<?php

//TODO: Move to `Extension:TuleapWikiFarm`
$GLOBALS['wgScriptPath'] = '/mediawiki/' . FARMER_CALLED_INSTANCE;
$GLOBALS['wgArticlePath'] = '/mediawiki/' . FARMER_CALLED_INSTANCE . '/wiki/$1';
$GLOBALS['wgUploadPath'] = '/mediawiki/' . FARMER_CALLED_INSTANCE . '/img_auth.php';
if ( FARMER_IS_ROOT_WIKI_CALL ) {
	$GLOBALS['wgScriptPath'] = '/mediawiki/w';
	$GLOBALS['wgArticlePath'] = '/mediawiki/wiki/$1';
	$GLOBALS['wgUploadPath'] = '/mediawiki/w/img_auth.php';
}

### Third Party Extensions - START ###
// ERM27085 - Extensions that were enabled in MediaWiki 1.23
wfLoadExtensions( [
	'CategoryTree',
	'Cite',
	'ImageMap',
	'InputBox',
	'LabeledSectionTransclusion',
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

wfLoadExtension( 'Math' );
$GLOBALS['wgMathValidModes'] = [ 'mathml' ];
$GLOBALS['wgDefaultUserOptions']['math'] = 'mathml';
$GLOBALS['wgMaxShellMemory'] = 1228800;
$GLOBALS['wgHiddenPrefs'][] = 'math';
$GLOBALS['wgMathoidCli'] = [
	'/opt/mediawiki/mathoid/cli.js',
	'-c',
	'/opt/mediawiki/mathoid/config.yaml'
];

### MediaWiki Core default settings - START ###
$GLOBALS['wgExternalLinkTarget'] = '_blank';
$GLOBALS['wgUrlProtocols'][] = 'file://';
$GLOBALS['wgUrlProtocols'][] = 'redis://'; // From old MediaWiki 1.23
### MediaWiki Core default settings - END ###

### Tuleap Specific - START ###
wfLoadExtension( 'TuleapIntegration' );
$GLOBALS['wgTuleapOAuth2Config']['redirectUri']
	= $GLOBALS['wgServer'] . $GLOBALS['wgScriptPath']
		. '/Special:TuleapLogin/callback';

wfLoadSkin( 'TuleapSkin' );
### Tuleap Specific - END ###