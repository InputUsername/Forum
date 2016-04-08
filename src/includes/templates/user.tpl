{extends file="main.tpl"}

{block name="head" prepend}
<link rel="stylesheet" href="assets/css/user.css" type="text/css">
{/block}

{block name=content}
<div id="userInfo">
	{* Profile picture *}
	{assign var="profilePicture" value="uploads/profile/{$user->profilePicture}"}
	{if !file_exists($profilePicture)}
		{assign var="profilePicture" value="custom_assets/profile_default.png"}
	{/if}
	<img id="userImage" src="/{$profilePicture}" alt="{$user->username}">
	{* /Profile picture *}

	<h1 id="userName">{$user->username}</h1>

	{* Real name *}
	{if $user->realName != ""}
		<h2 id="userRealName">{$user->realName}</h2>
	{/if}
	{* /Real name *}
</div>
{/block}
