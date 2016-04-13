{extends file="main.tpl"}

{block name="head" append}
<link rel="stylesheet" href="{$root}assets/css/subforums_list.css" type="text/css">
<link rel="stylesheet" href="{$root}assets/css/topics_list.css" type="text/css">
{/block}

{block name="content"}
{if $subforums}
	<div class="section">
		{include file="components/subforums_list.tpl" subforumsTitle="Subforums"}
	</div>
{/if}
{if $topics}
	<div class="section">
		{include file="components/topics_list.tpl" topicsTitle="Topics in '{$currentSubforum['name']}'"}
	</div>
{/if}
{/block}
