<?php

namespace forum;

require_once('includes/config.php');
require_once('includes/smarty_setup.php');
require_once('includes/classes/database.class.php');
require_once('includes/classes/user.class.php');

/************************
* Check GET parameters
*************************/

if (!isset($_GET['id'])) {
	$_GET['id'] = '0';
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
	$smarty->assign('pageTitle', 'Database error');
	$smarty->display('errors/database_error.tpl');
	die();
}

/************************
* Query database
*************************/

$params = array(
	'i' => preg_replace('/[^\d]/', '', $_GET['id'])
);

$stmt = $db->prepare('SELECT * FROM users WHERE id=? LIMIT 1', $params);
$result = $db->executePrepared($stmt);

// Query error

if (!$result) {
	$smarty->assign('pageTitle', 'User not found');
	$smarty->display('errors/user_not_found.tpl');
	die();
}

$row = $result->fetch_assoc();

// Cannot find user

if (empty($row)) {
	$smarty->assign('pageTitle', 'User not found');
	$smarty->display('errors/user_not_found.tpl');
	die();
}

$user = new User(
	$row['id'],
	$row['username'],
	$row['email'],
	$row['real_name'],
	$row['registered'],
	$row['last_active'],
	$row['is_admin']
);

/************************
* Show user page
*************************/

$smarty->assign('pageTitle', 'User profile: ' . $user->username);
$smarty->assign('user', $user);

$smarty->display('user.tpl');
