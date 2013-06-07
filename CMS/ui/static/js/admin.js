$(function() {
	var errorRendered= {'add':false,'edit':false};
		$.extend({
			admin:function(args){
				var ctx = args.ctx||'';
				var currentPageId = args.currentPageId;
				var ajaxSort = function(widgetsData){
					$.post(ctx+"widget/sort",{widgets:$.toJSON(widgetsData)}) ;
				//	$.ajax(ctx+"widget/sort",{type:'post',contentType:'application/json',data:{widgets:$.toJSON(widgetsData)}});
				};
				$(".column").sortable({
					connectWith : ".column",
					cursor : "move",
					update: function(event, ui) {
						if(ui.sender){
							var data = new Array();
							//to another container , update self and siblings
							var rank = ui.item.index();
							data.push({"id":ui.item.attr("id").replace("widget-",""),"rank":rank,"container":$(this).attr("id")});
							ui.item.siblings(".widget").each(function(){
								data.push({"id":$(this).attr("id").replace("widget-",""),"rank":$(this).index()});
							});
							ajaxSort(data);
						}else{
							if(ui.item.parent().attr("id")==$(this).attr("id")){
								var data = new Array();
								//just change rank , update self and rank changed siblings(do unitl newRank==oldRank) 
								var rank = ui.item.index();
								data.push({"id":ui.item.attr("id").replace("widget-",""),"rank":rank});
								ui.item.siblings(".widget").each(function(){
									if($(this).index()!= rank+1){
										return false; 
									}
									data.push({"id":$(this).attr("id").replace("widget-",""),"rank":++rank});
								});
								ajaxSort(data);
							}else{
								//remove form self,don't need to update
							}
						}
					}
				});
				$(".column").disableSelection();
				
				CMS.modal({id:"widgetEdit",header:"widget配置",
					onShown:function(){
						setTimeout(function(){
							var _this = $("#widgetEdit");
							_this.find("select[name=border]").on("change",function(){
								_this.find("#borderClassSelector").toggle();
							});
							$(".system-borders a").on("click",function(){
								$(this).siblings().removeClass("btn-selected");
								$(this).addClass("btn-selected");
							});
						}, 200);
					},
					onHidden:function(){$(this).removeData('modal');},
					onSubmit:function(e){
						var _this = $("#widgetEdit");
						e.preventDefault();
						var tpl = _this.find("select[name=border]").val();
						var bc = tpl=='none.tpl'?"":_this.find(".btn-selected").attr("data-widget-setstyle");
						var stts = {};
						_this.find(".settings").each(function(index,el){
							var _key = $(el).children("div:eq(0)").attr("key");
							stts[_key]=$(el).find("input").val();
						});
						var data = {id:_this.find("input[name=id]").val(),title:_this.find("input[name=title]").val(),borderTpl:tpl,borderClass:bc,settings:stts};
						
						$.post(_this.find("form").attr("action"),{widget:$.toJSON(data)},function(){
							location.reload();
						}) ;
					//	$.ajax(_this.find("form").attr("action"),{type:'post',contentType:'application/json',data:$.toJSON(data),complete:function(){
						//	location.reload();
					//	}});
					}
				});
				var widgetHelper = $("<div id='widgetHelper'><a class='icon icon-edit' data-toggle='modal' data-target='#widgetEdit'></a><a class='icon icon-remove' href='javascript:void(0)'></a></div>").appendTo("body");
				$(".widget").hover(function(){widgetHelper.appendTo($(this)).show();},function(){widgetHelper.hide();});
				
				$("#widgetHelper .icon-remove").click(function(){
					$.post(ctx+"widget/remove/", {widgetId:$(this).parents(".widget").attr("id").replace("widget-","")},function(){
						location.reload();
					});
				});
				$("#widgetHelper .icon-edit").click(function(){
					$(this).attr("href",ctx+"widget/initEdit/"+$(this).parents(".widget").attr("id").replace("widget-",""));
				});
				
				//widget toolbar
				//admin toolbar
				var toolbar = "<ul id='toolbar'><li><a data-toggle='modal' href='"+ctx+"page/initCreate"+(currentPageId?"/"+currentPageId:"")+"' data-target='#pageCreate'>添加页面</a></li>";
				if(currentPageId){
					toolbar += ("<li><a data-toggle='modal' href='"+ctx+"page/initEdit/"+currentPageId+"' data-target='#pageEdit'>编辑本页</a></li>"+
								"<li><a data-toggle='modal' href='"+ctx+"page/remove/"+currentPageId+"'>删除本页</a></li>"+
								"<li><a data-toggle='modal' href='"+ctx+"widget/initCreate/"+currentPageId+"' data-target='#widgetAdd'>添加模块</a></li>"+
								"<li><a data-toggle='modal' href='"+ctx+"layout/initLay' data-target='#layoutChange'>修改布局</a></li>"+
								"<li><a data-toggle='modal' href='' data-target='#layoutExport'>导出布局</a></li>" +
								"<li><a data-toggle='modal' href='' data-target='#golbelConfig'>全站配置</a></li>");
				}
				toolbar+="</ul>";
				$(toolbar).appendTo("body").end().animate({"top":"30%"});
				CMS.modal({id:"pageCreate",header:"添加页面",
					onSubmit:function(e){
						e.preventDefault();
						var btn = $('#pageCreate .btn-primary');
						var frm = $('#pageCreate').find('form');
						$.sendForm('add' ,btn ,frm) ;
					}
					,onHidden:function(){
						$(this).removeData('modal');
					}
				});
				if(currentPageId){
					CMS.modal({id:"pageEdit",header:"编辑本页"
						,onHidden:function(){
							$(this).removeData('modal');
						},
						onSubmit:function(e){
							e.preventDefault();
							var btn = $('#pageEdit .btn-primary');
							var frm = $('#pageEdit').find('form');
							$.sendForm('edit' ,btn ,frm) ;
						}
					});
					CMS.modal({id:"pageRemove",header:"删除本页"});
					CMS.modal({id:"widgetAdd",header:"添加模块",nofooter:true,onShown:function(){
						var btns = $("#widgetAdd .btn");
						btns.unbind("click");
						btns.on("click",function(){
							$.post(ctx+"widget/create", {pageId:currentPageId,widgetName:$(this).attr("widgetName")},function(){
								location.reload();
							});
						});
					}});
					CMS.modal({id:"layoutChange",header:"修改布局",nofooter:true,onShown:function(){
						$(".layout-demo").hover(
							  function () {
							    $(this).addClass("layout-demo-hover");
							  },
							  function () {
							    $(this).removeClass("layout-demo-hover");
							  }
						).on("click",function(){
							var layout =$(this).attr("layout");
							$.post(ctx+"layout/change", {newLayout:layout,pageId:currentPageId},function(){
								location.reload();
							});
						});
					}});
				}
			} ,
			/** 提交表单*/
			sendForm :function(action,btn ,frm){
				btn.button('loading');
				if(!errorRendered[action]){
					$("<div class='alert alert-error fade in hide'></div>").insertBefore(frm).alert();
					errorRendered[action]=true;
				}
				$.post(frm.attr('action'),frm.serialize(),function(res){
					var alertEl = $(frm).parent().find(".alert");
					switch (res.code) {
						case 0: alertEl.html(res.msg).show() ; break;
						case 1: window.location = res.url ;break;
						default: alertEl.html("网络异常.").show(); break;
					}
					btn.button('reset');
				},'json');
			
			} ,
			/** widget配置**/
			widgetSetting: function(){
				
				
			}
		});
	});