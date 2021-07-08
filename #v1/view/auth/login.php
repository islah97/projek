<?php 

require_once('../../config/baseurl.php'); 
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
    <link rel="icon" href="../images/favicon.ico">

    <title> STPICT | <?= $currentPage ?> </title>
  
    <!-- Vendors Style-->
    <link rel="stylesheet" href="<?= assets_url; ?>css/vendors_css.css">
      
    <!-- Style-->  
    <link rel="stylesheet" href="<?= assets_url; ?>css/style.css">
    <link rel="stylesheet" href="<?= assets_url; ?>css/skin_color.css">   

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

</head>
    
<body class="hold-transition theme-primary bg-img" style="background-image: url(<?= assets_url; ?>images/auth-bg/bg-1.jpg)">
    
    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">   
            
            <div class="col-12">
                <div class="row justify-content-center no-gutters">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="bg-white rounded30 shadow-lg">
                            <div class="content-top-agile p-20 pb-0">

                                <img src="<?= assets_url; ?>images/MBK.jpg" alt="Logo USM" width="100px" >
                                
                                <h1 class="text-primary">SISTEM TEMPAHAN PERALATAN ICT</h1>

                                <div style="display: none" class="alert alert-danger dalign-items-center" role="alert" id="alertMessage">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle mg-r-10"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                                     <span id="message"></span>
                                </div>

                            </div>
                            <div class="p-40">

                                <form id="loginForm" action="authorization" method="POST">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                            </div>
                                            <input type="text" name="username" id="loginid" class="form-control pl-15 bg-transparent" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
                                            </div>
                                            <input type="password" name="password" id="password" class="form-control pl-15 bg-transparent" placeholder="Password">
                                        </div>
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
                                          <input type="hidden" name="login" id="login" value="login">
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
    <script src="<?= assets_url; ?>js/vendors.min.js"></script>
    <!-- <script src="<?= assets_url; ?>js/pages/chat-popup.js"></script> -->
    <script src="<?= assets_url; ?>icons/feather-icons/feather.min.js"></script>   

    <script>

        $('#loginForm').on('submit', function(event) {
            event.preventDefault();

            var username = $("#username").val();
            var password = $("#password").val();

            var dataString = new FormData(this);

            // set hidden message back to empty
            $('#alertMessage').css("display", "none");

            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: dataString,
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#loginBtn').html("Sign In....");
                    $('#loginBtn').attr('disabled', true);
                },
                success: function(response) {

                    $('#loginBtn').html("Sign In");
                    $('#loginBtn').attr('disabled', false);

                    console.log(response);

                    if (response.status == 200) {

                        $('#message').html("");
                        $('#alertMessage').css("display", "none");
                        window.location.href = response.redirectUrl;

                    }else if (response.status == 400) {
                      $('#message').html(response.message);
                      $('#alertMessage').css("display", "block");
                    }

                },
                error: function(response) {
                    if (response.status == 400) {
                        $('#message').html(response.message);
                        $('#alertMessage').css("display", "block");
                    }

                    $('#loginBtn').html("Sign In");
                    $('#loginBtn').attr('disabled', false);
                }
            });
        });

        function resetErrorMsg() {
            $('#username').text('');
            $('#password').text('');
        }

    </script> 

</body>
</html>

