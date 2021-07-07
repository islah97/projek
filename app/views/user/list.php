<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="row">
      <!-- /.col -->
      <div class="col-md-4 col-8">
        <div class="box box-body bg-primary">
          <h6 class="text-uppercase">Jumlah Pengguna</h6>
          <div class="flexbox mt-2">
          <span class="path1"></span><span class="path2"></span></span>
          <span class=" font-size-30" id="total_user">0</span>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-8">
        <div class="box box-body bg-success">
          <h6 class="text-uppercase">Pekerja</h6>
          <div class="flexbox mt-2">
          <span class="path1"></span><span class="path2"></span></span>
          <span class=" font-size-30" id="total_staff">0</span>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-8">
        <div class="box box-body bg-info">
          <h6 class="text-uppercase">Pentadbir</h6>
          <div class="flexbox mt-2">
          <span class="path1"></span><span class="path2"></span></span>
          <span class=" font-size-30" id="total_admin">0</span>
          </div>
        </div>
      </div>

      <!-- /.col -->
      </div>
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          <h3 class="page-title">Senarai Pengguna</h3>
          <div class="d-inline-block align-items-center">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item" aria-current="page">Pengguna</li>
                <li class="breadcrumb-item active" aria-current="page">Senarai Pengguna</li>
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
          <h3 class="box-title">Senarai Pengguna </h3>
          <a href="#" class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#formModal"> <i class="fa fa-plus"></i> Daftar Pekerja </a>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="dataList" class="table table-bordered table-striped">
            <thead>
              <tr style="background-color: #A7DCFF;color: white">
                <!-- <th width="5%">No</th> -->
                <th width="35%">Nama</th>
                <th width="15%">No. Pekerja</th>
                <th width="15%">No. Telefon</th>
                <th width="15%">Peranan</th>
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

    <!-- Modal -->
    <div id="formModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="titleModal">Daftar Pengguna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
            <form id="formData" method="POST">

              <div class="modal-body">

                <div class="alert alert-danger alert-dismissable">
                      <b><i class="fa fa-exclamation-circle"></i>  Perhatian ! </b> Ruangan bertanda * wajib diisi. 
                </div>

                <div class="form-group">
                  <label> Nama Penuh <span class="text-danger"> * </span></label>
                  <input type="text" id="user_name" name="user_name" class="form-control" maxlength="200" required>
                </div>

                <div class="row">

                  <div class="col-6">
                    <div class="form-group">
                      <label> No.Pekerja <span class="text-danger"> * </span></label>
                      <input type="text" id="user_staff_id" name="user_staff_id" class="form-control" maxlength="10" required>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label> No.Telefon <span class="text-danger"> * </span></label>
                      <input type="text" id="user_phoneNo" name="user_phoneNo" class="form-control" maxlength="11" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label> Jabatan/Bahagian <span class="text-danger"> * </span> </label>
                  <select name="department_id" id="department_id" class="form-control select2" required>
                  </select>
                </div>

                <div class="form-group">
                  <label> Kata Laluan <span class="text-danger"> * </span></label>
                  <input type="password" id="user_password" name="user_password" class="form-control" maxlength="100" required>
                </div>

                <div class="row">

                  <div class="col-6">
                    <div class="form-group">
                      <label> Peranan <span class="text-danger"> * </span></label>
                      <select name="user_role" id="user_role" class="form-control">
                        <option value="1">Pentadbir</option>
                        <option value="2">Pekerja</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label> Status <span class="text-danger"> * </span></label>
                      <select name="user_status" id="user_status" class="form-control">
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                      </select>
                    </div>
                  </div>
                </div>

              </div>

               <div class="modal-footer text-center">
                <center>
                   <input type="hidden" name="user_id" id="user_id" placeholder="user id">
                  <input type="hidden" name="typeForm" id="typeForm" value="create">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="submit" name="saveBtn" onclick="submitForm()" class="btn btn-primary">Simpan <span class="fa fa-floppy-o"></span></button>
                </center>
              </div>

            </form>

          </div>

      </div>
    </div>
  <!-- /.modal -->


  <script type="text/javascript">

      $(document).ready(function() {
          getListDepartment();
          getListData();
          getCountData();
            // reset all field 
            $("#formModal").on("hidden.bs.modal", function(){
                $('#titleModal').html('Daftar Pengguna');
                document.getElementById("formData").reset();
                $('#user_id').val('');
                $('#typeForm').val('create');
                $(".modal-backdrop").remove();
            });
      });

      function getCountData(){
            
          // get count total user
          $.ajax({
                type: "POST",
                data: {
                        typeData: 0,
                      },
                url: 'user/countUser',
                dataType: "JSON",
                success: function(data) {
                    $('#total_user').html(data);
                },
               
            });

            // get count total admin
          $.ajax({
                type: "POST",
                 data: {
                        typeData: 1,
                      },
                url: 'user/countUser',
                dataType: "JSON",
                success: function(data) {
                    $('#total_admin').html(data);
                },
               
            });

            // get count total staff
          $.ajax({
                type: "POST",
                 data: {
                        typeData: 2,
                      },
                url: 'user/countUser',
                dataType: "JSON",
                success: function(data) {
                  $('#total_staff').html(data);

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
                url: 'user/getListUser',
                dataType: "JSON",
                success: function(data) {
                  for (var i = 0; i < data.length; i++) {

                    var del = '<button onclick="deleteData(' + data[i]['user_id'] + ')" class="btn btn-sm btn-danger" title="Remove"> <i class="fa fa-trash"></i></button>';
                    var edit = '<button class="btn btn-sm btn-info" onclick="updateData(' + data[i]['user_id'] + ')" title="Edit"><i class="fa fa-edit"></i> </button>';

                    var status = '';
                    var role = '';

                    if (data[i]['user_status'] == 1) {
                      status = '<span class="badge badge-success cc_cursor"> Aktif </span>';
                    }else{
                      status = '<span class="badge badge-warning cc_cursor"> Tidak Aktif </span>';
                    }

                    if (data[i]['user_role'] == 1) {
                      role = 'Pentadbir';
                    }else if (data[i]['user_role'] == 2) {
                      role = 'Pekerja';
                    }else{
                      role = 'Super Administrator';
                    }

                    table.row.add([
                      data[i]['user_name'],
                      data[i]['user_staff_id'],
                      data[i]['user_phoneNo'],
                      role,
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
                        url: 'user/delete',
                        success: function(respond) {

                          if (respond == 200) {
                              toastr.success("Berjaya Dipadam.");
                              } else if (respond == 400) {
                              toastr.success("Gagal Didaftarkan.");
                              }

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
        $('#user_id').val(id);
        $('#formModal').modal('toggle');

        $.ajax({
                  type: "POST",
                  dataType: "JSON",
                  data: {id:id},
                  url: 'user/getupdate',
                  success: function(data) {

                $('#user_name').val(data.user_name);
                $('#user_password').val(data.user_password);
                $('#user_staff_id').val(data.user_staff_id);
                $('#user_phoneNo').val(data.user_phoneNo);
                // $('#department_id').val(data.department_id);
                // $('#user_role').val(data.user_role);
                // $('#user_status').val(data.user_status);

                $('#department_id').val(data.department_id).attr("selected", "selected");
                $('#user_role').val(data.user_role).attr("selected", "selected");
                $('#user_status').val(data.user_status).attr("selected", "selected");
                  },
                 
              });
      }

      function getListDepartment(){
        
        $.ajax({
              type: "POST",
              url: 'department/getListSelect',
              success: function(data) {
                  $('#department_id').html(data);
              },
             
          });
      }


      // function submitForm(){
      //   $('#formData').submit();
      // }

      $('#formData').on('submit', function(event) {
          event.preventDefault();

          var dataString = new FormData(this);
          var formType = $('#typeForm').val();

          $.ajax({
              type: "POST",
              url: "user/"+formType,
              data: dataString,
              dataType: "JSON",
              contentType: false,
              cache: false,
              processData: false,
              success: function(response) {

                  if (response.type == 'create' && response.resCode == 200) {
                    toastr.success("Berjaya Didaftarkan.");
                  } else if (response.type == 'update' && response.resCode == 200) {
                    toastr.success("Berjaya Dikemaskini.");
                  } else {
                    toastr.warning("Daftar / Kemaskini Tidak Berjaya");
                  }

                  setTimeout(function() {$('#formModal').modal('hide'); $("#formModal").modal({backdrop: false}); }, 500);
                  getListData();
                  getCountData();

                  // toastrAlert(msg, title, type);

              },
              error: function(response) {
                   toastr.warning("Gagal.");
              }
          });
      });


  </script>