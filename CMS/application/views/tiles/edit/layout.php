<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?=$title;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?=$meta_keywords;?>">
<meta name="keywords" content="<?=$meta_description;?>">
<!-- html5 -->
<script type="text/javascript" src="<?=base_url();?>ui/static/js/html5.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>ui/static/css/cssreset-min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>ui/static/thirdparty/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>ui/static/thirdparty/bootstrap/theme/black-green/theme.css">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>ui/static/css/base.css">

<script src="<?=base_url();?>ui/static/thirdparty/jquery/jquery-1.9.1.min.js"></script>
<script src="<?=base_url();?>ui/static/thirdparty/bootstrap/js/bootstrap.js"></script>
<script src="<?=base_url();?>ui/static/js/base.js"></script>

<!-- admin area start-->
<link rel="stylesheet" type="text/css" href="<?=base_url();?>ui/static/css/admin.css">

<script src="<?=base_url();?>ui/static/thirdparty/jquery/jquery-ui.min.js"></script>
<script src="<?=base_url();?>ui/static/thirdparty/jquery/jquery.json.js"></script>
<script src="<?=base_url();?>ui/static/js/admin.js"></script>

<script>
	$(function(){
		$.admin({ctx:'<?=base_url();?>index.php/',currentPageId:''});
	});
</script>
<!-- admin area end -->
</head>
<body>sss
<?php 

foreach ($files as $file){
	echo 'file_name=>'.$file['name'].'<br/>' ;
	echo 'is_dir=>'.$file['dir'].'<br/>' ;
}

?>
	<?=$content;?>
</body>
</html>