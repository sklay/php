<?php /* Smarty version Smarty-3.1.13, created on 2013-06-06 17:03:20
         compiled from "D:\workspace-any\CMS\application\tpl\widget\team\summary.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3202051b043266cf4a5-13226401%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2fac4853fb2c8d093b5a79f589ca471fa4f82314' => 
    array (
      0 => 'D:\\workspace-any\\CMS\\application\\tpl\\widget\\team\\summary.tpl',
      1 => 1370508812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3202051b043266cf4a5-13226401',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51b0432672b429_75999932',
  'variables' => 
  array (
    'widget' => 0,
    'summary' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b0432672b429_75999932')) {function content_51b0432672b429_75999932($_smarty_tpl) {?> <?php if (isset($_smarty_tpl->tpl_vars['widget']->value->settings->images)){?>
	 <?php  $_smarty_tpl->tpl_vars['summary'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['summary']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['widget']->value->settings->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['summary']->key => $_smarty_tpl->tpl_vars['summary']->value){
$_smarty_tpl->tpl_vars['summary']->_loop = true;
?>
	 	<div class="span3">
          <img class="img-rounded" src="<?php echo $_smarty_tpl->tpl_vars['summary']->value->avatar;?>
">
          <h2><?php echo $_smarty_tpl->tpl_vars['summary']->value->title;?>
</h2>
          <p><?php echo $_smarty_tpl->tpl_vars['summary']->value->description;?>
</p>
          <p><a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['summary']->value->domain;?>
">了解详情 »</a></p>
        </div>
  	 <?php } ?>
  <?php }?><?php }} ?>