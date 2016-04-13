<?php

namespace forum;

require_once('includes/config.php');
require_once('includes/smarty_setup.php');
require_once('includes/error_pages.php');
require_once('includes/classes/database.class.php');

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
	databaseErrorPage($smarty, $e->getMessage(), $e->getCode());

	die();
}

/******************
* Query database
*******************/

// Query for subforums list

try {
	$result = $db->query('SELECT * FROM subforums WHERE parent_subforum_id IS NULL');
}
catch (DatabaseException $e) {
	$smarty->assign('pageTitle', 'Database error');
	$smarty->assign('errorMessage', $db->getError());
	$smarty->display('errors/database_error.tpl');

	$db->disconnect();

	die();
}

$subforums = array();

while ($row = $result->fetch_assoc()) {
	$subforums[] = $row;
}

/********************
* Show index page
*********************/

$smarty->assign('pageTitle', 'Index');

$smarty->assign('subforums', $subforums);

$smarty->display('index.tpl');

$db->disconnect();
