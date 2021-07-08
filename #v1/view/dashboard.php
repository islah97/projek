<?php 

require_once('../config/baseurl.php'); 
$currentPage = 'Login';
$currentSubPage = '';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= assets_url; ?>images/favicon.ico">

    <title>Joblly - Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="<?= assets_url; ?>css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="<?= assets_url; ?>css/style.css">
	<link rel="stylesheet" href="<?= assets_url; ?>css/skin_color.css">
     
  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary">
	
<div class="wrapper">
	<div id="loader"></div>

	<?= include 'template/header.php'; ?>
  
 	<?= include 'template/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xl-9 col-12">
					<div class="row">
						<div class="col-lg-4 col-12">
							<div class="box">
								<div class="box-body py-0">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<h5 class="text-fade">Applications</h5>
											<h2 class="font-weight-500 mb-0">132.0K</h2>
										</div>
										<div>
											<div id="revenue1"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="box">
								<div class="box-body py-0">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<h5 class="text-fade">Shortlisted</h5>
											<h2 class="font-weight-500 mb-0">10.9k</h2>
										</div>
										<div>
											<div id="revenue2"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="box">
								<div class="box-body py-0">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<h5 class="text-fade">On Hold</h5>
											<h2 class="font-weight-500 mb-0">03.1k</h2>
										</div>
										<div>
											<div id="revenue3"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-xxxl-4 col-xl-5 col-12">
							<div class="box">
								<div class="box-header">
									<h4 class="box-title">Total Applications</h4>
								</div>
								<div class="box-body">
									<div class="d-flex w-p100 rounded100 overflow-hidden">
										<div class="bg-danger h-10" style="width: 8%;"></div>
										<div class="bg-warning h-10" style="width: 12%;"></div>
										<div class="bg-success h-10" style="width: 22%;"></div>
										<div class="bg-info h-10" style="width: 58%;"></div>
									</div>
								</div>
								<div class="box-body p-0">
									<div class="media-list media-list-hover media-list-divided">
										<a class="media media-single rounded-0" href="#">
										  <span class="badge badge-xl badge-dot badge-info"></span>
										  <span class="title">Applications </span>
										  <span class="badge badge-pill badge-info-light">58%</span>
										</a>

										<a class="media media-single rounded-0" href="#">
										  <span class="badge badge-xl badge-dot badge-success"></span>
										  <span class="title">Shortlisted</span>
										  <span class="badge badge-pill badge-success-light">22%</span>
										</a>

										<a class="media media-single rounded-0" href="#">
										  <span class="badge badge-xl badge-dot badge-warning"></span>
										  <span class="title">On-Hold</span>
										  <span class="badge badge-pill badge-warning-light">12%</span>
										</a>

										<a class="media media-single rounded-0" href="#">
										  <span class="badge badge-xl badge-dot badge-danger"></span>
										  <span class="title">Rejected</span>
										  <span class="badge badge-pill badge-danger-light">08%</span>
										</a>
									</div>
								</div>
							</div>
							<div class="box">
								<div class="box-header with-border">
									<h4 class="box-title">New Applications</h4>
								</div>
								<div class="box-body">
									<div class="d-flex align-items-center mb-30">
										<div class="mr-15">
											<img src="<?= assets_url; ?>images/avatar/avatar-1.png" class="avatar avatar-lg rounded100 bg-primary-light" alt="" />
										</div>
										<div class="d-flex flex-column flex-grow-1 font-weight-500">
											<a href="#" class="text-dark hover-primary mb-1 font-size-16">Sophia Doe</a>
											<span class="font-size-12"><span class="text-fade">Applied for</span> Advertising Intern</span>
										</div>
										<div class="dropdown">
											<a class="px-10 pt-5" href="#" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
											<div class="dropdown-menu dropdown-menu-right">
											  <a class="dropdown-item flexbox" href="#">
												<span>Inbox</span>
												<span class="badge badge-pill badge-info">5</span>
											  </a>
											  <a class="dropdown-item" href="#">Sent</a>
											  <a class="dropdown-item" href="#">Spam</a>
											  <div class="dropdown-divider"></div>
											  <a class="dropdown-item flexbox" href="#">
												<span>Draft</span>
												<span class="badge badge-pill badge-default">1</span>
											  </a>
											</div>
										</div>
									</div>
									<div class="d-flex align-items-center mb-30">
										<div class="mr-15">
											<img src="<?= assets_url; ?>images/avatar/avatar-10.png" class="avatar avatar-lg rounded100 bg-primary-light" alt="" />
										</div>
										<div class="d-flex flex-column flex-grow-1 font-weight-500">
											<a href="#" class="text-dark hover-danger mb-1 font-size-16">Mason Clark</a>						
											<span class="font-size-12"><span class="text-fade">Applied for</span> Project Coordinator</span>
										</div>
										<div class="dropdown">
											<a class="px-10 pt-5" href="#" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
											<div class="dropdown-menu dropdown-menu-right">
											  <a class="dropdown-item flexbox" href="#">
												<span>Inbox</span>
												<span class="badge badge-pill badge-info">5</span>
											  </a>
											  <a class="dropdown-item" href="#">Sent</a>
											  <a class="dropdown-item" href="#">Spam</a>
											  <div class="dropdown-divider"></div>
											  <a class="dropdown-item flexbox" href="#">
												<span>Draft</span>
												<span class="badge badge-pill badge-default">1</span>
											  </a>
											</div>
										</div>
									</div>
									<div class="d-flex align-items-center mb-30">
										<div class="mr-15">
											<img src="<?= assets_url; ?>images/avatar/avatar-11.png" class="avatar avatar-lg rounded100 bg-primary-light" alt="" />
										</div>
										<div class="d-flex flex-column flex-grow-1 font-weight-500">
											<a href="#" class="text-dark hover-success mb-1 font-size-16">Emily Paton</a>						
											<span class="font-size-12"><span class="text-fade">Applied for</span> Layout Expert</span>
										</div>
										<div class="dropdown">
											<a class="px-10 pt-5" href="#" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
											<div class="dropdown-menu dropdown-menu-right">
											  <a class="dropdown-item flexbox" href="#">
												<span>Inbox</span>
												<span class="badge badge-pill badge-info">5</span>
											  </a>
											  <a class="dropdown-item" href="#">Sent</a>
											  <a class="dropdown-item" href="#">Spam</a>
											  <div class="dropdown-divider"></div>
											  <a class="dropdown-item flexbox" href="#">
												<span>Draft</span>
												<span class="badge badge-pill badge-default">1</span>
											  </a>
											</div>
										</div>
									</div>
									<div class="d-flex align-items-center">
										<div class="mr-15">
											<img src="<?= assets_url; ?>images/avatar/avatar-12.png" class="avatar avatar-lg rounded100 bg-primary-light" alt="" />
										</div>
										<div class="d-flex flex-column flex-grow-1 font-weight-500">
											<a href="#" class="text-dark hover-info mb-1 font-size-16">Daniel Breth</a>											
											<span class="font-size-12"><span class="text-fade">Applied for</span> Interior Architect</span>
										</div>
										<div class="dropdown">
											<a class="px-10 pt-5" href="#" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
											<div class="dropdown-menu dropdown-menu-right">
											  <a class="dropdown-item flexbox" href="#">
												<span>Inbox</span>
												<span class="badge badge-pill badge-info">5</span>
											  </a>
											  <a class="dropdown-item" href="#">Sent</a>
											  <a class="dropdown-item" href="#">Spam</a>
											  <div class="dropdown-divider"></div>
											  <a class="dropdown-item flexbox" href="#">
												<span>Draft</span>
												<span class="badge badge-pill badge-default">1</span>
											  </a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>				
				<div class="col-xl-3 col-12">
					<div class="box">
						<div class="box-body">							
							<div class="box no-shadow">
								<div class="box-body px-0 pt-0">
									<div id="calendar" class="dask evt-cal min-h-350"></div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
  
 	<?= include 'template/footer.php'; ?>
  
</div>

	
	
	<!-- Vendor JS -->
	<script src="<?= assets_url; ?>js/vendors.min.js"></script>
	<script src="<?= assets_url; ?>js/pages/chat-popup.js"></script>
    <script src="<?= assets_url; ?>icons/feather-icons/feather.min.js"></script>	

	<script src="<?= assets_url; ?>vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
	<script src="<?= assets_url; ?>vendor_components/moment/min/moment.min.js"></script>
	<script src="<?= assets_url; ?>vendor_components/fullcalendar/fullcalendar.js"></script>
	
	<!-- Joblly App -->
	<script src="<?= assets_url; ?>js/template.js"></script>
	<script src="<?= assets_url; ?>js/pages/dashboard.js"></script>
	<script src="<?= assets_url; ?>js/pages/calendar-dash.js"></script>
	
</body>
</html>
