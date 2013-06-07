<?php /* Smarty version Smarty-3.1.13, created on 2013-05-06 17:02:16
         compiled from "D:\workspace-cms\CMS\application\tpl\widget\gather\iframe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:414751877198185938-96979524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f88c4338238d1ca20df4f79487fe6c1ca2c260c' => 
    array (
      0 => 'D:\\workspace-cms\\CMS\\application\\tpl\\widget\\gather\\iframe.tpl',
      1 => 1367459123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '414751877198185938-96979524',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'widget' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_518771981a9438_27760581',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518771981a9438_27760581')) {function content_518771981a9438_27760581($_smarty_tpl) {?><iframe src="<?php echo $_smarty_tpl->tpl_vars['widget']->value->settings->url;?>
" frameborder="0" width="<?php echo $_smarty_tpl->tpl_vars['widget']->value->settings->width;?>
" height="<?php echo $_smarty_tpl->tpl_vars['widget']->value->settings->height;?>
" scrolling="no"></iframe>
<?php }} ?>