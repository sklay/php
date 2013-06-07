<form class="form-horizontal" action="<?=base_url('index.php/common/identity/login') ?>" method="post">
<div class="control-group">
	<label class="control-label" for="inputEmail">登入帐号</label>
	<div class="controls">
		<input type="email" name="username" placeholder="Email" class="email" />
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="inputPassword">登入密码</label>
	<div class="controls">
		<input type="password" id="inputPassword" placeholder="Password">
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="inputCheckPassword">重复密码</label>
	<div class="controls">
		<input type="password" id="inputCheckPassword"
			placeholder="Password Again">
	</div>
</div>
</form>