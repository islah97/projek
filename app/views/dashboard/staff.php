
  <!-- Main content -->
  <section class="content">
      <div class="row">
          <div class="col-xl-9 col-12">
            <h4 class="mg-b-0 tx-spacing--1"> Hi, <?= $this->session->get('fullname'); ?> !</h4>
              <div class="row">
                  <div class="col-lg-4 col-12">
                      <div class="box">
                          <div class="box-body ">
                              <div class="d-flex justify-content-between align-items-center">
                                  <div>
                                      <h5 class="text-fade">Jumlah Permohonan</h5>
                                      <h2 class="font-weight-500 mb-0">132.0K</h2>
                                  </div>
                                  <div>
                                      <!-- <div id="revenue1"></div> -->
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-12">
                      <div class="box">
                          <div class="box-body">
                              <div class="d-flex justify-content-between align-items-center">
                                  <div>
                                      <h5 class="text-fade">Permohonan Diluluskan</h5>
                                      <h2 class="font-weight-500 mb-0">10.9k</h2>
                                  </div>
                                  <div>
                                      <!-- <div id="revenue2"></div> -->
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-12">
                      <div class="box">
                          <div class="box-body">
                              <div class="d-flex justify-content-between align-items-center">
                                  <div>
                                      <h5 class="text-fade">Permohonan Ditolak</h5>
                                      <h2 class="font-weight-500 mb-0">03.1k</h2>
                                  </div>
                                  <div>
                                      <!-- <div id="revenue3"></div> -->
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                   <section class="content">
                    <div class="row">
                
                    <div class="col-12">

                         <div class="box">
                          <div class="box-header with-border">
                            <a href="#" class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#formModal"> <i class="fa fa-plus"></i> Tempah Peralatan </a>
                          </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  <!-- <div class="col-xxxl-4 col-xl-5 col-12">
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
                                      <img src="<?= base_url; ?>images/avatar/avatar-1.png" class="avatar avatar-lg rounded100 bg-primary-light" alt="" />
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
                                      <img src="<?= base_url; ?>images/avatar/avatar-10.png" class="avatar avatar-lg rounded100 bg-primary-light" alt="" />
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
                                      <img src="<?= base_url; ?>images/avatar/avatar-11.png" class="avatar avatar-lg rounded100 bg-primary-light" alt="" />
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
                                      <img src="<?= base_url; ?>images/avatar/avatar-12.png" class="avatar avatar-lg rounded100 bg-primary-light" alt="" />
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
                  </div> -->
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
  <div id="formModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="titleModal">Tempahan Peralatan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
            <form id="formData" method="POST">

              <div class="modal-body">

              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name"> Nama Pekerja: &nbsp;</label>
                  <input type="text" readonly class="form-control" id="name" value="<?= $this->session->get('fullname'); ?>">
                </div>

                <div class="form-group col-md-6">
                  <label for="staffno"> No. Pekerja: &nbsp;</label>
                  <input type="text" readonly class="form-control" id="staffno" value="<?= $this->session->get('userNo'); ?>">
                </div>
              </div>

              <div class="alert alert-danger alert-dismissable mt-3">
                    <b><i class="fa fa-exclamation-circle"></i>  Perhatian ! </b> Ruangan bertanda * wajib diisi. 
              </div>

              <div class="form-group" id="checkList">

              </div>

              <div class="col-md-12">
                 <label> Tarikh <span class="text-danger"> * </span> </label>
                 <input type="date" name="reservation_date_pickup" id="reservation_date_pickup" class="form-control" required>
              </div>

              <div class="col-md-12">
                 <label> Masa <span class="text-danger"> * </span> </label>
                 <input type="time" name="reservation_time_pickup" id="reservation_time_pickup" class="form-control" required>
              </div>

              <div class="form-group">
                <label> Penerangan <span class="text-danger"> * </span> </label>
                <textarea name="reservation_description" id="reservation_description" class="form-control" rows="4" placeholder="Sila isi penerangan.." required></textarea> 
              </div>

            </div>

               <div class="modal-footer text-center">
                <center>
                  <input type="hidden" name="reservation_status" id="reservation_status" value="1">
                  <input type="hidden" name="user_id" id="user_id" value="<?= $this->session->get('userID'); ?>">
                  <input type="hidden" name="typeForm" id="typeForm" value="create">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                  <button type="submit" name="saveBtn" class="btn btn-primary">Simpan <span class="fa fa-floppy-o"></span></button>
                </center>
              </div>

            </form>

          </div>

      </div>
    </div>
  <script src="<?= base_url; ?>vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
  <script src="<?= base_url; ?>vendor_components/moment/min/moment.min.js"></script>
  <script src="<?= base_url; ?>vendor_components/fullcalendar/fullcalendar.js"></script>

<script type="text/javascript">
  
  $(document).ready(function() {
        getMasterEquipment();
          // reset all field 
          $("#formModal").on("hidden.bs.modal", function(){
              $('#titleModal').html('Daftar Peralatan');
              document.getElementById("formData").reset();
              $('#equipment_id').val('');
              $('#typeForm').val('create');
              $(".modal-backdrop").remove();
          });
    });

  function getMasterEquipment(){

    $.ajax({
        type: "POST",
        url: 'masterequipment/getListCheck',
        success: function(data) {
            $('#checkList').html(data);
        },
       
    });
  }

  $('#formData').on('submit', function(event) {
        event.preventDefault();

        var dataString = new FormData(this);
        var formType = $('#typeForm').val();

        $.ajax({
            type: "POST",
            url: "reservation/"+formType,
            data: dataString,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {

                if (response.type == 'create' && response.resCode == 200) {
                  toastr.success("Berjaya Memohon.");
                } else {
                  toastr.warning("Daftar / Kemaskini Tidak Berjaya");
                }

                setTimeout(function() {$('#formModal').modal('hide'); $("#formModal").modal({backdrop: false}); }, 500);

            },
            error: function(response) {
                 toastr.warning("Gagal.");
            }
        });
    });

</script>
    
  