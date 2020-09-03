<?php

class FileManager {
	
	/**
	 * @var string
	 */
	private $filename;
	
	/**
	 * @var string
	 */
	private $password;

	/**
	 * @param string $filename
	 */
	public function __construct() {
		$this->filename = './filemanager/config/.htusers.php';
	}

	/**
	 * @param string $password
	 * @throws Exception
	 */
	public function updatePassword($password) {
		if (!file_exists($this->filename))
			throw new Exception("The config file does not exist.");
		
		$content = file_get_contents($this->filename);
				
		$content = preg_replace("/admin','(.*?)'/", "admin','".md5($password)."'", $content);
		
		file_put_contents($this->filename, $content);
	}
}
