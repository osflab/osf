# OSF Exception component

The root OSF exceptions have a type corresponding to the underlying processing.
In this way, they can be used explicitly to display errors, perform rollback
processing, record debugging information, or issue alerts.

## Exception types

* **ArchException**: to report a technical malfunction
* **DisplayedException**: displayed to the end user
* **DbException**: used to perform databases rollbacks
* **PhpErrorException**: PHP error handling
* **OsfException**: root exception of OSF components
* **AlertException**: launch a bootstrap alert (require osflab/view)
* **HttpException**: generate an error with a specific HTTP code

These exceptions are used in OSF-based components and applications.

## Installation

You need at least php 7.1 and `composer`:

```bash
sudo apt install composer
```

### In your application via composer

This is the recommended way to use this feature in a non-osf project.

Just add `osflab/exception` in your composer.json file.

### From github

To test the component or participate in its development.

```bash
git clone https://github.com/osflab/exception.git
cd exception && composer update
```

Unit tests launch:

```bash
php ./vendor/osflab/test/run-tests.php
```
