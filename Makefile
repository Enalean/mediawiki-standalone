
SHELL = /bin/bash

MWVERSION=1.35.6

.DEFAULT_GOAL := help

help:
	@grep -E '^[a-zA-Z0-9_\-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'
	@echo "(Other less used targets are available, open Makefile for details)"

dev-setup: ## Setup environment MediaWiki Tuleap Edition (should only be run once)
	git clone -b $(MWVERSION) https://github.com/wikimedia/mediawiki dev
	cp -rp buildfiles/* dev/
	cd dev/ && composer update
	mv dev/vendor dev/vendor_by_composer
	cd dev/ && git submodule update --init --recursive
	rm -rf dev/vendor
	mv dev/vendor_by_composer dev/vendor
	cd dev/extensions/VisualEditor && git submodule foreach --recursive git reset --hard && git submodule update --init --recursive

build-latest: ## Create a tarball of MediaWiki Tuleap Edition from the latest sources
	mkdir -p dist/mediawiki/app/
	cd dist/mediawiki/app && git clone -b $(MWVERSION) --depth 1 https://github.com/wikimedia/mediawiki w
	cp -rp buildfiles/* dist/mediawiki/app/w/
	cd dist/mediawiki/app/w && git submodule update --init --depth 1 --recursive
	cd dist/mediawiki/app/w/extensions/VisualEditor && git submodule foreach --recursive git reset --hard && git submodule update --init --recursive
	cd dist/mediawiki/app/w && composer update --classmap-authoritative --no-dev --no-interaction --prefer-dist
	find dist/mediawiki/app/w/ -type d -name ".*" | xargs rm -rf
	find dist/mediawiki/app/w/ -type f -name ".*" | xargs rm -rf
	find dist/mediawiki/app/w/ -type f -name "Gruntfile.js" | xargs rm -rf
	find dist/mediawiki/app/w/ -type f -name "jsduck.json" | xargs rm -rf
	find dist/mediawiki/app/w/ -type f -name "phpunit.xml.dist" | xargs rm -rf
	find dist/mediawiki/app/w/ -type d -name "tests" | xargs rm -rf
	cd dist/mediawiki/ && wget http://buildservice.bluespice.com/webservices/REL1_35/mathoid.tar.gz
	cd dist/mediawiki/ && tar xfvz mathoid.tar.gz
	rm dist/mediawiki/mathoid.tar.gz
	cd dist && tar cfz mediawiki.tar.gz mediawiki/
	rm -rf dist/mediawiki/
