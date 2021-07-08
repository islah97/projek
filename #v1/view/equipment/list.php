<?php 

require_once('../../config/baseurl.php'); 
require_once('../../config/database.php'); 
$currentPage = 'Peralatan';
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

    <title> STPICT | Senarai <?= $currentPage ?> </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="<?= assets_url; ?>css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="<?= assets_url; ?>css/style.css">
	<link rel="stylesheet" href="<?= assets_url; ?>css/skin_color.css">

 	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

 	 <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>

</head>

<body class="hold-transition light-skin sidebar-mini theme-primary">
	
<div class="wrapper">
	<div id="loader"></div>

 <?= include '../template/header.php'; ?>
  
  <?= include '../template/sidebar.php'; ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">

		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="row">
			<!-- /.col -->
			<div class="col-md-4 col-8">
				<div class="box box-body bg-primary">
				  <h6 class="text-uppercase">Kondisi Baik</h6>
				  <div class="flexbox mt-2">
					<span class="path1"></span><span class="path2"></span></span>
					<span class=" font-size-30" id="total_baik">0</span>
				  </div>
				</div>
			</div>

			<div class="col-md-4 col-8">
				<div class="box box-body bg-success">
				  <h6 class="text-uppercase">Kondisi Diselenggara</h6>
				  <div class="flexbox mt-2">
					<span class="path1"></span><span class="path2"></span></span>
					<span class=" font-size-30" id="total_diselenggara">0</span>
				  </div>
				</div>
			</div>

			<div class="col-md-4 col-8">
				<div class="box box-body bg-info">
				  <h6 class="text-uppercase">Kondisi Lupus</h6>
				  <div class="flexbox mt-2">
					<span class="path1"></span><span class="path2"></span></span>
					<span class=" font-size-30" id="total_lupus">0</span>
				  </div>
				</div>
			</div>

			<!-- /.col -->
			</div>
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Senarai <?= $currentPage ?></h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page"><?= $currentPage ?></li>
								<li class="breadcrumb-item active" aria-current="page">Senarai <?= $currentPage ?></li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
	
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Senarai <?= $currentPage ?> </h3>
				  <a href="#" class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#formModal"> <i class="fa fa-plus"></i> Daftar Peralatan </a>
				</div>

				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="dataList" class="table table-bordered table-striped">
						<thead>
							<tr style="background-color: #A7DCFF;color: white">
								<!-- <th width="5%">No</th> -->
								<th width="35%">Nama Peralatan</th>
								<th width="15%">No. Siri Peralatan</th>
								<th width="15%">Model</th>
								<th width="15%">Jenis</th>
								<th width="10%">Status</th>
								<th width="10%">Tindakan</th>
							</tr>
						</thead>
						<tbody></tbody>
					  </table>
					</div>
				</div>

				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->        
			</div>

			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->

  <?= include '../template/footer.php'; ?>

