# MediaWiki Tuleap Edition

This is a MediaWiki distribution, designed to run in a specific Tuleap application environment.

## Local configuration

The package contains the file `LocalSettings.local.php-sample`. After extracting the codebase, please copy that file to `LocalSettings.local.php` before installation.

- `###TULEAPURL###`: The pre-shared-key used tu authenticate calls from Tupleap MediaWiki-Standalone Plugin to interact with the farming API. Details see [Extension:TuleapWikiFarm](https://github.com/wikimedia/mediawiki-extensions-TuleapWikiFarm/blob/master/extension.json)
- `###TULEAPURL###`: Base url of the Tuleap web application. used for interlinking. Details see [Extension:TuleapIntegration](https://github.com/wikimedia/mediawiki-extensions-TuleapIntegration/blob/master/extension.json)
- `###TULEAPAUTHCLIENTID###`: OAuth2 client ID to be used for actual user authentication. Used fore seamless lgin into MediaWiki and user data syncrhonization. Details see [Extension:TuleapIntegration](https://github.com/wikimedia/mediawiki-extensions-TuleapIntegration/blob/master/extension.json)
- `###TULEAPAUTHCLIENTSECRET###`: OAuth2 client secret for the OAuth2 connection mentioned above.

## Installation

1. Make sure to have prepatred the `LocalSettings.local.php` file as described above
2. Run the commandline installer of MediaWiki Tuleap Edition

CLI Installer:
```sh

```