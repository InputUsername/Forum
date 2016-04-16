{extends file="main.tpl"}

{block name="head" append}
<link rel="stylesheet" href="{$root}assets/css/user.css" type="text/css">
{/block}

{block name=content}
<div class="section" id="userInfoSection">
	{* Profile picture *}
	{assign var="profilePicture" value="uploads/profile/{$user->profilePicture}"}
	{if !file_exists($profilePicture)}
		{assign var="profilePicture" value="custom_assets/profile_default.png"}
	{/if}
	<img id="userImage" src="{$root}{$profilePicture}" alt="{$user->username}">
	{* /Profile picture *}

	<div id="userDetails">
		<h1 id="userName" {if $user->isAdmin}class="admin"{/if}>{$user->username}</h1>

		{* Real name *}
		{if $user->realName != ""}
			<h2 id="userRealName">{$user->realName}</h2>
		{/if}
		{* /Real name *}
	</div>
</div>
{/block}
