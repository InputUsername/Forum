{if $subforumsTitle != ''}
	<h1>{$subforumsTitle}</h1>
{/if}
<div class="subforumsList">
	{foreach from=$subforums key="index" item="item"}
		{* Item is either a category (array containing Category and multiple Subforums)
		or a Subforum *}

		{if is_array($item)}
			<div class="categoryBox">
				<h2><a href="{$root}category/{$item[0]->id}">{$item[0]->name}</a></h2>

				{* Loop through subforums in category *}
				{foreach from=$item key="index" item="subforum"}
					{if $index > 0}
						{subforum_box id=$subforum->id name=$subforum->name}
					{/if}
				{/foreach}
			</div>
		{elseif is_a($item, 'forum\\Subforum')}
			{subforum_box id=$item->id name=$item->name}
		{/if}
	{/foreach}
</div>
