.PHONY: install-cakephp composer-install

install-cakephp:
	composer create-project --prefer-dist cakephp/app:^3.8 myapp
	mv myapp/* . && mv myapp/.* . || true
	rmdir myapp

composer-install:
	docker-compose exec php-fpm composer install
