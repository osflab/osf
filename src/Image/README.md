# OSF image component

Picture manipulation and detection of dominant colors.

## Installation

You need at least php 7.1 and `composer`:

```bash
sudo apt install composer
```

### In your application via composer

This is the recommended way to use this feature in a non-osf project.

Just add `osflab/image` in your composer.json file.

### From github

To test the component or participate in its development.

```bash
git clone https://github.com/osflab/image.git
cd image && composer update
```

Unit tests launch:

```bash
php ./vendor/osflab/test/run-tests.php
```

## Usage example

```php
$dominantColors = \Osf\Image\ImageHelper::getColors('mypic.png');
```
