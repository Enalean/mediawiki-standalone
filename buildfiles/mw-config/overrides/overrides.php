<?php

$overrides['LocalSettingsGenerator'] = 'TuleapLocalSettingsGenerator';

class TuleapLocalSettingsGenerator extends LocalSettingsGenerator {
	function getText() {
		$this->values['wgDefaultSkin'] = 'tuleapskin';
		$ls = parent::getText();
		return $ls . "\nrequire_once \"\$IP/LocalSettings.Tuleap.php\";";
	}
}