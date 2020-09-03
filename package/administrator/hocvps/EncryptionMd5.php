<?php

/**
 * Based on the encryption written by mikey_nich(at)hotmail.com
 * @see: http://php.net/manual/de/function.crypt.php#73619
 */
class EncryptionMd5 implements EncryptionInterface {

	/**
	 * @param string $plainPassword
	 * @param string $encryptedPassword
	 * @return bool|int
	 */
	public function validateEncryptedString($plainPassword, $encryptedPassword) {
		$passwordParts = explode('$', $encryptedPassword);

		if (count($passwordParts) !== 4)
			return false;

		list(, $key, $salt) = $passwordParts;

		if ($key !== 'apr1')
			return 0;

		return $this->_encryptString($plainPassword, $salt) === $encryptedPassword;
	}

	/**
	 * @param string $plainPassword
	 * @return string
	 */
	public function encryptString($plainPassword) {
		$this->_encryptString($plainPassword, $this->_generateSalt());
	}

	/**
	 * @return string
	 */
	private function _generateSalt() {
		return substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, 8);
	}

	/**
	 * @param string $plainPassword
	 * @param string $salt
	 * @return string
	 */
	private function _encryptString($plainPassword, $salt) {
		$len = strlen($plainPassword);
		$text = $plainPassword . '$apr1$' . $salt;
		$bin = pack("H32", md5($plainPassword . $salt . $plainPassword));

		for ($i = $len; $i > 0; $i -= 16) {
			$text .= substr($bin, 0, min(16, $i));
		}

		for ($i = $len; $i > 0; $i >>= 1) {
			$text .= ($i & 1) ? chr(0) : $plainPassword{0};
		}

		$bin = pack("H32", md5($text));

		for ($i = 0; $i < 1000; $i++) {
			$new = ($i & 1) ? $plainPassword : $bin;
			if ($i % 3)
				$new .= $salt;
			if ($i % 7)
				$new .= $plainPassword;
			$new .= ($i & 1) ? $bin : $plainPassword;
			$bin = pack("H32", md5($new));
		}

		$tmp = "";
		for ($i = 0; $i < 5; $i++) {
			$k = $i + 6;
			$j = $i + 12;
			if ($j == 16)
				$j = 5;
			$tmp = $bin[$i] . $bin[$k] . $bin[$j] . $tmp;
		}
		$tmp = chr(0) . chr(0) . $bin[11] . $tmp;
		$tmp = strtr(strrev(substr(base64_encode($tmp), 2)),
			"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",
			"./0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
		return "$" . "apr1" . "$" . $salt . "$" . $tmp;
	}
}
