{extends file="main.tpl"}

{block name="head" prepend}
<link rel="stylesheet" href="{$root}assets/css/forum_list.css" type="text/css">
{/block}

{block name="content"}
{include file="components/subforums_list.tpl" subforumsTitle="Subforums"
	subforumsList=$subforums subforumsNotFoundMessage="There are no subforums to display at this time."}
{/block}
