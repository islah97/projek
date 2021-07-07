<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title> STPICT | <?= $data['title']; ?> </title>
  
    <!-- Vendors Style-->
    <link rel="stylesheet" href="<?= base_url; ?>css/vendors_css.css">
      
    <!-- Style-->  
    <link rel="stylesheet" href="<?= base_url; ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url; ?>css/skin_color.css">   

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

</head>
    
<body class="hold-transition theme-primary bg-img" style="background-image: url(images/auth-bg/bg-1.jpg)">
    
    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">   
            
            <div class="col-12">
                <div class="row justify-content-center no-gutters">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="bg-white rounded30 shadow-lg">
                            <div class="content-top-agile p-20 pb-0">

                                <img src="<?= base_url; ?>images/MBK.jpg" alt="Logo USM" width="100px" >
                                
                                <h1 class="text-primary">SISTEM TEMPAHAN PERALATAN ICT</h1>

                                 <div id="alertMessage" style="display: none" class="alert alert-danger dalign-items-center mg-t-5" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle mg-r-10">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="8" x2="12" y2="12"></line>
                                        <line x1="12" y1="16" x2="12" y2="16"></line>
                                    </svg>
                                    <span id="message"></span>
                                </div>

                            </div>
                            <div class="p-40">

                                <form id="login" method="POST" action="<?php echo htmlspecialchars(base_url . 'auth/authorize'); ?>">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                            </div>
                                          <input type="text" name="username" id="username" class="form-control pl-15 bg-transparent" placeholder="Username">
                                        </div>
                                        <span class="help-block text-danger" id="usernameErr" style="display: none;">
                                              Nama pengguna diperlukan
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
                                            </div>
                                            <input type="password" name="password" id="password" class="form-control pl-15 bg-transparent" placeholder="Password">

                                        </div>
                                        <span class="help-block text-danger" id="passwordErr" style="display: none;">
                                            Kata Laluan diperlukan
                                        </span>
                                    </div>
                                      <div class="row">
                                       <!--  <div class="col-6">
                                          <div class="checkbox">
                                            <input type="checkbox" id="basic_checkbox_1" >
                                            <label for="basic_checkbox_1">Remember Me</label>
                                          </div>
                                        </div> -->

                                        <!-- /.col -->
                                      <!--   <div class="col-6">
                                         <div class="fog-pwd text-right">
                                            <a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
                                          </div>
                                        </div> -->

                                        <!-- /.col -->
                                        <div class="col-12 text-center">
                                          <button type="submit" name="login" class="btn btn-danger mt-10">SIGN IN <i class="fa fa-sign-in"></i></button>
                                        </div>
                                        <!-- /.col -->

                                      </div>
                                </form> 


                                <div class="text-center">
                                    <p class="mt-15 mb-0">Don't have an account? <a href="signup" class="text-warning ml-5">Sign Up</a></p>
                                </div> 

                            </div>                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS -->
    <script src="js/vendors.min.js"></script>
    <script src="icons/feather-icons/feather.min.js"></script>   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

    <script type="text/javascript">
    
      $("#login").submit(function(event) {

          event.preventDefault();
          var username = $('#username').val();
          var password = $('#password').val();

          $('#usernameErr').hide();
          $('#passwordErr').hide();
          $('#alertMessage').hide();

          $("#username").removeClass("is-invalid");
          $("#password").removeClass("is-invalid");
          $("#username").removeClass("is-valid");
          $("#password").removeClass("is-valid");

          if (username != '' && password != '') {

              var form = $(this);
              var url = form.attr('action');

              $("#username").addClass("is-valid");
              $("#password").addClass("is-valid");

              $.ajax({
                  type: "POST",
                  url: url,
                  data: form.serialize(),
                  dataType: "JSON",
                  beforeSubmit: function() {
                      $("#registerBtn").text('Sedang Diproses...');
                      $("#registerBtn").attr('disabled', true);
                  },
                  success: function(data) {
                      if (data.response == 200) {
                          setTimeout(function() {
                              window.location.href = data.redirectUrl;
                          }, 200);
                      } else {
                          $('#alertMessage').show();
                          $('#message').html(data.message);

                          $("#username").addClass("is-invalid");
                          $("#password").addClass("is-invalid");
                      }
                  }
              });
          } else {

              if (username == '' && password == '') {

                  $('#usernameErr').show();
                  $('#passwordErr').show();
                  $("#username").addClass("is-invalid");
                  $("#password").addClass("is-invalid");

              } else if (password != '') {

                  $('#usernameErr').show();
                  $("#username").addClass("is-invalid");

                  $("#password").addClass("is-valid");

              } else if (username != '') {

                  $('#passwordErr').show();
                  $("#password").addClass("is-invalid");

                  $("#username").addClass("is-valid");

              }
          }
      });

    </script>

</body>
</html>