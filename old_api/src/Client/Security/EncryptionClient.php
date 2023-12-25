<?php
namespace App\Client\Security;

class EncryptionClient {
	const METHOD = 'aes128';

	static function encrypt($value) {
		return base64_encode(openssl_encrypt($value, self::METHOD, $_ENV['SECURITY_SALT'], $options=0,  $_ENV['SECURITY_SALT']));
	}

	static function decrypt($value) {
		return openssl_decrypt(base64_decode($value), self::METHOD, $_ENV['SECURITY_SALT'], $options=0, $_ENV['SECURITY_SALT']);
	}
}