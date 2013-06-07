<?php /* Smarty version Smarty-3.1.13, created on 2013-05-06 17:02:45
         compiled from "D:\workspace-cms\CMS\application\tpl\layout\1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7099518771b538bd56-44215523%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4da1886fcfdcc738cd128b4697b59154cde899f' => 
    array (
      0 => 'D:\\workspace-cms\\CMS\\application\\tpl\\layout\\1.tpl',
      1 => 1367459123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7099518771b538bd56-44215523',
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
  'unifunc' => 'content_518771b53f1b88_92410144',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518771b53f1b88_92410144')) {function content_518771b53f1b88_92410144($_smarty_tpl) {?><div class="row-fluid">
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
</div><?php }} ?>