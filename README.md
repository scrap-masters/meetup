## Meetup core
[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/laravel-package-tools.svg?style=flat-square)](https://packagist.org/packages/scrap-masters/meetup)

The packet was created to make it quick and easy to create pages for local meetups.
If you are missing some functionality you can expand , overwrite the package without problems.
It is recommended to install the package on a clean version of laravel.

### Installation
In order to install the package, you need to run these commands
```bash
composer require scrap-masters/meetup
php artisan vendor:publish --provider="Blumilk\Meetup\Core\MeetupServiceProvider" --all --force
php artisan migrate:fresh
php artisan db:seed --class=RolesAndPermissionsSeeder
php artisan db:seed --class=DummyDataSeeder
```
### Development
If you have problems with permissions please add sudo before make example:
#### For postgresSql
- `$ sudo make init-postgres`
#### For sqlLite
- `$ sudo make init-sqllite`
### Run env for Mac/Linux

#### For postgresSql
- `$ make init-postgres`
#### For sqlLite
- `$ make init-sqllite`


### Run env for Windows
Please install packages makefile for [Windows](http://gnuwin32.sourceforge.net/packages/make.htm)
#### For postgresSql
- `$ make init-postgres`
#### For sqlLite
- `$ make init-sqllite`

### Address where the environment is available
- `http://localhost`
## All commands

-  `make help`
