<?php

interface EncryptionInterface {

	/**
	 * @param string $plainPassword
	 * @param string $encryptedPassword
	 * @return bool|int Bool true if the validation passed, false if this is definitly the right encoding but the
	 * 					validation failed or 0 if this may is not the right encoding for this password.
	 */
	public function validateEncryptedString($plainPassword, $encryptedPassword);

	/**
	 * @param string $plainPassword
	 * @return string
	 */
	public function encryptString($plainPassword);
}
