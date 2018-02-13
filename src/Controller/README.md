# OSF controller component

The Controller (MVC) component of OSF framework. It is recommended to install the [osf package](https://github.com/osflab/osf) to develop a full application.

## Features

* HTTP/REST application controller
* Cli application
* Request, response, router
* Optimisez for speed

## Installation

You need at least php 7.1 and `composer`:

```bash
sudo apt install composer
```

### In your application via composer

This is the recommended way to use this feature in a non-osf project.

Just add `osflab/controller` in your composer.json file.

### From github

To test the component or participate in its development.

```bash
git clone https://github.com/osflab/controller.git
cd controller && composer update
```

Unit tests launch:

```bash
php ./vendor/osflab/test/run-tests.php
```
