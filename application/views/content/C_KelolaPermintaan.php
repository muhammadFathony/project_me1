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
              <div class="alert alert-success alert-dismissible fade in print-error-msg" role="alert" style="display: none">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Succes to add</strong> User added by admin.
              </div>
            </div>
             

            <div class="clearfix"></div>
            <div class="row">
              <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Buat Permintaan <small><b style="font-family: monospace;
                    color: #dd1616;">Buat Permintaan barang dengan benar</b></small></h2>
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
                    
                     <!-- end of induk -->
                    <br />
               
                  <div class="col-md-4 col-sm-6 col-xs-12 has-feedback right">
                      <div class="input-group date" id="myDatepicker2">
                          <input type="text" class="form-control hapus" id="tanggal" name="tanggal" />
                          <span class="input-group-addon">
                             <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback" id="nomer">
                          <input type="text" class="form-control hapus" id="id" placeholder="No Transaksi" name="id">
                          <span class="fa fa-cubes form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <button type="button" class="btn btn-success" id="btn_kode"><span class="fa fa-info-circle">&nbsp;&nbsp;</span>Kode</button>
                  </div> 
                  <div id="nomer" class="col-md-10">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Departemen</label>
                    <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left hapus" name="departemen" id="departemen" placeholder="">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>    
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-3 col-xs-12">Keterangan</label>
                      <div class="col-md-5 col-sm-3 col-xs-12">
                        <textarea class="form-control has-feedback-left" rows="3" name="keterangan" id="keterangan"></textarea>
                        <span class="fa fa-tasks form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>   
                  </div>        
                
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Scan Barang</h2>
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
                    
                     <!-- end of induk -->
                    <br />
                    <div class="form-group has-feedback">
                      <div class="form-group">
                          <div class="col-md-3">
                              <textarea class="form-control reset has-feedback reset hapus" id="id_tag" name="id_tag" placeholder="rfid data here..." rows="1"></textarea>
                          </div>
                      </div>
                    </div>
        
                    <form class="form-horizontal form-label-left input_mask" id="form_barang">

                    
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control reset hapus" id="nm_barang" placeholder="Nama Barang" name="nm_barang" readonly="readonly">
                        <span class="fa fa-cubes form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="form-group">
                        <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                          <input type="text" class="form-control reset hapus" id="kd_barang" placeholder="Kode Barang" name="kd_barang" readonly="">
                          <span class="fa fa-cubes form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">
                          <input type="number" class="form-control reset hapus" id="jumlah" placeholder="Jumlah Barang" name="jumlah" >
                          <span class="fa fa-cubes form-control-feedback right" aria-hidden="true"></span>
                          <div class="notif_Stok" style="display: none">
                          <span class="help-block badge" id="stok_brg" style="background-color: #5cb85c;">stok :</span>
                          </div>
                        </div>

                      </div>
                       
                      
                
                      <div class="form-group">
                        <div class="col-md-5 col-sm-9 col-xs-12 col-md-offset-5">
                         
                         <button class="btn btn-primary" type="reset"><span class="fa fa-close"></span></button>
                         <button type="submit" class="btn btn-primary" id="btn_addlist"><span class="fa fa-check"></span></button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>

               <!--MODAL DELETE-->
         <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Anda yakin ingin menghapus barang ini?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id_tag" id="id_tag" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i></button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-secondary"><i class="fa fa-check-circle-o"></i></button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL DELETE-->
              <!-- tabel -->
              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel List <small>Cek Kembali</small></h2>
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
                    <table class="table table-hover" id="tblist">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Jumlah</th>
                          <th>Id Transaksi</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody id="show_data">
                        
                      </tbody>
                    </table>

                    <table class="table table-hover" id="tbcount">
                      <thead>
                        <tr>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Jumlah</th>
                        </tr>
                      </thead>
                      <tbody id="show_count">
                    
                      </tbody>
                    </table>
                    <div class="col-md-12 col-sm-9 col-xs-12">
                      <div class="" style="float: right">
                        <button class="btn btn-toolbar" id="savetb">
                          <i class="fa fa-save"></i>
                        </button>
                      </div>
                    </div>                  
                  </div>
                </div>
              </div>
              <!-- end of tabel -->
            </div>            
          </div>
        </div>
