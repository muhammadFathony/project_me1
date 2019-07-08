 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  
                </div>
              </div>
            </div>
          <!-- modal add userlog -->
           <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="Modal_add">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Form Tambah User</h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama" required="" class="form-control col-md-7 col-xs-12 hapus" name="nama">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <input type="password" class="form-control hapus" id="pasword" name="pasword" >
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ulangi Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <input type="password" class="form-control hapus" id="ulang" name="ulang" >
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Level</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <span class="fa fa-child form-control-feedback right" aria-hidden="true"></span>
                        
                        <select class="form-control hapus" id="akses" name="akses">
                          <option></option>
                          <option value="administrator">Administrator</option>
                          <option value="admin">Admin</option>
                          <option value="user">User</option>
                          <option value="pimpinan">Pimpinan</option>
  
                        </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i></button>
                    <button type="submit" id="btn_add" class="btn btn-secondary"><i class="fa fa-save"></i></button>
                  </div>
                  </form>
                  </div>
                  </div>
              </div>
            </div>
            <!-- modal add userlog -->
        <!-- modal edit userlog -->
           <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="Modal_edit">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Form Edit User</h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama_user" required="" minlength="2" maxlength="30" class="form-control col-md-7 col-xs-12 reset" name="nama_user">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password Baru <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <input type="password" class="form-control reset" id="password" name="password" >
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ulangi Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <input type="password" class="form-control reset" id="repeat_password" name="repeat_password" >
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Level</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <span class="fa fa-child form-control-feedback right" aria-hidden="true"></span>
                        
                        <select class="form-control reset" name="level" id="level">
                          <option></option>
                          <option value="admin">Admin</option>
                          <option value="user">User</option>
                          <option value="pimpinan">Pimpinan</option>
                        </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i></button>
                    <button type="button" id="btn_save" class="btn btn-secondary"><i class="fa fa-save"></i></button>
                  </div>
                  </form>
                  </div>
                  </div>
              </div>
            </div>
            <!-- modal edit userlog -->
             <!--MODAL DELETE-->
                   <form>
                      <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                 <strong>Anda yakin ingin menghapus data ini ?</strong>
                            </div>
                            <div class="modal-footer">
                              <input type="hidden" name="id_user" id="id_user" class="form-control">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i></button>
                              <button type="button" type="submit" id="btn_delete" class="btn btn-secondary"><i class="fa fa-check-circle-o"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  <!--END MODAL DELETE-->
            <div class="clearfix">
              <div class="alert alert-danger print-error-msg col-md-12 col-sm-12 col-xs-12" style="display:none"></div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>&nbsp;<a class="btn btn-dark" data-toggle="modal" data-target="#Modal_add"><span class="fa fa-user-plus"></span> Tambah User</a></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                      <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action" id="tbuser">
                        <thead>
                          <tr class="headings">                            
                            <th class="column-title">Nomor </th>
                            <th class="column-title">Nama User </th>
                            <th class="column-title">Level </th>
                            <th class="column-title">Created_at </th>
                            <th class="column-title">Action</th>                            
                          </tr>
                        </thead>
                        <tbody id="show_data">
                         
                         </tbody>
                      </table>
                    </div>           
                  </div>
                </div>
              </div>
            </div>
          </div>

        
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/notification.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/sweetalert/css/sweetalert.css" />
<script src="<?php echo base_url();?>assets/sweetalert/lib/sweet-alert.js"></script>
<script type="text/javascript">
notif_in();
notif_out();
list_in();
list_out();
update_out();
update_in();
  $(function() {
    tampildata();
    var table = $('#tbuser').DataTable();

    function tampildata(){
      $.ajax({
        url: '<?php echo base_url('Userlog/list_user') ?>',
        type: 'POST',
        dataType: 'json',
        async : false,
        success : function(data){
          var page = '';
          var i;
          var a = 1;
        for ( i = 0; i < data.length; i++) {
          page += '<tr class="even pointer">'+
                  '<td>'+[a++]+'.'+'</td>'+
                  '<td>'+data[i].nama_user+'</td>'+
                  '<td>'+data[i].level+'</td>'+
                  '<td>'+data[i].created_at+'</td>'+
                  '<td style="text-align:left;">'+
                    <?php if ($this->session->userdata('level')=='administrator' || $this->session->userdata('level')=='admin') {?>
                          '<a href="javascript:;" class="btn btn-toolbar btn-xs item_edit" data-id_user="'+data[i].id_user+'" data-nama_user="'+data[i].nama_user+'" data-level="'+data[i].level+'"><i class="fa fa-edit"></i></a>'+' '+
                          '<a href="javascript:void(0);" class="btn btn-toolbar btn-xs item_hapus" data-id_user="'+data[i].id_user+'"><i class="fa fa-trash"></i></a>'+
                    <?php } ?>
                  '</td>'+
                  '</tr>';
        }
        $('#show_data').html(page);
        }
      })
    }

  //tambah user
  $('#btn_add').on('click', function(event) {
    event.preventDefault();
    var nama = $('#nama').val();
    var pasword = $('#pasword').val();
    var ulang = $('#ulang').val();
    var akses = $('#akses').val();

    $.ajax({
      url: '<?php echo base_url('Userlog/daftar') ?>',
      type: 'POST',
      dataType: 'json',
      data: { nama: nama,
            pasword : pasword,
            ulang : ulang,
            akses : akses },
      success : function(data){
        if ($.isEmptyObject(data.eror)) {
            $('#Modal_add').modal('hide');
            $(".print-error-msg").css('display','none');
            tampildata();
            $('.hapus').val("");
        }else {
          $('#Modal_add').modal('hide');
          $(".print-error-msg").css('display','block');
          $(".print-error-msg").html(data.eror);
        }
        
      }
    })
    
                  
  });
  // end of tambah user

  //edit
    $('#show_data').on('click', '.item_edit', function(event) {
      event.preventDefault();
      var id_user = $(this).data('id_user');
      var nama_user = $(this).data('nama_user');
      var level = $(this).data('level');
      $('#Modal_edit').modal('show');
      $('[name="id_user"]').val(id_user);
      $('[name="nama_user"]').val(nama_user);
      $('[name="level"]').val(level);
    });

    $('#btn_save').on('click', function(event) {
      event.preventDefault();
      var id_user = $('#id_user').val();
      var nama_user = $('#nama_user').val();
      var level = $('#level').val();
      var password = $('#password').val();
      var repeat_password = $('#repeat_password').val();

      $.ajax({
        url: '<?php echo base_url('Userlog/edit') ?>',
        type: 'POST',
        dataType: 'json',
        data: {id_user: id_user,
              nama_user : nama_user, 
              level : level,
              password : password,
              repeat_password
              },
        success : function(data){
          if ($.isEmptyObject(data.error)) {
            $('.reset').val("");
            swal({
              title: "Berhasil Update!",
              text: "Selamat bekerja!",
              icon: "success",
              button: "Aww yiss!",
            });
            $('#Modal_edit').modal('hide');
            $(".print-error-msg").css('display','none');
            tampildata();
          }else{
            $('#Modal_edit').modal('hide');
            $(".print-error-msg").css('display','block');
            $(".print-error-msg").html(data.error);
          }
          
        }
      })
    });
    //edit
    //delete
    $('#show_data').on('click', '.item_hapus', function(event) {
      event.preventDefault();
      var id_user = $(this).data('id_user')
      $('#Modal_Delete').modal('show');
      $('[name="id_user"]').val(id_user);
    });
    $('#btn_delete').on('click', function(event) {  
    var id_user = $('#id_user').val();
    $.ajax({
      url: '<?php echo base_url('Userlog/hapus_user') ?>',
      type: 'POST',
      cache : true,
      dataType: 'JSON',
      data: {id_user: id_user},
      success :function(data){
        $('[name="id_user"]').val("");
        $('#Modal_Delete').modal('hide');
        tampildata();
      }
      });  
    });
    //delete
});
</script>