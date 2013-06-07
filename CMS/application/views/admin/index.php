<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?=$title;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?=$meta_keywords;?>">
<meta name="keywords" content="<?=$meta_description;?>">
<!-- html5 -->
<script type="text/javascript"
	src="<?=base_url();?>ui/static/js/html5.js"></script>
<link rel="stylesheet" type="text/css"
	href="<?=base_url();?>ui/static/css/cssreset-min.css">
<link rel="stylesheet" type="text/css"
	href="<?=base_url();?>ui/static/thirdparty/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css"
	href="<?=base_url();?>ui/static/thirdparty/bootstrap/theme/black-green/theme.css">
<link rel="stylesheet" type="text/css"
	href="<?=base_url();?>ui/static/css/base.css">

<script
	src="<?=base_url();?>ui/static/thirdparty/jquery/jquery-1.9.1.min.js"></script>
<script
	src="<?=base_url();?>ui/static/thirdparty/bootstrap/js/bootstrap.js"></script>
<script src="<?=base_url();?>ui/static/js/base.js"></script>
<!-- admin area start-->
<script
	src="<?=base_url();?>ui/static/thirdparty/jquery/jquery-ui.min.js"></script>
<script src="<?=base_url();?>ui/static/thirdparty/jquery/jquery.json.js"></script>
<style type="text/css">
* {
	margin: 0;
	padding: 0;
}

.loginBox {
	width: 420px;
	height: 230px;
	padding: 0 20px;
	border: 1px solid #fff;
	color: #000;
	margin-top: 40px;
	border-radius: 8px;
	background: white;
	box-shadow: 0 0 15px #222;
	background: -moz-linear-gradient(top, #fff, #efefef 8%);
	background: -webkit-gradient(linear, 0 0, 0 100%, from(#f6f6f6),
		to(#f4f4f4) );
	font: 11px/1.5em 'Microsoft YaHei';
	position: absolute;
	left: 50%;
	top: 50%;
	margin-left: -210px;
	margin-top: -115px;
}

.loginBox h2 {
	height: 45px;
	font-size: 20px;
	font-weight: normal;
}

.loginBox .left {
	border-right: 1px solid #ccc;
	height: 100%;
	padding-right: 20px;
}
</style>
</head>
<body>
	<form class="form-horizontal" action="<?=base_url() ?>admin/identity/login" method="post">
		<div class="container">
			<section class="loginBox row-fluid">
				<section class="span7 left">
					<h2>用户登录</h2>
					<p>
						<input type="email" name="login_name" placeholder="Email"
							class="email" />
					</p>
					<p>
						<input type="password" name="login_pwd" placeholder="Password" />
					</p>
					<section class="row-fluid">
						<section class="span8 lh30">
							<label><input type="checkbox" name="remember" />下次自动登录</label>
						</section>
						<section class="span1">
							<input type="button" id='login' value=" 登录 "
								class="btn btn-primary">
						</section>
					</section>
				</section>
				<section class="span5 right">
					<h2>没有帐户？</h2>
					<section>
						<p>这里有一段文字啊，很多的文字啊，太多太多的文字了，主要可以介绍介绍注册的好处和公司或者项目概况。。。</p>
						<p>
							<input type="button" value=" 注册 " id='regist' class="btn" data-toggle='modal'
								href='<?=base_url() ?>/admin/identity/regist' data-target='#registModal'>
						</p>
					</section>
				</section>
			</section>
			<!-- /loginBox -->
		</div>
		<!-- /container -->
	</form>
	<script src="<?=base_url();?>ui/static/js/login.js"></script>
</body>
</html>
