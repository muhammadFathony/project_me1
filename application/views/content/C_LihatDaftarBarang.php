    <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
        </div>     
      </div>
         <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Daftar Barang</h2> &nbsp;
                    <a href="<?php echo base_url('Laporan/laporan_suplier.html')?>" class="btn btn-default" target="_blank" ><i class="fa fa-print"> Data Suplier</i></a>
                    &nbsp;
                  <ul class="nav navbar-right panel_toolbox">
                    &nbsp;
                    <a href="<?php echo base_url('Laporan/DaftarBarang.html')?>" class="btn btn-default" target="_blank" ><i class="fa fa-print"></i></a>
                    &nbsp;
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                 <!-- modals edit -->
                 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="Modal_Edit">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Edit Data Barang</h4>
                      </div>
                      <div class="modal-body">
                      <form class="form-horizontal form-label-left input_mask" id="form_barang">

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left" id="kd_barang" placeholder="Kode Barang" name="kd_barang" readonly="">
                      <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control" id="nm_barang" placeholder="Nama Barang" name="nm_barang" required>
                      <span class="fa fa-cubes form-control-feedback right" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="number" class="form-control has-feedback-left" id="min_stok" placeholder="Minimal Stok" name="min_stok" min="0" required>
                      <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="number" class="form-control" id="stok" placeholder="Stok" name="stok" min="0" required>
                      <span class="fa fa-cubes form-control-feedback right" aria-hidden="true"></span>
                    </div>

                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Kategori</label>
                        <div class="col-md-4 col-sm-3 col-xs-12">
                          <select class="form-control has-feedback-left" name="kategori" id="kategori" required>
                            <option value=""></option>
                              <?php $opsi = $this->db->get('kategori');
                              foreach ($opsi->result() as $key) { ?>
                            <option value="<?=$key->id_kategori?>">Kategori <?=$key->kategori?></option>
                              <?php }?> 
                          </select>
                          <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                      </div>
                    </div>
                       <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i></button>
                       <button type="button" type="submit" id="btn_update" class="btn btn-secondary"><i class="fa fa-save"></i></button>
                      </div>
                  </form>
                      </div>
                    </div>
                  </div>
                </div>
        <!-- endmodals -->
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
                     <strong>Anda yakin ingin menghapus data barang ini ?</strong>
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="id_supplier" id="id_supplier" class="form-control">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i></button>
                  <button type="button" type="submit" id="btn_delete" class="btn btn-secondary"><i class="fa fa-check-circle-o"></i></button>
                </div>
              </div>
            </div>
          </div>
        </form>
      <!--END MODAL DELETE-->
      <!-- modals add tag -->
                 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="add_tag">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Tag Data Barang</h4>
                      </div>
                      <div class="modal-body">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left" id="kd_brg" placeholder="Kode Barang" name="kd_brg" >
                      <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control" id="nm_barang" placeholder="Nama Barang" name="nm_barang" required>
                      <span class="fa fa-cubes form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <textarea type="text" class="form-control has-feedback-left" id="tag" placeholder="TAG RFID" name="tag" required></textarea>
                      <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <table class="table table-striped jambo_table bulk_action" id="tblist">
                      <thead>
                        <tr class="headings"> 
                        <th class="column-title">Kode Barang </th>
                        <th class="column-title">ID TAG Barang </th>
                        <th class="column-title">Action </th>
                        </tr>
                      </thead>
                      <tbody id="show_tag"> 
                     
                      </tbody>
                    </table>
                      <form class="form-horizontal form-label-left input_mask" id="">                    
                      </form>
                    
                    <div class="modal-footer">
                     <button type="button" class="btn btn-toolbar" data-dismiss="modal"><i class="fa fa-close"></i></button>
                     <button type="button" type="submit" id="savetb" class="btn btn-toolbar"><i class="fa fa-save"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <!-- endmodals -->
        <!-- modals return tag -->
                 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="return_tag">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Return Tag RFID</h4>
                      </div>
                      <div class="modal-body">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left" id="kd_barang" placeholder="Kode Barang" name="kd_barang" >
                      <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control" id="barang" placeholder="Nama Barang" name="barang" required>
                      <span class="fa fa-cubes form-control-feedback right" aria-hidden="true"></span>
                    </div>
                  
                    <table class="table table-striped jambo_table bulk_action" id="tbreturn">
                      <thead>
                        <tr class="headings"> 
                        <th class="column-title">TAG RFID </th>
                        <th class="column-title">Kode Barang </th>
                        <th class="column-title">Action </th>
                        </tr>
                      </thead>
                      <tbody id="show_return"> 
                     
                      </tbody>
                    </table>
                      <form class="form-horizontal form-label-left input_mask" id="">                    
                      </form>
                    
                    <div class="modal-footer">
                     <button type="button" class="btn btn-toolbar" data-dismiss="modal"><i class="fa fa-close"></i></button>
                     <button type="button" type="submit" id="savetb" class="btn btn-toolbar"><i class="fa fa-save"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <!-- endmodals -->
        
                <!-- tabel data -->
                 <div class="x_content">
                  <p>Daftar Barang <code>PT. Jansen Indonesia</code></p> 

                  <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action" id="tbcoba">
                      <thead>
                        <tr class="headings">
                          <!-- <th>
                            <input type="checkbox" id="check-all" class="flat">
                          </th> -->
                          <th class="column-title">Nomor </th>
                         <th class="column-title">Kode Barang </th>
                          <th class="column-title">Nama Barang </th>
                          <th class="column-title">Minimal Stok </th>
                          <th class="column-title">Stok </th>
                          <th class="column-title">Suplier </th>
                          <th class="column-title">Kategori </th>
                          <th class="column-title no-link last"><span class="nobr">Action</span>
                          </th>
                          <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                          </th>
                        </tr>
                      </thead>
                                  

                      <tbody id="show_data"> 
                     
                      </tbody>
                    </table>
                  </div>
                </div>

                <!-- end of tabel data -->
               
              </div>
            </div>
          </div>
        </div>
