<?php

$overrides['LocalSettingsGenerator'] = 'TuleapLocalSettingsGenerator';

class TuleapLocalSettingsGenerator extends LocalSettingsGenerator {
	function getText() {
		$this->values['wgDefaultSkin'] = 'tuleapskin';
		$ls = parent::getText();
		$tuleapFarm = <<<'HERE'
### Load local configuration varibales ###
require_once( "$IP/LocalSettings.local.php" );

### Farm Instance Configuration Dispatcher ###
$GLOBALS['wgTuleapInstancesDir'] = '/var/lib/tuleap/mediawiki-standalone/projects';
require_once( "$IP/extensions/TuleapWikiFarm/TuleapWikiFarm.setup.php" );
HERE;

		return $ls . $tuleapFarm;
	}
}