<div id="widget-{$widget->id}" class="widget {$widget->border_class} ">
	<header>
		<h2>{$widget->title|default:$widget->name}</h2>
	</header>
	<div class="widget-content">
		{$widget->content}
	</div>
</div>