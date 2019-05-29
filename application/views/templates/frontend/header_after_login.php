<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Vendor Dashboard</title>
    <link href="<?php echo base_url(); ?>assets/css/vendorstyle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<body>

<div class="wraper">
    
	<!-- start of header  -->
	<header>
    	<div class="top">
        	<h1>Vendor Dashboard </h1>
        </div>
        <div class="row">
    	<div class="header-left">
        	<h2>Vendor ID: <span><?php echo $sessdata['vendor_id']; ?></span></h2>
            <div class="welcome-text">Welcome... <?php echo $sessdata['company_name']; ?> </div>
        </div>
        <div class="header-right">
        	<div class="Service-contact">
                <ul>
                    <li>
                        <a href="<?php echo base_url('logout'); ?>">Log out</a>&nbsp;
                        <a href="<?php echo base_url('changepassword'); ?>">Change Password</a>&nbsp;
						<a href="<?php echo base_url('vendordashboard'); ?>">Dashboard</a>
                    </li>
                </ul>
            	<ul>
                	<li>Service contact: <span><?php echo ucwords($contactinfo['contact_name']); ?></span> </li>
                    <li>Email: <span><?php echo $contactinfo['contact_email']; ?></span> </li>
                    <li>Phone: <span><?php echo $contactinfo['contact_phone']; ?></span></li>
                </ul>
            </div>
        </div>
        </div>	
    </header>
   <!--end of header panel-->