# phpbag

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

phpbag is a container for key/value pairs. 

## Install

Via [Composer](https://getcomposer.org/)

```bash
$ composer require rubellum/phpbag
```

Requires PHP 7.0 or newer.

## Usage

```php
<?php

use Bag\Bag;

$bag = new Bag(['aaa' => 'bbb', 'ccc' => 'ddd']);

// array access
echo $bag['aaa']; // => 'bbb'

// property access
echo $bag->aaa; // => 'bbb'
```

## Testing

```bash
$ ./vendor/bin/phpunit
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
