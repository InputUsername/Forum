<div id="header" class="box">
	<a href="{$root}"><img id="logoMain" src="{$root}{$logoMain}" alt="{$forumName}"></a>
	<form id="searchForm" action="{$root}search">
		<input id="searchBox" name="q" type="text" placeholder="Search..."><!--
		--><input id="searchButton" value="&nbsp;" type="submit">
	</form>
	{include file="./user_controls.tpl"}
</div>
