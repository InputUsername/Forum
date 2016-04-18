<?php

namespace forum;

require_once('includes/config.php');
require_once('includes/smarty_setup.php');
require_once('includes/error_pages.php');
require_once('includes/misc.php');
require_once('includes/subforum_functions.php');

require_once('includes/classes/database.class.php');
require_once('includes/classes/user.class.php');
require_once('includes/classes/subforum.class.php');
require_once('includes/classes/category.class.php');

/*******************
* Start the session
********************/

session_start();

$loggedIn = !empty($_SESSION['currentUser']);

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
	// Get category IDs associated with top-level subforums

	$categoryNames = getCategoryNames($db);

	// Get subforums

	$resultSubforums = $db->query('SELECT * FROM subforums WHERE parent_subforum_id IS NULL ORDER BY category_id IS NULL, category_id, id');
}
catch (DatabaseException $e) {
	databaseErrorPage($smarty, $e->getMessage());

	$db->disconnect();

	die();
}

// Create list of subforums and categories

$subforums = generateSubforumsList($resultSubforums, $categoryNames);

/********************
* Show index page
*********************/

require_once('includes/smarty_plugins/function.subforum_box.php');
$smarty->registerPlugin('function', 'subforum_box', 'smarty_function_subforum_box');

$smarty->assign('pageTitle', 'Index');
$smarty->assign('loggedIn', $loggedIn);
$smarty->assign('currentUser', $loggedIn ? $_SESSION['currentUser'] : NULL);

$smarty->assign('subforums', $subforums);

$smarty->display('index.tpl');

$db->disconnect();
