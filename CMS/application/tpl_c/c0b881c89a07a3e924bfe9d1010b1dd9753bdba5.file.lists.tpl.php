<?php /* Smarty version Smarty-3.1.13, created on 2013-04-30 16:34:11
         compiled from "D:\workspace\CMS\application\tpl\widget\news\lists.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15996517f82030def89-83598384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0b881c89a07a3e924bfe9d1010b1dd9753bdba5' => 
    array (
      0 => 'D:\\workspace\\CMS\\application\\tpl\\widget\\news\\lists.tpl',
      1 => 1367265178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15996517f82030def89-83598384',
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
  'unifunc' => 'content_517f8203111050_39582793',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517f8203111050_39582793')) {function content_517f8203111050_39582793($_smarty_tpl) {?><ul class="unstyled">
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