<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public static function encrypt($plaintext)
    {
        $key = 'kocak123';
        $iv = random_bytes(16);
        $ciphertext = openssl_encrypt($plaintext, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        $ivCiphertext = $iv . $ciphertext;
        $ivCiphertextB64 = base64_encode($ivCiphertext);
        return $ivCiphertextB64;
    }

    public function decrypt($ivCiphertextB64)
    {
        $key = 'kocak123';
        $ivCiphertext  = base64_decode($ivCiphertextB64);
        $iv = substr($ivCiphertext, 0, 16);
        $ciphertext = substr($ivCiphertext, 16);
        $decryptedData = openssl_decrypt($ciphertext, "aes-256-cbc", $key, OPENSSL_RAW_DATA, $iv);
        return $decryptedData;
    }
}
