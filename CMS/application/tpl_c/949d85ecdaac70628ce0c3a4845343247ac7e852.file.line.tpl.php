<?php /* Smarty version Smarty-3.1.13, created on 2013-05-04 17:44:31
         compiled from "D:\workspace-cms\CMS\application\tpl\widget\breadcrumb\line.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1045184d87f5036c3-01465235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '949d85ecdaac70628ce0c3a4845343247ac7e852' => 
    array (
      0 => 'D:\\workspace-cms\\CMS\\application\\tpl\\widget\\breadcrumb\\line.tpl',
      1 => 1367459123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1045184d87f5036c3-01465235',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'currentPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5184d87f58bf92_20046851',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5184d87f58bf92_20046851')) {function content_5184d87f58bf92_20046851($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['currentPage']->value)&&isset($_smarty_tpl->tpl_vars['currentPage']->value->parent)){?>
	<ul class="breadcrumb">
	  <li><a href="/<?php echo $_smarty_tpl->tpl_vars['currentPage']->value->parent->alias;?>
" ><?php echo $_smarty_tpl->tpl_vars['currentPage']->value->parent->name;?>
</a> <span class="divider">/</span></li>
	  <li class="active"><?php echo $_smarty_tpl->tpl_vars['currentPage']->value->name;?>
</li>
	</ul>
<?php }?><?php }} ?>