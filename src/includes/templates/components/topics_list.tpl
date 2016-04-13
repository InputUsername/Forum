{if $topicsTitle != ''}
	<h1>{$topicsTitle}</h1>
{/if}
<div class="topicsList">
	{foreach from=$topics key="index" item="topic"}
		<div class="topicBox">
			<h2><a href="{$root}topic/{$topic.id}">{$topic.title}</a></h2>
		</div>
	{/foreach}
</div>
