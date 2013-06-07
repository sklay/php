<div class="carousel slide" id="home-carousel">
	<!-- Carousel items -->
	<div class="carousel-inner">
		   {if isset($widget->settings->images)}
		 {foreach $widget->settings->images as $index => $img}
		 	<div class="item {if $index==0} active{/if}">
		 		<img alt="" src='{$img}'>
		 	</div>
	  	   {/foreach}
	  	   {/if}
	</div>
	{if isset($widget->settings->images)}
		<a data-slide="prev" href="#home-carousel" class="carousel-control left">‹</a>
		<a data-slide="next" href="#home-carousel" class="carousel-control right">›</a>
	{/if}
</div>