<?php

class EncryptionCrypt implements EncryptionInterface {

	/**
	 * @param string $plainPassword
	 * @param string $encryptedPassword
	 * @return bool|int
	 */
	public function validateEncryptedString($plainPassword, $encryptedPassword) {
		if (crypt($plainPassword, substr($encryptedPassword, 0, 2)) === $encryptedPassword)
			return true;
		else
			return 0;
	}

	/**
	 * @param string $plainPassword
	 * @return string
	 */
	public function encryptString($plainPassword) {
		return crypt($plainPassword);
	}
}
