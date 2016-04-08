<?php

namespace forum;

class User {
	public $id;
	public $username;
	public $email;
	public $realName;
	public $registered;
	public $lastActive;
	public $isAdmin;
	public $profilePicture;

	public function __construct($id, $username, $email, $realName, $registered, $lastActive, $isAdmin) {
		$this->id = $id;
		$this->username = $username;
		$this->email = $email;
		$this->realName = $realName;
		$this->registered = $registered;
		$this->lastActive = $lastActive;
		$this->isAdmin = $isAdmin;

		$this->profilePicture = md5($id) . '.png';
	}
}
