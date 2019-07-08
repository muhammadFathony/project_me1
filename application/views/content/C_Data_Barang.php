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
   
<style> 
#panel, #flip {
    padding: 5px;
    text-align: center;
    background-color: #e5eecc;
    border: solid 1px #c3c3c3;
}

#panel {
    padding: 50px;
    display: none;
}
</style>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">

              <div class="title_right ">
                <div class="notif">
                
                </div> 
              </div>
            </div>
            <div class="clearfix">
              <?php echo $this->session->flashdata('errorMessage');?>
              <?php echo $this->session->flashdata('succesMessage');?>
                <div class="alert alert-danger print-error-msg col-md-12 col-sm-12 col-xs-12" style="display:none"></div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Data Barang <small>Tambah data barang dengan benar &nbsp;&nbsp;</small></h2>
                    <button class="btn btn-primary" id="flip"><span class="fa fa-arrow-down"></span></button>
                   
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <!-- panel -->
                  <div id="panel">
                    <div class="row" style="margin-bottom: 10px;">
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Kode Barang <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="kd_brg" name="kd_brg" required="required" class="form-control col-md-7 col-xs-12">
                        </div> 
                        <div class="col-md-4 col-sm-3 col-xs-12">
                          <button type="button" class="btn btn-success" id="kode" style="float: left;"><span class="fa fa-info-circle">&nbsp;&nbsp;</span>Kode</button>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-8 col-sm-4 col-xs-12">
                            <div class="col-md-3">
                                <textarea class="form-control has-feedback" id="tag" name="tag" placeholder="rfid data here..." rows="1" minlength="3"></textarea>
                            </div>
                        </div>
                      </div>
                    </div>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    </form>
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action" name="tblist"  id="tblist">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">id </th>
                            <th class="column-title">Kode Barang</th>                           
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody id="daftar-barang">

                        </tbody>
                      </table>
                      <div class="col-md-12 col-sm-9 col-xs-12">
                      <div class="" style="float: right">
                        <button class="btn btn-toolbar" id="texttb">
                          <i class="fa fa-save"></i>
                        </button>
                      </div>
                    </div>   
                    </div>
                </div>
                <!-- end of panel -->
               
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" id="form_barang">
                      <div class="form-group has-feedback">
                        <div class="form-group">
                            <div class="col-md-3">
                                <textarea class="form-control has-feedback reset" id="tag_rfid" name="tag_rfid" placeholder="rfid data here..."></textarea>
                            </div>
                        </div>
                      </div>
                   
                      <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                          <input type="text" class="form-control reset" id="kd_barang" placeholder="Kode Barang" name="kd_barang" disabled="">
                          <span class="fa fa-cubes form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control reset" id="nm_barang" placeholder="Nama Barang" name="nm_barang">
                        <span class="fa fa-cubes form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="number" class="form-control reset" id="min_stok" placeholder="Minimal Stok Barang" name="min_stok" value="0" disabled="">
                        <span class="fa fa-cubes form-control-feedback right" aria-hidden="true"></span>
                      </div>
                                      
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="number" class="form-control" id="stok"  value="0" placeholder="Stok Barang" name="stok" min="0" disabled>
                        <span class="fa fa-cubes form-control-feedback right" aria-hidden="true"></span>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12">Kategori</label>
                        <div class="col-md-4 col-sm-3 col-xs-12">
                          <select class="form-control has-feedback-left reset" name="kategori" id="kategori">
                            <option value=""></option>
                              <?php $opsi = $this->db->get('kategori');
                              foreach ($opsi->result() as $key) { ?>
                            <option value="<?=$key->id_kategori?>">Kategori <?=$key->kategori?></option>
                              <?php }?> 
                          </select>
                          <span class="fa fa-tasks form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12">Supplier</label>
                        <div class="col-md-4 col-sm-3 col-xs-12">
                          <select class="form-control has-feedback-left reset" name="supplier" id="supplier">
                            <option value=""></option>
                              <?php $opsi = $this->db->get('supplier');
                              foreach ($opsi->result() as $key) { ?>
                            <option value="<?=$key->id_supplier?>"><?=$key->nama_supplier?></option>
                              <?php }?> 
                          </select>
                          <span class="fa fa-tasks form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-9 col-xs-12 col-md-offset-5">
                         
                         <button class="btn btn-primary" type="reset"><span class="fa fa-close"></span></button>
                          <button type="submit" class="btn btn-primary" id="btn-text"><span class="fa fa-save"></span></button>
                        </div>
                      </div>
                      
                    </form>
                  </div>
                </div>
              </div>
            </div>            
          </div>
        </div>
         <!--MODAL DELETE-->
                     <form>
                        <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Tag</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                   <strong>Anda ingin menghapus tag ini?</strong>
                              </div>
                              <div class="modal-footer">
                                <input type="hidden" name="id_tag" id="id_tag" class="form-control">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="fa fa-close"></span></button>
                                <button type="button" type="submit" id="btn_delete" class="btn btn-secondary"><span class="fa fa-check"></span></button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </form>
                    <!--END MODAL DELETE-->
