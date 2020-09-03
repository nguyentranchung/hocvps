<?php

require_once __DIR__ . "/UserManager.php";
require_once __DIR__ . "/EncryptionInterface.php";
require_once __DIR__ . "/EncryptionCrypt.php";
require_once __DIR__ . "/EncryptionMd5.php";
require_once __DIR__ . "/EncryptionPlainText.php";

class Firewall {

	/**
	 * @return bool
	 */
	public function isAutenticated() {
		global $userManager, $config;

		// If the Server-variables do not exist, the user cannot be validated.
		if (!array_key_exists('PHP_AUTH_USER', $_SERVER) || !array_key_exists('PHP_AUTH_PW', $_SERVER))
			return false;

		$username = $_SERVER['PHP_AUTH_USER'];

		// Check if the user exists
		if (!$userManager->userExists($username))
			return false;

		// Check if the password can be validated by any enabled encryption class
		foreach ($config['firewall']['acceptEncryptionClasses'] as $encryptionClass) {
			/** @var $encryption EncryptionInterface */
			$encryption = new $encryptionClass;
			if (!($encryption instanceof EncryptionInterface))
				throw new Exception('The registered encryption-class <' . get_class($encryption) . '> does not implement the EncryptionInterface');

			$result = $encryption->validateEncryptedString($_SERVER['PHP_AUTH_PW'],
				$userManager->getUserByName($username)->getPassword());
			if ($result === true)
				return true;
			elseif ($result === false)
				return false;
		}

		return false;
	}

	/**
	 * @return bool
	 */
	public function hasUserAccess() {
		global $userManager, $config;

		if ($userManager->getCurrentUser()->getUsername() === $config['firewall']['admin'])
			return true;
		else
			return false;
	}
}
