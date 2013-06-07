<form class="form-horizontal" action="<?=base_url('index.php/common/identity/login') ?>" method="post">
  <div class="control-group">
    <label class="control-label" for="inputEmail">帐号</label>
    <div class="controls">
     <input type="email" name="login_name" placeholder="Email" class="email" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">密码</label>
    <div class="controls">
      <input type="password" name="login_pwd" placeholder="Password" />
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <label class="checkbox">
        <input type="checkbox" checked="checked" name="rember"> 记住帐号
      </label>
    </div>
  </div>
  <!-- 
  <div class="control-group">
  	<div class="controls">
  		<button class="btn btn-primary" type="button" data-toggle="modal" href="<?=base_url('index.php/common/identity/regist');?>" onclick="javascript:$('#loginModal').modal('hide');" data-target="#registModal">还没有帐号 ,我要注册.</button>
  	</div>
  </div>
   -->
</form>