<!-- /page content -->
    <!-- <script src="<?php echo base_url();?>node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <!-- ini penting -->
    <script src="<?php echo base_url();?>node_modules/socket.io-client/dist/socket.io.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <!-- sampai disini -->
    <script src="<?php echo base_url();?>assets/js/notification.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        // ini penting
        emit_Tag();
        function emit_Tag()
        {
          var socket = io.connect( 'http://'+window.location.hostname+':3000' ); 
          socket.on('text', function(data){
          $("#tag").val(data.text);
          });
        }
        // sampai disini

        $('#kd_brg').on('keyup', function(event) {
        	console.log(event);
        	event.preventDefault();
        	var kd_brg = $(this).val();
        	var tag = $('#tag').val();
        	if (event.keyCode == 13) {
        		$.ajax({
        			url: '<?php echo base_url('Data_Barang/tambahbarang_terbaru') ?>',
        			type: 'POST',
        			data: {
        				kd_brg: kd_brg,
        				tag: tag
        			},
              success : function(data){
                $('[name="tag"]').val("");
                listtag();
                emit_Tag();
              }, error : function(){
                swal('Error, Tag sudah ada !!!','','warning');
              }
        		});
        	}
      });

      $('#tag').on('input', function(event) {
        var tag = $('#tag').val();
        socket.on('text', function(data){
          $("#tag").val(data.text);
          });
      });   

      // autotexttag(); //// kita stop dulu bentar
      listtag();
      $("#flip").click(function(){
          $("#panel").slideToggle("slow");
      });

      // autofill
          $('#tag_rfid').on('input', function(){
            var tag_rfid = $(this).val();

            if (tag_rfid == "") {
             $('.reset').val('');
             emit_Tag();
            } else {
                 $.ajax({
                  type : "POST",
                  url : "<?php echo base_url('Data_Barang/auto_tag') ?>",
                  dataType : "JSON",
                  data : {tag_rfid: tag_rfid},
                  cache : false,
                  success : function(data){
                    $.each(data, function(tag_rfid, kd_barang, nm_barang){
                      $('[name="kd_barang"]').val(data.kd_barang);
                      $('[name="nm_barang"]').val(data.nm_barang);
                      //$('[name="stok"]').val(data.stok);
                      $('[name="min_stok"]').val(data.min_stok);
                      $('[name="kategori"]').val(data.id_kategori);
                      $('[name="supplier"]').val(data.id_supplier)
                    });
                    $(".print-error-msg").css('display','none');
                    emit_Tag();
                  }
                 });
            }
          });
      //autofill 
           
             var socket = io.connect( 'http://'+window.location.hostname+':3000' );           
            //scan
            socket.on('text', function(tag){
               $("#tag_rfid").val(tag.text);
               var tag_rfid = $('#tag_rfid').val();
               if (tag_rfid == "") {
               $('.reset').val('');
                emit_Tag();
               }else{
                $.ajax({
                type : "POST",
                url : "<?php echo base_url('Data_Barang/auto_tag') ?>",
                dataType : "JSON",
                data : {tag_rfid: tag_rfid},
                cache : false,
                success : function(data){
                  $.each(data, function(tag_rfid, kd_barang, nm_barang){
                    $('[name="kd_barang"]').val(data.kd_barang);
                    $('[name="nm_barang"]').val(data.nm_barang);
                    //$('[name="stok"]').val(data.stok);
                    $('[name="min_stok"]').val(data.min_stok);
                    $('[name="kategori"]').val(data.id_kategori);
                    $('[name="supplier"]').val(data.id_supplier)
                  });
                  $(".print-error-msg").css('display','none');
                }
               });
               }             
            });
            //scan
            socket.on('text', function(data){
                $("#tag").val(data.text);
            });
            //scan
        $('#kode').click(function(){
          var kd_brg = $("#kd_brg").val();
          $.ajax({
            type : "post",
            url : "<?php echo base_url('Data_Barang/kodeotomatis') ?>",
            dataType  : "JSON",
            data      : {
                          kd_brg : kd_brg,
                        },
            success : function(a){
                $("#kd_brg").val(a);
            }
          });
        });
        function listtag()
        {
          $.ajax({
                type    : 'ajax',
                url     : '<?php echo base_url('Data_Barang/list_tag')?>',
               
                dataType : 'JSON',
                success : function(data){
                  var html = '';
                  var i;
                  for (i = 0; i < data.length; i++) {
                    html += '<tr>'+
                            '<td style="text-align:left;">'+data[i].id_tag+'</td>'+
                            '<td style="text-align:left;">'+data[i].kd_barang+'</td>'+
                            '<td style="text-align:left;">'+
                                    '<a href="javascript:;" class="btn btn-toolbar item_hapus" data-id_tag="'+data[i].id_tag+'"><i class="fa fa-trash"></i></a>'+
                                '</td>'+
                            '</tr>';
                  }
                  $('#daftar-barang').html(html);
                }
          });
        }

        //get data for delete record
        $('#daftar-barang').on('click','.item_hapus', function(){
          var id_tag = $(this).data('id_tag');
          $('#Modal_Delete').modal('show');
          $('[name="id_tag"]').val(id_tag);
        });

        //exceute for delete
        $('#btn_delete').on('click', function(event) {
          event.preventDefault();
          var id_tag = $('#id_tag').val();
          $.ajax({
            url: '<?php echo base_url('Data_Barang/delete_tag') ?>',
            type: 'POST',
            dataType: 'JSON',
            data: {id_tag: id_tag},
            success :function(data){
              $('[name="id_tag"]').val("");
              $('#Modal_Delete').modal('hide');
              listtag();
            }
          });  
        });

        $('#texttb').click(function(){
          var tblist = [];
              
                $('#tblist tr').each(function(row, tr){
                   if ($(tr).find('td:eq(0)').text() == "") {

                 }else {
                   var sub = {
                 
                  'id_tag' : $(tr).find('td:eq(0)').text(),
                  'kd_barang' : $(tr).find('td:eq(1)').text()
                 };

                 tblist.push(sub);
                 }
                });
                console.log(tblist);
             //ubah status
              var data = {'tblist' : tblist};

              $.ajax({
                data : data,
                type : 'POST',
                url : '<?php echo base_url('Data_Barang/ubahliststatus') ?>',
                crossOrigin : false,
                dataType : 'JSON',
                success : function(data){ 
                $('[name="id_tag"]').val("");
                $('[name="kd_barang"]').val("");
                swal("Berhasil!", "Selamat Bekerja !", "success"); 
                emit_Tag();  
                listtag();     
                },error : function(){
                  swal('Error, Conten kosong !!!','','warning');
                }
              });
        });
            $('#btn-text').on('click', function(){
              var tag_rfid = $('#tag_rfid').val();
              var min_stok = $('#min_stok').val();
              var nm_barang = $('#nm_barang').val();
              var stok = $('#stok').val();
              var kategori = $('#kategori').val();
              var supplier = $('#supplier').val();
              var kd_barang = $('#kd_barang').val();

               $.ajax({
                type : "POST",
                dataType : "JSON",
                url : "<?php echo base_url('Data_Barang/tambahbarang')?>",
                data : {
                  tag_rfid : tag_rfid,
                  kd_barang : kd_barang,
                  nm_barang : nm_barang,
                  min_stok : min_stok,
                  stok : stok,
                  kategori : kategori,
                  supplier : supplier
                },
                success : function(data){
                  if ($.isEmptyObject(data.rusak)) {
                  $(".print-error-msg").css('display','none');
                  swal("Berhasil!", "Selamat Bekerja!", "success");
                  $('.reset').val('');
                  } else {
                    $(".print-error-msg").css('display','block');
                    $(".print-error-msg").html(data.rusak);
                  }
                },
                error : function(){
                  swal('Error, Data sudah ada !!!','','warning');
                }
               });
               return false;
            });
         });
    </script>
