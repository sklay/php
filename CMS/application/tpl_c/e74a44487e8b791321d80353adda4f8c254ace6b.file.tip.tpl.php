<?php /* Smarty version Smarty-3.1.13, created on 2013-06-06 17:09:23
         compiled from "D:\workspace-any\CMS\application\tpl\widget\team\tip.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2802551b051c3d8eae7-07288529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e74a44487e8b791321d80353adda4f8c254ace6b' => 
    array (
      0 => 'D:\\workspace-any\\CMS\\application\\tpl\\widget\\team\\tip.tpl',
      1 => 1370509689,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2802551b051c3d8eae7-07288529',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'widget' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51b051c3dde8a5_22820917',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b051c3dde8a5_22820917')) {function content_51b051c3dde8a5_22820917($_smarty_tpl) {?><div class="span12">
	<div class="well centered">
		<h3>
			<?php echo $_smarty_tpl->tpl_vars['widget']->value->settings->tips->tip;?>

			 <a class="btn btn-primary btn-large" href="<?php echo $_smarty_tpl->tpl_vars['widget']->value->settings->tips->domain;?>
">了解更多 
			 	<i class="icon icon-caret-right"></i>
			 </a>
		 </h3>
	</div>
</div><?php }} ?>