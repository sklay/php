 {if isset($widget->settings->images)}
	 {foreach $widget->settings->images as $summary}
	 	<div class="span3">
          <img class="img-rounded" src="{$summary->avatar}">
          <h2>{$summary->title}</h2>
          <p>{$summary->description}</p>
          <p><a class="btn" href="{$summary->domain}">了解详情 »</a></p>
        </div>
  	 {/foreach}
  {/if}