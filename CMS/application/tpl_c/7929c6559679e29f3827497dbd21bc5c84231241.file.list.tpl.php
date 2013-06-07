<?php /* Smarty version Smarty-3.1.13, created on 2013-05-04 17:44:31
         compiled from "D:\workspace-cms\CMS\application\tpl\widget\news\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32015184d87f690585-41443878%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7929c6559679e29f3827497dbd21bc5c84231241' => 
    array (
      0 => 'D:\\workspace-cms\\CMS\\application\\tpl\\widget\\news\\list.tpl',
      1 => 1367459123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32015184d87f690585-41443878',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'comments' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5184d87f71da99_48323446',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5184d87f71da99_48323446')) {function content_5184d87f71da99_48323446($_smarty_tpl) {?><ul class="unstyled">
	<?php if (isset($_smarty_tpl->tpl_vars['comments']->value)){?>
		<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_smarty_tpl->tpl_vars['c_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
$_smarty_tpl->tpl_vars['comment']->_loop = true;
 $_smarty_tpl->tpl_vars['c_key']->value = $_smarty_tpl->tpl_vars['comment']->key;
?>
			<li><a href='/news/detail?newsId='><?php echo $_smarty_tpl->tpl_vars['comment']->value->title;?>
</a></li>
	 	<?php } ?>	
	<?php }?>
</ul>
<?php }} ?>