<script type="text/javascript">
notif_in();
notif_out();
list_in();
list_out();
update_in();
update_out();
function notif_in(){
 $.ajax({
    url     : '<?php echo base_url('Notification')?>',
    type    : 'post',
    dataType : 'json',
    success : function(data){
      $('#total_masuk').html(data);
    }
 });
}

function notif_out(){
 $.ajax({
    url     : '<?php echo base_url('Notification/notif_out')?>',
    type    : 'post',
    dataType : 'json',
    success : function(data){
      $('#total_permintaan').html(data);
    }
  });
}

function list_in()
{
  $.ajax({
      url     : '<?php echo base_url('Notification/list_in')?>',
      type    : 'post',
      dataType : 'json',
      success : function(data){
        var html = '';
        var i;
        for (i = 0; i < data.length; i++) {
          html += '<li>'+
                  '<a class="btn-one" data-id_tmasuk="'+data[i].id_tmasuk+'" name="id_tmasuk" id="id_tmasuk">'+
                  '<span class="image">'+'<span class="fa fa-bell-o">'+'</span>'+
                  '</span>'+ '  '+
                  '<span>'+data[i].id_tmasuk+'</span>'+
                  '<span class="time">'+data[i].tanggal+'</span>'+
                  '<span class="message">'+data[i].nama_supplier+'</span>'+
                  '</a>'+
                  '</li>';
                }
          html += '<li>'+
                  '<div class="text-center">'+
                  '<a class="btn btn-update">'+
                  '<strong>'+'Lihat Semua Transaksi Masuk'+'   '+'</strong>'+
                  '<i class="fa fa-angle-right">'+'</i>'+
                  '</a>'+
                  '</div>'+
                  '</li>';
        $('#list_masuk').html(html);
      }
  });
}
function list_out()
{
  $.ajax({
      url     : '<?php echo base_url('Notification/list_out')?>',
      type    : 'post',
      dataType : 'json',
      success : function(data){
        var html = '';
        var i;
        for (i = 0; i < data.length; i++) {
          html += '<li>'+
                  '<a class="btn-one" data-id_tkeluar="'+data[i].id_tkeluar+'" name="id_tkeluar" id="id_tkeluar">'+
                  '<span class="image">'+'<span class="fa fa-bell-o">'+'</span>'+
                  '</span>'+ '  ' +
                  '<span>'+data[i].id_tkeluar+'</span>'+
                  '<span class="time">'+data[i].tanggal+'</span>'+
                  '<span class="message">'+data[i].departemen+'</span>'+
                  '</a>'+
                  '</li>';
                }
          html += '<li>'+
                  '<div class="text-center">'+
                  '<a class="btn btn-update">'+
                  '<strong>'+'Lihat Semua Transaksi Keluar'+'   '+'</strong>'+
                  '<i class="fa fa-angle-right">'+'</i>'+
                  '</a>'+
                  '</div>'+
                  '</li>';
        $('#list_keluar').html(html);
      }
  });
}

