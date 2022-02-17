
SHELL = /bin/bash

MWVERSION=1.35.5

.DEFAULT_GOAL := help

help:
	@grep -E '^[a-zA-Z0-9_\-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'
	@echo "(Other less used targets are available, open Makefile for details)"

dev-setup: ## Setup environment MediaWiki Tuleap Edition (should only be run once)
	git clone -b $(MWVERSION) https://github.com/wikimedia/mediawiki dev
	cd dev && composer update

build-latest: ## Create a tarball of MediaWiki Tuleap Edition from the latest sources
	cd dist && git clone -b $(MWVERSION) --depth 1 https://github.com/wikimedia/mediawiki
	cp -p buildfiles/* dist/mediawiki
	cd dist/mediawiki && composer update --classmap-authoritative --no-dev --no-interaction --prefer-dist
	mv dist/mediawiki/vendor dist/mediawiki/vendor_by_composer
	cd dist/mediawiki && git submodule update --init --recursive
	rm -rf dist/mediawiki/vendor
	mv dist/mediawiki/vendor_by_composer dist/mediawiki/vendor
	cd dist/mediawiki/extensions/VisualEditor && git submodule foreach --recursive git reset --hard && git submodule update --init --recursive
	find dist/mediawiki/ -type d -name ".*" | xargs rm -rf
	find dist/mediawiki/ -type f -name ".*" | xargs rm -rf
	find dist/mediawiki/ -type f -name "Gruntfile.js" | xargs rm -rf
	find dist/mediawiki/ -type f -name "jsduck.json" | xargs rm -rf
	find dist/mediawiki/ -type f -name "phpunit.xml.dist" | xargs rm -rf
	find dist/mediawiki/ -type d -name "tests" | xargs rm -rf
	tar cfz dist/mediawiki.tar.gz dist/mediawiki/
	rm -rf dist/mediawiki/