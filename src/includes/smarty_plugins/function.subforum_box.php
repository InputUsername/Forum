<?php

function smarty_function_subforum_box($params, $smarty) {
	$output = <<<OUT
<div class="subforumBox">
	<h2><a href="%sforum/%d">%s</a></h2>
</div>
OUT;

	$output = sprintf(
		$output,
		$smarty->getTemplateVars('root'),
		$params['id'],
		$params['name']
	);

	return $output;
}
