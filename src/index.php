<?php

namespace forum;

require_once('includes/config.php');
require_once('includes/smarty_setup.php');
require_once('includes/classes/database.class.php');
require_once('includes/classes/user.class.php');

/**********************
* Connect to database
**********************/

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
	$smarty->assign('errorMessage', $e->getMessage());
	$smarty->assign('errorCode', $e->getCode());
	$smarty->display('errors/database_error.tpl');

	die();
}

/******************
* Query database
*******************/

$result = $db->query('SELECT * FROM subforums WHERE parent IS NULL');

// Error or something
if (!$result) {
	$smarty->assign('pageTitle', 'Database error');
	$smarty->display('errors/database_error.tpl');

	$db->disconnect();

	die();
}

$subforums = array();

while ($row = $result->fetch_assoc()) {
	$subforums[] = $row;
}

$smarty->assign('pageTitle', 'Index');

$smarty->assign('subforums', $subforums);

$smarty->display('index.tpl');

$db->disconnect();
