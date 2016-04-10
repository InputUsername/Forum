{extends file="main.tpl"}

{block name="head" prepend}
{/block}

{block name="content"}
	<h1>Subforums</h1>
	{foreach from=$subforums key="index" item="forum"}
		<div class="subforumBox">
			<h2><a href="">{$forum.name}</a></h2>
		</p>
	{foreachelse}
		<p>This forum does not currently have any subforums.</p>
	{/foreach}
{/block}
