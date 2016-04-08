<?php

namespace forum;

require_once('includes/config.php');
require_once('includes/smarty_setup.php');

$smarty->assign('pageTitle', 'Index');

$smarty->display('index.tpl');

?>
