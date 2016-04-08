<!DOCTYPE html>
<html lang="en">
<head>
	{block name=meta}
	<meta charset="utf-8">
	<meta name="description" content="">
	{/block}

	<title>{$pageTitle}</title>

	{block name=head}{/block}
</head>
<body>
	<div id="wrapper">
		{include file="header.tpl"}
		<div id="main">
			{block name=content}{/block}
		</div>
		{include file="footer.tpl"}
	</div>
</body>
</html>
