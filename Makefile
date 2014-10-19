.PHONY: install backend frontend spec specc server cs-fix cs-fix-dry-run

install: backend frontend

backend:
	@if [ ! -f composer.phar ]; then echo 'composer not found, install it $ curl -sS https://getcomposer.org/installer | php'; exit; else php composer.phar update; fi

frontend:
	@if ! which bower >/dev/null; then echo 'bower not found, install node/npm and then npm install -g bower'; exit; else echo 'executing bower...'; bower install; echo 'done'; fi

server:
	php -S localhost:8888 -t web web/index_dev.php

spec:
	bin/phpspec run -fdot

specc:
	bin/phpspec run --format=pretty

cs-fix-dry-run:
	bin/php-cs-fixer fix . --dry-run --fixers=concat_with_spaces,short_array_syntax -vvv

cs-fix:
	bin/php-cs-fixer fix . --fixers=concat_with_spaces,short_array_syntax -vvv
