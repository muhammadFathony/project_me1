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
                    <h2>Sistem Inventori</h2>

                    <ul class="nav navbar-right panel_toolbox">
                      &nbsp;
                    <div class="btn-group">
                    <a href="<?php echo base_url('Laporan/laporan_pemesanan.html')?>" class="btn btn-default" target="_blank"><i class="fa fa-print"></i></a>
                    <ul role="menu" class="dropdown-menu"></ul>
                    </div>
                      &nbsp;
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <p>Daftar <code>Hasil Peramalan Dengan Metode Trend Moment</code></p>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action" id="tbtrend">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">PO </th>
                            <th class="column-title">Kode Barang </th>
                            <th class="column-title">Nama Barang </th>
                            <th class="column-title">Nama Suplier</th>
                            <th class="column-title">Tanggal </th>
                            <th class="column-title">Jumlah </th>
                            <!-- <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>  -->
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
<link rel="stylesheet" href="<?php echo base_url();?>assets/sweetalert/css/sweetalert.css" />
<script src="<?php echo base_url();?>assets/sweetalert/lib/sweet-alert.js"></script>
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
<script type="text/javascript">
$(function() {
  tampildata();
  var table = $('#tbtrend').DataTable();
function tampildata()
{
  $.ajax({
    url: '<?php echo base_url('Trend/list_PO')?>',
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
                // '<td>'+[a++]+'.'+'</td>'+
                '<td>'+data[i].PO+'</td>'+
                '<td>'+data[i].kd_barang+'</td>'+
                '<td>'+data[i].nm_barang+'</td>'+
                '<td>'+data[i].nama_supplier+'</td>'+
                '<td>'+data[i].tanggal+'</td>'+
                '<td>'+data[i].jumlah+'</td>'+
                // '<td style="text-align:left;">'+
                // <?php if ($this->session->userdata('level')=='admin') {?>
                //       '<a href="javascript:;" class="btn btn-toolbar btn-xs item_edit" data-id_tmasuk="'+data[i].id_tmasuk+'" data-nm_barang="'+data[i].nm_barang+'" data-jumlah="'+data[i].jumlah+'" data-id_supplier="'+data[i].id_supplier+'"><i class="fa fa-edit"></i></a>'+' '+
                //       '<a href="javascript:void(0);" class="btn btn-toolbar btn-xs item_hapus" data-id_tmasuk="'+data[i].id_tmasuk+'"><i class="fa fa-trash"></i></a>'+
                // <?php } ?>
                // '</td>'+
                '</tr>';
      }
      $('#show_data').html(html);
    }
  })
}
});
</script>
