<div class="tabbable tabs-left">
	<div class="row-fluid">
		<div class="span3">
			<div class="well" style="padding: 8px 0px">
				<ul class="nav nav-list">
					<? $index = 0 ; foreach ($manage_modules as $modules){?>
						<li <?=($index== 0) ?'class="active"' :'' ?>>
							<a href="#widget-pane-<?=$modules->key ?>" data-toggle="tab">
								<?=$modules->value ?>
							</a>
						</li>
					<? $index++ ;} ?>
				</ul>
			</div>
		</div>
		<div class="span9">
			<div class="tab-content" id='' data-toggle="tab">
				<? $index = 0 ; foreach ($manage_modules as $modules){?>
					<div class="tab-pane <?=$index== 0 ?'active' :'' ?>" id="widget-pane-<?=$modules->key ?>">
						<? foreach ($modules->children as $sub_module){?>
							<? if ($sub_module->show){ ?>
								<div class="media">
								  <div class="pull-left widget-snapshot">暂无截图</div>  
								  <div class="media-body">
								    <h4 class="media-heading"><?=$sub_module->value ?></h4>
								    <p><button class="btn btn-small" widgetName="<?=$sub_module->key ?>">马上添加</button></p>
								  </div>
								</div>
							<? } ?>
						<?} ?>
					</div>
				<?$index++ ;} ?>
			</div>
		</div>
	</div>
</div>
