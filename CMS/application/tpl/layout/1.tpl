<div class="row-fluid">
	<div class="column span12" id="row0">
		{if isset($containerMap['row0'])}
			{foreach $containerMap['row0'] as $w}
				{$w->content}
	 		{/foreach}	
		{/if}
	</div>
</div>