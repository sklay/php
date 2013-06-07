<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CMS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="keywords" content="">
<!-- html5 -->
<script type="text/javascript" src="<?=base_url();?>ui/static/js/html5.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>ui/static/css/cssreset-min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>ui/static/thirdparty/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>ui/static/thirdparty/bootstrap/theme/black-green/theme.css">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>ui/static/css/base.css">

<script src="<?=base_url();?>ui/static/thirdparty/jquery/jquery-1.9.1.min.js"></script>
<script src="<?=base_url();?>ui/static/thirdparty/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>ui/static/js/base.js"></script>

<!-- admin area start-->
<link rel="stylesheet" type="text/css" href="<?=base_url();?>ui/static/css/admin.css">

<script src="<?=base_url();?>ui/static/thirdparty/jquery/jquery-ui.min.js"></script>
<script src="<?=base_url();?>ui/static/thirdparty/jquery/jquery.json.js"></script>
<script src="<?=base_url();?>ui/static/js/admin.js"></script>

<script>
	$(function(){
		$.admin({ctx:'',currentPageId:'4'});
	});
</script>
<!-- admin area end -->
</head>
<body>
	<div id="wrap" class="container">
		<!-- navbar start -->

		<!-- navbar end -->

		<div id="content">
			<!-- content start -->
			<div class="row-fluid">
				<div class="column span12" id="row0">
					<div id="widget-16" class="widget green ">
						<header>
							<h2>列表</h2>
						</header>
						<div class="widget-content">Unable to find
							com.slyak.user.model.User with id 1; nested exception is
							javax.persistence.EntityNotFoundException: Unable to find
							com.slyak.user.model.User with id 1</div>
					</div>
					<div id="widget-31" class="widget noborder"></div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="column span6" id="row1"></div>
				<div class="column span6" id="row2"></div>
			</div>
			<div class="row-fluid">
				<div class="column span12" id="row3">
					<div id="widget-37" class="widget  ">
						<header>
							<h2>线型</h2>
						</header>
						<div class="widget-content"></div>
					</div>
				</div>
			</div>
			<!-- content end -->
		</div>
		<div id="footer"></div>
	</div>
</body>
</html>
