<!doctype html>
<html class="no-js" lang="">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Farm Need - Vendor Registration</title>
    <meta name="description" content="Fram need admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="<?php echo base_url(); ?>assets/css/fullcalendar.min.css" rel="stylesheet" />
    <style>
	#weatherWidget .currentDesc {
		color: #ffffff!important;
	}
	.traffic-chart {
		min-height: 335px;
	}
	#flotPie1 {
		height: 150px;
	}
	#flotPie1 td {
		padding: 3px;
	}
	#flotPie1 table {
		top: 20px!important;
		right: -10px!important;
	}
	.chart-container {
		display: table;
		min-width: 270px;
		text-align: left;
		padding-top: 10px;
		padding-bottom: 10px;
	}
	#flotLine5 {
		height: 105px;
	}
	#flotBarChart {
		height: 150px;
	}
	#cellPaiChart {
		height: 160px;
	}
</style>
</head>

<body>
	<!-- Left Panel -->
	<aside id="left-panel" class="left-panel">
		  <nav class="navbar navbar-expand-sm navbar-default">
				<div id="main-menu" class="main-menu collapse navbar-collapse">
				  <ul class="nav navbar-nav">
					<li class="active"> <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a> </li>
					<li> <a href="#"><i class="menu-icon fa fa-laptop"></i> Vendor </a> </li>
				  </ul>
				</div>
		<!-- /.navbar-collapse --> 
		 </nav>
	</aside>
	<!-- /#left-panel --> 
	
	<div id="right-panel" class="right-panel">
	
		<!-- Header-->
		<header id="header" class="header">
			  <div class="top-left">
				  <div class="navbar-header"> 
					  <a class="navbar-brand" href="./"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Logo"></a> 
					  <a class="navbar-brand hidden" href="./"><img src="<?php echo base_url(); ?>assets/images/logo2.png" alt="Logo"></a> 
					  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a> 
				  </div>
			  </div>
			  <div class="top-right">
				<div class="header-menu">
					  <div class="header-left">
							<button class="search-trigger"><i class="fa fa-search"></i></button>
							<div class="form-inline">
								<form class="search-form">
									<input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
									<button class="search-close" type="submit"><i class="fa fa-close"></i></button>
								</form>
							</div>
					   </div>
					   
					  <div class="user-area dropdown float-right"> 
						  <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 	<img class="user-avatar rounded-circle" src="<?php echo base_url(); ?>assets/images/admin.jpg" alt="User Avatar"> 
						  </a>
						  <div class="user-menu dropdown-menu"> 
							<a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a> 
							<a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a> 
							<a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a> 
							<a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a> 
						  </div>
				      </div>
					   
			    </div>
		     </div>
      </header>
	 <!-- /#header --> 
	 
	 <!-- Content -->
	 <div class="content">
		<!-- Animated -->
       <div class="animated fadeIn">
	   
		<!-- Widgets  -->
    <div class="row">
          <div class="col-lg-3 col-md-6">
        <div class="card">
              <div class="card-body">
            <div class="stat-widget-five">
                  <div class="stat-icon dib flat-color-1"> <i class="fa fa-user"></i> </div>
                  <div class="stat-content">
                <div class="text-left dib">
                      <div class="stat-heading">Vendor</div>
					<div class="stat-text"><span class="count">53</span></div>
                    </div>
              </div>
                </div>
          </div>
            </div>
      </div>
          <div class="col-lg-3 col-md-6">
        <div class="card">
              <div class="card-body">
            <div class="stat-widget-five">
                  <div class="stat-icon dib flat-color-2"> <i class="fa fa-clock-o fa-3"></i> </div>
                  <div class="stat-content">
                <div class="text-left dib">
                      <div class="stat-heading">Pending outlet</div>
					<div class="stat-text"><span class="count">3435</span></div>
                    </div>
              </div>
                </div>
          </div>
            </div>
      </div>
          <div class="col-lg-3 col-md-6">
        <div class="card">
              <div class="card-body">
            <div class="stat-widget-five">
                  <div class="stat-icon dib flat-color-3"> <i class="fa fa-credit-card-alt fa-3"></i> </div>
                  <div class="stat-content">
                <div class="text-left dib">
                      <div class="stat-heading">Pending payment</div>
					<div class="stat-text"><span class="count">349</span></div>
                    </div>
              </div>
                </div>
          </div>
            </div>
      </div>
          <div class="col-lg-3 col-md-6">
        <div class="card">
              <div class="card-body">
            <div class="stat-widget-five">
                  <div class="stat-icon dib flat-color-4"> <i class="fa fa-file-text-o"></i> </div>
                  <div class="stat-content">
                <div class="text-left dib">
                      <div class="stat-heading">Pending invoice</div>
					<div class="stat-text"><span class="count">12</span></div>
                    </div>
              </div>
                </div>
          </div>
            </div>
      </div>
        </div>
    <!-- /Widgets -->
	
	<div class="clearfix"></div>