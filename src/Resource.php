<?php

namespace Erykai\Cryption;

use Exception;

class Resource
{
    use TraitCryption;

    private int $length;
    private string $iv;
    private string $key;
    private string $dKey;
    private string $data;

    public function __construct()
    {
        $this->setLength();
        $this->setIv();
        $this->setDKey();
        $this->setKey();
    }

    private function getLength(): int
    {
        return $this->length;
    }

    private function setLength(): void
    {
        $this->length = openssl_cipher_iv_length(CRYPTION_CIPHERING);
    }

    private function getIv(): string
    {
        return $this->iv;
    }

    private function setIv(): void
    {
        $this->iv = random_bytes($this->getLength());
    }

    private function getKey(): string
    {
        return $this->key;
    }

    private function setKey(): void
    {
        $this->key = CRYPTION_KEY . $this->getDKey();
    }


    private function getDKey(): string
    {
        return $this->dKey;
    }

    private function setDKey(): void
    {
        $this->dKey = openssl_digest(php_uname(), 'MD5', TRUE);
    }

    protected function getData(): string
    {
        return $this->data;
    }

    protected function setData(string $string): void
    {
        $encrypted_data = openssl_encrypt($string, CRYPTION_CIPHERING, $this->getKey(), 0, $this->getIv());
        $this->data = base64_encode($encrypted_data . '.' . bin2hex($this->getDKey()) . '.' . bin2hex($this->getIv()));
    }
}
