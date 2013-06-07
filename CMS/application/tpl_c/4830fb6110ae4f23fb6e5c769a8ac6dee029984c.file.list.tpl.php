<?php /* Smarty version Smarty-3.1.13, created on 2013-05-08 09:17:57
         compiled from "D:\workspace-any\CMS\application\tpl\widget\news\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124575189a7c51092e4-46456607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4830fb6110ae4f23fb6e5c769a8ac6dee029984c' => 
    array (
      0 => 'D:\\workspace-any\\CMS\\application\\tpl\\widget\\news\\list.tpl',
      1 => 1367459123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124575189a7c51092e4-46456607',
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
  'unifunc' => 'content_5189a7c5156571_70437958',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5189a7c5156571_70437958')) {function content_5189a7c5156571_70437958($_smarty_tpl) {?><ul class="unstyled">
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