 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
	  <!-- <div class="user-profile px-20 pt-15 pb-10">
		<div class="d-flex align-items-center">			
			<div class="image">
			  <img src="<?= assets_url; ?>images/avatar/avatar-13.png" class="avatar avatar-lg bg-primary-light rounded100" alt="User Image">
			</div>
			<div class="info">
				<a class="dropdown-toggle px-20" data-toggle="dropdown" href="#">Johen Doe</a>
				<div class="dropdown-menu">
				  <a class="dropdown-item" href="#"><i class="ti-user"></i> Profile</a>
				</div>
			</div>
		</div>
		<ul class="list-inline profile-setting mt-20 mb-0 d-flex justify-content-between">
			<li><a href="#" data-toggle="tooltip" data-placement="top" title="Search"><i data-feather="search"></i></a></li>
			<li><a href="#" data-toggle="tooltip" data-placement="top" title="Notification"><i data-feather="bell"></i></a></li>
			<li><a href="#" data-toggle="tooltip" data-placement="top" title="Chat"><i data-feather="message-square"></i></a></li>
			<li><a href="#" data-toggle="tooltip" data-placement="top" title="Logout"><i data-feather="log-out"></i></a></li>
		</ul>
	  </div> -->
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">	
        <li>
          <a href="dashboard">
             <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
			<span>Dashboard</span>
          </a>
        </li>

		<li class="treeview">
          <a href="#">
            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
			<span>Senarai</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="user"><i class="icon-Briefcase"><span class="path1"></span><span class="path2"></span></i> Pengguna</a></li>
            <li><a href="equipment"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> Peralatan</a></li>
          </ul>

        </li>

        <li class="treeview">
          <a href="#">
            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
      <span>Tempahan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="reservation-new"><i class="icon-Briefcase"><span class="path1"></span><span class="path2"></span></i> Permohonan Baru</a></li>
            <li><a href="reservation-completed"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> Permohonan Selesai</a></li>
            <li><a href="reservation-rejected"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> Permohonan Ditolak</a></li>
          </ul>

        </li>

		<!-- <li>
          <a href="user">
            <i class="icon-Briefcase"><span class="path1"></span><span class="path2"></span></i>
			<span>List</span>
          </a>
        </li> -->
		<li>
          <a href="applications.html">
            <i class="icon-File"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
			<span>Applications</span>
          </a>
        </li>
			     
      </ul>
    </section>
  </aside>