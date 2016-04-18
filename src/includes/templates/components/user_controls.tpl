<div id="userControls">
	{if !$loggedIn}
		<a id="loginButton" href="{$root}login">Log In</a>
		<a class="button" href="{$root}register">Register</a>
	{else}
		<a href="{$root}user/{$currentUser->id}"><img id="userControlsImage" src="{$root}{$currentUser->profilePicture}" alt="User"></a>
	{/if}
</div>
