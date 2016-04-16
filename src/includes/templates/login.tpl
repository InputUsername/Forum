{extends file="main.tpl"}

{block name="head" append}
<link rel="stylesheet" href="{$root}assets/css/login.css" type="text/css">
{/block}

{block name=content}
<div class="section" id="loginSection">
	<h1>Log In</h1>

	<form id="loginForm">
		<div class="formRow">
			<label for="username">Username</label>
			<input id="username" name="username" type="text">
		</div>
		<div class="formRow">
			<label for="password">Password</label>
			<input id="password" name="password" type="password">
		</div>

		<input class="button" name="login" type="submit" value="Log In">
	</form>
</div>
{/block}