</div>
<!-- ./wrapper -->

	<!-- Modal -->
	<div class="modal center-modal fade" id="formModal" tabindex="-1">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="titleModal"> Daftar Peralatan </h5>
				<button type="button" class="close" data-dismiss="modal">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>

			  <form id="formData">

				<div class="modal-body">

				  	<div class="alert alert-danger alert-dismissable">
		                  <b><i class="fa fa-exclamation-circle"></i>  Perhatian ! </b> Ruangan bertanda * wajib diisi. 
		            </div>

					<div class="form-group">
						<label> Nama Peralatan <span class="text-danger"> * </span></label>
						<input type="text" id="equipment_name" name="equipment_name" class="form-control" maxlength="200" required>
					</div>

					<div class="row">

						<div class="col-6">
							<div class="form-group">
								<label> No. Siri Peralatan <span class="text-danger"> * </span></label>
								<input type="text" id="equipment_serial_no" name="equipment_serial_no" class="form-control" maxlength="10" required>
							</div>
						</div>

						<div class="col-6">
							<div class="form-group">
								<label> Model <span class="text-danger"> * </span></label>
								<input type="text" id="equipment_model" name="equipment_model" class="form-control" maxlength="11" required>
							</div>
						</div>
					</div>

					<!-- <div class="form-group">
						<label> Jabatan/Bahagian <span class="text-danger"> * </span> </label>
						<select name="department_id" id="department_id" class="form-control select2" required>
						</select>
					</div> -->

					

					<div class="row">

						<div class="col-6">
							<div class="form-group">
								<label> Jenis <span class="text-danger"> * </span></label>
								<input type="text" id="equipment_type" name="equipment_type" class="form-control" maxlength="100" required>
							</div>
						</div>

						<div class="col-6">
							<div class="form-group">
								<label> Status <span class="text-danger"> * </span></label>
								<select name="equipment_status" id="equipment_status" class="form-control">
									<option value="1">Baik</option>
									<option value="2">Lupus</option>
									<option value="0">Diselenggara</option>
								</select>
							</div>
						</div>
					</div>

			  	</div>
				  <div class="modal-footer">
				  	<input type="hidden" name="equipment_id" id="equipment_id" placeholder="equipment id">
				  	<input type="hidden" name="typeForm" id="typeForm" value="register">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" name="saveBtn" class="btn btn-primary float-right">Simpan</button>
				  </div>

			  </form>


			</div>
		  </div>
	</div>
	<!-- /.modal -->

	<!-- Vendor JS -->
	<script src="<?= assets_url; ?>js/vendors.min.js"></script>
	<!-- <script src="<?= assets_url; ?>js/pages/chat-popup.js"></script> -->
    <script src="<?= assets_url; ?>icons/feather-icons/feather.min.js"></script>	
    <script src="<?= assets_url; ?>vendor_components/datatable/datatables.min.js"></script>
	<script src="<?= assets_url; ?>vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
    <script src="<?= assets_url; ?>vendor_components/sweetalert/sweetalert.min.js"></script>
	<script src="<?= assets_url; ?>vendor_components/select2/dist/js/select2.full.js"></script>

	<!-- Joblly App -->
	<script src="<?= assets_url; ?>js/template.js"></script>

	<script type="text/javascript">

		$(document).ready(function() {
      		getListData();
      		getCountData();
            // reset all field 
            $("#formModal").on("hidden.bs.modal", function(){
                $('#titleModal').html('Daftar Peralatan');
                document.getElementById("formData").reset();
                $('#equipment_id').val('');
                $('#typeForm').val('register');
            });
	    });

	    function getCountData(){
        		
        	// get count total user
        	$.ajax({
                type: "POST",
                url: 'equipment-count/0/4',
                dataType: "JSON",
                success: function(data) {
                    $('#total_diselenggara').html(data.total);
                },
               
            });

            // get count total admin
        	$.ajax({
                type: "POST",
                url: 'equipment-count/1/4',
                dataType: "JSON",
                success: function(data) {
                    $('#total_baik').html(data.total);
                },
               
            });

            // get count total staff
        	$.ajax({
                type: "POST",
                url: 'equipment-count/2/4',
                dataType: "JSON",
                success: function(data) {
                    $('#total_lupus').html(data.total);
                },
               
            });
        }

		function getListData(){

			var table = $('#dataList').DataTable().clear().destroy();

	        table = $('#dataList').DataTable({
	            'paging'      : true,
	            'lengthChange': true,
	            'searching'   : true,
	            'ordering'    : true,
	            'info'        : true,
	            'autoWidth'   : false,
	        });
			
            $.ajax({
              type: 'POST',
              url: 'equipment/1',
              dataType: "JSON",
              success: function(data) {
              	console.log(data);
                for (var i = 0; i < data.length; i++) {

                  var status = '';
                  
                  if (data[i]['equipment_status'] == 1) {
                  	status = '<span class="badge badge-success cc_cursor"> Baik </span>';
                  }else if (data[i]['equipment_status'] == 2){
                  	status = '<span class="badge badge-danger cc_cursor"> Lupus </span>';
                  }else{
                  	status = '<span class="badge badge-warning cc_cursor"> Diselenggara </span>';
                  }	

                  var del = '<button onclick="deleteData(' + data[i]['equipment_id'] + ')" class="btn btn-sm btn-danger" title="Remove"> <i class="fa fa-trash"></i></button>';
                  var edit = '<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#formModal" onclick="updateData(' + data[i]['equipment_id'] + ')" title="Edit"><i class="fa fa-edit"></i> </button>';

                  table.row.add([
                    data[i]['equipment_name'],
                    data[i]['equipment_serial_no'],
                    data[i]['equipment_model'],
                    data[i]['equipment_type'],
                    "<center>" + status + "</center>",
                    "<center>" + del + " " + edit + "</center>",
                  ]).draw();

                } // end for

              }
          });

		}

		function deleteData(id){

			 swal({   
                    title: "Anda Pasti ?",   
                    text: "Maklumat akan dihapuskan.",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Ya, Hapus",   
                    closeOnConfirm: true ,
                }, function(isConfirm){   

                    if (isConfirm) {     
                        
                        $.ajax({
			                type: "POST",
			                dataType: "JSON",
			                data: {id:id},
			                url: 'equipment-delete/'+id+'/delete',
			                success: function(respond) {

			                	if (respond.status == '200') {
		                          var msg = 'Remove successfully';
		                          var title = "Success !";
		                          var type = "success";
		                        } else if (respond.status == '400') {
		                          var msg = 'Remove Unsuccessfully';
		                          var title = "Alert !";
		                          var type = "error";
		                        }

		                        toastrAlert(msg, title, type);

		                        getListData();
		                        getCountData();

			                },
			               
			            });
                       
                    }

                });
		}

		function updateData(id){

			$('#titleModal').html('Kemaskini Pengguna');
			$('#typeForm').val('update');
			$('#equipment_id').val(id);

			$.ajax({
                type: "POST",
                dataType: "JSON",
                data: {id:id},
                url: 'equipment/3',
                success: function(data) {

        			$('#equipment_name').val(data.equipment_name);
        			$('#equipment_type').val(data.equipment_type);
        			$('#equipment_serial_no').val(data.equipment_serial_no);
        			$('#equipment_model').val(data.equipment_model);
        			$('#equipment_status').val(data.equipment_status).attr("selected", "selected");
                },
               
            });
		}

        $('#formData').on('submit', function(event) {
            event.preventDefault();

            var dataString = new FormData(this);
            var formType = $('#typeForm').val();

            $.ajax({
                type: "POST",
                url: "equipment-"+formType,
                data: dataString,
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    // $('#saveBtn').html("Please wait....");
                    // $('#saveBtn').attr('disabled', true);
                },
                success: function(response) {

                    if (response.status == '200') {
                      var msg = 'Berjaya disimpan';
                      var title = "Berjaya !";
                      var type = "success";
                    } else if (response.status == '400') {
                      var msg = 'Tidak Berjaya Disimpan';
                      var title = "Amaran !";
                      var type = "error";
                    }

                    setTimeout(function() {$('#formModal').modal('hide');}, 500);
                    getListData();
                    getCountData();

                    toastrAlert(msg, title, type);

                },
                error: function(response) {
                    if (response.status == '400') {
                      var msg = 'Tidak Berjaya Disimpan';
                      var title = "Amaran !";
                      var type = "error";
                    }

                     toastrAlert(msg, title, type);
                }
            });
        });

        function toastrAlert(msg, title, type) {

	          Command: toastr[type](msg, title);

	          toastr.options = {
	              "closeButton": false,
	              "debug": false,
	              "newestOnTop": false,
	              "progressBar": true,
	              "positionClass": "toast-top-right",
	              "preventDuplicates": true,
	              "onclick": null,
	              "showDuration": "300",
	              "hideDuration": "1000",
	              "timeOut": "2500",
	              "extendedTimeOut": "1000",
	              "showEasing": "swing",
	              "hideEasing": "linear",
	              "showMethod": "fadeIn",
	              "hideMethod": "fadeOut",
	              "preventOpenDuplicates": true
	          }
	    }

	</script>
	

</body>
</html>
