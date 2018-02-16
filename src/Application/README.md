# OSF application component

This is the MVC implementation of OSF framework, optimized for speed, productivity and modular webapps development. It is recommended to install the [osf package](https://github.com/osflab/osf) to develop a full application.

## Installation

You need at least php 7.1 and `composer`:

```bash
sudo apt install composer
```

### In your application via composer

This is the recommended way to use this feature in a non-osf project.

Just add `osflab/application` in your composer.json file.

### From github

To test the component or participate in its development.

```bash
git clone https://github.com/osflab/application.git
cd application && composer update
```

Unit tests launch:

```bash
vendor/bin/runtests
```
