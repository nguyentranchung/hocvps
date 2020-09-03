<?php

class User {

	/**
	 * @var string
	 */
	private $_username;

	/**
	 * @var string
	 */
	private $_password;

	/**
	 * @param string|array $data
	 */
	public function __construct($data) {
		if (is_array($data)) {
			$this->setUsername($data['username']);
			$this->setPassword($data['password']);
		} else {
			list($this->_username, $this->_password) = explode(":", $data);
		}
	}

	/**
	 * @return string
	 */
	public function getUsername() {
		return $this->_username;
	}

	/**
	 * @param string $value
	 */
	private function setUsername($value) {
		$this->_username = $value;
	}

	/**
	 * @return string
	 */
	public function getPassword() {
		return $this->_password;
	}

	/**
	 * @param $password
	 */
	public function setPassword($password) {
		$this->_password = crypt($password, base64_encode($password));
	}

	/**
	 * @return string
	 */
	public function __toString() {
		return $this->_username . ":" . $this->_password;
	}
}