<?php

namespace Erykai\Cryption;

use Exception;

trait TraitCryption
{
    /**
     * @throws Exception
     */
    protected function encryption(string $string): string
    {
        $this->setData($string);
        $base = $this->getData();

        $base = bin2hex($base);

        return $base;
    }

    /**
     * @param string $encryption
     * @return string
     */
    protected function decryption(string $encryption): string
    {
        $encryption = hex2bin($encryption);

        $encryption = base64_decode($encryption);
        [$encryption, $decryption_key, $encryption_iv] = explode(".", $encryption);
        return openssl_decrypt($encryption, CRYPTION_CIPHERING,
            base64_encode(CRYPTION_KEY) . $decryption_key, iv: $encryption_iv);
    }
}