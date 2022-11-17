# Cryption

Encryption and decryption data

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
- [All contributions](https://github.com/erykai/upload/contributors) (Contributors)

## License

The MIT License (MIT). Please see [License](https://github.com/erykai/upload/LICENSE) for more information.
