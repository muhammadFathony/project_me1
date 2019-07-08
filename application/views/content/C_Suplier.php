
    <!-- NProgress -->
    <link href="<?php echo base_url();?>assets/backend/vendors/nprogress/nprogress.css" rel="stylesheet">
   
    <!-- Ion.RangeSlider -->
    <link href="<?php echo base_url();?>assets/backend/vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/backend/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/backend/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
   
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url();?>assets/backend/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo base_url();?>assets/backend/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/backend/vendors/cropper/dist/cropper.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/backend/build/css/custom.min.css" rel="stylesheet">
   
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">

              <div class="title_right">
                <div class="notif">
                <?php echo $this->session->flashdata('errorMessage');?>
                <?php echo $this->session->flashdata('succesMessage');?>
                </div> 
              </div>
            </div>
            <div class="clearfix">
              <div class="alert alert-danger print-error-msg col-md-12 col-sm-12 col-xs-12" style="display:none"></div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Suplier <small>Isi dengan benar &nbsp;&nbsp;   </small></h2>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#add_kategori"><span class="fa fa-cogs"></span> Kategori</button>

                    <!-- modal tambah kategori -->
                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="add_kategori">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Tambah Kategori</h4>
                        </div>
                        <div class="modal-body">
                         <form class="form-horizontal form-label-left input_mask" id="form_suplier">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control" id="kategori" placeholder="Kategori" name="kategori" required>
                              <span class="fa fa-cubes form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <button type="button" class="btn btn-toolbar" data-dismiss="modal"><span class="fa fa-close"></span></button>
                            <button type="button" class="btn btn-toolbar" id="btn_save"><span class="fa fa-save"></span></button>
                            <table class="table table-striped jambo_table bulk_action" id="tb_kategori">
                              <thead>
                                <tr class="headings">
                                  <th class="column-title">
                                    Nomor
                                  </th>
                                 <th class="column-title">Nama Kategori </th>
                                 <th class="column-title">Aksi </th>
                                </tr>
                              </thead>          
                              <tbody id="show_data">
                              </tbody>
                           </table>
                         </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                      </div>
                    </div>
                  </div>

                     <!-- modal tambah kategori -->

                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" id="form_suplier" novalidate>

                      <div class="item col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="nama_supplier" placeholder="Nama Suplier" name="nama_supplier" required="required">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="item col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control reset" id="fax" placeholder="Fax" name="fax" required="required">
                        <span class="fa fa-fax form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="item col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="email" class="form-control has-feedback-left reset" id="email" placeholder="Email" name="email" required="required">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="item col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="tel" class="form-control reset" id="telepon" placeholder="Phone" name="telepon" required="required">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12">Alamat</label>
                        <div class="item col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12 reset" rows="3" placeholder="Alamat" name="alamat" id="alamat" required="required"></textarea>
                        </div>
                      </div>
                     
                      <div class="form-group">
                      	<label class="control-label col-md-1 col-sm-3 col-xs-12">Kategori</label>
                      	<div class="col-md-4 col-sm-3 col-xs-12">
                      		<select class=" item form-control has-feedback-left reset" name="id_kategori" id="id_kategori">
                      			<option value=""></option>
		                          <?php $opsi = $this->db->get('kategori');
		                          foreach ($opsi->result() as $key) { ?>
		                        <option value="<?=$key->id_kategori?>">Kategori <?=$key->kategori?></option>
		                          <?php }?> 
                      		</select>
                      		<span class="fa fa-tasks form-control-feedback left" aria-hidden="true"></span>
                      	</div>
                      	
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-9 col-xs-12 col-md-offset-5">
                         
						             <button class="btn btn-warning" type="reset"><span class="fa fa-close"></span></button>
                         <button type="button" class="btn btn-warning" id="btn-save"><span class="fa fa-save"></span></button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>            
          </div>
        </div>
        <!-- /page content -->

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/Backend/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/Backend/vendors//validator/validator.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/sweetalert/css/sweetalert.css" />
<script src="<?php echo base_url();?>assets/sweetalert/lib/sweet-alert.js"></script>
<script src="<?php echo base_url();?>assets/js/notification.js"></script>
<script src="<?php echo base_url();?>node_modules/socket.io-client/dist/socket.io.js"></script>
<script type="text/javascript">
notif_in();
notif_out();
list_in();
list_out();
update_out();
update_in();
$(document).ready(function(){
  list_kategori()
  socket_on()
  var tabel = $('#tb_kategori').DataTable();          
  function socket_on(){
    var socket = io.connect( 'http://'+window.location.hostname+':8000' );
        socket.on('new', function (data){
          list_kategori();
        })
        socket.on('delete', function (data){
          list_kategori();
        })
  }           
//tambah supplier
$('#btn-save').on('click',function(){
  var nama_supplier = $('#nama_supplier').val();
  var alamat = $('#alamat').val();
  var id_kategori = $('#id_kategori').val();
  var email = $('#email').val();
  var telepon = $('#telepon').val();
  var fax = $('#fax').val();

  $.ajax({
    type : "POST",
    dataType : "JSON",
    url : "<?php echo base_url('Suplier/TambahSuplier')?>",
    data : {
      nama_supplier : nama_supplier,
      alamat : alamat,
      id_kategori : id_kategori,
      email : email,
      telepon : telepon,
      fax :fax
    },
      success : function(data){
        if ($.isEmptyObject(data.error)) {
          $(".print-error-msg").css('display','none');
          swal("Berhasil!", "Selamat Bekerja!", "success");
          $('#nama_supplier').val("");
          $('#alamat').val("");
          $('#id_kategori').val("");
          $('#email').val("");
          $('#telepon').val("");
          $('#fax').val("");

        } else {
          $(".print-error-msg").css('display','block');
          $(".print-error-msg").html(data.error);
        }
      },error : function(){
        swal("Gagal!", "Data sudah ada!", "warning");
      }
  });
  return false;
});
// end tambah supplier
//autofill
 $('#nama_supplier').on('keyup', function(event) {
   var nama_supplier = $(this).val();

   if (nama_supplier == "") {
    $('.reset').val();
  } else {
    $.ajax({
      url: '<?php echo base_url('Suplier/autofill_suplier') ?>',
      type: 'POST',
      dataType: 'json',
      data: {nama_supplier: nama_supplier},
      success : function(data){
        $.each(data, function(result) {
          $('[name="alamat"]').val(data.alamat);
          $('[name="id_kategori"]').val(data.id_kategori);
          $('[name="fax"]').val(data.fax);
          $('[name="email"]').val(data.email);
          $('[name="telepon"]').val(data.telepon);
        });
      }
    })
    
  }
 });
//autofill
// get suplier
  function list_kategori()
  {
    $.ajax({
      type    : 'ajax',
      url     : '<?php echo base_url('Suplier/listkategori')?>',
      
      dataType: 'json',
      success : function(data){
        var html = '';
        var i;
        var a = 1;
        for(i=0; i<data.length; i++){
          html += '<tr class="even pointer">'+
                '<td class=" ">'+[a++]+'.'+'</td>'+
                '<td class=" ">'+data[i].kategori+'</td>'+
                '<td style="text-align:left;">'+
                <?php if ($this->session->userdata('level')=='administrator') {?>
                        '<a href="javascript:void(0);" class="btn btn-default btn-sm item_delete" data-id_kategori="'+data[i].id_kategori+'"><i class="fa fa-trash"></i></a>'+
                <?php } ?>
                    '</td>'+
                '</tr>';
        }
        $('#show_data').html(html);
        socket_on();
      }
    });
  } 
// end get suplier
//tambah kategori
  $('#btn_save').on('click', function(){
  var kategori  = $('#kategori').val();
  $.ajax({
    type    : "POST",
    dataType: "JSON",
    url     : "<?php echo base_url('Suplier/tambah_kategori') ?>",
    data    : { kategori : kategori},

    success : function(data){
      if ($.isEmptyObject(data.rusak)) {
        list_kategori();
        $('[name="kategori"]').val("");
        swal('Sukses !!!','','success');
        var socket = io.connect( 'http://'+window.location.hostname+':8000' );
          socket.emit('new', {
            kategori : kategori
          });
      } else {
        swal('Data harus di isi !!!','','warning');
      }
    }
  });
  return false;
  })
  //end of tambah kategori
//delete kategori
$('#show_data').on('click', '.item_delete', function(){
  var tabel = $('#tb_kategori').DataTable();
  var id_kategori = $(this).data('id_kategori');
  $.ajax({
    url: '<?php echo base_url('Suplier/hapus_kategori') ?>',
    type: 'POST',
    dataType: 'JSON',
    data: {id_kategori: id_kategori},
    success :function(data){
      list_kategori()
      var socket = io.connect( 'http://'+window.location.hostname+':8000' );
      socket.emit('delete', {
        kategori : id_kategori
      });
    }
  });  
});

});
    </script>

