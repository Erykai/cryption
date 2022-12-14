<?php

namespace Erykai\Cryption;

use Exception;

trait TraitCryption
{
    abstract protected function setData(): void;
    /**
     * @throws Exception
     */
    protected function encryption(string $string): string
    {

        $this->setData($string);
        $base = $this->getData();
        if(str_contains($string,'/')){
            $base = str_replace('/', 'bArRa', $base);
        }

        return $base;
    }

    /**
     * @param string $encryption
     * @return string
     */
    protected function decryption(string $encryption): string
    {
        if(str_contains($encryption,'bArRa')){
            $encryption = str_replace('bArRa', '/', $encryption);
        }
        $encryption = base64_decode($encryption);
        [$encryption, $decryption_key, $encryption_iv] = explode(".",$encryption);
        return openssl_decrypt ($encryption, CRYPTION_CIPHERING,
            base64_encode(CRYPTION_KEY) . $decryption_key, iv: $encryption_iv);

    }
}