<?php /* Smarty version Smarty-3.1.13, created on 2013-06-06 16:06:28
         compiled from "D:\workspace-any\CMS\application\tpl\widget\slider\carousel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3152251b043041b0ed6-91148629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '894b3e7c0f62b5fdc14c73339c5c2462d70b8cee' => 
    array (
      0 => 'D:\\workspace-any\\CMS\\application\\tpl\\widget\\slider\\carousel.tpl',
      1 => 1370501985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3152251b043041b0ed6-91148629',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'widget' => 0,
    'index' => 0,
    'img' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51b04304236440_73170960',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b04304236440_73170960')) {function content_51b04304236440_73170960($_smarty_tpl) {?><div class="carousel slide" id="home-carousel">
	<!-- Carousel items -->
	<div class="carousel-inner">
		   <?php if (isset($_smarty_tpl->tpl_vars['widget']->value->settings->images)){?>
		 <?php  $_smarty_tpl->tpl_vars['img'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['img']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['widget']->value->settings->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['img']->key => $_smarty_tpl->tpl_vars['img']->value){
$_smarty_tpl->tpl_vars['img']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['img']->key;
?>
		 	<div class="item <?php if ($_smarty_tpl->tpl_vars['index']->value==0){?> active<?php }?>">
		 		<img alt="" src='<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
'>
		 	</div>
	  	   <?php } ?>
	  	   <?php }?>
	</div>
	<?php if (isset($_smarty_tpl->tpl_vars['widget']->value->settings->images)){?>
		<a data-slide="prev" href="#home-carousel" class="carousel-control left">‹</a>
		<a data-slide="next" href="#home-carousel" class="carousel-control right">›</a>
	<?php }?>
</div><?php }} ?>