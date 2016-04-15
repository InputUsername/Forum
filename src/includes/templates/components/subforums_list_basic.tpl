{if $subforumsTitle != ''}
	<h1>{$subforumsTitle}</h1>
{/if}
<div class="subforumsList">
	{foreach from=$subforums key="index" item="item"}
		{subforumBox id=$item->id name=$item->name}
	{/foreach}
</div>
