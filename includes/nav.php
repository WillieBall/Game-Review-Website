    <?php $is_admin = checkAdminNav($_SESSION['userID'], $database); ?>
	<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Game Directory</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="listing.php">Home</a></li>
			<?php if($is_admin == 1) : ?>
			<li class="active"><a href="admin.php">Admin</a></li>
			<?php endif; ?>
            </ul>
			
		  <ul class="nav navbar-nav navbar-right">
            <li style="padding-top: 15px;">Currently logged in as: <?php echo $getuser->user_name; ?></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>