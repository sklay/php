<?php /* Smarty version Smarty-3.1.13, created on 2013-05-04 17:44:31
         compiled from "D:\workspace-cms\CMS\application\tpl\border\t-c-f.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183155184d87f200987-90174747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '224ef56dc706ef9d16f339228c21a93d411cd5a5' => 
    array (
      0 => 'D:\\workspace-cms\\CMS\\application\\tpl\\border\\t-c-f.tpl',
      1 => 1367459123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183155184d87f200987-90174747',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'widget' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5184d87f42dd61_94471488',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5184d87f42dd61_94471488')) {function content_5184d87f42dd61_94471488($_smarty_tpl) {?><div id="widget-<?php echo $_smarty_tpl->tpl_vars['widget']->value->id;?>
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