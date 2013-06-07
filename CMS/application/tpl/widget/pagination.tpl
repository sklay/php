<script type="text/javascript" src="{$pageModel->baseUrl}ui/static/thirdparty/jquery/jquery.pagination.js"></script>
<script type="text/javascript">
	var opt = {
    		callback: pageCallback 
    		,items_per_page: {$pageModel->pageSize}
    		,num_display_entries: 10
   			,num_edge_entries: 2
         	,prev_text :'上一页' 
            ,next_text:'下一页'
            ,link_to :'javascript:void(0);'
    };
            
    function pageCallback(page_index, jq){
       
		var limit = {$pageModel->pageSize}*page_index ;

        $.post('{$pageModel->baseUrl}index.php/news/page'
                ,{
                     pageSize:{$pageModel->pageSize}
                	,pageLimit:limit
                	,comment_type:{$pageModel->type}
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
       $("#Pagination").pagination({$pageModel->total}, opt);
       
       newsEdit = function(id){
       		$.post('{$pageModel->baseUrl}index.php/page/get/'+id,function(rst){
       		
       		
       		
       		})
       } ;
       
       newsDelete = function(id){
       		$.post('{$pageModel->baseUrl}index.php/page/romove/'+id,function(rst){
       		
       		
       		
       		})
       } ;
    });

</script>
		<div id='Pagination' class="pagination pagination-centered"></div>	
