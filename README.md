# Support
 ![Release Version](https://img.shields.io/github/v/release/live-controls/support)
 ![Packagist Version](https://img.shields.io/packagist/v/live-controls/support?color=%23007500)
 
 Support Library for live-controls

## Requirements
- Laravel 8.0+
- PHP 8.0+


## Translations
None


## Installation
```
composer require live-controls/support
```


## Setup
1) Publish configuration file with:
```
php artisan vendor:publish --tag="livecontrols.support.config"
```
2) Set "support_users" to an array of user ids, default is [1]
3) If you have live-controls/groups installed, you can set "support_groups" to the keys of the groups you want to add, default is ['admin']

## Usage
Todo
