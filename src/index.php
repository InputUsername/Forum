<?php

namespace forum;

require_once('includes/config.php');
require_once('includes/smarty_setup.php');

$smarty->assign('pageTitle', 'Index');
$smarty->assign('forumName', 'Forum');
$smarty->assign('logoMain', '/custom_assets/logo_main.png');

$smarty->display('main.tpl');

?>
