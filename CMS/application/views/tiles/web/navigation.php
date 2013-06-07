<?php 
if(!empty($currentPage->custom_css) && isset($currentPage->custom_css)){
echo '<style>'.$currentPage->custom_css.'</style>';
}?>

<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
			</a>
			<a href="/" class="brand">SKLAY</a>
			<div class="nav-collapse">
				<ul class="nav">
					<?  $navPage = isset($currentPage->parent) ? $currentPage->parent : $currentPage ;
					foreach ($pages as $p){ 
						if(!empty($p->children)){
					?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$p->name?><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<? 
								foreach ($p->children as $cp){ 
								?>
									<li><a href="/index.php/<?=$cp->alias?>"><?=$cp->name?></a></li>
								<?}?>
							</ul>
					</li>
					<?}else { ?>
						<li class="<?=($p->id == $navPage->id) ? "active" : ''?>">
								<a href="/index.php/<?=$p->alias?>"><?=$p->name?></a>
						</li>
					<?    } 
				}?>
				</ul>
				<ul class="nav pull-right">
					<li>
					<button class="btn btn-link" type="button" data-toggle="modal" href="<?=base_url('index.php/common/identity/regist');?>" data-target="#registModal">注册</button>
					</li>
					<li>
					<button class="btn btn-link" type="button" data-toggle="modal" href="<?=base_url('index.php/common/identity/index');?>" data-target="#loginModal">登入</button>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
