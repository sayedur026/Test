

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="assets/js/modernizr.js"></script>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">TBCL.</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li><a href="inventory.php">Inventory</a></li>
            <li><a href="contact.php">Contact Point</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">IPTSP<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="iptsp_info.php">IPTSP Info</a></li>
                <li><a href="iptsp_service_req.php">IPTSP Service Request</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Power<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="ips_power.php">IPS Power</a></li>
				<li><a href="power_strip.php">Power Strip</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Devices<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="router_info.php">Router Info</a></li>
				<li><a href="router_summary_index.php">Router Summary</a></li>
			<li><a href="mux_info.php">Mux Info</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Downtime<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="service_downtime.php">Downtime</a></li>
                <li><a href="service_downtime_summary.php">Downtime Summary</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">TJ<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="tj_index.php">TJ Box</a></li>
                <li><a href="tj_connection_index.php">TJ Connection</a></li>
                <li><a href="tj_slideshow_index.php">TJ Diagram</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">HRM<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="holiday_office.php">Holiday Office</a></li>
                <li><a href="holiday_office_summary_index.php">Holiday Office Summary</a></li>
              </ul>
            </li>
			
			<li><a href="../view/index.php"><font color="aqua"> Go to Read Mode</font></a></li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">User<b class="caret"></b></a>
              <ul class="dropdown-menu">
			  
			  <?php 
			  if(isset($_SESSION['myspecialusername']) && $_SESSION['specialUserMode']>0)
			  {
				  echo '<li><a>Welcome, '.$_SESSION["myspecialusername"].'</a></li>';
				  echo '<li><a href="register.php">Register</a></li>';
				  echo '<li><a href="logout.php">Log Out</a></li>';
			  }
			  else if(isset($_SESSION['myspecialusername']) && $_SESSION['specialUserMode']==0)
			  {
				  echo '<li><a>Welcome, '.$_SESSION["myspecialusername"].'</a></li>';
				  echo '<li><a href="logout.php">Log Out</a></li>';
			  }
			  else
			  {		
					echo '<li><a href="login.php">Login</a></li>';
			  }
			  ?>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div><br><br></br><br>
	
	    <!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/bootstrap.min.js"></script>
<?php include 'access.php'; ?>