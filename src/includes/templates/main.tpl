<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{block name="meta"}
	<meta name="theme-color" content="">
	<meta name="description" content="">
	{/block}

	<title>{$pageTitle}</title>

	{block name="head"}
	<link rel="shortcut icon" href="{$iconSmall}">

	<link rel="stylesheet" href="./assets/css/responsive.css" type="text/css">
	<link rel="stylesheet" href="./assets/css/main.css" type="text/css">
	{/block}
</head>
<body>
	<div id="wrapper">
		{include file="header.tpl"}
		<main id="content">
			{block name="content"}{/block}
		</main>
		{include file="footer.tpl"}
	</div>
</body>
</html>
