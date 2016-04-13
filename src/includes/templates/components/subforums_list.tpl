<div id="subforumsList">
	<h1>{$subforumsTitle}</h1>
	{foreach from=$subforumsList key="index" item="forum"}
		<div class="subforumBox">
			<h2><a href="{$root}forum/{$forum.id}">{$forum.name}</a></h2>
		</div>
	{foreachelse}
		{$subforumsNotFoundMessage}
	{/foreach}
</div>