<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/sweetalert/css/sweetalert.css"/>
<script src="<?php echo base_url();?>assets/sweetalert/lib/sweet-alert.js"></script>
<script src="<?php echo base_url();?>node_modules/socket.io-client/dist/socket.io.js"></script>
<script src="<?php echo base_url();?>assets/js/notification.js"></script>
<script type="text/javascript">
notif_in();
notif_out();
list_in();
list_out();
update_out();
update_in();
$(document).ready(function(){
  list_barang();
  listtag();
  $('#tbcoba').DataTable()
  emit_Tag();
  function emit_Tag()
  {
    var socket = io.connect( 'http://'+window.location.hostname+':3000' ); 
    socket.on('text', function(data){
    $("#tag").val(data.text);
    });
  }

// get daftar barang
function list_barang()
{
  $.ajax({
    type    : 'ajax',
    url     : '<?php echo base_url('Data_Barang/daftar_barang')?>',
    async : false,
    dataType: 'json',
    success : function(data){
      var html = '';
      var i;
      var a = 1;
      for(i=0; i<data.length; i++){
        html += '<tr class="even pointer">'+
              '<td class=" ">'+[a++]+'.'+'</td>'+
              '<td class=" ">'+data[i].kd_barang+'</td>'+
              '<td class=" ">'+data[i].nm_barang+'</td>'+
              '<td class=" ">'+data[i].min_stok+'</td>'+
              '<td class=" ">'+data[i].stok+'</td>'+
              '<td class=" ">'+data[i].nama_supplier+'</td>'+
              '<td class=" ">'+data[i].kategori+'</td>'+
              '<td class="col-md-2" style="text-align:left;">'+
              <?php if ($this->session->userdata('level')=='admin' || $this->session->userdata('level')=='administrator') {?>
                      '<a href="javascript:void(0);" class="btn btn-default btn-sm item_edit" data-kd_barang="'+data[i].kd_barang+'" data-nm_barang="'+data[i].nm_barang+'" data-min_stok="'+data[i].min_stok+'" data-stok="'+data[i].stok+'" data-kategori="'+data[i].id_kategori+'"><i class="fa fa-pencil"></i></a>'+' '+
                      '<a href="javascript:void(0);" class="btn btn-default btn-sm item_delete" data-kd_barang="'+data[i].kd_barang+'"><i class="fa fa-trash"></i></a>'+' '+
                      '<a href="javascript:void(0);" class="btn btn-default btn-sm tambah_tag" data-kd_barang="'+data[i].kd_barang+'" data-nm_barang="'+data[i].nm_barang+'"><i class="fa fa-tasks"></i></a>'+' '+    
                      '<a href="javascript:void(0);" class="btn btn-toolbar btn-sm return_tag" data-kd_barang="'+data[i].kd_barang+'" data-nm_barang="'+data[i].nm_barang+'"><i class="fa fa-gear"></i></a>'+' '+
              <?php } ?>
              '</td>'+
              ' </tr>';
      }
      $('#show_data').html(html);
    }
  });
} 
//list tag
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
          $('#show_tag').html(html);
        }
  });
}
//end of list tag

