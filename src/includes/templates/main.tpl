<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{block name="meta"}
	<meta name="theme-color" content="#808080">
	<meta name="description" content="">
	{/block}

	<title>{$pageTitle}</title>

	{block name="head"}
	<link rel="shortcut icon" href="{$root}{$iconSmall}">

	<link rel="stylesheet" href="{$root}assets/css/responsive.css" type="text/css">
	<link rel="stylesheet" href="{$root}assets/css/main.css" type="text/css">
	{/block}
</head>
<body>
	<div id="wrapper">
		{include file="components/header.tpl"}
		<main id="content">
			{block name="content"}{/block}
		</main>
		{include file="components/footer.tpl"}
	</div>
</body>
</html>
