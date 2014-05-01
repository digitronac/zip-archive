#!/bin/bash
#phpunit
php ./../vendor/bin/phpunit --colors --configuration="phpunit.xml.dist" --coverage-clover clover-zip-archive.xml
php ./../vendor/bin/coverage-checker.php clover-zip-archive.xml 100

#cs
php ./../vendor/bin/phpcs --standard=Rasserbia ../src --ignore=../tests/*