{extends file="main.tpl"}

{block name="head" prepend}
<link rel="stylesheet" href="{$root}assets/css/forum_list.css" type="text/css">
{/block}

{block name="content"}
	<h1>Subforums</h1>
	{foreach from=$subforums key="index" item="forum"}
		<div class="subforumBox">
			<h2><a href="{$root}forum/{$forum.id}">{$forum.name}</a></h2>
		</div>
	{foreachelse}
		<p>There are currently no subforums to display.</p>
	{/foreach}
{/block}
