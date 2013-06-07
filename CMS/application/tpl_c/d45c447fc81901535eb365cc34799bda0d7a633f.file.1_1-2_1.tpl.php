<?php /* Smarty version Smarty-3.1.13, created on 2013-05-06 17:02:16
         compiled from "D:\workspace-cms\CMS\application\tpl\layout\1_1-2_1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8176518771981c5c22-71279221%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd45c447fc81901535eb365cc34799bda0d7a633f' => 
    array (
      0 => 'D:\\workspace-cms\\CMS\\application\\tpl\\layout\\1_1-2_1.tpl',
      1 => 1367459123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8176518771981c5c22-71279221',
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
  'unifunc' => 'content_518771982983c7_39839899',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518771982983c7_39839899')) {function content_518771982983c7_39839899($_smarty_tpl) {?><div class="row-fluid">
	<div class="column span12" id="row0">
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
</div>
<div class="row-fluid">
	<div class="column span4" id="row1">
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
	<div class="column span8" id="row2">
		<?php if (isset($_smarty_tpl->tpl_vars['containerMap']->value['row2'])){?>
			<?php  $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['w']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['containerMap']->value['row2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['w']->key => $_smarty_tpl->tpl_vars['w']->value){
$_smarty_tpl->tpl_vars['w']->_loop = true;
?>
				<?php echo $_smarty_tpl->tpl_vars['w']->value->content;?>

	 		<?php } ?>	
		<?php }?>
	</div>
</div>
<div class="row-fluid">
	<div class="column span12" id="row3">
		<?php if (isset($_smarty_tpl->tpl_vars['containerMap']->value['row3'])){?>
			<?php  $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['w']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['containerMap']->value['row3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['w']->key => $_smarty_tpl->tpl_vars['w']->value){
$_smarty_tpl->tpl_vars['w']->_loop = true;
?>
				<?php echo $_smarty_tpl->tpl_vars['w']->value->content;?>

	 		<?php } ?>	
		<?php }?>
	</div>
</div><?php }} ?>