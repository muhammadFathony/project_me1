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
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kelola Stok Masuk <small>Tambah Stok barang dengan benar</small></h2>
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
                    <?php $c = $solved->row_array() ?>
                     <!-- end of induk -->
                    <br />
                  <div class="form-group id="t">
                    <input type="hidden" name="" value="<?php echo $c['kd_barang'] ?> ">
                    <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback" id="nomer" >
                          <input type="text" class="form-control hapus" id="id" placeholder="No Transaksi" name="id">
                          <span class="fa fa-cubes form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-1">
                    <button type="button" class="btn btn-success" id="btn_kode"><span class="fa fa-info-circle">&nbsp;&nbsp;</span>Kode</button>  
                    </div>
                    
                    <div class="col-md-4 col-sm-6 col-xs-12 has-feedback right">
                      <div class="input-group date" id="myDatepicker2">
                          <input type="text" class="form-control hapus" id="tanggal" name="tanggal" />
                          <span class="input-group-addon">
                             <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>
                  </div>

                    <form class="form-horizontal form-label-left input_mask" id="form_barang">
                   <div class="col-md-12"></div>
                      <label class="control-label col-md-1 col-sm-3 col-xs-12">Suplier</label>
                      <div class="col-md-5 col-sm-3 col-xs-12 form-group has-feedback">
                        <select class="form-control has-feedback-left hapus" name="suplier" id="suplier">
                          <option value=""></option>
                          <?php $sup = $this->db->get('supplier');
                            foreach ($sup->result() as $key) { 
                              if ($c['id_supplier']==$key->id_supplier) {
                              ?>
                              <option value="<?=$key->id_supplier?>" selected><?=$key->nama_supplier?></option>
                          <?php } else {?>
                            <option value="<?=$key->id_supplier?>"><?=$key->nama_supplier?></option>
                          <?php } } ?>
                        </select>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12">Kategori</label>
                        <div class="col-md-4 col-sm-3 col-xs-12">
                          <select class="form-control has-feedback-left hapus" name="kategori" id="kategori" readonly>
                            <option value=""></option>
                              <?php $opsi = $this->db->get('kategori');
                              foreach ($opsi->result() as $key) { 
                                if ($c['id_kategori']==$key->id_kategori) {
                               ?>
                            <option value="<?=$key->id_kategori?>" selected>Kategori <?=$key->kategori?></option>
                              <?php } else {?>
                            <option value="<?=$key->id_kategori?>">Kategori <?=$key->kategori?></option>
                            <?php }} ?>
                          </select>
                          <span class="fa fa-tasks form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-5 col-sm-9 col-xs-12 col-md-offset-5">
                         
                         
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Barang <small>Tambah Stok barang dengan benar</small></h2>
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
                    
                    <form class="form-horizontal form-label-left input_mask" id="form_barang">
                    <div class="form-group has-feedback">
                      <div class="form-group">
                          <div class="col-md-3">
                              <textarea class="form-control reset has-feedback reset hapus" id="id_tag" name="id_tag" placeholder="rfid data here..." rows="1"></textarea>
                          </div>
                      </div>
                    </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control reset hapus" id="nm_barang" placeholder="Nama Barang" name="nm_barang" readonly="readonly" value="<?= $c['nm_barang'] ?>">
                        <span class="fa fa-cubes form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control reset hapus" id="kd_barang" placeholder="Kode Barang" name="kd_barang" readonly="" value="<?php echo $c['kd_barang'] ?>">
                        <span class="fa fa-cubes form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      </div>
                       
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="number" class="form-control reset hapus" id="jumlah" placeholder="Jumlah Barang" name="jumlah" >
                        <span class="fa fa-cubes form-control-feedback right" aria-hidden="true"></span>
                        <div class="notif_Stok" style="display: none">
                          <span class="help-block badge" id="stok_brg" style="background-color: #5cb85c;">stok :</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12 form-group has-feedback">
                        <div class="notif_MinStok" style="display: none">
                          <span class="help-block badge" id="minstok_brg" style="background-color: #5cb85c;">Min stok :</span>
                        </div>
                      </div>
            
                      <div class="form-group">
                        <div class="col-md-5 col-sm-9 col-xs-12 col-md-offset-5">
                         
                         <button class="btn btn-primary" type="reset"><span class="fa fa-close"></span></button>
                         <button type="button" class="btn btn-primary" id="btn_addlist"><span class="fa fa-check"></span></button>
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
update_out();
update_in();
</script>
<script type="text/javascript">
        $(document).ready(function(){
            //autosave_tambah_stok();
        kd_barang_manual();
        function kd_barang_manual(){
          var kd_barang = $('#kd_barang').val();
          var suplier = $('#suplier').val();
          if (kd_barang == "") {
            alert('message?: DOMString');
          } else {
            //alert('msg');
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('Kelola_Stok/autofilltambaharang_manual') ?>",
              dataType : "JSON",
              data : {kd_barang: kd_barang,
                    suplier: suplier},
              cache : false,
              success : function(data){                  
              $.each(data, function(id_tag, kd_barang, nm_barang, id_supplier, id_kategori){
                $(".print-error-msg").css('display','none');
                $('[name="kd_barang"]').val(data.kd_barang);
                $('[name="nm_barang"]').val(data.nm_barang);
                $('[name="jumlah"]').val(jumlah);
                $('[name="kategori"]').val(data.id_kategori);
                $('#stok_brg').html('Stok :'+ data.stok);
                $('.notif_Stok').css('display', 'block');
                $('#minstok_brg').html('Min Stok :'+ data.min_stok);
                $('.notif_MinStok').css('display', 'block');
                $('#jumlah').attr({
                max: data.min_stok - data.stok,
                min: 1
                }); 
              });   
              }
             });
          }
        }
        emit_Tag();
        function emit_Tag()
        {
          var socket = io.connect( 'http://'+window.location.hostname+':3000' ); 
          socket.on('text', function(data){
          $("#tag").val(data.text);
          });
        }
        $('#tanggal').datetimepicker({
                 //format: 'YYYY-MM-DD'
                format: 'DD-MM-YYYY'
        });
            tampil_data();
            removelist();
            $('#tblist').DataTable();
            count_data();
            var table = $('#tbcount').DataTable({
              "paging": false,
              "info": false,
              "searching": false,
              "processing": false, //fasilitas processing datatables.
              "serverSide": false,
            });
						//auto enter
						$('#id').on('keyup', function(event) {
								console.log(event);
								event.preventDefault();
								var id_tag = $('#id_tag').val();
                var kd_barang = $('#kd_barang').val();
                var nm_barang = $('#nm_barang').val();
                var jumlah = $('#jumlah').val();
                var id_tmasuk = $(this).val();

								if (event.keyCode == 13) {
									 $.ajax({
                    type : "POST",
                    url : "<?php echo base_url('Kelola_Stok/add_tabel_manual') ?>",
                    dataType : "JSON",
                    data : { 
                          id_tag: id_tag,
                          kd_barang : kd_barang,
                          nm_barang : nm_barang,
                          jumlah : jumlah,
                          id : id_tmasuk
                        },
                    success : function(data){
                      emit_Tag();
                      if ($.isEmptyObject(data.error)) {
                      $(".print-error-msg").css('display','none');
                      $('#jumlah').val("");
                      tampil_data();
                      count_data();
                      } else {
                        $(".print-error-msg").css('display','block');
                        $(".print-error-msg").html(data.error);
                      }
                      if (data.sudah_masuk) {
                        swal('Data Bermasalah atau sudah tersimpan.','','warning');
                      }
                    }, error : function(){
                      swal('Data Bermasalah atau sudah tersimpan.','','warning');
                    }
                  });
                  return false;
								}
						});
						//auto enter

            //on change
            $('#suplier').on('change',function(event) {
             $('.reset').val('');
            });
            //end off on change

             var socket = io.connect( 'http://'+window.location.hostname+':3000' );           

             socket.on('text', function(data){
                $("#id_tag").val(data.text);
                var jumlah = 1;
                var id_tag = $('#id_tag').val();
                var suplier = $('#suplier').val();
                if (id_tag == "" && suplier == "") {
                  $('.reset').val('');
                  emit_Tag();
                }else{
                  $.ajax({
                  type : "POST",
                  url : "<?php echo base_url('Kelola_Stok/autofilltambaharang') ?>",
                  dataType : "JSON",
                  data : {id_tag: id_tag,
                        suplier: suplier},
                  cache : false,
                  success : function(data){                  
                  $.each(data, function(id_tag, kd_barang, nm_barang, id_supplier, id_kategori){
                    $(".print-error-msg").css('display','none');
                    $('[name="kd_barang"]').val(data.kd_barang);
                    $('[name="nm_barang"]').val(data.nm_barang);
                    $('[name="jumlah"]').val(jumlah);
                    $('[name="kategori"]').val(data.id_kategori);
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

             // autofill
            $('#id_tag').on('input', function(){
              var id_tag = $(this).val();
              var suplier = $('#suplier').val();
              if (id_tag == "" && suplier == "") {
                $('.reset').val('');
              }else {
               $.ajax({
                type : "POST",
                url : "<?php echo base_url('Kelola_Stok/autofilltambaharang') ?>",
                dataType : "JSON",
                data : {id_tag: id_tag,
                        suplier: suplier
                      },
                cache : false,
                success : function(data){
                  $.each(data, function(id_tag, kd_barang, nm_barang, suplier, id_kategori){
                    $('[name="kd_barang"]').val(data.kd_barang);
                    $('[name="nm_barang"]').val(data.nm_barang);
                    $('[name="kategori"]').val(data.id_kategori);
                    $('[name="jumlah"]').val(jumlah);
                    $('#stok_brg').html('Stok :'+ data.stok);
                    $('.notif_Stok').css('display', 'block');
                    $('#minstok_brg').html('Min Stok :'+ data.min_stok);
                    $('.notif_MinStok').css('display', 'block');
                    $('#jumlah').attr({
                    max: data.min_stok - data.stok,
                    min: 1
                    }); 
                  });
                  
                }
               });
             }
            });
            //autofill  

            //kode otomatis
            $('#btn_kode').click(function(){
              var id_tmasuk = $('#id').val();
              $.ajax({
                url: '<?php echo base_url('Kelola_Stok/kode_transaksi_otomatis') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {id_tmasuk: id_tmasuk},
                success : function(data){
                  $('#id').val(data);
                }
              });
            });
            //end kode otomatis

            //hitung
            function count_data()
            {
              $.ajax({
                type : 'ajax',
                url : '<?php echo base_url('Kelola_Stok/count') ?>',
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
                url : '<?php echo base_url('Kelola_Stok/hapus_count') ?>',
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
                url     : '<?php echo base_url('Kelola_Stok/transaksi')?>',
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
                            '<td>'+data[i].id_tmasuk+'</td>'+
                            '<td style="text-align:left;">'+
                                    '<a href="javascript:;" class="btn btn-toolbar item_hapus" data-id_tag="'+data[i].id_tag+'"><i class="fa fa-trash"></i></a>'+
                                '</td>'+
                            '</tr>';
                  }
                  $('#show_data').html(html);
                }
              });
            }
            //tambah ke list
          $('#btn_addlist').on('click', function(){

            var id_tag = $('#id_tag').val();
            var kd_barang = $('#kd_barang').val();
            var nm_barang = $('#nm_barang').val();
            var jumlah = $('#jumlah').val();
            var id_tmasuk = $('#id').val();

            $.ajax({
              type : "POST",
              url : "<?php echo base_url('Kelola_Stok/add_tabel_manual') ?>",
              dataType : "JSON",
              data : { 
                    id_tag: id_tag,
                    kd_barang : kd_barang,
                    nm_barang : nm_barang,
                    jumlah : jumlah,
                    id : id_tmasuk
                  },
              success : function(data){
                emit_Tag();
                if ($.isEmptyObject(data.error)) {
                $(".print-error-msg").css('display','none');
                $('#jumlah').val("");
                tampil_data();
                count_data();
                } else {
                  $(".print-error-msg").css('display','block');
                  $(".print-error-msg").html(data.error);
                }
                if (data.sudah_masuk) {
                  swal('Gagal .','','warning');
                }
              }, error : function(){
                swal('Gagal tersimpan.','','warning');
              }
            });
            return false;
          });

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
                url  : "<?php echo base_url('Kelola_Stok/delete_list_tranksaksi_manual')?>",
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
          var id_tmasuk = $('#id').val();
          var suplier = $('#suplier').val();
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
                          id : id_tmasuk,
                          suplier : suplier,
                          tanggal : tanggal };

              $.ajax({
                data : data,
                type : 'POST',
                url : '<?php echo base_url('Kelola_Stok/save_count_manual') ?>',
                crossOrigin : false,
                dataType : 'JSON',
                success : function(result){
                
                  if (result.status == "success") {
                    swal('Sukses Menambahkan Stok.', '', 'success');
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
                  list_in();
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
