{if $subforumsTitle != ''}
	<h1>{$subforumsTitle}</h1>
{/if}
<div class="subforumsList">
	{foreach from=$subforums key="index" item="item"}
		{* Item is either a category name or a subforum (array) *}
		{if is_a($item, 'forum\\Category')}
			<h2 class="categoryName"><a href="{$root}category/{$item->id}">{$item->name}</a></h2>
		{elseif is_a($item, 'forum\\Subforum')}
			<div class="subforumBox">
				<h2><a href="{$root}forum/{$item->id}">{$item->name}</a></h2>
			</div>
		{/if}
	{/foreach}
</div>
