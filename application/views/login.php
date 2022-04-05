
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
	<link rel="icon" href="<?=base_url('assets/dist/img/logo.png')?>">
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/css/style.css') ?>">
</head>
<body>
	
<div class="row">
        <div class="col-md-6">
			
        <img src="<?php echo base_url('assets/dist/img/bawaslu3.png') ?>" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <!-- loading -->
              <div class="mb-4">
			  <div class="login-box">
			  <div class="row">
			<div class="col-sm-6 col-md-12 col-md-offset-6"> 
			<br></br>
			<br></br>
			<br></br>
			<br></br>
		
			<br></br>
			<br></br>

			
			<div class="login-box-body">
              <img class="profile" src="<?php echo base_url('assets/dist/img/bawaslu.png' ) ?>"  alt="">
			  
			  <br></br>
					
			<form action="<?=site_url('auth/process')?>" method="post">
				<div class="form-group has-feedback">
					<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" name="password" id="password-input" class="form-control" placeholder="Password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="checkbox">
              <label>
              <input type="checkbox" id="enable-show"> Tampilkan Password
              </label>
            </div>
<br></br>

				<div class="row">
					<div class="col-xs-6"></div>
					<div class="col-xs-12">
						<button style="height:50px" type="submit" name="login" class="btn btn-danger btn-block btn-flat"><h4>Masuk</h4></button>
						
					</div>
</div>
			</form>
		</div>
	</div>
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/dist/js/sh.js"></script>
    <script>
      $.toggleShowPassword({
      field: '#password-input',
      control: '#enable-show'
      });   
    </script>
	<!-- <script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->

</body>
</html>