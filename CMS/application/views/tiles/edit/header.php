<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a href="#" class="brand">SLYAK</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li class="active"><a href="/">Home</a></li>
          	  <li><a href="">My Account</a></li>
        </ul>
        	<ul class="nav pull-right">
			    <li><button class="btn btn-link" type="button" data-toggle="modal" href="admin/regist" data-target="#registModal">Regist</button></li>
			    <li><button class="btn btn-link" type="button" data-toggle="modal" href="admin/login" data-target="#loginModal">Login</button></li>
		    </ul>
	    	<ul class="nav pull-right">
	    		<li class="dropdown">						
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="icon-cog"></i>
						Settings
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="javascript:;">Account Settings</a></li>
						<li><a href="javascript:;">Privacy Settings</a></li>
						<li class="divider"></li>
						<li><a href="javascript:;">Help</a></li>
					</ul>						
				</li>
				<li class="dropdown">						
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="icon-user"></i> 
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="javascript:;">My Profile</a></li>
						<li><a href="javascript:;">My Groups</a></li>
						<li class="divider"></li>
						<li><a href="${ctx}/public/logout">Logout</a></li>
					</ul>						
				</li>
	    	</ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
