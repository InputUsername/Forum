{extends file="main.tpl"}

{block name="head" append}
<link rel="stylesheet" href="{$root}assets/css/login.css" type="text/css">
{/block}

{block name=content}
<div class="section" id="loginSection">
	<h1>Log In</h1>

	<form method="post" id="loginForm">
		<div class="formRow">
			<input id="username" name="username" type="text" placeholder="Username">
		</div>
		<div class="formRow">
			<input id="password" name="password" type="password" placeholder="Password">
		</div>
		<div class="formRow">
			<input id="submit" class="button" name="login" type="submit" value="Log In">
			<p>Don't have an account yet? <a href="{$root}register">Register</a>.</p>
		</div>
	</form>
</div>
{/block}
