{extends file="main.tpl"}

{block name="head" append}
<link rel="stylesheet" href="{$root}assets/css/login.css" type="text/css">
{/block}

{block name=content}
<div class="section" id="loginSection">
	<h1>Log In</h1>

	<form id="loginForm">
		<div class="formRow">
			<input id="username" name="username" type="text" placeholder="Username">
		</div>
		<div class="formRow">
			<input id="password" name="password" type="password" placeholder="Password">
		</div>
		<div class="formRow">
			<input class="button" name="login" type="submit" value="Log In">
		</div>
	</form>
</div>
{/block}
