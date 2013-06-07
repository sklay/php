<div class="row-fluid">
	<div class="column span6" id="row0">
		{if isset($containerMap['row0'])}
			{foreach $containerMap['row0'] as $w}
				{$w->content}
	 		{/foreach}	
		{/if}
	</div>
	<div class="column span6" id="row1">
		{if isset($containerMap['row1'])}
			{foreach $containerMap['row1'] as $w}
				{$w->content}
	 		{/foreach}	
		{/if}
	</div>
</div>