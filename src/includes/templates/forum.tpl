{extends file="main.tpl"}

{block name="head" append}
<link rel="stylesheet" href="{$root}assets/css/subforums_list.css" type="text/css">
<link rel="stylesheet" href="{$root}assets/css/topics_list.css" type="text/css">
{/block}

{block name="content"}
<div class="section">
	{include file="components/subforums_list.tpl" subforumsTitle="Subforums"
		subforumsNotFoundMessage="There are no subforums to display at this time."}
</div>
<div class="section">
	{include file="components/topics_list.tpl" topicsTitle="Topics"
		topicsNotFoundMessage="There are no topics to display at this time."}
</div>
{/block}
