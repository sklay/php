<?php /* Smarty version Smarty-3.1.13, created on 2013-05-06 17:02:16
         compiled from "D:\workspace-cms\CMS\application\tpl\widget\pagination.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2345851877198086355-65138807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0e942293f83df4bc8ed17d839b67834d441fe6f' => 
    array (
      0 => 'D:\\workspace-cms\\CMS\\application\\tpl\\widget\\pagination.tpl',
      1 => 1367459123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2345851877198086355-65138807',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pageModel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5187719812d2e3_96217726',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5187719812d2e3_96217726')) {function content_5187719812d2e3_96217726($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->baseUrl;?>
ui/static/thirdparty/jquery/jquery.pagination.js"></script>
<script type="text/javascript">
	var opt = {
    		callback: pageCallback 
    		,items_per_page: <?php echo $_smarty_tpl->tpl_vars['pageModel']->value->pageSize;?>

    		,num_display_entries: 10
   			,num_edge_entries: 2
         	,prev_text :'上一页' 
            ,next_text:'下一页'
    };
            
    function pageCallback(page_index, jq){
       
		var limit = <?php echo $_smarty_tpl->tpl_vars['pageModel']->value->pageSize;?>
*page_index ;

        $.post('<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->baseUrl;?>
news/page'
                ,{
                     pageSize:<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->pageSize;?>

                	,pageLimit:limit
                	,comment_type:<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->type;?>

                }
                ,function(data){
                    var content = '' ;
                    if(data){
						$.each(eval(data) ,function(index , value){
							content +=split_item(value) ;
						})
                    }
                    $('#searchresult').html(content) ;
         })

         split_item = function(itemDate){
            if(!itemDate)
                return  ;
            var tr = '<tr><td><input type="checkbox" class="no-margin"></td><td>title</td><td>time</td><td>删除 修改</td></tr>' ;
			return tr.replace('title',itemDate.title).replace('time',itemDate.create_at) ;

         }
     
    }

    $(document).ready(function(){
       $("#Pagination").pagination(<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->total;?>
, opt);
    });

</script>
		<div id='Pagination' class="pagination pagination-centered">
		</div>	
<?php }} ?>