//masukan ke list
$('#kd_brg').on('keyup', function(event) {
  console.log(event);
  event.preventDefault();
  var kd_brg = $(this).val();
  var tag = $('#tag').val();
  if (event.keyCode == 13) {
    $.ajax({
      url: '<?php echo base_url('Data_Barang/tambahTAG_terbaru') ?>',
      type: 'POST',
      data: {
        kd_brg: kd_brg,
        tag: tag
      },
      success : function(data){
        $('[name="tag"]').val("");
        listtag();;
      }, error : function(a){
        swal('Error, Data sudah ada !!!','','warning');
      }
    });
  }
});
//ubah status
$('#savetb').click(function(){
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
    $('[name="tag"]').val("");
    $('[name="kd_brg"]').val(""); 
    $('#add_tag').modal('hide');  
    listtag();     
    }

  });
});
// end get kd barang

//add kode tag
$('#show_data').on('click','.tambah_tag', function(){
  var kd_barang = $(this).data('kd_barang'); 
  var nm_barang = $(this).data('nm_barang');

  $('#add_tag').modal('show');
  $('[name="kd_brg"]').val(kd_barang);
  $('[name="nm_barang"]').val(nm_barang);
});
//end

//delete_LIST
$('#show_tag').on('click','.item_hapus', function(){
    var id_tag = $(this).data('id_tag');
    $.ajax({
    url: '<?php echo base_url('Data_Barang/delete_tag') ?>',
    type: 'POST',
    dataType: 'JSON',
    data: {id_tag: id_tag},
    success :function(data){
      $('[name="id_tag"]').val("");
      listtag();
    }
  });  
});
//delete_LIST

// get data edit
$('#show_data').on('click','.item_edit',function(){

 var kd_barang = $(this).data('kd_barang'); 
 var nm_barang = $(this).data('nm_barang');
 var min_stok  = $(this).data('min_stok');
 var stok      = $(this).data('stok');
 var kategori  = $(this).data('kategori');

 $('#Modal_Edit').modal('show');
 $('[name="kd_barang"]').val(kd_barang);
 $('[name="nm_barang"]').val(nm_barang);
 $('[name="min_stok"]').val(min_stok);
 $('[name="stok"]').val(stok);
 $('[name="kategori"]').val(kategori);
});
//end of get edit

