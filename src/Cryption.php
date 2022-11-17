<?php

namespace Erykai\Cryption;

use Exception;

class Cryption extends Resource
{
    /**
     * @throws Exception
     */
    public function encrypt(string $string): string
    {
        return $this->encryption($string);
    }

    public function decrypt(string $encrypted): string
    {
        return $this->decryption($encrypted);
    }
}