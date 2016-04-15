<?php

namespace forum;

require_once('includes/config.php');
require_once('includes/smarty_setup.php');
require_once('includes/error_pages.php');
require_once('includes/classes/database.class.php');
require_once('includes/classes/subforum.class.php');
require_once('includes/classes/category.class.php');

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

	$resultCategories = $db->query('SELECT category_id FROM subforums WHERE parent_subforum_id IS NULL ORDER BY category_id, id');

	$categorIds = array();

	while ($row = $resultCategories->fetch_assoc()) {
		if ($row['category_id']) {
			$categoryIds[] = $row['category_id'];
		}
	}

	// If there are top-level subforums that are under a category
	if (!empty($categoryIds)) {
		// Get category names

		$categorySet = '(' . implode($categoryIds, ',') . ')';
		$query = 'SELECT id, name FROM categories WHERE (parent_subforum_id IS NULL) AND (id IN ' . $categorySet . ')';

		$resultCategoryNames = $db->query($query);

		$categoryNames = array();

		while ($row = $resultCategoryNames->fetch_assoc()) {
			$categoryNames[$row['id']] = $row['name'];
		}
	}

	// Get subforums

	$resultSubforums = $db->query('SELECT * FROM subforums WHERE parent_subforum_id IS NULL ORDER BY category_id IS NULL, id, category_id');
}
catch (DatabaseException $e) {
	databaseErrorPage($smarty, $e->getMessage());

	$db->disconnect();

	die();
}

// Create list of subforums and categories

$subforums = array();

$currentCategoryId = NULL;

// Loop through list of subforums
while ($row = $resultSubforums->fetch_assoc()) {
	$catId = $row['category_id'];

	if ($catId) {
		$catName = $categoryNames[$catId];

		if ($catId != $currentCategoryId) {
			$subforums[] = array(new Category($catId, $catName, NULL));
			$currentCategoryId = $catId;
		}

		$subforums[count($subforums) - 1][] = new Subforum($row['id'], $row['name'], NULL, $catId);
	}
	else {
		$subforums[] = new Subforum($row['id'], $row['name'], NULL, $catId);
	}
}

// header('Content-type: text/plain');
// print_r($subforums);
// die();

/********************
* Show index page
*********************/

require_once('includes/smarty_plugins/function.subforum_box.php');
$smarty->registerPlugin('function', 'subforum_box', 'smarty_function_subforum_box');

$smarty->assign('pageTitle', 'Index');

$smarty->assign('subforums', $subforums);

$smarty->display('index.tpl');

$db->disconnect();
