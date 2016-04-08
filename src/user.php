<?php

namespace forum;

if (!isset($_GET['id'])) {
	die('incorrect params');
}

require_once('includes/config.php');
require_once('includes/database.class.php');
require_once('includes/user.class.php');

$db = new Database();
$db->connect(
	$config['mysql']['host'],
	$config['mysql']['user'],
	$config['mysql']['pass'],
	$config['mysql']['db']
);

$params = array('i' => $_GET['id']);

$stmt = $db->prepare('SELECT * FROM users WHERE id=? LIMIT 1', $params);
$result = $db->executePrepared($stmt);

if (!$result) {
	die('can\'t retrieve user');
}

$row = $result->fetch_assoc();

$user = new User(
	$row['id'],
	$row['username'],
	$row['email'],
	$row['real_name'],
	$row['registered'],
	$row['last_active'],
	$row['is_admin']
);

require_once('includes/smarty_setup.php');

$smarty->assign('pageTitle', 'User profile: ' . $user->username);
$smarty->assign('user', $user);

$smarty->display('user.tpl');

?>
