<?php

require_once __DIR__ . "/User.php";

class UserManager {

	/**
	 * @var User[]
	 */
	private $users;

	/**
	 * @var User
	 */
	private $currentUser;

	/**
	 * @var bool
	 */
	private $changed = false;

	/**
	 * @var string
	 */
	private $filename;

	/**
	 * @param string $filename
	 */
	public function __construct($filename) {
		$users = explode("\x0a", file_get_contents($filename));

		// the last line is blank
		array_pop($users);

		$this->users = $this->readUsers($users);
		$this->filename = $filename;
	}

	public function __destruct() {
		if ($this->changed)
			file_put_contents($this->filename, implode("\x0a", $this->users) . "\x0a");
	}

	/**
	 * @param array $userArray
	 * @return User[]
	 */
	protected function readUsers(array $userArray) {
		$users = array();

		foreach ($userArray as $userdata) {
			$user = new User($userdata);
			$users[$user->getUsername()] = $user;
		}

		return $users;
	}

	/**
	 * @param string $user
	 * @return bool
	 */
	public function userExists($user) {
		return isset($this->users[$user]);
	}

	/**
	 * @return User
	 */
	public function getCurrentUser() {
		return $this->getUserByName($_SERVER['PHP_AUTH_USER']);
	}

	/**
	 * @param string $user
	 * @return User
	 */
	public function getUserByName($user) {
		return $this->users[$user];
	}

	/**
	 * @param User $user
	 * @return bool
	 */
	public function deleteUser(User $user) {
		if ($this->userExists($user->getUsername())) {
			unset($this->users[$user->getUsername()]);
			$this->changed = true;
		}
		return true;
	}

	/**
	 * @param User $user
	 * @throws Exception
	 */
	public function addUser(User $user) {
		if ($this->userExists($user->getUsername()))
			throw new Exception("The user already exists.");

		$this->users[$user->getUsername()] = $user;
		$this->changed = true;
	}

	/**
	 * @param User $user
	 * @throws Exception
	 */
	public function updateUser(User $user) {
		if (!$this->userExists($user->getUsername()))
			throw new Exception("The user does not exist.");

		$this->users[$user->getUsername()] = $user;
		$this->changed = true;
	}

	/**
	 * @return User[]
	 */
	public function getUsers() {
		return $this->users;
	}
}
