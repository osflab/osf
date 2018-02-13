# OSF db component

A database management mechanism based on Zend Db and generated static models from OSF Generator.

## Installation

You need at least php 7.1 and `composer`:

```bash
sudo apt install composer
```

### In your application via composer

This is the recommended way to use this feature in a non-osf project.

Just add `osflab/db` in your composer.json file.

### From github

To test the component or participate in its development.

```bash
git clone https://github.com/osflab/db.git
cd db && composer update
```

Unit tests launch:

```bash
php ./vendor/osflab/test/run-tests.php
```
