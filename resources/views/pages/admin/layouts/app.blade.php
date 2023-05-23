<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Admin - BrainX</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="/assets/img/BrainX_logo.png" type="image/x-icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="/admin/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="/admin/assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="/admin/assets/plugins/fontawesome/css/all.min.css">

		<!-- Feather CSS -->
		<link rel="stylesheet" href="/admin/assets/css/feather.css">
		
		<!-- Datatables CSS -->
		<link rel="stylesheet" href="/admin/assets/plugins/datatables/datatables.min.css">

		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="/admin/assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="/admin/assets/css/style.css">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
		
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
			<div class="header">
			
				<!-- Logo -->
				<div class="header-left">
					<a href="/" class="logo">
						<img src="/assets/img/BrainX_logo.png" alt="Logo">
					</a>
					<a href="/" class="logo logo-small">
						<img src="/assets/img/BrainX_logo.png" alt="Logo" width="30" height="30">
					</a>
					<!-- Sidebar Toggle -->
					<a href="javascript:void(0);" id="toggle_btn">
						<i class="feather-chevrons-left"></i>
					</a>
					<!-- /Sidebar Toggle -->
					
					<!-- Mobile Menu Toggle -->
					<a class="mobile_btn" id="mobile_btn">
						<i class="feather-chevrons-left"></i>
					</a>
					<!-- /Mobile Menu Toggle -->
				</div>
				<!-- /Logo -->
				
				<!-- Search -->
				<div class="top-nav-search">
					<form>
						<input type="text" class="form-control" placeholder="Start typing your Search...">
						<button class="btn" type="submit"><i class="feather-search"></i></button>
					</form>
				</div>
				<!-- /Search -->
				
				<!-- Header Menu -->
				<ul class="nav user-menu">

					
					<!-- /Notifications -->
					
					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow main-drop">
						<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
							<span class="user-img">
								<img src="assets/img/profiles/avatar-07.jpg" alt="">
								<span class="status online"></span>
							</span>
						</a>
						<div class="dropdown-menu">
							{{-- <a class="dropdown-item" href="profile.html"><i data-feather="user" class="me-1"></i> Profile</a>
							<a class="dropdown-item" href="settings.html"><i data-feather="settings" class="me-1"></i> Settings</a> --}}
							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="log-out" class="me-1"></i> Logout</a>
						</div>
					</li>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Menu -->
				
			</div>
			<!-- /Header -->
			
			<!-- Sidebar -->
			<div class="sidebar" id="sidebar">
				<div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"><span>Main</span></li>
							<li>
								<a href="{{ route('admin.dashboard') }}"><i data-feather="home"></i> <span>Dashboard</span></a>
							</li>
							<li>
								<a href="{{ route('admin.categories') }}"><i data-feather="copy"></i> <span>Categories</span></a>
							</li>
							<li>
								<a href="{{ route('admin.skills') }}"><i data-feather="award"></i> <span>Skills</span></a>
							</li>
							<li>
								<a href="{{ route('admin.users') }}"><i data-feather="users"></i> <span>Talents</span></a>
							</li>
							<li>
								<a href="{{ route('admin.clients') }}"><i data-feather="users"></i> <span>Clients</span></a>
							</li>
							<li>
								<a href="{{ route('admin.projects') }}"><i data-feather="clipboard"></i> <span>Projects</span></a>
							</li>
							<li>
								<a href="{{ route('admin.feedbacks') }}"><i data-feather="clipboard"></i> <span>Feedbacks</span></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Sidebar -->
			
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					
					@yield('content')
						
				</div>
			</div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
		<script src="/admin/assets/js/jquery-3.6.0.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="/admin/assets/js/bootstrap.bundle.min.js"></script>
		
		<!-- Feather Icon JS -->
		<script src="/admin/assets/js/feather.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="/admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="/admin/assets/plugins/datatables/datatables.min.js"></script>

		<!-- Datepicker Core JS -->
		<script src="/admin/assets/js/moment.min.js"></script>
		<script src="/admin/assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Custom JS -->
		<script src="/admin/assets/js/script.js"></script>
		@yield('custom-js')
	</body>
</html>