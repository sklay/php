<title><?=$currentPage->title;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?=$currentPage->description;?>">
<meta name="keywords" content="<?=$currentPage->keywords?>">

<!-- html5 -->
<script type="text/javascript" src="<?=base_url('ui/static/js/html5.js');?>"></script>
<script src="<?=base_url('ui/static/thirdparty/jquery/jquery-1.9.1.min.js');?>"></script>
<script src="<?=base_url('ui/static/thirdparty/bootstrap/js/bootstrap.min.js');?>"></script>
<script src="<?=base_url('ui/static/js/base.js');?>"></script>




<link rel="stylesheet" type="text/css" href="<?=base_url('ui/static/css/cssreset-min.css');?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('ui/static/thirdparty/bootstrap/css/bootstrap.css');?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('ui/static/thirdparty/bootstrap/css/bootstrap-responsive.css');?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('ui/static/css/global.css');?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('ui/static/thirdparty/bootstrap/theme/black-green/theme.css');?>">
<!--
<link rel="stylesheet" type="text/css" href="<?=base_url();?>ui/static/thirdparty/google-prettify/prettify.css">
	-->
<!-- admin area start
<link rel="stylesheet" type="text/css" href="<?=base_url();?>ui/static/css/admin.css">
-->
<!--  -->
<script src="<?=base_url();?>ui/static/thirdparty/jquery/jquery-ui.min.js"></script>
<script src="<?=base_url();?>ui/static/thirdparty/jquery/jquery.json.js"></script>
<script src="<?=base_url();?>ui/static/thirdparty/jquery/jquery.scrollUp.min.js"></script>
<script src="<?=base_url();?>ui/static/thirdparty/google-prettify/prettify.js"></script>
<script src="<?=base_url();?>ui/static/js/admin.js"></script>

<style>
#scrollUp {
	bottom: 20px;
	right: 20px;
	height: 38px; /* Height of image */
	width: 38px; /* Width of image */
	background: url("<?=base_url('ui/static/images/icons/top.png') ?>") no-repeat;
}
.none{
display: none ;
}

.show{
display: block ;
}

</style>
<!--
.widget>header{
cursor: default;
}
-->
<!-- admin area end -->
<script>
	$(function(){
		$.admin({ctx:'<?=base_url();?>index.php/',currentPageId:'<?=$currentPageId ?>'});


		 $(document).ready(function(){
             $.scrollUp({
                  scrollName: 'scrollUp', // Element ID
                  topDistance: '400', // Distance from top before showing element (px)
                  topSpeed: 300, // Speed back to top (ms)
                  animation: 'slide', // Fade, slide, none
                  animationInSpeed: 200, // Animation in speed (ms)
                  animationOutSpeed: 200, // Animation out speed (ms)
                  scrollText: '', // Text for element
                  activeOverlay: false  // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            });
          });
	});
</script>
