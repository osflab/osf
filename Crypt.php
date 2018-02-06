<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Crypt;

/**
 * OpenStates simple crypt / uncrypt manager
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates 2009
 * @version 1.0
 * @since OSF-1.0
 * @package openstates
 * @subpackage crypt
 */
class Crypt
{
    const DEFAULT_KEY = 'OPENSTATES-UNSECURE-KEY';
    const MODE_BINARY = 'binary';
    const MODE_ASCII = 'ascii';
    const DEFAULT_HASH_ALGO = 'crc32b';
    const SECURE_HASH_ALGO = 'sha256';

    private $key = null;
    private $mode = null;

    /**
     * @param string $cryptKey
     * @param string $mode
     */
    public function __construct($cryptKey = self::DEFAULT_KEY, $mode = self::MODE_ASCII)
    {
        $this->key = $cryptKey;
        $this->mode = $mode;
    }

    /**
     * Encrypt a string
     * @param string $str
     * @return string
     * @todo remove dependency to deprecated mcrypt extension
     */
    public function encrypt(string $str): string
    {
        $encBin = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->key, $str, MCRYPT_MODE_ECB, $this->getIv());
        return $this->mode === self::MODE_ASCII ? $this->bin2hex($encBin) : $encBin;
    }

    /**
     * Decrypt a string
     * @param string $str
     * @return string
     * @todo remove dependency to deprecated mcrypt extension
     */
    public function decrypt(string $str): string
    {
        $crypted = $this->mode === self::MODE_ASCII ? $this->hex2bin($str) : $str;
        return mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->key, $crypted, MCRYPT_MODE_ECB, $this->getIv());
    }

    /**
     * @staticvar ?string $iv
     * @return string
     * @todo remove dependency to deprecated mcrypt extension
     */
    protected function getIv(): string
    {
        static $iv = null;

        if ($iv === null) {
            $ivSize = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
            $iv = mcrypt_create_iv($ivSize, MCRYPT_RAND);
        }
        return $iv;
    }

    /**
     * @param string $h
     * @return string
     */
    protected function hex2bin($h): string
    {
        if (!is_string($h)) {
            return null;
        }
        $r = '';
        for ($a = 0; $a < strlen($h); $a += 2) {
            $r .= chr(hexdec($h{$a} . $h{($a + 1)}));
        }
        return $r;
    }

    /**
     * Bind to bin2hex
     * @param mixed $b
     * @return string
     */
    protected function bin2hex($b): string
    {
        return bin2hex((string) $b);
    }
    
    /**
     * Main hash function. Use passwordHash() for passwords
     * @param string $data
     * @param bool $secure
     * @return string
     */
    public static function hash($data, bool $secure = false): string
    {
        return hash(self::getAlgo($secure), (string) $data);
    }
    
    /**
     * Hash a password with password_hash function
     * @param string $password 72 caractères maximum
     * @param string $algo
     * @return string 60 caractères
     */
    public static function passwordHash(string $password, string $algo = PASSWORD_BCRYPT): string
    {
        return password_hash($password, $algo);
    }
    
    /**
     * Check if a password matches a hash
     * FR: Vérifie si un mot de passe correspond à un hash 
     * @param string $password 72 caractères maximum
     * @param string $hash
     * @return bool
     */
    public static function passwordVerify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
    
    /**
     * Get a random hash string
     * @param bool $secure
     * @return string
     */
    public static function getRandomHash(bool $secure = false): string
    {
        return self::hash(microtime() . rand(10000, 100000), $secure);
    }
    
    /**
     * @param bool $secure
     * @return string
     */
    protected static function getAlgo(bool $secure): string
    {
        return $secure ? self::SECURE_HASH_ALGO : self::DEFAULT_HASH_ALGO;
    }
}
