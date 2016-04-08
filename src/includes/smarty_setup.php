<?php

namespace forum;

require_once($config['smarty_dir'] . 'Smarty.class.php');

if (!is_dir('includes/templates_c')) {
	mkdir('includes/templates_c');
}

$smarty = new \Smarty();

$smarty->setTemplateDir('includes/templates/');
$smarty->setCompileDir('includes/templates_c/');

?>
