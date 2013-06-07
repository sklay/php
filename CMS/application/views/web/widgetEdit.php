
<form action="/widget/edit" method="post" class="form-horizontal">
	<div class="control-group">
		<label for="widgetId" class="control-label">编号</label>
		<div class="controls">
			<input type="text" id="widgetId" class="input-xlarge" name="id" value="<?=$widget->id?>" disabled="disabled">
		</div>
	</div>
	<div class="control-group">
		<label for="widgetTitle" class="control-label">标题</label>
		<div class="controls">
			<input type="text" id="widgetTitle" class="input-xlarge" name="title" value="<?=$widget->title?>">
		</div>
	</div>
	
	<div class="control-group">
		<label for="widgetborderClassClass" class="control-label">边框模板</label>
		<div class="controls">
			<select name="border">
				<option value="none.tpl" <?=('none.tpl'==$widget->border_tpl) ?'selected="selected"' : ''?>>无边框</option>
				<option value="t-c-f.tpl" <?=('t-c-f.tpl'==$widget->border_tpl) ?'selected="selected"' : ''?>>系统边框</option>
			</select>
			<a href="">定义新模板</a>
		</div>			
	</div>
	<div id="borderClassSelector" class="control-group <?=('none.tpl'==$widget->border_tpl) ?'hide' : ''?>">
		<label for="widgetBorderClasses" class="control-label">边框样式</label>
		<div class="controls">
			<div class="system-borders">
               <a href="javascript:void(0)" data-widget-setstyle="purple" class="purple-btn <?=('purple'==$widget->border_class) ?'btn-selected' : ''?>"></a>
               <a href="javascript:void(0)" data-widget-setstyle="navyblue" class="navyblue-btn <?=('navyblue'==$widget->border_class) ?'btn-selected' : ''?>"></a>
               <a href="javascript:void(0)" data-widget-setstyle="green" class="green-btn <?=('green'==$widget->border_class) ?'btn-selected' : ''?>"></a>
               <a href="javascript:void(0)" data-widget-setstyle="yellow" class="yellow-btn <?=('yellow'==$widget->border_class) ?'btn-selected' : ''?>"></a>
               <a href="javascript:void(0)" data-widget-setstyle="orange" class="orange-btn <?=('orange'==$widget->border_class) ?'btn-selected' : ''?>"></a>
               <a href="javascript:void(0)" data-widget-setstyle="pink" class="pink-btn <?=('pink'==$widget->border_class) ?'btn-selected' : ''?>"></a>
               <a href="javascript:void(0)" data-widget-setstyle="red" class="red-btn <?=('red'==$widget->border_class) ?'btn-selected' : ''?>"></a>
               <a href="javascript:void(0)" data-widget-setstyle="darkgrey" class="darkgrey-btn <?=(empty($widget->border_class) || 'darkgrey'==$widget->border_class) ?'btn-selected' : ''?>"></a>
               <a href="javascript:void(0)" data-widget-setstyle="black" class="black-btn <?=('black'==$widget->border_class) ?'btn-selected' : ''?>"></a>
           </div>
		</div>
	</div>
	<? if( isset($settings)){?>
	<div class="control-group">
		<label for="settings" class="control-label">参数配置</label>
		<div class="controls">
			<? foreach ($settings  as $setting){  ?>
				<div class="row-fluid settings">
					<div class="span3" key="<?=$setting->key ?>">
						<?=$setting->key ?>
					</div>
					<div class="span9">
						<input type="text" name="stvalue" value="<?=$setting->value?>"/>
					</div>
				</div>			
			<?} ?>
		</div>
	</div>
	<?}?>
</form>