<div id="userControls">
	{if !$loggedIn}
		<a id="loginButton" href="{$root}login">Log In</a>
		<a class="button" href="{$root}register">Register</a>
	{else}
		<a id="userControlsToggle" href="{$root}user/{$currentUser->id}">
			<img id="userControlsImage" src="{$root}{$currentUser->profilePicture}" alt="User">
		</a>
		<ul id="userControlsMenu">
			<li><a href="{$root}user/{$currentUser->id}">Profile</a></li>
			<li><a href="{$root}settings">Settings</a></li>
			<li><a href="{$root}logout">Log Out</a></li>
		</ul>
	{/if}
</div>
