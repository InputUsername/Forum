<?php

namespace forum;

require_once('includes/config.php');
require_once('includes/misc.php');

/*******************
* Start the session
********************/

session_start();

/*********************
* Check login status
**********************/

if (!empty($_SESSION['currentUser'])) {
	$_SESSION = array();
	session_destroy();
}

redirect($config['root']);
