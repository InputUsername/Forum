<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	{block name="meta"}
	<meta name="description" content="">
	{/block}

	<title>{$pageTitle}</title>

	{block name="head"}
	<link rel="shortcut icon" href="{$iconSmall}">

	<link rel="stylesheet" href="/assets/css/main.css" type="text/css">
	{/block}
</head>
<body>
	<div id="wrapper">
		{include file="header.tpl"}
		<div id="main">{block name="content"}{/block}</div>
		{include file="footer.tpl"}
	</div>
</body>
</html>
