<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>../images/favicon.ico">

    <title>منصة الفكر العلمي </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/skin_color.css">	

</head>
	
<body class="hold-transition theme-primary bg-img" style="background-image: url(<?php echo base_url(); ?>images/bg.jpg)">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded30 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h2 class="text-primary">أهلا وسهلا بك مرة أخرى</h2>
								<p class="mb-0">تسجيل دخول</p>							
							</div>
							<div class="p-40">
								<form action="<?php echo base_url(); ?>login/check" method="post">
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											</div>
											<input name="username" style="text-align: right;" type="text" class="form-control pl-15 bg-transparent" placeholder="اسم المستخدم">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											</div>
											<input name="password" style="text-align: right;" type="password" class="form-control pl-15 bg-transparent" placeholder="كلمة السر">
										</div>
									</div>
									  <div class="row">
										<div class="col-6">
										  
										</div>
										<!-- /.col -->
										<div class="col-6">
										 
										</div>
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-danger mt-10">تسجيل دخول</button>
										</div>
										<!-- /.col -->
									  </div>
								</form>	
								
							</div>						
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="<?php echo base_url(); ?>js/vendors.min.js"></script>
	<script src="<?php echo base_url(); ?>js/pages/chat-popup.js"></script>
    <script src="<?php echo base_url(); ?>../assets/icons/feather-icons/feather.min.js"></script>	

</body>
</html>
