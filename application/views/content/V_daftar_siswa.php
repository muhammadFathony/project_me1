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
                  <h2>Daftar Siswa</h2> &nbsp;
                    <a href="<?php echo base_url('Laporan/laporan_suplier.html')?>" class="btn btn-default" target="_blank" ><i class="fa fa-print"> Data Siswa</i></a>
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
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal_edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit Data Barang</h4>
            </div>
            <div class="modal-body">
            <form class="form-horizontal form-label-left input_mask" id="form_edit_siswa">

                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" id="nis" placeholder="Nis" name="nis" readonly="">
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap" name="nama_lengkap" required>
                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" id="ttl" placeholder="Tanggal Lahir" name="ttl" required>
                <span class="glyphicon glyphicon-calendar form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" id="kelas" placeholder="Kelas" name="kelas" required>
                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Jenis Kelamin</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default male" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="gender" value="male"> &nbsp; Laki-laki &nbsp;
                            </label>
                            <label class="btn btn-default female" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="gender" value="female"> Perempuan
                            </label>
                        </div>
                        <input type="hidden" name="jenis_kelamin" id="jenis_kelamin" /> 
                    </div>
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
    
                <!-- tabel data -->
                 <div class="x_content">
                  <p>Daftar Siswa <code>Sistem Pembelajaran Warna</code></p> 

                  <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action" id="tbsiswa">
                      <thead>
                        <tr class="headings">
                          <!-- <th>
                            <input type="checkbox" id="check-all" class="flat">
                          </th> -->
                          <th class="column-title">No </th>
                          <th class="column-title">Nis </th>
                          <th class="column-title">Nama Lengkap </th>
                          <th class="column-title">Kelas </th>
                          <th class="column-title">Tanggal Lahir</th>
                          <th class="column-title">Jenis Kelamin </th>
                          <th class="column-title no-link last"><span class="nobr">Action</span>
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
<script type="text/javascript">
$(document).ready(function(){
    
    $('#ttl').datetimepicker({
                // format: 'DD-MM-YYYY'
                format: 'DD-MM-YYYY'
    });

    $('.male').on('click', function(){
        //alert('male');
        $(this).toggleClass("btn-primary")
        $('.female').removeClass("btn-primary")
        $('#jenis_kelamin').val('0');
    })
    $('.female').on('click', function(){
        //alert('female');
        $(this).toggleClass("btn-primary")
        $('.male').removeClass("btn-primary")
        $('#jenis_kelamin').val('1')
    })
    var tabel = $('#tbsiswa').dataTable({
        
        "bProcessing": 	true,
        "bAutoWidth": 	false,
        "bserverSide" : 	true,
        //
        "order": 		[],
        "lengthMenu": 	[ 25, 50, 75, 100 ],
        "sAjaxSource": 	'<?php echo base_url(); ?>index.php/Siswa/get_daftar_siswa',
     
        "aoColumns":	[
                            { "mData"	: "nomor"},
                            { "mData"	: "nis"},
                            { "mData"	: "nama_lengkap"},
                            { "mData"	: "kelas"},
                            { "mData"	: "ttl"},
                            { "mData"	: "jenis_kelamin"},
                            { "mData"	: "action", searchable:false, orderable:false}
                        ],
        "columnDefs": 	[
                            { className: "text-center", "targets": [0,4] },
                            { width: 30, targets: 0},
                            { width: 50, targets: 4}
                        ],
        "fixedColumns": true
    });

    $('#tbsiswa').on('click', '#btn_edit', function(){
        var nama_lengkap = $(this).data('nama_lengkap')
        var nis = $(this).data('nis')
        var kelas = $(this).data('kelas')
        var ttl = $(this).data('ttl')
        var jenis_kelamin = $(this).data('jenis_kelamin')
        if(jenis_kelamin == '0' ){
            //alert('male');
            $('.male').addClass("btn-primary")
            $('.female').removeClass("btn-primary")
            $('#jenis_kelamin').val('0');
        }else{
            $('.female').addClass("btn-primary")
            $('.male').removeClass("btn-primary")
            $('#jenis_kelamin').val('1')
        }
        $("#nama_lengkap").val(nama_lengkap)
        $("#nis").val(nis)
        $("#kelas").val(kelas)
        $("#ttl").val(ttl)
        $('#modal_edit').modal('show')
    })
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
        var nama_lengkap = $('#nama_lengkap').val();
        var nis = $('#nis').val();
        var ttl = $('#ttl').val();
        var kelas = $('#kelas').val();   
        var jenis_kelamin  = $('#jenis_kelamin').val();         
        $.ajax({
            type      : "POST",
            url       : "<?php echo base_url('index.php/Siswa/update_siswa')?>",
            dataType  : "JSON",
            data      : {
                        nis : nis,
                        nama_lengkap : nama_lengkap,
                        ttl : ttl,
                        kelas : kelas,
                        jenis_kelamin : jenis_kelamin,
                        },
            success: function(data){
                
            }
        });
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
      