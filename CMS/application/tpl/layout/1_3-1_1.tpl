<div class="row-fluid">
	<div class="column span12" id="row0">
		{if isset($containerMap['row0'])}
			{foreach $containerMap['row0'] as $w}
				{$w->content}
	 		{/foreach}	
		{/if}
	</div>
</div>
<div class="row-fluid">
	<div class="column span9" id="row1">
		{if isset($containerMap['row1'])}
			{foreach $containerMap['row1'] as $w}
				{$w->content}
	 		{/foreach}	
		{/if}
	</div>
	<div class="column span3" id="row2">
		{if isset($containerMap['row2'])}
			{foreach $containerMap['row2'] as $w}
				{$w->content}
	 		{/foreach}	
		{/if}
	</div>
</div>
<div class="row-fluid">
	<div class="column span12" id="row3">
		{if isset($containerMap['row3'])}
			{foreach $containerMap['row3'] as $w}
				{$w->content}
	 		{/foreach}	
		{/if}
	</div>
</div>