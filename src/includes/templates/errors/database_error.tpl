{extends file="main.tpl"}

{block name="head" prepend}
<link rel="stylesheet" href="assets/css/user.css" type="text/css">
{/block}

{block name="content"}
<div class="section" id="errorBox">
	<h1>Database error</h1>
	<h2>There was an error establishing a connection with or fetching data from the database.</h2>

	{if isset($errorMessage)}
		{assign var="error" value="{$errorMessage}"}
		{if isset($errorCode)}
			{assign var="error" value="{$error} ($errorCode)"}
		{/if}
		<p>{$error}</p>
	{/if}
</div>
{/block}
