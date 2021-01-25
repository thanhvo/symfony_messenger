all: install build package deploy

install:
	composer install --optimize-autoloader --no-dev --no-scripts

build:
	php bin/console cache:clear --no-debug --no-warmup --env=dev
	php bin/console cache:warmup --env=dev

package:
	serverless package

deploy:
	serverless deploy