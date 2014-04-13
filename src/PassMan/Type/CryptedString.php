<?php

namespace PassMan\Type;

class CryptedString implements \JsonKit\JsonSerializer
{
    protected $crypted;
    protected $string;

    protected $cryptMethod;
    protected $cryptKey;
    protected $cryptIv;

    public function __construct($string)
    {
        $this->cryptMethod = 'AES-256-CBC';
        $this->cryptKey = hash('sha256', 'fd8dsa9o');
        $this->cryptIv = substr(hash('sha256', '0dsa9dk0dbsah98eu0dnaskjdwe'), 0, 16);

        if (strpos($string, '---') === 0) {
            $this->decrypt($string);
        } else {
            $this->encrypt($string);
        }
    }

    public function jsonSerialize()
    {
        return $this->string;
    }

    public function __toString()
    {
        return $this->string;
    }

    public function encrypt($string)
    {
        $this->string = $string;
        $output = openssl_encrypt($string, $this->cryptMethod, $this->cryptKey, 0, $this->cryptIv);
        $this->crypted = '---'.base64_encode($output);
        return $this->crypted;
    }

    public function decrypt($crypted)
    {
        $this->crypted = $crypted;
        $this->string = openssl_decrypt(
            base64_decode(substr($crypted, 3)),
            $this->cryptMethod,
            $this->cryptKey,
            0,
            $this->cryptIv
        ) ?: '';

        return $this->string;
    }

    public function marshall()
    {
        return $this->crypted;
    }
}
