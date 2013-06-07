<?php /* Smarty version Smarty-3.1.13, created on 2013-06-06 16:32:24
         compiled from "D:\workspace-any\CMS\application\tpl\widget\forum\talk.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2426051b04918932d17-42639914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30b7d7516f478297128a0ea7bce1d11e588bcc24' => 
    array (
      0 => 'D:\\workspace-any\\CMS\\application\\tpl\\widget\\forum\\talk.tpl',
      1 => 1369120611,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2426051b04918932d17-42639914',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'resource' => 0,
    'baseUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51b049189e9b90_62553989',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b049189e9b90_62553989')) {function content_51b049189e9b90_62553989($_smarty_tpl) {?><div class="row-fluid">
	<div class="media">
	  <a class="pull-left" href="#">
	    <img class="media-object" data-src="<?php echo $_smarty_tpl->tpl_vars['resource']->value;?>
holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="<?php echo $_smarty_tpl->tpl_vars['resource']->value;?>
resource/slider/demo/test.png">
	  </a>
	  <div class="media-body">
	    <h4 class="media-heading">Media heading</h4>
	    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
	  </div>
	</div>
	
	<div class="media">
	  <a class="pull-left" href="#">
	    <img class="media-object" data-src="<?php echo $_smarty_tpl->tpl_vars['resource']->value;?>
holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="<?php echo $_smarty_tpl->tpl_vars['resource']->value;?>
resource/slider/demo/test.png">
	  </a>
	  <div class="media-body">
	    <h4 class="media-heading">Media heading</h4>
	    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
	    <div class="media">
	      <a class="pull-left" href="#">
	        <img class="media-object" data-src="<?php echo $_smarty_tpl->tpl_vars['resource']->value;?>
holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="<?php echo $_smarty_tpl->tpl_vars['resource']->value;?>
resource/slider/demo/test.png">
	      </a>
	      <div class="media-body">
	        <h4 class="media-heading">Media heading</h4>
	        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
	      </div>
	    </div>
	  </div>
	</div>
</div>           
<div class="row-fluid" >
    <h6>I Want To Say ...</h6>
    <input class="span10" type="text" id='textarea1' placeholder="我要说...">
</div>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
ui/static/thirdparty/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
ui/static/thirdparty/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
ui/static/thirdparty/kindeditor/lang/zh_CN.js"></script>
<script>
	$(function() {
		var menu = ['emoticons'] ;
		var editor = '' ;
	
		$("input.span10").on('click',function(){
			input = this ;
			editor = KindEditor.create(this,{
				id: 'targetId' ,
				items :menu ,
				filterMode : true ,
				cssPath : '<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
ui/static/thirdparty/kindeditor/plugins/code/prettify.css',
				afterCreate : function() {
					var self = this;
					KindEditor.ctrl(self.edit.doc, 13, function() {
						self.sync();
					//	document.forms['example'].submit();
						if(editor.isEmpty()){ 
							alert('请输入内容'); 
							return false; 
						} 
					});
				},
				afterBlur : function(){
						var self = this;
						self.sync();
					if(!editor.isEmpty()){ 
							var text=editor.text(); 
							var html=editor.html(); 
						//	alert(text) ;
		  				//	alert(html) ;
				//			return false; 
					} 
				
					if($('span.ke-img').length === 0){
						editor.remove();
						$(input).val('') ;
					}
				}	 
			});
		   editor.focus(); 
		   prettyPrint();
		})
		
		
	});
</script>
<?php }} ?>