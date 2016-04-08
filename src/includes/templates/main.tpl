<!DOCTYPE html>
<html lang="en">
<head>
	{block name="meta"}
	<meta charset="utf-8">
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
