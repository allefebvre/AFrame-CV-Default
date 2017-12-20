# Install

* `$ sudo apt-get install php7.0-dev`
* `$ sudo pecl install xdebug`
* `$ cd /etc/php/7.0/cli`

# Configuration

edit  `etc/php/7.0/cli/php.ini`
* add : `zend_extension=/usr/lib/php/20151012/xdebug.so`

restart apache2

# Test coverage

In root of project :
`$ sudo ./resources/phpunit -c ./resources/phpunit.xml --coverage-html ./testFiles/PHPUnit\ Tests/coverage ./testFiles/PHPUnit\ Tests/`
