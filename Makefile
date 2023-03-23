.PHONY: install-cakephp

install-cakephp:
	composer create-project --prefer-dist cakephp/app:^3.8 myapp
	mv myapp/* . && mv myapp/.* . || true
	rmdir myapp
