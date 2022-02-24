# MediaWiki Tuleap Edition

This is a MediaWiki distribution, designed to run in a specific Tuleap application environment.

## Environment variables

- `tuleap_farm_instances_dir`: Where to store the instances data, like "uploads" and "cache". Details see [Extension:TuleapWikiFarm](https://github.com/wikimedia/mediawiki-extensions-TuleapWikiFarm/blob/master/extension.json)
- `tuleap_farm_psk`: The pre-shared-key used tu authenticate calls from Tupleap MediaWiki-Standalone Plugin to interact with the farming API. Details see [Extension:TuleapWikiFarm](https://github.com/wikimedia/mediawiki-extensions-TuleapWikiFarm/blob/master/extension.json)
- `tuleap_url`: Base url of the Tuleap web application. used for interlinking. Details see [Extension:TuleapIntegration](https://github.com/wikimedia/mediawiki-extensions-TuleapIntegration/blob/master/extension.json)
- `tuleap_auth_client_id`: OAuth2 client ID to be used for actual user authentication. Used fore seamless lgin into MediaWiki and user data syncrhonization. Details see [Extension:TuleapIntegration](https://github.com/wikimedia/mediawiki-extensions-TuleapIntegration/blob/master/extension.json)
- `tuleap_auth_client_secret`: OAuth2 client secret for the OAuth2 connection mentioned above.