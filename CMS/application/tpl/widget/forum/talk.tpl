<div class="row-fluid">
	<div class="media">
	  <a class="pull-left" href="#">
	    <img class="media-object" data-src="{$resource}holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="{$resource}resource/slider/demo/test.png">
	  </a>
	  <div class="media-body">
	    <h4 class="media-heading">Media heading</h4>
	    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
	  </div>
	</div>
	
	<div class="media">
	  <a class="pull-left" href="#">
	    <img class="media-object" data-src="{$resource}holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="{$resource}resource/slider/demo/test.png">
	  </a>
	  <div class="media-body">
	    <h4 class="media-heading">Media heading</h4>
	    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
	    <div class="media">
	      <a class="pull-left" href="#">
	        <img class="media-object" data-src="{$resource}holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="{$resource}resource/slider/demo/test.png">
	      </a>
	      <div class="media-body">
	        <h4 class="media-heading">Media heading</h4>
	        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
	      </div>
	    </div>
	  </div>
	</div>
</div>           
<div class="row-fluid" >
    <h6>I Want To Say ...</h6>
    <input class="span10" type="text" id='textarea1' placeholder="我要说...">
</div>

<link rel="stylesheet" href="{$baseUrl}ui/static/thirdparty/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="{$baseUrl}ui/static/thirdparty/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="{$baseUrl}ui/static/thirdparty/kindeditor/lang/zh_CN.js"></script>
<script>
	$(function() {
		var menu = ['emoticons'] ;
		var editor = '' ;
	
		$("input.span10").on('click',function(){
			input = this ;
			editor = KindEditor.create(this,{
				id: 'targetId' ,
				items :menu ,
				filterMode : true ,
				cssPath : '{$baseUrl}ui/static/thirdparty/kindeditor/plugins/code/prettify.css',
				afterCreate : function() {
					var self = this;
					KindEditor.ctrl(self.edit.doc, 13, function() {
						self.sync();
					//	document.forms['example'].submit();
						if(editor.isEmpty()){ 
							alert('请输入内容'); 
							return false; 
						} 
					});
				},
				afterBlur : function(){
						var self = this;
						self.sync();
					if(!editor.isEmpty()){ 
							var text=editor.text(); 
							var html=editor.html(); 
						//	alert(text) ;
		  				//	alert(html) ;
				//			return false; 
					} 
				
					if($('span.ke-img').length === 0){
						editor.remove();
						$(input).val('') ;
					}
				}	 
			});
		   editor.focus(); 
		   prettyPrint();
		})
		
		
	});
</script>
