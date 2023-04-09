<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Sistem Infomasi Aktivitas Kapal Perikanan (SIKAP) - PPS Kendari</title>
	<link rel="stylesheet" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/app/css/style_login.css">
	</head>
	<body>    
	<div class="wrapper">
	<div class="container">


        <div align="center"><br />
            <img src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/app/images/logo.png" width="330px" height="90px">
		</div>

              <?php 
			  $attributes = array('role' => 'form');
			  echo form_open("login/act",$attributes); ?>
                    <!--<h3 class="text-center margin-xl-bottom">Welcome Back!</h3>-->
					<p><?php echo $this->session->flashdata("result_login"); ?>
                    <div class="mat-in">
                        <input type="user" class="form-control" id="username" name="username"   placeholder="Username">
						<span class="bar"></span>
						<label></label>
					</div>
                    <div class="mat-in">                     
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
						 <span class="bar"></span>
              <label></label>
                    </div>
					<button type="submit" class="btn btn-primary btn-block btn-flat">SIGN IN</button>
              <?php echo form_close(); ?>
			  <div id="copyright">
        <p style="margin-top:-1%;font-size:small;">Copyright © 2018 <b>All Rights Reserved</b><br/>
		   <b>Pelabuhan Perikanan Samudera Kendari</b><br></p>
	    </p>
    </div>
				<ul class="bg-bubbles">
		        <li></li>
		        <li></li>
		        <li></li>
		        <li></li>
		        <li></li>
		        <li></li>
		        <li></li>
		        <li></li>
		        <li></li>
		        <li></li>
	        </ul>
            <!--<div class="panel-body text-center">
                <div class="margin-bottom">
                    <a class="text-muted text-underline" href="javascript:;">Forgot Password?</a>
                </div>
                <div>
                    Don't have an account? <a class="text-primary-dark" href="pages-sign-up.php">Sign up here</a>
                </div>
            </div>-->
    </div>
	</div>
	<script src="../../Content/js/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="../../Content/js/index.js" type="text/javascript"></script>
    <script>
        $.browser.device = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
        var device = $.browser.device;
        var detect_width = $(window).width();
        var detect_height = $(window).height();
        //alert('width:' + detect_width + 'height:' + detect_height);
        console.log(device + '---' + detect_width);
        $('.input-large').on('input', function (evt) {
            $(this).val(function (_, val) {
                return val.toUpperCase();
            });
        });
    </script>
</body>
</html>
