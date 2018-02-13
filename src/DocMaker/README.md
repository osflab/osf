# OSF document generator component

Document generator based on markup langages, including Markdown.

## Installation

You need at least php 7.1 and `composer`:

```bash
sudo apt install composer
```

### In your application via composer

This is the recommended way to use this feature in a non-osf project.

Just add `osflab/doc-maker` in your composer.json file.

### From github

To test the component or participate in its development.

```bash
git clone https://github.com/osflab/doc-maker.git
cd doc-maker && composer update
```

Unit tests launch:

```bash
php ./vendor/osflab/test/run-tests.php
```
