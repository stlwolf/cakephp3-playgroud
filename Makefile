.PHONY: install-cakephp composer-install migrate_test_db

install-cakephp:
	composer create-project --prefer-dist cakephp/app:^3.8 myapp
	mv myapp/* . && mv myapp/.* . || true
	rmdir myapp

composer-install:
	docker-compose exec php-fpm composer install

migrate_test_db:
	docker-compose exec php-fpm ./myapp/bin/cake migrations migrate -c test -s config/TestMigrations

test:
	docker exec -w /var/www/html/myapp cakephp3-playgroud_php-fpm_1 vendor/bin/phpunit tests/TestCase/Controller/PostsControllerTest.php

php:
	docker exec -it cakephp3-playgroud_php-fpm_1 bash