//edit
$('#btn_update').on('click',function(){
var kd_barang = $('#kd_barang').val();
var nm_barang = $('#nm_barang').val();
var min_stok  = $('#min_stok').val();
var stok      = $('#stok').val();   
var kategori  = $('#kategori').val();         
$.ajax({
    type      : "POST",
    url       : "<?php echo base_url('Data_Barang/ubahbarang')?>",
    dataType  : "JSON",
    data      : {
                  kd_barang : kd_barang,
                  nm_barang : nm_barang,
                  min_stok : min_stok,
                  stok : stok,
                  kategori : kategori,
                },
    success: function(data){
     $('[name="kd_barang"]').val("");
     $('[name="nm_barang"]').val("");
     $('[name="min_stok"]').val("");
     $('[name="stok"]').val("");
     $('[name="kategori"]').val("");
     swal({
      title: "Edit Sukses!",
      text: "Silahkan tekan tombol untuk menlanjutkan!",
      icon: "success",
      button: "Aww yiss!",
    });
     $('#Modal_Edit').modal('hide');
      
     list_barang();
    }
  });
  return false;
});
//end of edit
//get data for delete record
  $('#show_data').on('click','.item_delete',function(){
      var kd_barang = $(this).data('kd_barang');
      
      $('#Modal_Delete').modal('show');
      $('[name="kd_barang"]').val(kd_barang);
  });

//delete record to database
$('#btn_delete').on('click',function(){
  var kd_barang = $('#kd_barang').val();
  $.ajax({
      type : "POST",
      url  : "<?php echo base_url('Data_Barang/hapusbarang')?>",
      dataType : "JSON",
      data : {kd_barang:kd_barang},
      success: function(data){
          $('[name="kd_barang"]').val("");
          swal('Sukses menghapus data .', '', 'success');
          $('#Modal_Delete').modal('hide');
          list_barang();
      }
  });
  return false;
});
//delete

//get modal list return
$('#show_data').on('click','.return_tag', function(){
  var kd_barang = $(this).data('kd_barang'); 
  var nm_barang = $(this).data('nm_barang');

  $('#return_tag').modal('show');
  $('[name="kd_barang"]').val(kd_barang);
  $('[name="barang"]').val(nm_barang);
  $.ajax({
    url: '<?php echo base_url('Data_Barang/list_return') ?>',
    type: 'POST',
    dataType: 'json',
    data: {kd_barang: kd_barang},
    success : function(data){
      var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<tr>'+
                    '<td style="text-align:left;">'+data[i].id_tag+'</td>'+
                    '<td style="text-align:left;">'+data[i].kd_barang+'</td>'+
                    '<td style="text-align:left;">'+
                      '<a href="javascript:;" class="btn btn-toolbar bt_return" data-id_tag="'+data[i].id_tag+'"><i class="fa fa-retweet"></i></a>'+
                      '<a href="javascript:;" class="btn btn-toolbar bt_hapus" data-id_tag="'+data[i].id_tag+'"><i class="fa fa-trash"></i></a>'+
                    '</td>'+
                    '</tr>';
          }
          $('#show_return').html(html);
    }
  })  
});
//end of get

//excute for return
$('#show_return').on('click', '.bt_return', function() {
  var id_tag = $(this).data('id_tag');
  $.ajax({
    url: '<?php echo base_url('Data_Barang/Ex_return') ?>',
    type: 'POST',
    dataType: 'json',
    data: {id_tag: id_tag},
    success : function(){
      swal('Sukses', '', 'success');
      $('#return_tag').modal('hide');
    }
  });
});
//end of excute

//excute delete
$('#show_return').on('click', '.bt_hapus', function() {
  var id_tag = $(this).data('id_tag');
  $.ajax({
    url: '<?php echo base_url('Data_Barang/Ex_delete') ?>',
    type: 'post',
    dataType: 'json',
    data: {id_tag: id_tag},
    success : function(){
      swal('Terhapus', '', 'success');
      $('#return_tag').modal('hide');
    }
  })
});
//end of excute
});
</script>
      