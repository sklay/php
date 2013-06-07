<?php /* Smarty version Smarty-3.1.13, created on 2013-04-30 16:34:11
         compiled from "D:\workspace\CMS\application\tpl\widget\breadcrumb\line.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8559517f820306e408-27210597%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48e0dcf6f5f30cab6d34fcbfee70879ad00b22c4' => 
    array (
      0 => 'D:\\workspace\\CMS\\application\\tpl\\widget\\breadcrumb\\line.tpl',
      1 => 1367265177,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8559517f820306e408-27210597',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'currentPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_517f82030cfe44_91194614',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517f82030cfe44_91194614')) {function content_517f82030cfe44_91194614($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['currentPage']->value)&&isset($_smarty_tpl->tpl_vars['currentPage']->value->parent)){?>
	<ul class="breadcrumb">
	  <li><a href="/<?php echo $_smarty_tpl->tpl_vars['currentPage']->value->parent->alias;?>
" ><?php echo $_smarty_tpl->tpl_vars['currentPage']->value->parent->name;?>
</a> <span class="divider">/</span></li>
	  <li class="active"><?php echo $_smarty_tpl->tpl_vars['currentPage']->value->name;?>
</li>
	</ul>
<?php }?><?php }} ?>