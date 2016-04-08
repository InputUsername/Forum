<?php

namespace forum;

require_once($config['smarty_dir'] . 'Smarty.class.php');

if (!is_dir('includes/templates_c')) {
	mkdir('includes/templates_c');
}

$smarty = new \Smarty();

$smarty->setTemplateDir('includes/templates/');
$smarty->setCompileDir('includes/templates_c/');

// Assign common variables
$smarty->assign('forumName', 'Forum');
$smarty->assign('logoMain', '/custom_assets/logo_main.png');
$smarty->assign('iconMain', '/custom_assets/icon_128.png');
$smarty->assign('iconSmall', '/custom_assets/icon_64.png');

?>
