<ul class="unstyled">
	{if isset($comments) }
		{foreach key=c_key item=comment from=$comments}
			<li><a href='/news/detail?newsId='>{$comment->title}</a></li>
	 	{/foreach}	
	{/if}
</ul>
