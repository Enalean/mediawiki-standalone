<?php

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
	'PdfBook'
] );
$GLOBALS['wgPFEnableStringFunctions'] = true;
$GLOBALS['wgPdfBookTab'] = true;

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
	'TextExtracts',
	'VisualEditor'
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
	// "_oauth" is a virtual instance served by `Extension:TuleapWikifarm`
	= $GLOBALS['wgServer'] . '/mediawiki/_oauth/Special:TuleapLogin/callback';

wfLoadSkin( 'TuleapSkin' );
### Tuleap Specific - END ###