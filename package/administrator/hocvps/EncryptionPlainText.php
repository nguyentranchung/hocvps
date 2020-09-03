<?php

class EncryptionPlainText implements EncryptionInterface{

	/**
	 * @param string $plainPassword
	 * @param string $encryptedPassword
	 * @return bool|int
	 */
	public function validateEncryptedString($plainPassword, $encryptedPassword) {
		if ($plainPassword === $encryptedPassword)
			return true;
		else
			return 0;
	}

	/**
	 * @param string $plainPassword
	 * @return string
	 */
	public function encryptString($plainPassword) {
		return $plainPassword;
	}
}
