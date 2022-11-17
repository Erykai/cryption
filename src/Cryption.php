<?php

namespace Erykai\Cryption;

use Exception;

class Cryption
{
    /**
     * @throws Exception
     */
    public function encryption(string $string): string
    {
        $iv_length = openssl_cipher_iv_length(CIPHERING);
        $options = 0;
        $encryption_iv = random_bytes($iv_length);
        $encryption_iv = strlen($encryption_iv) < 4 ? $encryption_iv . random_int(1111111,9999999) : $encryption_iv;
        $encryption_key = openssl_digest(php_uname(), 'MD5', TRUE);
        $base = base64_encode(openssl_encrypt($string, CIPHERING,
                $encryption_key, $options, $encryption_iv) .'.'. $encryption_key .'.'. $encryption_iv);
        if(str_contains($base,'/')){
            $base = str_replace('/', 'bArRa', $base);
        }
        return $base;
    }

    /**
     * @param string $encryption
     * @return string
     */
    public function decryption(string $encryption): string
    {
        if(str_contains($encryption,'bArRa')){
            $encryption = str_replace('bArRa', '/', $encryption);
        }
        $encryption = base64_decode($encryption);
        [$encryption, $decryption_key, $encryption_iv] = explode(".",$encryption);
        $options = 0;
        return openssl_decrypt ($encryption, CIPHERING,
            $decryption_key, $options, $encryption_iv);
    }
}