<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="row">
      <!-- /.col -->
      <!-- <div class="col-md-4 col-8">
        <div class="box box-body bg-primary">
          <h6 class="text-uppercase">JUMLAH PEMINJAM</h6>
          <div class="flexbox mt-2">
          <span class="path1"></span><span class="path2"></span></span>
          <span class=" font-size-30" id="total_new">0</span>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-8">
        <div class="box box-body bg-success">
          <h6 class="text-uppercase">JUMLAH DILULUSKAN</h6>
          <div class="flexbox mt-2">
          <span class="path1"></span><span class="path2"></span></span>
          <span class=" font-size-30" id="total_approve">0</span>
          </div>
        </div>
      </div> -->

      <div class="col-md-4 col-8">
        <div class="box box-body bg-danger">
          <h6 class="text-uppercase">JUMLAH DITOLAK</h6>
          <div class="flexbox mt-2">
          <span class="path1"></span><span class="path2"></span></span>
          <span class=" font-size-30" id="total_reject">0</span>
          </div>
        </div>
      </div>

      <!-- /.col -->
      </div>
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          <h3 class="page-title">Senarai Peminjam</h3>
          <div class="d-inline-block align-items-center">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item" aria-current="page">Peminjam</li>
                <li class="breadcrumb-item active" aria-current="page">Senarai Peminjam</li>
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
        <!-- <div class="box-header with-border">
          <h3 class="box-title">Senarai Tempahan </h3>
          <a href="#" class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#formModal"> <i class="fa fa-plus"></i> Daftar Peralatan </a>
        </div> -->

        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="dataList" class="table table-bordered table-striped">
            <thead>
              <tr style="background-color: #A7DCFF;color: white">
                <th width="35%">Nama Peminjam</th>
                <th width="15%">No. Pekerja</th>
                <th width="15%">Tarikh Mohon</th>
                <th width="15%">Peralatan</th>
                <th width="10%">Status</th>
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
            <h5 class="modal-title" id="titleModal">Daftar Peralatan</h5>
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

                <!-- <div class="form-group">
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

               <div class="modal-footer text-center">
                <center>
                   <input type="hidden" name="equipment_id" id="equipment_id" placeholder="equipment id" >
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
          // getListDepartment();
          getListData();
          getCountData();
            // reset all field 
            $("#formModal").on("hidden.bs.modal", function(){
                $('#titleModal').html('Daftar Peralatan');
                document.getElementById("formData").reset();
                $('#reservation_id').val('');
                $('#typeForm').val('create');
                $(".modal-backdrop").remove();
            });
      });

      function getCountData(){
            
          // get count total baru
          $.ajax({
                type: "POST",
                data: {
                        typeData: 1,
                      },
                url: '../reservation/countList',
                dataType: "JSON",
                success: function(data) {
                    $('#total_new').html(data);
                },
               
            });

            // get count total lulus
          $.ajax({
                type: "POST",
                 data: {
                        typeData: 2,
                      },
                url: '../reservation/countList',
                dataType: "JSON",
                success: function(data) {
                    $('#total_approve').html(data);
                },
               
            });

            // get count total tolak
          $.ajax({
                type: "POST",
                 data: {
                        typeData: 3,
                      },
                url: '../reservation/countList',
                dataType: "JSON",
                success: function(data) {
                  $('#total_reject').html(data);

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
                data: {
                  typeData: 3,
                },
                url: '../reservation/getListReservation',
                dataType: "JSON",
                success: function(data) {
                  for (var i = 0; i < data.length; i++) {

                   var edit = '<button class="btn btn-sm btn-info" onclick="updateData(' + data[i]['id'] + ')" title="Edit"><i class="fa fa-edit"></i> </button>';

                   var status = '';
                   if(data[i]['status'] == 3) {
                    status = '<span class="badge badge-danger cc_cursor"> Ditolak </span>'
                   }

                    table.row.add([
                      data[i]['name'],
                      data[i]['staffNo'],
                      data[i]['date'],
                      data[i]['item'],
                      "<center>" + status + "</center>",
                      "<center>" + edit + "</center>",
                    ]).draw();

                  } // end for

                }
            });

      }

      // function deleteData(id){

      //    swal({   
      //                 title: "Anda Pasti ?",   
      //                 text: "Maklumat akan dihapuskan.",   
      //                 type: "warning",   
      //                 showCancelButton: true,   
      //                 confirmButtonColor: "#DD6B55",   
      //                 confirmButtonText: "Ya, Hapus",   
      //                 closeOnConfirm: true ,
      //             }, function(isConfirm){   

      //                 if (isConfirm) {     
                          
      //                     $.ajax({
      //                   type: "POST",
      //                   dataType: "JSON",
      //                   data: {id:id},
      //                   url: 'equipment/delete',
      //                   success: function(respond) {

      //                     if (respond == 200) {
      //                         toastr.success("Berjaya Dipadam.");
      //                         } else if (respond == 400) {
      //                         toastr.success("Gagal Didaftarkan.");
      //                         }

      //                         getListData();
      //                         getCountData();

      //                   },
                       
      //               });
                         
      //                 }

      //             });
      // }

      // function updateData(id){

      //   $('#titleModal').html('Kemaskini Peralatan');
      //   $('#typeForm').val('update');
      //   $('#equipment_id').val(id);
      //   $('#formModal').modal('toggle');

      //   $.ajax({
      //             type: "POST",
      //             dataType: "JSON",
      //             data: {id:id},
      //             url: 'equipment/getupdate',
      //             success: function(data) {

      //           $('#equipment_name').val(data.equipment_name);
      //         $('#equipment_type').val(data.equipment_type);
      //         $('#equipment_serial_no').val(data.equipment_serial_no);
      //         $('#equipment_model').val(data.equipment_model);
      //         $('#equipment_status').val(data.equipment_status).attr("selected", "selected");
      //            },
      //         });
      // }

      // function getListDepartment(){
        
      //   $.ajax({
      //         type: "POST",
      //         url: 'department/getListSelect',
      //         success: function(data) {
      //             $('#department_id').html(data);
      //         },
             
      //     });
      // }


      // function submitForm(){
      //   $('#formData').submit();
      // }

      $('#formData').on('submit', function(event) {
          event.preventDefault();

          var dataString = new FormData(this);
          var formType = $('#typeForm').val();

          $.ajax({
              type: "POST",
              url: "equipment/"+formType,
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