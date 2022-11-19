# Cryption

Encryption and decryption data
[![Maintainer](http://img.shields.io/badge/maintainer-@alexdeovidal-blue.svg?style=flat-square)](https://instagram.com/alexdeovidal)
[![Source Code](http://img.shields.io/badge/source-erykai/cryption-blue.svg?style=flat-square)](https://github.com/erykai/cryption)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/erykai/cryption.svg?style=flat-square)](https://packagist.org/packages/erykai/cryption)
[![Latest Version](https://img.shields.io/github/release/erykai/cryption.svg?style=flat-square)](https://github.com/erykai/cryption/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Quality Score](https://img.shields.io/scrutinizer/g/erykai/cryption.svg?style=flat-square)](https://scrutinizer-ci.com/g/erykai/cryption)
[![Total Downloads](https://img.shields.io/packagist/dt/erykai/cryption.svg?style=flat-square)](https://packagist.org/packages/erykai/cryption)

define const
```php
const CRYPTION_CIPHERING = "BF-CBC";
const CRYPTION_KEY = "Aa1@#LLkMmJ,;l//";
```

```php
require "config.php";
require "vendor/autoload.php";
use Erykai\Cryption\Cryption;

$email = "webav.com.br@gmail.com";

$Cryption = new Cryption();
$emailCryption = $Cryption->encrypt($email);
$emailDecryption = $Cryption->decrypt($emailCryption);

print_r($emailCryption, $emailDecryption);
```

## Contribution

All contributions will be analyzed, if you make more than one change, make the commit one by one.

## Support

If you find defaults send an email reporting to webav.com.br@gmail.com.

## Credits

- [Alex de O. Vidal](https://github.com/alexdeovidal) (Developer)
- [All contributions](https://github.com/erykai/cryption/contributors) (Contributors)

## License

The MIT License (MIT). Please see [License](https://github.com/erykai/cryption/LICENSE) for more information.
