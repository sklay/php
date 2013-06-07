<div class="row-fluid">

<div id="altContent"></div>
<!--
<div><input type="button" onclick="swfobject.getObjectById('faustcplus').jscall_updateAvatar();" value="JS Call Upload" /></div>
-->

<div id="avatar_priview"></div>
<script type="text/javascript" src="{$baseUrl}ui/static/thirdparty/faustcplus/swfobject.js"></script>
<script type="text/javascript">

			function uploadevent(status){
			     status += '';
				 switch(status){

					case '1':
						var time = new Date().getTime();
						$('#faceMesage').html('上传成功！') ;
					/*
						 $.ajax({
							url: "{$baseUrl}user/face/show",
							success: function(result){
								//alert(result);
							 	var msg=result.split("#");
								$('#avatar_priview').html("Avatar Priview: <img src='"+msg[0]+"?" + time + "'/> <br/> Source Image: <img src='"+msg[1]+"?" + time + "'/>");
							}
						});
					*/
					break;

					case '2':
						if(confirm('js call upload')){
							return 1;
						}else{
							return 0;
						}
					break;

					case '-1':
						$('#faceMesage').html('取消上传 ！') ;
						window.location.href = "#";
					break;
					case '-2':
						$('#faceMesage').html('上传失败 ！') ;
						window.location.href = "#";
					break;

					default:
						alert(typeof(status) + ' ' + status);
				} 
				$('#faseModal').modal('show') ;
			}

			var flashvars = {
				"pSize":"300|300|110|135|74|90|65|80" ,
			  "jsfunc":"uploadevent",
			  "imgUrl":"{$baseUrl}ui/static/thirdparty/faustcplus/avater/default.png",
			  "pid":"75642723",
			  "uploadSrc":true,
			  "showBrow":true,
			  "showCame":true,
			  "uploadUrl":"{$baseUrl}user/face/saveavater/uploadavatar"
			};

			var params = {
				menu: "true",
				scale: "noScale",
				allowFullscreen: "true",
				allowScriptAccess: "always",
				wmode:"transparent",
				bgcolor: "#FFFFFF"
			};

			var attributes = {
				id:"faustcplus"
			};

			swfobject.embedSWF("{$baseUrl}ui/static/thirdparty/faustcplus/FaustCplus.swf", "altContent", "650", "500", "9.0.0", "expressInstall.swf", flashvars, params, attributes);

		</script>

</div>
<!-- Modal -->
<div id="faseModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">用户头像上传</h3>
  </div>
  <div class="modal-body">
    <p id="faceMesage"></p>
  </div>
</div>