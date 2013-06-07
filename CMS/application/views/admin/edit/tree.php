
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Big Tree</title>
<link href="<?=base_url();?>ui/static/css/jquery.tree.css"
	rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css"
	href="<?=base_url();?>ui/static/thirdparty/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css"
	href="<?=base_url();?>ui/static/thirdparty/bootstrap/css/bootstrap-responsive.min.css">
<link rel="stylesheet" type="text/css"
	href="<?=base_url();?>ui/static/css/base.css">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
	      <script src="<?php echo base_url();?>ui/static/js/html5shiv.js"></script>
	      <script src="<?php echo base_url();?>ui/static/js/respond.min.js"></script>
	    <![endif]-->
<script
	src="<?php echo base_url();?>ui/static/thirdparty/jquery/jquery-1.9.1.min.js"></script>
<script
	src="<?php echo base_url();?>ui/static/thirdparty/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>ui/static/js/base.js"></script>

<script src="<?=base_url();?>ui/static/thirdparty/jquery/jquery.tree.js"></script>
<script
	src="<?=base_url();?>ui/static/thirdparty/edit/edit_area_full.js"></script>

<script type="text/javascript">
        $(document).ready(function() {

        	CMS.modal({"id":"msgModal","header":"提示消息",onShown:function(msg){$(this).find('.modal-body').html(msg);}});

        	
             var o = {
                showcheck: true,          
                url: "<?=base_url().'edit/tree/treedata';?>" ,
                showcheck: true,
                cbiconpath : "<?=base_url().'ui/static/images/icons/';?>" ,
                emptyiconpath: "<?=base_url().'ui/static/images/s.gif';?>" ,
                theme: "bbit-tree-arrows", //bbit-tree-lines ,bbit-tree-no-lines,bbit-tree-arrows
                onnodeclick:onNodeClick
            };
            $("#tree").treeview(o);


            function onNodeClick(item){
            	  var path = item.src;
            	if(item.hasChildren)
                	return false ;
                
                var path = item.src;
				var id = item.id ;

				var title = item.text ;
				var syntax = 'php' ;
				var url = "<?=base_url().'edit/tree/loadfile';?>" ;
                $.post(url,{path:path,id:id},function(data){

                	var new_file= {id: id, text: data, syntax: syntax, title: title};
        			editAreaLoader.openFile('edit_content', new_file);
                }) ;
                
            }
            
            $("#showchecked").click(function(e){
                var s=$("#tree").getTSVs();
                if(s !=null)
                alert("fun=>showchecked "+s.join(","));
                else
                alert("fun=>showchecked "+"NULL");
            });
             $("#showcurrent").click(function(e){
                var s=$("#tree").getTCT();
                if(s !=null)
                    alert("fun=>showcurrent "+s.parent.src);
                else
                    alert("fun=>showcurrent "+"NULL");
             });
        });





        editAreaLoader.init({
			id: "edit_content"	// id of the textarea to transform	
			,start_highlight: true
			,allow_toggle: false
			,language: "zh"
			,syntax: "html"	
			,toolbar: "new_document, save, load, |,search, go_to_line, |, undo, redo, |, select_font, |, syntax_selection, |, change_smooth_selection, highlight, reset_highlight, |, help"
			,syntax_selection_allow: "css,html,js,php,python,vb,xml,c,cpp,sql,basic,pas,brainfuck"
			,is_multi_files: true
			,EA_load_callback: "editAreaLoaded"
			,show_line_colors: true
			,load_callback: "my_load"
			,save_callback: "my_save"
			,plugins: "charmap"
			,charmap_default: "arrows"
			,EA_file_close_callback :"my_close"
		});

     // callback functions
        function my_load(id){
			editAreaLoader.setValue(id);
		}

		function my_save(id, content){

			var currentFile = editAreaLoader.getCurrentFile(id) ;


			$('#msgModal').find('.modal-body').html("id=> '"+ id +"':\n content=>"+content) ;
        	$('#msgModal').modal('show') ;
			
				alert("id=> '"+ id +"':\n content=>"+content);
		}
		function my_close(file){

			if(file.edited){
	        	$('#msgModal').find('.modal-body').html(file.title+"<br/>文件已经修改过是否保存？") ;
	        	$('#msgModal').modal('show') ;
				return false ;
			}
			
		}
		
		function editAreaLoaded(id){
			if(id=="edit_content")
			{
			}
		}
		
    </script>

</head>
<body>

	<div class="navbar">
		<div class="navbar-inner ">
			<a class="brand" href="#">SkLAY</a>
			<ul class="nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Link</a></li>
				<li><a href="#">Link</a></li>
			</ul>

			<ul class="nav pull-right">
				<li class="dropdown"><a data-toggle="dropdown"
					class="dropdown-toggle" href="#"> <i class="icon-cog"></i> 设置 <b
						class="caret"></b> </a>
					<ul class="dropdown-menu">
						<li><a href="javascript:;">账户设置</a></li>
						<li><a href="javascript:;">Privacy Settings</a></li>
						<li class="divider"></li>
						<li><a href="javascript:;">Help</a></li>
					</ul>
				</li>
				<li class="dropdown"><a data-toggle="dropdown"
					class="dropdown-toggle" href="#"> <i class="icon-user"></i> <b
						class="caret"></b> </a>
					<ul class="dropdown-menu">
						<li><a href="javascript:;">我的账户</a></li>
						<li class="divider"></li>
						<li><a href="admin/identity/logout">登出</a></li>
					</ul>
				</li>
				<li><a href="#"></a>
				</li>
			</ul>
		</div>
	</div>
	<div class="container-fluid fill">
		<div class="row-fluid col-wrap">
			<div class="span2">
				<div id="tree"></div>
			</div>
			<div class="span10">
				<textarea id="edit_content" style="height: 600px; width: 100%;">
		</textarea>
				<p>
					Custom controls:<br /> <input type='text' id='input_'>
				</p>
			</div>
		</div>
	</div>


</body>
</html>
