{if $subforumsTitle != ''}
	<h1>{$subforumsTitle}</h1>
{/if}
<div class="subforumsList">
	{foreach from=$subforums key="index" item="forum"}
		<div class="subforumBox">
			<h2><a href="{$root}forum/{$forum.id}">{$forum.name}</a></h2>
		</div>
	{foreachelse}
		{$subforumsNotFoundMessage}
	{/foreach}
</div>