<!-- /page content -->
    <!-- <script src="<?php echo base_url();?>node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <script src="<?php echo base_url();?>node_modules/socket.io-client/dist/socket.io.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/js/notification.js"></script>
<script type="text/javascript">
notif_in();
notif_out();
list_in();
list_out();
update_in();
update_out();
</script>
<script type="text/javascript">
        $(document).ready(function(){
            //autosave_permintaan();
            tampil_data();
            removelist();
            $('#tblist').DataTable();
            count_data();
            emit_Tag();
            $('#tanggal').datetimepicker({
                 //format: 'YYYY-MM-DD'
                format: 'DD-MM-YYYY'
            });
            function emit_Tag()
            {
              var socket = io.connect( 'http://'+window.location.hostname+':3000' ); 
              socket.on('text', function(data){
              $("#tag").val(data.text);
              });
            }
            var table = $('#tbcount').DataTable({
              "paging": false,
              "info": false,
              "searching": false,
              "processing": false, //fasilitas processing datatables.
              "serverSide": false,
            });

              var socket = io.connect( 'http://'+window.location.hostname+':3000' );           

             socket.on('text', function(data){
                $("#id_tag").val(data.text);
                var jumlah = 1;
                var id_tag = $('#id_tag').val();
                if (id_tag == "") {
                  $('.reset').val('');
                  socket.on('text', function(tag){
                  $("#id_tag").val(tag.text); 
                  });
                }else{
                $.ajax({
                type : "POST",
                url : "<?php echo base_url('Kelola_Permintaan/autofilltambahbarang') ?>",
                dataType : "JSON",
                data : {id_tag: id_tag},
                cache : false,
                success : function(data){                  
                $.each(data, function(id_tag, kd_barang, nm_barang, id_supplier, id_kategori){
                  $(".print-error-msg").css('display','none');
                  $('[name="kd_barang"]').val(data.kd_barang);
                  $('[name="nm_barang"]').val(data.nm_barang);
                  //$('[name="suplier"]').val(data.id_supplier);
                  //$('[name="kategori"]').val(data.id_kategori);
                  $('[name="jumlah"]').val(jumlah);
                  $('#stok_brg').html('Stok :'+ data.stok);
                  $('.notif_Stok').css('display', 'block');
                  $('#jumlah').attr({
                    max: data.stok,
                    min: 1
                  }); 
                });
                  
                }
               });
              }
            });

             $('#myDatepicker2').datetimepicker({
                format: 'YYYY/MM/DD'
            });

             //on enter
             $('#id').on('keyup',function(event) {
               event.preventDefault();
               var id_tag = $('#id_tag').val();
               var kd_barang = $('#kd_barang').val();
               var nm_barang = $('#nm_barang').val();
               var jumlah = $('#jumlah').val();
               var id_tkeluar = $(this).val();
               if (event.keyCode == 13) {
                $.ajax({
                  type : "POST",
                  url : "<?php echo base_url('Kelola_Permintaan/add_tabel_permintaan') ?>",
                  dataType : "JSON",
                  data : { 
                        id_tag: id_tag,
                        kd_barang : kd_barang,
                        nm_barang : nm_barang,
                        jumlah : jumlah,
                        id_tkeluar : id_tkeluar,                   
                      },
                  success : function(data){
                    emit_Tag();
                    if ($.isEmptyObject(data.problem)) {
                    $(".print-error-msg").css('display','none');
                    $('.notif_Stok').css('display', 'none');
                    $('.reset').val('');
                    tampil_data();
                    count_data();
                    } else {
                      $(".print-error-msg").css('display','block');
                      $(".print-error-msg").html(data.problem);
                    }
                    if (data.stok_kurang) {
                      $('.notif_Stok').css('display', 'none');
                      swal('Stok Kurang.','','warning');
                    }
                  }
                });
              return false;
               }
             });
             // end of on enter
//tambah ke list
          $('#btn_addlist').on('click', function(){

            var id_tag = $('#id_tag').val();
            var kd_barang = $('#kd_barang').val();
            var nm_barang = $('#nm_barang').val();
            var jumlah = $('#jumlah').val();
            var id_tkeluar = $('#id').val();
            

            $.ajax({
              type : "POST",
              url : "<?php echo base_url('Kelola_Permintaan/add_tabel_permintaan') ?>",
              dataType : "JSON",
              data : { 
                    id_tag: id_tag,
                    kd_barang : kd_barang,
                    nm_barang : nm_barang,
                    jumlah : jumlah,
                    id_tkeluar : id_tkeluar,                   
                  },
              success : function(data){
                emit_Tag();
                if ($.isEmptyObject(data.problem)) {
                $(".print-error-msg").css('display','none');
                $('.reset').val('');
                tampil_data();
                count_data();
                } else {
                  $(".print-error-msg").css('display','block');
                  $(".print-error-msg").html(data.problem);
                }
                if (data.stok_kurang) {
                  $('.notif_Stok').css('display', 'none');
                  swal('Stok Kurang.','','warning');
                }
              }
            });
            return false;
          });
//end of tambah ke list
             // kode otomatis
             $('#btn_kode').click(function(){
              var id_tkeluar = $('#id').val();
              $.ajax({
                type : "post",
                url : "<?php echo base_url('Kelola_Permintaan/kode_transaksi_otomatis') ?>",
                dataType  : "JSON",
                data      : {
                              id_tkeluar : id_tkeluar,
                            },
                success : function(a){
                    $('#id').val(a);
                    $('#a').val(a);
                }
              });
             });
             // end of kode otomatis

            // autofill
            $('#id_tag').on('input', function(){
              var id_tag = $(this).val();
              var jumlah = 1;
              if (id_tag == "") {
                $('.reset').val('');
              }else {
               $.ajax({
                type : "POST",
                url : "<?php echo base_url('Kelola_Permintaan/autofilltambahbarang') ?>",
                dataType : "JSON",
                data : {id_tag: id_tag},
                cache : false,
                success : function(data){
                  $.each(data, function(id_tag, kd_barang, nm_barang){
                    $('[name="kd_barang"]').val(data.kd_barang);
                    $('[name="nm_barang"]').val(data.nm_barang);
                    $('[name="jumlah"]').val(jumlah);
                    $('#stok_brg').html('Stok :'+ data.stok);
                    $('.notif_Stok').css('display', 'block');
                    $('#jumlah').attr({
                      max: data.stok,
                      min: 1
                    }); 
                  });
                }
               });
             }
            });
            //autofill  
            //hitung
            function count_data()
            {
              $.ajax({
                type : 'ajax',
                url : '<?php echo base_url('Kelola_Permintaan/count_total_permintaan') ?>',
                dataType : 'JSON',
                success : function(data){
                  var html = '';
                  var i;
                  for ( i = 0; i < data.length; i++) {
                    html += '<tr>'+
                              '<td>'+data[i].kd_barang+'</td>'+
                              '<td>'+data[i].nm_barang+'</td>'+
                              '<td>'+data[i].jumlah+'</td>'+
                            '</tr>'
                  }
                  $('#show_count').html(html);
                }
              });
            }
            //hapusdaftar dan ubah status
            function removelist()
            {
               var tabel_list = [];
              
                $('#tblist tr').each(function(row, tr){
                   
                     var sub = {
                    'id_tag' : $(tr).find('td:eq(0)').text(),
                    'kd_barang' : $(tr).find('td:eq(1)').text(),
                    'nm_barang' : $(tr).find('td:eq(2)').text(),
                    'jumlah' : $(tr).find('td:eq(3)').text()
                  };

                  tabel_list.push(sub);
                });

             //ubah status
              var data = {'tblist' : tabel_list};

              $.ajax({
                data : data,
                type : 'POST',
                url : '<?php echo base_url('Kelola_Permintaan/hapus_count_permintaan') ?>',
                crossOrigin : false,
                dataType : 'JSON',
                success : function(data){               
                }

              });
            }

            //ambil list
            function tampil_data()
            {
              $.ajax({
                type    : 'ajax',
                url     : '<?php echo base_url('Kelola_Permintaan/transaksi_permintaan')?>',
                async   : false,
                dataType : 'JSON',
                success : function(data){
                  var html = '';
                  var a = 1;
                  var i;
                  for (i = 0; i < data.length; i++) {
                    html += '<tr>'+
                            '<td>'+[a++]+'</td>'+
                            '<td>'+data[i].kd_barang+'</td>'+
                            '<td>'+data[i].nm_barang+'</td>'+
                            '<td>'+data[i].jumlah+'</td>'+
                            '<td>'+data[i].id_tkeluar+'</td>'+
                            '<td style="text-align:left;">'+
                                    '<a href="javascript:;" class="btn btn-toolbar item_hapus" data-id_tag="'+data[i].id_tag+'"><i class="fa fa-trash"></i></a>'+
                                '</td>'+
                            '</tr>';
                  }
                  $('#show_data').html(html);
                }
              });
            }
          
          //ambil data untuk delete list
          $('#show_data').on('click','.item_hapus',function(){
              var id_tag = $(this).data('id_tag');
              
              $('#Modal_Delete').modal('show');
              $('[name="id_tag"]').val(id_tag);
          });

          //delete record ke list
         $('#btn_delete').on('click',function(){
            var id_tag = $('#id_tag').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('Kelola_Permintaan/delete_list_tranksaksi_permintaan')?>",
                dataType : "JSON",
                data : {id_tag:id_tag},
                success: function(data){
                emit_Tag();
                $('[name="id_tag"]').val("");
                $('#Modal_Delete').modal('hide');
                count_data();
                tampil_data();
                }
            });
            return false;
          });

         //save data yang terhitung
         $('#savetb').click(function(){
          var table_data = [];
          var id_tkeluar = $('#id').val();
          var departemen = $('#departemen').val();
          var keterangan = $('#keterangan').val();
          var tanggal = $('#tanggal').val();
          $('#tbcount tr').each(function(row,tr){

            if($(tr).find('td:eq(0)').text() == "") {

            } else {
               var sub = {
              'kd_barang' : $(tr).find('td:eq(0)').text(),
              'nm_barang' : $(tr).find('td:eq(1)').text(),
              'jumlah' : $(tr).find('td:eq(2)').text()
            };

            table_data.push(sub);
            }
           
          });
         //to database
         
         swal({
            title : 'Anda yakin transaksi sudah benar ?',
            text : '',
            type : '',
            showLoaderOnConfirm : true,
            showCancelButton : true,
            ConfirmButtonText : 'Yes',
            CloseOnConfirm : false },

            function() {

              var data = {'tbcount' : table_data,
                          id : id_tkeluar,
                          departemen : departemen,
                          keterangan : keterangan,
                          tanggal : tanggal
                        };

              $.ajax({
                data : data,
                type : 'POST',
                url : '<?php echo base_url('Kelola_Permintaan/save_count_permintaan') ?>',
                crossOrigin : false,
                dataType : 'JSON',
                success : function(result){
                emit_Tag();
                  if (result.status == "success") {
                    swal('Permintaan sukses.', '', 'success');
                    $(".print-error-msg").css('display','none');
                  } else {
                    swal('Gagal menyimpan.','','warning');
                  }
                  $('.hapus').val('');
                  removelist();
                  tampil_data();
                  count_data();
                  notif_in();
                  notif_out();
                  list_out();
                  //$('#nomer').show();
                }
              });

            });
         });
      });
    </script>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/Backend/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo base_url();?>assets/Backend/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- jquery.inputmask -->
    <script src="<?php echo base_url();?>assets/backend/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="<?php echo base_url();?>assets/backend/vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- Cropper -->
    <script src="<?php echo base_url();?>assets/backend/vendors/cropper/dist/cropper.min.js"></script>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/sweetalert/css/sweetalert.css" />
     <script src="<?php echo base_url();?>assets/sweetalert/lib/sweet-alert.js"></script>
