<?php

namespace forum;

require_once($config['smarty_dir'] . 'Smarty.class.php');

$dirs = array('templates_c', 'cache', 'configs');
foreach ($dirs as $dirname) {
	$dir = 'includes/smarty_dirs/' . $dirname;
	if (!is_dir($dir)) {
		mkdir($dir);
	}
}

$smarty = new \Smarty();

$smarty->setTemplateDir('includes/templates/');
$smarty->setCompileDir('includes/smarty_dirs/templates_c/');
$smarty->setCacheDir('includes/smarty_dirs/cache/');
$smarty->setConfigDir('includes/smarty_dirs/configs/');

?>
