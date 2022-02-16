<?php

wfLoadExtensions( [

	//ERM27085 - Extensions that were enabled in old MediaWiki 1.23
	'CategoryTree',
	'Cite',
	'ImageMap',
	'InputBox',
	#'LabeledSectionTransclusion'
	'ParserFunctions',
	'SyntaxHighlight_GeSHi',
	'WikiEditor',

	'VisualEditor',
	'TuleapIntegration'
] );

$GLOBALS['wgPFEnableStringFunctions'] = true;

wfLoadSkin( 'TuleapSkin' );
$GLOBALS['wgDefaultSkin'] = 'tuleapskin';