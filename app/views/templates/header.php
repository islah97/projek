<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url; ?>images/favicon.ico">

    <title> ICT | <?= $data['title']; ?></title>
    
    <!-- Vendors Style-->
    <link rel="stylesheet" href="<?= base_url; ?>css/vendors_css.css">
      
    <!-- Style-->  
    <link rel="stylesheet" href="<?= base_url; ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url; ?>css/skin_color.css">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.25.1/moment.min.js"></script>

    <!--Sweet Alerts 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Vendor JS -->
    <script src="<?= base_url; ?>js/vendors.min.js"></script>
    <script src="<?= base_url; ?>js/pages/chat-popup.js"></script>
    <script src="<?= base_url; ?>icons/feather-icons/feather.min.js"></script>  

  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary">
    
<div class="wrapper">
    <div id="loader"></div>


      <header class="main-header">
        <div class="d-flex align-items-center logo-box justify-content-start">
            <a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent" data-toggle="push-menu" role="button">
                <i data-feather="menu"></i>
            </a>    
            <!-- Logo -->
            <a href="#" class="logo">
              <!-- logo-->
              <div class="logo-lg">
                  <span class="light-logo" ><img src="<?= base_url; ?>images/MBK2.png" alt="logo" ></span>
                  <span class="dark-logo"><img src="<?= base_url; ?>images/logo-light-text.png" alt="logo"></span>
              </div>
            </a>    
        </div>  
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <div class="app-menu">
            <ul class="header-megamenu nav">
                <li class="btn-group nav-item d-md-none">
                    <a href="#" class="waves-effect waves-light nav-link push-btn" data-toggle="push-menu" role="button">
                        <i data-feather="menu"></i>
                    </a>
                </li>
            </ul> 
          </div>
            
          <div class="navbar-custom-menu r-side">
            <ul class="nav navbar-nav"> 
              <li class="btn-group nav-item d-lg-flex d-none align-items-center">
                <p class="mb-0 text-fade pr-10 pt-5"><?= date('l'); ?>, <?= date('jS M Y'); ?></p>
              </li>
              <li class="btn-group nav-item d-lg-inline-flex d-none">
                <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen">
                    <i data-feather="maximize"></i>
                </a>
              </li>
            
              <!-- User Account-->
              <li class="dropdown user user-menu">
                <a class="waves-effect waves-light" data-toggle="modal" data-target="#logoutModal" title="Logout">
                    <i class="ti-lock text-muted mr-2"></i>
                </a>
              </li> 
            </ul>
          </div>
        </nav>
      </header>

       <!-- Left side column. contains the logo and sidebar -->
       <aside class="main-sidebar">
        <!-- sidebar-->
         <section class="sidebar">   
          <!-- <div class="user-profile px-20 pt-15 pb-10">
            <div class="d-flex align-items-center">         
                <div class="image">
                  <img src="<?= base_url; ?>images/avatar/avatar-13.png" class="avatar avatar-lg bg-primary-light rounded100" alt="User Image">
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
              <a href="<?= base_url; ?>dashboard">
                 <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                <span>Dashboard</span>
              </a>
            </li>

            <?php if ($this->session->get('roleID') != 2) { ?>
                <li class="treeview">
              <a href="#">
                <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                <span>Senarai</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?= ($data['currentSidebar'] == 'user') ? 'active' : '' ?>"><a href="<?= base_url; ?>user"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> Pengguna</a></li>
                <li class="<?= ($data['currentSidebar'] == 'equipment') ? 'active' : '' ?>"><a href="<?= base_url; ?>equipment"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> Peralatan</a></li>
              </ul>

            </li>

              <?php } ?>

            <li class="treeview">
              <a href="#">
                <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
          <span>Tempahan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">

                <?php if ($this->session->get('roleID') == 2) { ?>
                <li><a href="<?= base_url; ?>reservation"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> Senarai Permohonan</a></li>

              <?php }else { ?>
                 <li><a href="<?= base_url; ?>reservation"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> Permohonan Baru</a></li>
                 <li><a href="<?= base_url; ?>reservation/terima"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> Permohonan Diluluskan</a></li>
                <li><a href="<?= base_url; ?>reservation/reject"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> Permohonan Ditolak</a></li>
                <li><a href="<?= base_url; ?>reservation/complete"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> Permohonan Selesai</a></li>
              <?php }?>
              
              </ul>
              </ul>

            </li>

            <!-- <li>
              <a href="user">
                <i class="icon-Briefcase"><span class="path1"></span><span class="path2"></span></i>
                <span>List</span>
              </a>
            </li> -->
            <!-- <li>
              <a href="#">
                <i class="icon-File"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                <span>Applications</span>
              </a>
            </li> -->
                     
          </ul>
         </section>
       </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <div class="container-full">
