{extends file="main.tpl"}

{block name="head" prepend}
<link rel="stylesheet" href="assets/css/user.css" type="text/css">
{/block}

{block name="content"}
<div id="errorBox">
	<h1>Database error</h1>
	<h2>There was an error establishing a connection to the database.</h2>
</div>
{/block}
