$(function($){
	var inited = {'login':false,'regist':false};
	var errorRendered= {'login':false,'regist':false};
	function initOnce(formEl,action){
		if(!inited[action]){
			$(formEl).find('.email').typeahead({source:function(t){
				return t.indexOf('@')==-1?[t+"@126.com",t+"@163.com",t+"@263.net",t+"@chinaren.com",t+"@gmail.com",t+"@hotmail.com",t+"@msn.com",t+"@qq.com",t+"@sina.com",t+"@sohu.com",t+"@yahoo.com",t+"@yahoo.com.cn"]:[];
			},items:15});
			$(formEl).find('.btn-primary').on('click',function(e){
				var btn = $(this);
				btn.button('loading');
				var frm = $(formEl).find('form');
				if(!errorRendered[action]){
					$("<div class='alert alert-error fade in hide'></div>").insertBefore(frm).alert();
					errorRendered[action]=true;
				}
				$.post(frm.attr('action'),frm.serialize(),function(res){
					var alertEl = $(formEl).find(".alert");
					switch (res.code) {
						case 0:alertEl.html(res.msg).show(); break;
						case 1:  window.location.reload() ; break;
						default: alertEl.html("网络异常.").show(); break;
					}
					btn.button('reset');
				},'json');
			});
			inited[action] = true;
		}
	}
	CMS.modal({"id":"loginModal","header":"用户登录", onShown:function(e){initOnce("#loginModal",'login');},onSubmit:function(e){e.preventDefault();}});
	CMS.modal({"id":"registModal","header":"用户注册",onShown:function(e){initOnce("#registModal",'regist');},onSubmit:function(e){e.preventDefault();}});
});