function update_out(){
  //overall
$('#list_keluar').on('click', '.btn-update', function(event) {
  event.preventDefault();
  console.log(event);
  var info = [];
  $('#list_keluar a').each(function(index, a) {
    if ($(a).find('span:eq(4)').text() == "") {

    } else {
    var sub = {
      'id_tkeluar' : $(a).find('span:eq(2)').text()
    }
    info.push(sub);
    }
  });
    console.log(info);

    var data = { 'list_keluar': info};
    $.ajax({
      data : data,
      url: '<?php echo base_url('Notification/ubah_list_out')?>',
      type: 'POST',
      crossOrigin : false,
      dataType: 'json',
      success : function(data){
        $('[name="id_tkeluar"]').val("");
        notif_in();
        list_in();
        notif_out();
        list_out();
        window.location.replace("<?php echo base_url('Kelola_Permintaan/lihatpermintaan.html')?>");
      }
    })
});
//overall
}

function update_in(){
  //overall
$('#list_masuk').on('click', '.btn-update', function(event) {
  event.preventDefault();
  console.log(event);
  var info = [];
  $('#list_masuk a').each(function(index, a) {
    if ($(a).find('span:eq(4)').text() == "") {

    } else {
    var sub = {
      'id_tmasuk' : $(a).find('span:eq(2)').text()
    }
    info.push(sub);
    }
  });
    console.log(info);

    var data = { 'list_masuk': info};
    $.ajax({
      data : data,
      url: '<?php echo base_url('Notification/ubah_list_in')?>',
      type: 'POST',
      crossOrigin : false,
      dataType: 'json',
      success : function(data){
        $('[name="id_tmasuk"]').val("");
        notif_in();
        list_in();
        notif_out();
        list_out();
        window.location.replace("<?php echo base_url('Kelola_Stok/view_ledger.html')?>");
      }
    })
});
//overall
}

//each-IN
$('#list_masuk').on('click', '.btn-one', function(){
  var id_tmasuk = $(this).data('id_tmasuk');
  
  $.ajax({
    url: '<?php echo base_url('Notification/update_each_in')?>',
    type: 'POST',
    dataType: 'json',
    data: {id_tmasuk: id_tmasuk},
    success : function(){
      $('[name="id_tmasuk"]').val("");
      notif_in();
      list_in();
      notif_out();
      list_out();
      //window.location.replace("<?php echo base_url('Kelola_Stok/view_ledger.html')?>");
    }
  })
})
//each

//each-OUT
$('#list_keluar').on('click', '.btn-one', function(){
  var id_tkeluar = $(this).data('id_tkeluar');
  
  $.ajax({
    url: '<?php echo base_url('Notification/update_each_out')?>',
    type: 'POST',
    dataType: 'json',
    data: {id_tkeluar: id_tkeluar},
    success : function(){
      $('[name="id_tmasuk"]').val("");
      notif_in();
      list_in();
      notif_out();
      list_out();
      //window.location.replace("<?php echo base_url('Kelola_Permintaan/lihatpermintaan.html')?>");
    }
  })
})
//each
</script>
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
