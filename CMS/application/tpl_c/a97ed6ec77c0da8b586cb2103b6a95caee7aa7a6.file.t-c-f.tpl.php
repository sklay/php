<?php /* Smarty version Smarty-3.1.13, created on 2013-05-08 09:17:56
         compiled from "D:\workspace-any\CMS\application\tpl\border\t-c-f.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136835189a7c4e66227-65516802%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a97ed6ec77c0da8b586cb2103b6a95caee7aa7a6' => 
    array (
      0 => 'D:\\workspace-any\\CMS\\application\\tpl\\border\\t-c-f.tpl',
      1 => 1367459123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136835189a7c4e66227-65516802',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'widget' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5189a7c4f20e32_87110415',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5189a7c4f20e32_87110415')) {function content_5189a7c4f20e32_87110415($_smarty_tpl) {?><div id="widget-<?php echo $_smarty_tpl->tpl_vars['widget']->value->id;?>
" class="widget <?php echo $_smarty_tpl->tpl_vars['widget']->value->border_class;?>
 ">
	<header>
		<h2><?php echo (($tmp = @$_smarty_tpl->tpl_vars['widget']->value->title)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['widget']->value->name : $tmp);?>
</h2>
	</header>
	<div class="widget-content">
		<?php echo $_smarty_tpl->tpl_vars['widget']->value->content;?>

	</div>
</div><?php }} ?>