<link rel="stylesheet" href="{$resource}flexslider/flexslider.css" type="text/css">
<script src="{$resource}flexslider/jquery.flexslider.js"></script>

<script>
	$(function() {
	  $('.flexslider').flexslider({
	    animation: "slide",
	    animationLoop: true
	     {if !empty($widget->settings->itemWidth)},itemWidth: {$widget->settings->itemWidth}{/if}
	     {if !empty($widget->settings->thumbnails)},controlNav: {$widget->settings->thumbnails}{/if}
	  });
	});
</script>

<div class="flexslider">
  <ul class="slides">
  {if isset($widget->settings->images)}
  	  {foreach $widget->settings->images as $img}
  	  ss{$img} ,
  	  	  <li>
  	  	  <img src='{$img}'/>
  	  	  </li>
  	  {/foreach}
	{/if}
  </ul>
</div>