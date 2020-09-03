<?php

return array(
	'files' => array(
		'users' => __DIR__.'/.htpasswd', // The file where the Administration's users are stored in.
	),
	'firewall' => array(
		'acceptEncryptionClasses' => array(
			'EncryptionCrypt',
			'EncryptionMd5',
			//'EncryptionPlainText', Please only enable if really needed
		),
		'admin' => 'admin' // Which user should have admin-rights?
	),
	'userController' => array(
		'savePasswordEncryptionClass' => 'EncryptionCrypt' // You can also use EncryptionPlainText or EncryptionMd5
	)
);
