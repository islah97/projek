<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="row">
      <!-- /.col -->
      <div class="col-md-4 col-8">
        <div class="box box-body bg-success">
          <h6 class="text-uppercase">JUMLAH DILULUSKAN</h6>
          <div class="flexbox mt-2">
          <span class="path1"></span><span class="path2"></span></span>
          <span class=" font-size-30" id="total_approve">0</span>
          </div>
        </div>
      </div>

      <!-- <div class="col-md-4 col-8">
        <div class="box box-body bg-success">
          <h6 class="text-uppercase">JUMLAH DILULUSKAN</h6>
          <div class="flexbox mt-2">
          <span class="path1"></span><span class="path2"></span></span>
          <span class=" font-size-30" id="total_approve">0</span>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-8">
        <div class="box box-body bg-danger">
          <h6 class="text-uppercase">JUMLAH DITOLAK</h6>
          <div class="flexbox mt-2">
          <span class="path1"></span><span class="path2"></span></span>
          <span class=" font-size-30" id="total_reject">0</span>
          </div>
        </div>
      </div> -->

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
                <th width="15%">Tarikh / Masa Mohon</th>
                <th width="15%">Peralatan</th>
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
            <h5 class="modal-title" id="titleModal">Daftar Peralatan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
            <form id="formData" method="POST">

              <div class="modal-body">

                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name"> Nama Pekerja: &nbsp;</label>
                    <input type="text" readonly class="form-control" id="name">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="staffno"> No. Pekerja: &nbsp;</label>
                    <input type="text" readonly class="form-control" id="staffno">
                  </div>
                </div>

                <div class="form-group col-md-12">
                    <label for="staffno"> Peralatan: &nbsp;</label>
                    <input type="text" readonly class="form-control" id="equipmentList">
                  </div>

                <div class="alert alert-danger alert-dismissable">
                      <b><i class="fa fa-exclamation-circle"></i>  Perhatian ! </b> Ruangan bertanda * wajib diisi. 
                </div>

                <div class="col-md-12">
                   <label> Tarikh <span class="text-danger"> * </span> </label>
                   <input type="date" name="reservation_date_return" id="reservation_date_return" class="form-control" required>
                </div>

                <div class="col-md-12">
                   <label> Masa Pemulangan <span class="text-danger"> * </span> </label>
                   <input type="time" name="reservation_time_return" id="reservation_time_return" class="form-control" required>
                </div>

              </div>

               <div class="modal-footer text-center">
                <center>
                  <input type="hidden" name="equipment_id" id="equipment_id">
                   <input type="hidden" name="reservation_id" id="reservation_id">
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
                  typeData: 2,
                },
                url: '../reservation/getListReservation',
                dataType: "JSON",
                success: function(data) {
                  for (var i = 0; i < data.length; i++) {

                    var edit = '<button class="btn btn-sm btn-info" onclick="updateData(' + data[i]['id'] + ')" title="Edit"><i class="fa fa-edit"></i> </button>';

                   var status = '';
                   if(data[i]['status'] == 2) {
                    status = '<span class="badge badge-success cc_cursor"> Diluluskan </span>'
                   }

                    table.row.add([
                      data[i]['name'],
                      data[i]['staffNo'],
                      data[i]['date'] + " <br> " + data[i]['time'],
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

        function updateData(id){

        $('#titleModal').html('Penilaian Pemulangan');
        $('#typeForm').val('update');
        $('#reservation_id').val(id);
        $('#formModal').modal('toggle');

        $.ajax({
                  type: "POST",
                  dataType: "JSON",
                  data: {id:id},
                  url: '../reservation/getUpdateData',
                  success: function(data) {
                    $('#name').val(data['reservation'].user_name);
                    $('#staffno').val(data['reservation'].user_staff_id);
                    $('#reservation_date_return').val(data['reservation'].reservation_date_return);
                    $('#reservation_time_return').val(data['reservation'].reservation_time_return);


                    var equipment_id = new Array();

                    for (var i = 0; i < data['item'].length; i++) {
                      $('#equipmentList').val(data['item'][i]['equipment_list']);
                      equipment_id[i] = data['item'][i]['equipment_id'];
                    }
                    
                    $('#equipment_id').val(equipment_id);
                  },
                });
      }

      $('#formData').on('submit', function(event) {
          event.preventDefault();

          var dataString = new FormData(this);
          var formType = $('#typeForm').val();

          $.ajax({
              type: "POST",
              url: "../reservation/"+formType,
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