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
                    <h2>Daftar Stok Masuk</h2>

                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                      <a href="<?php echo base_url('Laporan/laporan_stok_masuk.html')?>" class="btn btn-default" target="_blank"><i class="fa fa-print"></i></a>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <!--MODAL DELETE-->
                   <form>
                      <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Delete Transaksi</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                 <strong>Anda yakin ingin menghapus data ini ?</strong>
                            </div>
                            <div class="modal-footer">
                              <input type="hidden" name="id_tmasuk" id="id_tmasuk" class="form-control">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i></button>
                              <button type="button" type="submit" id="btn_delete" class="btn btn-secondary"><i class="fa fa-check-circle-o"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  <!--END MODAL DELETE-->
                   <!-- Edit modal -->
                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="Modal_edit">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Edit Transaksi</h4>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal form-label-left input_mask" id="">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="id_tmasuk" placeholder="ID Transaksi" name="id_tmasuk" readonly>
                        <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="nm_barang" placeholder="Nama Barang" name="nm_barang" readonly>
                        <span class="fa fa-cube form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="number" class="form-control has-feedback-left" id="jumlah" placeholder="Jumlah Barang" name="jumlah">
                        <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12">Supplier</label>
                        <div class="col-md-4 col-sm-3 col-xs-12">
                          <select class="form-control has-feedback-left" name="id_supplier" id="id_supplier">
                            <option ></option>
                              <?php $opsi = $this->db->get('Supplier');
                              foreach ($opsi->result() as $key) { ?>
                            <option value="<?=$key->id_supplier?>" ><?=$key->nama_supplier?></option>
                              <?php }?> 
                          </select>
                          <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                    </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i></button>
                         <button type="button" id="btn_update" class="btn btn-secondary"><i class="fa fa-save"></i></button>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- end of edit modal -->
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action" id="tbview">
                        <thead>
                          <tr class="headings">
                           <!--  <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th> -->
                            <th class="column-title">Nomor </th>
                            <th class="column-title">ID Transaksi </th>
                            <th class="column-title">Nama Barang </th>
                            <th class="column-title">Jumlah </th>
                            <th class="column-title">Suplier</th>
                            <th class="column-title">Tanggal</th>                           
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody id="daftarbarang">
                      
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/sweetalert/css/sweetalert.css" />
<script src="<?php echo base_url();?>assets/sweetalert/lib/sweet-alert.js"></script>
          <script type="text/javascript">
            $(document).ready(function() {
              tampildata();
              var table = $('#tbview').DataTable();
              
              function tampildata()
              {
                $.ajax({
                  url: '<?php echo base_url('Kelola_Stok/lihatstokmasuk')?>',
                  type: 'AJAX',
                  async : false,
                  dataType: 'JSON',
                  success : function(data){
                    var html = '';
                    var i;
                    var a = 1;
                    for (i = 0; i< data.length; i++) {
                      html += '<tr class="even pointer">'+
                              // '<td class="a-center ">'+
                              //   '<input type="checkbox" class="flat" name="table_records">'+
                              // '</td>'+
                              '<td>'+[a++]+'.'+'</td>'+
                              '<td>'+data[i].id_tmasuk+'</td>'+
                              '<td>'+data[i].nm_barang+'</td>'+
                              '<td>'+data[i].jumlah+'</td>'+
                              '<td>'+data[i].nama_supplier+'</td>'+
                              '<td>'+data[i].tanggal+'</td>'+
                              '<td style="text-align:left;">'+
                              <?php if ($this->session->userdata('level')=='admin'|| $this->session->userdata('level')=='administrator') {?>
                                    '<a href="javascript:;" class="btn btn-toolbar btn-xs item_edit" data-id_tmasuk="'+data[i].id_tmasuk+'" data-nm_barang="'+data[i].nm_barang+'" data-jumlah="'+data[i].jumlah+'" data-id_supplier="'+data[i].id_supplier+'"><i class="fa fa-edit"></i></a>'+' '+
                              <?php }?> 
                              <?php if ($this->session->userdata('level')=='administrator') {?>
                                    '<a href="javascript:void(0);" class="btn btn-toolbar btn-xs item_hapus" data-id_tmasuk="'+data[i].id_tmasuk+'"><i class="fa fa-trash"></i></a>'+
                              <?php } ?>
                              '</td>'+
                              '</tr>';
                    }
                    $('#daftarbarang').html(html);
                  }
                })
              }

              //hapus
              $('#daftarbarang').on('click', '.item_hapus', function() {
                var id_tmasuk = $(this).data('id_tmasuk');
                $('#Modal_Delete').modal('show');
                $('[name="id_tmasuk"]').val(id_tmasuk);
              });
              //hapus
              //exceute for delete
              $('#btn_delete').on('click', function(event) {
             
              var id_tmasuk = $('#id_tmasuk').val();
              $.ajax({
                url: '<?php echo base_url('Kelola_Stok/hapus_transaksi_masuk') ?>',
                type: 'POST',
                cache : true,
                async : false,
                dataType: 'JSON',
                data: {id_tmasuk: id_tmasuk},
                success :function(data){
                  $('[name="id_tmasuk"]').val("");
                  swal('Sukses menghapus data .', '', 'success');
                  $('#Modal_Delete').modal('hide');
                  tampildata();
                }
                });  
              });
              //hapus
              //edit
              $('#daftarbarang').on('click','.item_edit',function(){
                var id_tmasuk = $(this).data('id_tmasuk');
                var nm_barang = $(this).data('nm_barang');
                var jumlah = $(this).data('jumlah');
                var id_supplier = $(this).data('id_supplier');
                $('#Modal_edit').modal('show');
                $('[name="id_tmasuk"]').val(id_tmasuk);
                $('[name="nm_barang"]').val(nm_barang);
                $('[name="jumlah"]').val(jumlah);
                $('[name="id_supplier"]').val(id_supplier);
              })

              $('#btn_update').on('click',function() {
                var id_tmasuk = $('#id_tmasuk').val();
                var nm_barang = $('#nm_barang').val();
                var jumlah = $('#jumlah').val();
                var id_supplier = $('#id_supplier').val();

                $.ajax({
                  url: '<?php echo base_url('Kelola_Stok/edit') ?>',
                  type: 'POST',
                  dataType: 'json',
                  data: {id_tmasuk : id_tmasuk,
                        nm_barang : nm_barang,
                        jumlah : jumlah, 
                        id_supplier : id_supplier },
                  success : function(data){
                    $('[name="id_tmasuk"]').val("");
                    $('[name="nm_barang"]').val("");
                    $('[name="jumlah"]').val("");
                    $('[name="id_supplier"]').val("");
                    swal({
                      title: "Berhasil Update!",
                      text: "Selamat bekerja!",
                      icon: "success",
                      button: "Aww yiss!",
                    });
                    $('#Modal_edit').modal('hide');
                    tampildata();
                  }
                })              
              });
              //edit
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
                  '</span>'+ '  ' +
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

