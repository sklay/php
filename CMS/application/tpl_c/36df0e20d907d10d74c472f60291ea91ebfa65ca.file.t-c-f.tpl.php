<?php /* Smarty version Smarty-3.1.13, created on 2013-04-30 16:34:10
         compiled from "D:\workspace\CMS\application\tpl\border\t-c-f.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15438517f8202effa35-16000103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36df0e20d907d10d74c472f60291ea91ebfa65ca' => 
    array (
      0 => 'D:\\workspace\\CMS\\application\\tpl\\border\\t-c-f.tpl',
      1 => 1367265178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15438517f8202effa35-16000103',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'widget' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_517f8203058955_38851007',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517f8203058955_38851007')) {function content_517f8203058955_38851007($_smarty_tpl) {?><div id="widget-<?php echo $_smarty_tpl->tpl_vars['widget']->value->id;?>
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