<?php

namespace forum;

require_once('includes/config.php');
require_once('includes/smarty_setup.php');
require_once('includes/error_pages.php');
require_once('includes/misc.php');

require_once('includes/classes/database.class.php');
require_once('includes/classes/user.class.php');

/***********************
* Start the session
************************/

session_start();

if (!empty($_SESSION['currentUser'])) {
	redirect($config['root']);
}

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
	$password = $_POST['password'];

	$params = array(
		's' => $username
	);

	try {
		$stmt = $db->prepare('SELECT * FROM users WHERE username=?', $params);
		$result = $db->executePrepared($stmt);
	}
	catch (DatabaseException $e) {
		databaseErrorPage($smarty, $e->getMessage());

		die();
	}

	$userRow = $result->fetch_assoc();

	var_dump($userRow);

	if (!empty($userRow)) {
		if (password_verify($password, $userRow['password'])) {
			$_SESSION['currentUser'] = new User(
				$userRow['id'],
				$userRow['username'],
				$userRow['email'],
				$userRow['realName'],
				$userRow['registered'],
				$userRow['last_active'],
				$userRow['is_admin']
			);

			redirect($config['root']);
		}
	}
}

/************************
* Show login page
*************************/

$smarty->assign('pageTitle', 'Log In');

$smarty->display('login.tpl');

$db->disconnect();
