
<script type="text/javascript" src="{$resource}swf/swfupload.js"></script>
<script type="text/javascript" src="{$resource}swf/handlers.js"></script>
<div style="display: inline; border: solid 1px #7FAAFF; background-color: #C5D9FF; padding:2px; line-height: 20px;">
              <span id="spanButtonPlaceholder"></span>
            </div>
<div id="divFileProgressContainer"></div>
<script type="text/javascript">
  var swfu;
  window.onload = function () {
    swfu = new SWFUpload({
      // Backend Settings
      upload_url: "admin/picture/do_upload",
      post_params: "",

      // File Upload Settings
      file_size_limit : "2 MB",	// 2MB
      file_types : "*.jpg",
      file_types_description : "JPG Images",
      file_upload_limit : "0",

      // Event Handler Settings - these functions as defined in Handlers.js
      //  The handlers are not part of SWFUpload but are part of my website and control how
      //  my website reacts to the SWFUpload events.
      file_queue_error_handler : fileQueueError,
      file_dialog_complete_handler : fileDialogComplete,
      upload_progress_handler : uploadProgress,
      upload_error_handler : uploadError,
      upload_success_handler : uploadSuccess,
      upload_complete_handler : uploadComplete,

      // Button Settings
      button_image_url : "{$resource}/silder/demo/test.png",
      button_placeholder_id : "spanButtonPlaceholder",
      button_width: 240,
      button_height: 18,
      button_text : '<span class="button">选择图片<span class="buttonSmall">(单文件最大2MB，可多选)</span></span>',
      button_text_style : '.button { font-size: 12px; } .buttonSmall { font-size: 11px; }',
      button_text_top_padding: 0,
      button_text_left_padding: 18,
      button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
      button_cursor: SWFUpload.CURSOR.HAND,
      // Flash Settings
      flash_url : "{$resource}swf/swfupload.swf",
      custom_settings : {
        upload_target : "divFileProgressContainer"
      },
      // Debug Settings
      debug: false
    });
  };

  function check(){
    var post_title=$('#post_title');
    var post_cate=$('#post_cate');
    if(post_title.val()==''){
      alert('标题不能为空');
      return;
    }
    if(post_cate.val()==0){
      alert('请选择分类');
      return;
    }
    this.form.submit();
  }
</script>
