<?php /* Smarty version Smarty-3.1.13, created on 2013-06-06 16:16:20
         compiled from "D:\workspace-any\CMS\application\tpl\widget\breadcrumb\line.tpl" */ ?>
<?php /*%%SmartyHeaderCode:317925189a7c4f37917-43045353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f35a6ce0f7a3e89de848166b4f7d1e15e6ec9a8' => 
    array (
      0 => 'D:\\workspace-any\\CMS\\application\\tpl\\widget\\breadcrumb\\line.tpl',
      1 => 1370222375,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '317925189a7c4f37917-43045353',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5189a7c5058e44_93089247',
  'variables' => 
  array (
    'currentPage' => 0,
    'ctx' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5189a7c5058e44_93089247')) {function content_5189a7c5058e44_93089247($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['currentPage']->value)&&isset($_smarty_tpl->tpl_vars['currentPage']->value->parent)){?>
	<ul class="breadcrumb">
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['ctx']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentPage']->value->parent->alias;?>
" ><?php echo $_smarty_tpl->tpl_vars['currentPage']->value->parent->name;?>
</a> <span class="divider">/</span></li>
	  <li class="active"><?php echo $_smarty_tpl->tpl_vars['currentPage']->value->name;?>
</li>
	</ul>
<?php }?><?php }} ?>