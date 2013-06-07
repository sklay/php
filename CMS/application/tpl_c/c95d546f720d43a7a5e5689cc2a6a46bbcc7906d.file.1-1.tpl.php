<?php /* Smarty version Smarty-3.1.13, created on 2013-06-06 16:07:02
         compiled from "D:\workspace-any\CMS\application\tpl\layout\1-1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:249351b04326787780-38575607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c95d546f720d43a7a5e5689cc2a6a46bbcc7906d' => 
    array (
      0 => 'D:\\workspace-any\\CMS\\application\\tpl\\layout\\1-1.tpl',
      1 => 1367459123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '249351b04326787780-38575607',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'containerMap' => 0,
    'w' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51b043267def42_67373883',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b043267def42_67373883')) {function content_51b043267def42_67373883($_smarty_tpl) {?><div class="row-fluid">
	<div class="column span6" id="row0">
		<?php if (isset($_smarty_tpl->tpl_vars['containerMap']->value['row0'])){?>
			<?php  $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['w']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['containerMap']->value['row0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['w']->key => $_smarty_tpl->tpl_vars['w']->value){
$_smarty_tpl->tpl_vars['w']->_loop = true;
?>
				<?php echo $_smarty_tpl->tpl_vars['w']->value->content;?>

	 		<?php } ?>	
		<?php }?>
	</div>
	<div class="column span6" id="row1">
		<?php if (isset($_smarty_tpl->tpl_vars['containerMap']->value['row1'])){?>
			<?php  $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['w']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['containerMap']->value['row1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['w']->key => $_smarty_tpl->tpl_vars['w']->value){
$_smarty_tpl->tpl_vars['w']->_loop = true;
?>
				<?php echo $_smarty_tpl->tpl_vars['w']->value->content;?>

	 		<?php } ?>	
		<?php }?>
	</div>
</div><?php }} ?>