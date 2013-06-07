<div class="row-fluid">
	<ul class="nav nav-pills" id="news">
	  {if isset($newsTypes)}
		{foreach $newsTypes as $t}
			<li name="newsTypes" id='newsTypes-{$t->id}' {if $t->id eq $newsType->id }class="active"{/if}><a name="types" id="{$t->id}" href="javascript:void(0);" >{$t->description}</a></li>		
		{/foreach}
	  {/if}
    </ul>
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr><th><input type="checkbox" class="no-margin"></th><th>标题</th><th>创建时间</th><th>操作</th></tr>
		</thead>
		<tbody id='searchresult'></tbody>
	</table>
	<div id="includePage">
	{include "../pagination.tpl" pageModel=$pageModel}
	</div>
	<form action="{$pageModel->baseUrl}index.php/news/addNews" method="post" onsubmit="javascript:return checkNews(this) ;">
		<fieldset>
			<legend>发布内容</legend>
			<input type="hidden" id='comment_type' name="comment_type" value="{$newsType->id}"/>
			<div class='alert alert-error fade in hide'></div>
			<label>标题</label>
			<input type="text" name="title" placeholder="必填"/>
			<label>内容</label>
			<textarea id="content" name="content" style="width:100%;height:250px;"></textarea>
			<button type="submit" class="btn">发布</button>
		</fieldset>
	</form>
</div>
<link rel="stylesheet" href="{$pageModel->baseUrl}ui/static/thirdparty/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="{$pageModel->baseUrl}ui/static/thirdparty/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="{$pageModel->baseUrl}ui/static/thirdparty/kindeditor/lang/zh_CN.js"></script>
<script>
	$(function() {
	
		checkNews = function(obj){
//		//	var news_type = $('#news').find('li.active').attr('id').replace('newsTypes-','') ;
//		//	$('#').val(news_type) ;
			var frm = $(obj) ;
			$.post(frm.attr('action'),frm.serialize(),function(res){
				var alertEl = $(frm).find(".alert");
				switch (res.code) {
					case 0: alertEl.html(res.msg).show();break ;
					case 1: {literal}{alertEl.html(res.msg).show();$('#news').find('li.active').find('a').click() ;break;}{/literal}
					default: alertEl.html("网络异常.").show(); break;
				}
			},'json')
			return false ;
		}
		
	
		$('a[name="types"]').on("click", function() {
			var typeId = $(this).attr('id') ;
			var widgetId = $(this).parents('div.widget').attr("id").replace("widget-","") ;
			$typeNode = $(this) ;
			 $.post('{$pageModel->baseUrl}news/manager/'+typeId+'/'+widgetId,function(data){
					$('#includePage').html(data) ;
					$('li[name="newsTypes"]').removeClass('active') ;
					$typeNode.parent('li').addClass('active') ;
					$('#comment_type').val(typeId) ;
			 })
			return false ;
		 }) ;
		var menu = ['bold', 'italic', 'underline', 'strikethrough', 'removeformat','|','insertorderedlist', 'insertunorderedlist', 
		 				 'forecolor', 'hilitecolor', 'fontname', 'fontsize',  '|', 'link', 'unlink', 'emoticons', 
						 'shcode', 'image', 'flash', 'quote', '|','code','source','about'] ;
		
		var editor = KindEditor.create('textarea[name="content"]',{
			items :menu ,
			cssPath : '{$pageModel->baseUrl}ui/static/thirdparty/kindeditor/plugins/code/prettify.css',
			uploadJson : '{$pageModel->baseUrl}upload/upload',
			filePostName: 'imgFile',
			fileManagerJson : '{$pageModel->baseUrl}upload/file_manager',
			allowFileManager : true,
			afterCreate : function() {
				var self = this;
				KindEditor.ctrl(document, 13, function() {
					self.sync();
					document.forms['example'].submit();
				});
				KindEditor.ctrl(self.edit.doc, 13, function() {
					self.sync();
					document.forms['example'].submit();
				});
			}	 
		});
		prettyPrint();
	});
</script>