<?php

namespace forum;

require_once('includes/config.php');
require_once('includes/smarty_setup.php');
require_once('includes/classes/database.class.php');

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
	$smarty->assign('errorMessage', $e->getMessage());
	$smarty->assign('errorCode', $e->getCode());
	$smarty->display('errors/database_error.tpl');
	die();
}

/************************
* Query database
*************************/

$params = array(
	'i' => preg_replace('/[^\d]/', '', $_GET['id'])
);

$stmt = $db->prepare('SELECT * FROM subforums WHERE id=?', $params);
$result = $db->executePrepared($stmt);

// Error getting current subforum

if (!$result) {
	
}

$currentSubforum = $result->fetch_assoc();

$stmt = $db->prepare('SELECT * FROM subforums WHERE parent_subforum_id=?', $params);
$result = $db->executePrepared($stmt);

// Error getting list of subforums

if (!$result) {

}

$subforums = array();

while ($row = $result->fetch_assoc()) {
	$subforums[] = $row;
}

// Error getting list of topics in forum

$stmt = $db->prepare('SELECT * FROM topics WHERE subforum_id=?', $params);
$result = $db->executePrepared($stmt);

if (!$result) {

}

$topics = array();

while ($row = $result->fetch_assoc()) {
	$topics[] = $row;
}

/************************
* Show subforum page
*************************/

$smarty->assign('pageTitle', 'Forum: ' . $currentSubforum['name']);

$smarty->assign('currentSubforum', $currentSubforum);
$smarty->assign('subforums', $subforums);
$smarty->assign('topics', $topics);

$smarty->display('forum.tpl');
