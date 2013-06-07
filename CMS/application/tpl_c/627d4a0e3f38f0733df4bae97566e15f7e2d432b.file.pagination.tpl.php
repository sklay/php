<?php /* Smarty version Smarty-3.1.13, created on 2013-06-06 16:32:24
         compiled from "D:\workspace-any\CMS\application\tpl\widget\pagination.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3016751b049188098f8-98995101%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '627d4a0e3f38f0733df4bae97566e15f7e2d432b' => 
    array (
      0 => 'D:\\workspace-any\\CMS\\application\\tpl\\widget\\pagination.tpl',
      1 => 1370314156,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3016751b049188098f8-98995101',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pageModel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51b049188b9e22_62273100',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b049188b9e22_62273100')) {function content_51b049188b9e22_62273100($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->baseUrl;?>
ui/static/thirdparty/jquery/jquery.pagination.js"></script>
<script type="text/javascript">
	var opt = {
    		callback: pageCallback 
    		,items_per_page: <?php echo $_smarty_tpl->tpl_vars['pageModel']->value->pageSize;?>

    		,num_display_entries: 10
   			,num_edge_entries: 2
         	,prev_text :'上一页' 
            ,next_text:'下一页'
            ,link_to :'javascript:void(0);'
    };
            
    function pageCallback(page_index, jq){
       
		var limit = <?php echo $_smarty_tpl->tpl_vars['pageModel']->value->pageSize;?>
*page_index ;

        $.post('<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->baseUrl;?>
index.php/news/page'
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
                
                
            var operation = '<div class="btn-group">';
			    operation += '<a class="btn btn-primary" href="javascript:void(0);"><i class="icon-cog icon-white"></i> 操作</a> ';
			    operation += '<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);"><span class="caret"></span></a> ';
			    operation += '<ul class="dropdown-menu"> ';
			    operation += '<li><a href="javascript:newsEdit('+itemDate.id+');"><i class="icon-pencil"></i>编辑</a></li> ';
			    operation += '<li><a href="javascript:newsDelete('+itemDate.id+');"><i class="icon-trash"></i>删除</a></li> ';
			    operation += '<li><a href="javascript:void(0);"><i class="icon-ban-circle"></i> Ban</a></li> ';
			    operation += '</ul> ';
			    operation += '</div> ';

            var tr = '<tr><td><input type="checkbox" class="no-margin"></td><td>title</td><td>time</td><td>'+operation+'</td></tr>' ;
			return tr.replace('title',itemDate.title).replace('time',itemDate.create_at) ;

         }
     
    }

    $(document).ready(function(){
       $("#Pagination").pagination(<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->total;?>
, opt);
       
       newsEdit = function(id){
       		$.post('<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->baseUrl;?>
index.php/page/get/'+id,function(rst){
       		
       		
       		
       		})
       } ;
       
       newsDelete = function(id){
       		$.post('<?php echo $_smarty_tpl->tpl_vars['pageModel']->value->baseUrl;?>
index.php/page/romove/'+id,function(rst){
       		
       		
       		
       		})
       } ;
    });

</script>
		<div id='Pagination' class="pagination pagination-centered"></div>	
<?php }} ?>