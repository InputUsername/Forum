{extends file="main.tpl"}

{block name="head" append}
<link rel="stylesheet" href="{$root}assets/css/subforums_list.css" type="text/css">
{/block}

{block name="content"}
<div class="section">
	{include file="components/subforums_list.tpl" subforumsTitle="Subforums"
		subforumsList=$subforums subforumsNotFoundMessage="There are no subforums to display at this time."}
</div>
<div class="section">
	TEMP TEST DEBUG REMOVE ME PLEASE
</div>
{/block}
