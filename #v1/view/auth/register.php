<?php 

require_once('../../config/baseurl.php'); 
$currentPage = 'Register';
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

    <title> STPICT | <?= $currentPage ?> </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="<?= assets_url; ?>css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="<?= assets_url; ?>css/style.css">
	<link rel="stylesheet" href="<?= assets_url; ?>css/skin_color.css">	
 	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url(<?= assets_url; ?>images/auth-bg/bg-2.jpg)">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">
			
			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded30 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h2 class="text-primary">Daftar Akaun</h2>
								<p class="mb-0">MAJLIS BANDARAYA KUANTAN </p>							
							</div>
							<div class="p-40">
								<form id="registerForm" action="user-register" method="post">
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											</div>
											<input type="text" name="user_name" id="user_name" class="form-control pl-15 bg-transparent" placeholder="Full Name">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
											</div>
											<input type="text" name="user_staff_id" id="user_staff_id" class="form-control pl-15 bg-transparent" placeholder="Staff Id" onblur="checkStaffID()">
											<span id="errorStaffid" class="text-danger"></span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent"><i class="fa fa-phone-square" aria-hidden="true"></i></span>
											</div>
											<input type="text" name="user_phoneNo" id="user_phoneNo" class="form-control pl-15 bg-transparent" placeholder="Phone Number">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
											</div>
											<input type="password" name="user_password" id="user_password" class="form-control pl-15 bg-transparent" placeholder="Password">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent"><i class="fa fa-building-o" aria-hidden="true"></i></span>
											</div>
											<select name="department_id" id="department_id" class="form-control pl-15 bg-transparent department_id">
											</select>
										</div>
									</div>
									  <div class="row">
										<!-- <div class="col-12">
										  <div class="checkbox">
											<input type="checkbox" id="basic_checkbox_1" >
											<label for="basic_checkbox_1">I agree to the <a href="#" class="text-warning"><b>Terms</b></a></label>
										  </div>
										</div> -->
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" id="registerBtn" class="btn btn-info margin-top-10">SIGN UP</button>
										  <input type="hidden" name="typeForm" value="register">
										</div>
										<!-- /.col -->
									  </div>
								</form>				
								<div class="text-center">
									<p class="mt-15 mb-0">Already have an account?<a href="login" class="text-danger ml-5"> Sign In</a></p>
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
	<script src="<?= assets_url; ?>js/pages/chat-popup.js"></script>
    <script src="<?= assets_url; ?>/icons/feather-icons/feather.min.js"></script>	

	<script>

		$(document).ready(function() {
          getListDepartment();
         
      	});

        $('#registerForm').on('submit', function(event) {
            event.preventDefault();

            var dataString = new FormData(this);

            // set hidden message back to empty
            // $('#alertMessage').css("display", "none");

            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: dataString,
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#registerBtn').html("Please wait....");
                    $('#registerBtn').attr('disabled', true);
                },
                success: function(response) {

                    $('#registerBtn').html("Sign In");
                    $('#registerBtn').attr('disabled', false);

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

                    // $('#loginBtn').html("Sign In");
                    // $('#loginBtn').attr('disabled', false);
                }
            });
        });

        function getListDepartment(){
        	
        	$.ajax({
                type: "POST",
                url: 'department/1',
                success: function(data) {
                    $('#department_id').html(data);
                },
               
            });
        }

        function checkStaffID(){

        	var id =$('#user_staff_id').val();
        
        	$.ajax({
                type: "POST",
                dataType: "JSON",
                data: {id:id},
                url: 'user/2',
                success: function(respond) {

                	if (respond == 400) {
                		$('#errorStaffid').html('Staff telah berdaftar.');
                		$('#registerBtn').attr('disabled', true);
                	}else{
                		$('#errorStaffid').html('');
                		$('#registerBtn').attr('disabled', false);
                	}

                },
               
            });
        }

    </script> 
	
</body>
</html>