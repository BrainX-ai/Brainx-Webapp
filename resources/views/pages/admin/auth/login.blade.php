<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
		<title>KofeJob</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
				
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">

        <style>
            .login-header img{
                width: 200px;
            }
        </style>
	</head>		
	<body class="account-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
					
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">					
					<div class="row">
						<div class="col-md-6 offset-md-3">
							
							<!-- Login Content -->
							<div class="account-content">
								<div class="align-items-center justify-content-center">
									<div class="login-right">
										<div class="login-header text-center">
											<a href="#"><img src="/assets/img/BrainX_logo.png" alt="logo" class="img-fluid"></a>
											<h3>Admin Panel</h3>
										</div>
										<form action="{{ route('admin.login') }}" method="POST">
                                            @csrf
											<div class="form-group form-focus">
												<input type="text" name="email" class="form-control floating">
												<label class="focus-label">Email</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" name="password" class="form-control floating">
												<label class="focus-label">Password</label>
											</div>	
                                            
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
											
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Content -->
								
						</div>
					</div>
				</div>
			</div>					
			<!-- /Page Content -->
   
			
			
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery-3.6.1.min.js"></script>
		
		<!-- Bootstrap Bundle JS -->
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		
		<!-- Slick JS -->
		<script src="assets/js/slick.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>
</html>