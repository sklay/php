<form action="<?=base_url('index.php/page/create')?>" method="post" class="form-horizontal">
	<input type="hidden" name="parentPageId" value="<?= $param->pageId; ?>">
	<div class="control-group">
		<label for="pageName" class="control-label">名称</label>
		<div class="controls">
			<input type="text" id="pageName" name="name" class="input-xlarge">
		</div>
	</div>
	<div class="control-group">
		<label for="pageTitle" class="control-label">标题</label>
		<div class="controls">
			<input type="text" id="pageTitle" name="title" class="input-xlarge">
		</div>
	</div>
	<div class="control-group">
		<label for="pageAlias" class="control-label">URL别名</label>
		<div class="controls">
			<input type="text" id="pageAlias" name="alias" class="input-xlarge">
			<p class="help-block">若不设置用页面ID作为别名（唯一）</p>
		</div>
	</div>
	<div class="control-group">
		<label for="keywords" class="control-label">关键字</label>
		<div class="controls">
			<input type="text" id="keywords" name="keywords" class="input-xlarge">
		</div>
	</div>
	<div class="control-group">
		<label for="description" class="control-label">描述</label>
		<div class="controls">
			<input type="text" id="description" name="description" class="input-xlarge">
		</div>
	</div>
	<? if(!empty($param->pageId)){ ?>
	<div class="control-group">
		<label for="copyThis" class="control-label">拷贝本页</label>
		<div class="controls">
			<input type="checkbox" id="copyThis" name="copy" class="input-xlarge">
		</div>
	</div>
	<? }; if(!empty($param->pageId) && empty($currentPage->parent) ){?>
	<div class="control-group">
		<label for="isChildren" class="control-label">作为子页</label>
		<div class="controls">
			<input type="checkbox" id="isChildren" name="isChildren"
				class="input-xlarge">
		</div>
	</div>
	<?  }?>
</form>
