<?php
require "config.php";
require "vendor/autoload.php";
use Erykai\Cryption\Cryption;

$email = "webav.com.br@gmail.com";

$Cryption = new Cryption();
$emailCryption = $Cryption->encryption($email);
$emailDecryption = $Cryption->decryption($emailCryption);

print_r($emailCryption, $emailDecryption);