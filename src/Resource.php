<?php

namespace Erykai\Cryption;

use Exception;

/**
 *
 */
class Resource
{
    use TraitCryption;

    /**
     * @var int
     */
    private int $length;
    /**
     * @var string
     */
    private string $iv;
    /**
     * @var string
     */
    private string $key;
    /**
     * @var string
     */
    private string $dKey;
    /**
     * @var string
     */
    private string $data;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->setLength();
        $this->setIv();
        $this->setDKey();
        $this->setKey();
    }

    /**
     * @return int
     */
    protected function getLength(): int
    {
        return $this->length;
    }

    /**
     * setLength
     */
    private function setLength(): void
    {
        $this->length = openssl_cipher_iv_length(CRYPTION_CIPHERING);
    }

    /**
     * @return string
     */
    protected function getIv(): string
    {
        return $this->iv;
    }

    /**
     * @throws Exception
     */
    private function setIv(): void
    {
        $this->iv = substr(base64_encode(random_bytes($this->getLength())), 0, $this->getLength());
    }

    /**
     * @return string
     */
    protected function getKey(): string
    {
        return $this->key;
    }


    /**
     * setKey
     */
    private function setKey(): void
    {
        $this->key = base64_encode(CRYPTION_KEY) . $this->getDKey();
    }

    /**
     * @return string
     */
    protected function getDKey(): string
    {
        return $this->dKey;
    }

    /**
     * setDKey
     */
    private function setDKey(): void
    {
        $this->dKey = openssl_digest(php_uname(), 'MD5', TRUE);
    }

    /**
     * @return string
     */
    protected function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $string
     */
    protected function setData(string $string): void
    {
        $this->data = base64_encode(
            openssl_encrypt($string, CRYPTION_CIPHERING, $this->getKey(), iv: $this->getIv()) .'.'.
            $this->getDKey() .'.'.
            $this->getIv()
        );
    }

}