{extends file="main.tpl"}
{block name="head" prepend}
{/block}
{block name=content}
<div id="userInfo">
	{assign var="profilePicture" value="uploads/profile/{$user->profilePicture}"}
	{if !file_exists($profilePicture)}
		{assign var="profilePicture" value="custom_assets/profile_default.png"}
	{/if}
	<img id="userImage" src="/{$profilePicture}" alt="{$user->username}">
	<h1 id="userName">{$user->username}</h1>
	{if $user->realName != ""}
		<h2 id="userRealName">{$user->realName}</h2>
	{/if}
</div>
{/block}
