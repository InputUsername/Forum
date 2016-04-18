{extends file="main.tpl"}

{block name="head" append}
<link rel="stylesheet" href="{$root}assets/css/user.css" type="text/css">
{/block}

{block name=content}
<div class="section" id="userInfoSection">
	{* Profile picture *}
	<img id="userImage" src="{$root}{$user->profilePicture}" alt="{$user->username}">

	<div id="userDetails">
		<h1 id="userName" {if $user->isAdmin}class="admin"{/if}>{$user->username}</h1>

		{if $user->realName != ""}
			<h2 id="userRealName">{$user->realName}</h2>
		{/if}
	</div>
</div>
{/block}
