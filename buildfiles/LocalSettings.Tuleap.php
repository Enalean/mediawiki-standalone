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
$GLOBALS['wgTuleapOAuth2Config']['redirectUri']
	= $GLOBALS['wgServer'] . $GLOBALS['wgScriptPath']
		. '/Special:TuleapLogin/callback';

wfLoadSkin( 'TuleapSkin' );
### Tuleap Specific - END ###