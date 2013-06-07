<?php /* Smarty version Smarty-3.1.13, created on 2013-05-06 17:02:15
         compiled from "D:\workspace-cms\CMS\application\tpl\widget\news\manager.tpl" */ ?>
<?php /*%%SmartyHeaderCode:87751877197add6f9-99997677%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '444cba331cf0226bf12ab8e2bd1a2961b3c8b99b' => 
    array (
      0 => 'D:\\workspace-cms\\CMS\\application\\tpl\\widget\\news\\manager.tpl',
      1 => 1367459123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87751877197add6f9-99997677',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'newsTypes' => 0,
    't' => 0,
    'newsType' => 0,
    'pageModel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51877197ef8118_84809637',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51877197ef8118_84809637')) {function content_51877197ef8118_84809637($_smarty_tpl) {?><div class="row-fluid">
	<ul class="nav nav-pills">
	  <?php if (isset($_smarty_tpl->tpl_vars['newsTypes']->value)){?>
		<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['t']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['newsTypes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
$_smarty_tpl->tpl_vars['t']->_loop = true;
?>
			<li name="newsTypes" id='newsTypes-<?php echo $_smarty_tpl->tpl_vars['t']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['t']->value->id==$_smarty_tpl->tpl_vars['newsType']->value->id){?>class="active"<?php }?>><a name="types" id="<?php echo $_smarty_tpl->tpl_vars['t']->value->id;?>
" href="javascript:void(0);" ><?php echo $_smarty_tpl->tpl_vars['t']->value->description;?>
</a></li>		
		<?php } ?>
	  <?php }?>
    </ul>
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr><th><input type="checkbox" class="no-margin"></th><th>标题</th><th>创建时间</th><th>操作</th></tr>
		</thead>
		<tbody id='searchresult'></tbody>
	</table>
	<div id="includePage">
	<?php echo $_smarty_tpl->getSubTemplate ("../pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('pageModel'=>$_smarty_tpl->tpl_vars['pageModel']->value), 0);?>

	</div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->baseUrl;?>
news/addNews" method="post">
		<fieldset>
			<legend>发布内容</legend>
			<input type="hidden" id='comment_type' name="comment_type" value="<?php echo $_smarty_tpl->tpl_vars['newsType']->value->id;?>
"/>
			<label>标题</label>
			<input type="text" name="title" placeholder="必填"/>
			<label>内容</label>
			<textarea id="content" name="content" style="width:100%;height:250px;"></textarea>
			<button type="submit" class="btn">发布</button>
		</fieldset>
	</form>
</div>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->baseUrl;?>
ui/static/thirdparty/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->baseUrl;?>
ui/static/thirdparty/kindeditor/plugins/code/prettify.css" />
<script charset="utf-8" src="<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->baseUrl;?>
ui/static/thirdparty/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->baseUrl;?>
ui/static/thirdparty/kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->baseUrl;?>
ui/static/thirdparty/kindeditor/plugins/code/prettify.js"></script>
<script>
	$(function() {
		$('a[name="types"]').on("click", function() {
			var typeId = $(this).attr('id') ;
			var widgetId = $(this).parents('div.widget').attr("id").replace("widget-","") ;
			$typeNode = $(this) ;
			 $.post('<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->baseUrl;?>
news/manager/'+typeId+'/'+widgetId,function(data){
					$('#includePage').html(data) ;
					$('li[name="newsTypes"]').removeClass('active') ;
					$typeNode.parent('li').addClass('active') ;
					$('#comment_type').val(typeId) ;
			 })
			return false ;
		 }) ;
		var menu = ['bold', 'italic', 'underline', 'strikethrough', 'removeformat','|','insertorderedlist', 'insertunorderedlist', 
		 				 'forecolor', 'hilitecolor', 'fontname', 'fontsize',  '|', 'link', 'unlink', 'emoticons', 
						 'shcode', 'image', 'flash', 'quote', '|','code','source','about'] ;
		
		var editor = KindEditor.create('textarea[name="content"]',{
			items :menu ,
			cssPath : '<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->baseUrl;?>
ui/static/thirdparty/kindeditor/plugins/code/prettify.css',
			uploadJson : '<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->baseUrl;?>
file/textEditor/upload',
			filePostName: 'file',
			fileManagerJson : '<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->baseUrl;?>
file/textEditor',
			allowFileManager : true,
			afterCreate : function() {
				var self = this;
				KindEditor.ctrl(document, 13, function() {
					self.sync();
					document.forms['example'].submit();
				});
				KindEditor.ctrl(self.edit.doc, 13, function() {
					self.sync();
					document.forms['example'].submit();
				});
			}	 
		});
		prettyPrint();
	});
</script><?php }} ?>