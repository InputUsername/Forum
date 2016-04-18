<?php

namespace forum;

require_once('includes/config.php');
require_once('includes/smarty_setup.php');
require_once('includes/error_pages.php');
require_once('includes/classes/database.class.php');
require_once('includes/classes/user.class.php');

/************************
* Connect to database
*************************/

$db = new Database();
try {
	$db->connect(
		$config['mysql']['host'],
		$config['mysql']['user'],
		$config['mysql']['pass'],
		$config['mysql']['db']
	);
}
catch (DatabaseException $e) {
	databaseErrorPage($smarty, $e->getMessage(), $e->getCode());

	die();
}

/************************
* Check POST parameters
*************************/

if (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])) {
	$username = preg_replace('/\W/', '', $_POST['username']);
	$password = $_POST['password']; //TODO: check password
	
	$params = array(
		's' => $username,
		's' => $password
	);
	
	try {
		$stmt = $db->prepare('SELECT * FROM users WHERE username=? LIMIT 1', $params);
		$result = $db->executePrepared($stmt)
	}
	catch (DatabaseException $e) {
		databaseErrorPage($smarty, $e->getMessage());
		
		die();
	}
	
	$user = $result->fetch_assoc();
	
	if (!empty($user)) {
		if (password_verify($password, $user['password'])) {
			//TODO: login
		}
	}
}

/************************
* Show login page
*************************/

$smarty->assign('pageTitle', 'Log In');

$smarty->display('login.tpl');

$db->disconnect();
