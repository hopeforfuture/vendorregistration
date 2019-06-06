<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/form-elements.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>
		<!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        	<?php
                        		if($title == 'Vendor Login')
                        		{
                        		?>
                        			<h1><strong>Vendor</strong> Login</h1>
                                    <a href="<?php echo base_url('vendor/create/1/0'); ?>">Sign Up</a>
                        		<?php
                        		}
								elseif($title == 'Fotgot Password')
								{
								?>
									<h1><strong>Vendor</strong> Forgot Password</h1>
									<a href="<?php echo base_url(); ?>">Sign In</a>
								<?php
								}
                        		else
                        		{
                        	?>
                            <h1><strong>Vendor</strong> Multi Step Registration Form</h1>
                            <a href="<?php echo base_url(); ?>">Sign In</a>
                        <?php } ?>
                            <div class="description">
                            	<!--<p style="color: red; font-weight: bold;">-->
                                    <?php //echo $this->session->flashdata('msg'); ?>
                                         
                                <!--</p>-->
                            </div>
                        </div>
                    </div>