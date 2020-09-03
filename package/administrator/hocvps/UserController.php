<?php

class UserController {

	public function index() {
		global $userManager, $firewall, $admin_url;

		if ($firewall->hasUserAccess())
			include_once __DIR__ . "/templates/user/index.phtml";
		else {
			header("HTTP/1.1 403 Forbidden");
			include_once __DIR__ . "/templates/403.phtml";
		}
	}

	public function editPassword() {
		global $userManager, $firewall, $admin_url;
		include_once __DIR__."/templates/user/edit.phtml";
	}

	public function updatePassword() {
		global $userManager;

		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			$message = '';
			$success = false;
			
			$tool = $_POST['tool'];
			$password = $_POST['password'];
			$old_password = $_POST['old_password'];
			
			try {
				if (empty($tool))
					throw new Exception("What tool do you want to change password?");
				
				if (empty($password))
					throw new Exception("Empty password is not allowed.");
				
				switch($tool) {
					case 'filemanager':
						$fileManager = new FileManager();
						$fileManager->updatePassword($password);
						break;

					case 'phpmyadmin':
						$sqlManager = new SQLManager();
						$sqlManager->updatePassword($password);
						break;
					default:
						$user = $userManager->getCurrentUser();
						$user->setPassword($password);
						$success = $userManager->updateUser($user);
				}
			} catch(Exception $e) {
				$message = $e->getMessage();
			}

			header("HTTP/1.1 303 See Other");
			header("Location: ?action=changePassword&success=".(int)$success."&tool=".urlencode($tool)."&message=".urlencode($message));
		} else {
			header("HTTP/1.1 403 Forbidden");
			include_once __DIR__ . "/templates/403.phtml";
		}
	}
}
