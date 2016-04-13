<?php

namespace forum;

function databaseErrorPage() {
	$argc = func_num_args();
	$argv = func_get_args();

	if ($argc < 2) {
		return;
	}

	$smarty_inst = $argv[0];

	$smarty_inst->assign('pageTitle', 'Database error');
	$smarty_inst->assign('errorMessage', $argv[1]);
	if ($argc >= 3) {
		$smarty_inst->assign('errorCode', $argv[2]);
	}
	$smarty_inst->display('errors/database_error.tpl');
}
