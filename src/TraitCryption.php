<?php

namespace Erykai\Cryption;

use Exception;

trait TraitCryption
{
    protected function encryption(string $string): string
    {
        $this->setData($string);
        $base = $this->getData();

        return bin2hex($base);
    }

    protected function decryption(string $encryption): ?string
    {
        if (!ctype_xdigit($encryption)) {
            return null;
        }
        if (strlen($encryption) % 2 !== 0) {
            return null;
        }

        $encryption = hex2bin($encryption);

        $encryption = base64_decode($encryption);
        [$encrypted_data, $decryption_key, $encryption_iv] = explode(".", $encryption);

        $encryption_iv = hex2bin($encryption_iv);

        $combined_key = CRYPTION_KEY . hex2bin($decryption_key);

        return openssl_decrypt($encrypted_data, CRYPTION_CIPHERING,
            $combined_key, 0, $encryption_iv);
    }


}
