
 <!-- bootstrap-daterangepicker -->
<link href="<?php echo base_url();?>assets/backend/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="<?php echo base_url();?>assets/backend/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
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
        <?php
        foreach ($cek as $key ) {
          if ($key['stok'] < $key['min_stok']) {?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <strong><?php echo $key['nm_barang']?> JUMLAH </strong> <?php echo $key['stok'] ?>.
        </div>
        <?php }}?>
        
           <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar Pemakaian Barang</h2>

                    <ul class="nav navbar-right panel_toolbox">
                      &nbsp;
                  <div class="btn-group">
                    <a class="btn btn-default" type="button" target="_blank" href="<?php echo base_url('Laporan/laporan_permintaan') ?>"> <i class="fa fa-print"></i>
                    </a>
                    
                  </div>
                      &nbsp;
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <!-- panel -->
                  <div id="panel">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action" id="tb_filter">
                        <thead>
                          <tr class="headings">
                            <th class="column-title" id="" style="display: none" >No Transaksi </th>
                            <th class="column-title">Nama Barang</th>
                            <th class="column-title">Kode Barang </th>
                            <th class="column-title">Departemen</th>
                            <th class="column-title">Jumlah </th>
                            <th class="column-title" id="" style="display: none" >Tanggal </th>
                            <th class="column-title">Rekap Data</th>
                          </tr>
                        </thead>
                        <tbody id="show_filter" style="text-align: left">
                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                  <!-- panel -->
                  <div class="x_content">
                  	<p>Gudang<code>Logistik</code></p>
                    <div class="row">
                     <!--  <form>
                      <div class="input-daterange">
                        <div class="col-md-4" style="margin-bottom: 5px;" has-feedback right>   
                          <div class="input-group date" id="myDatepicker2">
                            <input type="text" class="form-control" id="awal" name="awal" placeholder="Start Date" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div> 
                        </div>
                        <div class="col-md-4" style="margin-bottom: 5px;" has-feedback right>
                          <div class="input-group date" id="myDatepicker1">
                              <input type="text" class="form-control id="akhir" name="akhir" placeholder="End Date" />
                              <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>                         
                        </div>    
                     </div>
                      </form> -->
                      <div class="col-md-3" style="margin-bottom: 5px;" has-feedback right>   
                          <div class="input-group date" id="">
                           <select class="form-control selectpicker show-tick" name="bulan" id="bulan" data-live-search="true" title="Pilih Bulan" data-width="80%" required>
                             <option> </option>
                             <?php foreach ($bulan1->result_array() as $key) {
                                  $bulan=$key['bulan'];
                              ?>
                                  <option><?php echo $bulan;?></option>
                              <?php }?>
                           </select>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div> 
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                        <select class="form-control has-feedback-left hapus" name="kd_barang" id="kd_barang" title="Pilih Barang">
                          <option value=""></option>
                          <?php 
                            foreach ($cek as $key) {?>
                              <option value="<?=$key['kd_barang']?>"><?=$key['nm_barang']?></option>
                          <?php }?>
                        </select>
                        <span class="fa fa-cube form-control-feedback left" aria-hidden="true"></span>
                      </div> 
                      <div> <button class="btn btn-primary" id="btn_test"><i class="fa fa-search-plus"></i></button> </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- tabel -->
              <div class="clearfix"></div>
       <!--MODAL DELETE-->
       <form>
          <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Transaksi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                     <strong>Anda yakin ingin menghapus data ini ?</strong>
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="id_tkeluar" id="id_tkeluar" class="form-control">
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
                        <input type="text" class="form-control has-feedback-left" id="id_tkeluar" placeholder="ID Transaksi" name="id_tkeluar" readonly>
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

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="departemen" placeholder="Departemen" name="departemen">
                        <span class="fa fa-building-o form-control-feedback right" aria-hidden="true"></span>
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
              <!-- tabel -->
              
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar Permintaan <code>Barang</code></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="tb_listpermintaan" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nomor</th>
                          <th>Nomor Transaksi</th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Jumlah</th>
                          <th>Departemen</th>
                          <th>Tanggal</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody id="show_data">
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- end of tabel -->
            </div>
          </div>

<link rel="stylesheet" href="<?php echo base_url();?>assets/sweetalert/css/sweetalert.css" />
<script src="<?php echo base_url();?>assets/sweetalert/lib/sweet-alert.js"></script>
<!-- <script src="<?php echo base_url();?>node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script> -->
<script src="<?php echo base_url();?>node_modules/socket.io-client/dist/socket.io.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $("#btn_test").click(function(){
        $("#panel").slideToggle("slow");
    });
    tampildata();
    $('#myDatepicker2').datetimepicker({
                // format: 'DD-MM-YYYY'
                format: 'YYYY-MM-DD'
    });
    $('#myDatepicker1').datetimepicker({
                // format: 'DD-MM-YYYY'
                format: 'YYYY-MM-DD'
    });

    $('#tb_listpermintaan').DataTable();

    function tampildata()
    {
      $.ajax({
        type      : "ajax",
        url       : "<?php echo base_url('Kelola_Permintaan/list_permintaan') ?>",
        async     : false,
        dataType  : "json",
        success : function(data){
          var page='';
          var i;
          var a = 1 ;
          for (i = 0; i < data.length; i++) {
            page +='<tr class="even pointer">'+
                    '<td>'+[a++]+'.'+'</td>'+
                    '<td>'+data[i].id_tkeluar+'</td>'+
                    '<td>'+data[i].kd_barang+'</td>'+
                    '<td>'+data[i].nm_barang+'</td>'+
                    '<td>'+data[i].jumlah+'</td>'+
                    '<td>'+data[i].departemen+'</td>'+
                    '<td>'+data[i].tanggal+'</td>'+
                    '<td style="text-align:left;">'+
                    <?php if ($this->session->userdata('level')=='admin' || $this->session->userdata('level')=='administrator') {?>
                            '<a class="btn btn-toolbar item_edit" data-id_tkeluar="'+data[i].id_tkeluar+'" data-nm_barang="'+data[i].nm_barang+'" data-jumlah="'+data[i].jumlah+'" data-departemen="'+data[i].departemen+'"><i class="fa fa-edit"></i></a>'+
                            '<a href="javascript:void(0);" class="btn btn-toolbar item_hapus" data-id_tkeluar="'+data[i].id_tkeluar+'"><i class="fa fa-trash"></i></a>'+
                    <?php } ?>
                    '</td>'+
                    '</tr>';
          }
          $('#show_data').html(page);
        }
      });
    }

    //get delete
    $('#show_data').on('click', '.item_hapus', function(){
      var id_tkeluar = $(this).data('id_tkeluar');
      $('#Modal_Delete').modal('show');
      $('[name="id_tkeluar"]').val(id_tkeluar);
    });
    //delete
    //delete db
    $('#btn_delete').on('click', function(event) {
      var id_tkeluar = $('#id_tkeluar').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url('Kelola_Permintaan/hapus_transaksi_permintaan') ?>',
        dataType: 'JSON',
        data: { id_tkeluar: id_tkeluar},
        success : function(data){
          $('[name="id_tkeluar"]').val("");
          $('#Modal_Delete').modal('hide');
          swal({
            title: "Berhasil Menghapus!",
            text: "Selamat bekerja!",
            icon: "success",
            button: "Aww yiss!",
          });
          tampildata();
        }
      });
    });
    //delete
    //edit
    $('#show_data').on('click', '.item_edit', function(event) {
      event.preventDefault();
      var id_tkeluar = $(this).data('id_tkeluar')
      var nm_barang = $(this).data('nm_barang')
      var jumlah = $(this).data('jumlah')
      var departemen = $(this).data('departemen')

      $('#Modal_edit').modal('show');
      $('[name="id_tkeluar"]').val(id_tkeluar);
      $('[name="nm_barang"]').val(nm_barang);
      $('[name="jumlah"]').val(jumlah);
      $('[name="departemen"]').val(departemen);
    });

    $('#btn_update').on('click', function(){
      var id_tkeluar = $('#id_tkeluar').val();
      var jumlah = $('#jumlah').val();
      var departemen = $('#departemen').val();

      $.ajax({
        url: '<?php echo base_url('Kelola_Permintaan/edit') ?>',
        type: 'POST',
        dataType: 'json',
        data: {id_tkeluar: id_tkeluar,
               jumlah : jumlah,
               departemen : departemen
             },
        success : function(){
         $('[name="id_tkeluar"').val("");
         $('[name="jumlah"]').val("");
         $('[name="departemen"]').val("")
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
    })
    //edit
    $('#btn_test').on('click', function() {
      var bulan = $('#bulan').val();
      var kd_barang = $('#kd_barang').val();
    
      if (bulan != '' && kd_barang !='') {
        $.ajax({
        type      : "POST",
        url       : "<?php echo base_url('Kelola_Permintaan/lihatledger_barang') ?>",
        async     : false,
        data      : {bulan:bulan, kd_barang:kd_barang},
        dataType  : "JSON",
        success : function(data){
          var html='';
          var i;
          for (i = 0; i < data.length; i++) {
            html +='<tr class="even pointer">'+
                    '<td style="display: none">'+data[i].id_tkeluar+'</td>'+
                    '<td>'+data[i].nm_barang+'</td>'+
                    '<td>'+data[i].kd_barang+'</td>'+
                    '<td>'+data[i].departemen+'</td>'+ 
                    '<td>'+data[i].total+'</td>'+
                    '<td style="display: none">'+data[i].tanggal+'</td>'+
                    '<td style="text-align:left;">'+
                    <?php if ($this->session->userdata('level')=='admin') {?>
                            '<a href="javascript:;" class="btn btn-toolbar item_rekap" ">Rekap data <i class="fa fa-save"></i></a>'+
                    <?php } ?>
                    '</td>'+
                    '</tr>';
          }
          $('#show_filter').html(html);
        }        
      });
      }
    });

    // rekap
    $('#show_filter').on('click', '.item_rekap', function(event) {
      var bulan = $('#bulan').val();
      tabel_data = [];
      event.preventDefault();
      $('#tb_filter tr').each(function(row, tr) {
        if ($(tr).find('td:eq(0)').text() == "") {

        } else {
          var sub = {
            'id_tkeluar' : $(tr).find('td:eq(0)').text(),
            'nm_barang' : $(tr).find('td:eq(1)').text(),
            'kd_barang' : $(tr).find('td:eq(2)').text(),
            'departemen' : $(tr).find('td:eq(3)').text(),
            'jumlah' : $(tr).find('td:eq(4)').text(),
            'tanggal' : $(tr).find('td:eq(5)').text()
          };
          tabel_data.push(sub);
        }
      });
      console.log(tabel_data);
      /* Act on the event */
     // simpan ke rekap
      swal({
            title : 'Simpan data ini ?',
            text : '',
            type : '',
            showLoaderOnConfirm : true,
            showCancelButton : true,
            ConfirmButtonText : 'Yes',
            CloseOnConfirm : false},

            function() {

              var data = { 'tb_filter' : tabel_data
                          };

              $.ajax({
                url: '<?php echo base_url('Kelola_Permintaan/rekapdata_tiapbulan') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: data,
                crossOrigin : false,
                success : function(result){
                  if (result.status == "success") {
                    swal('Sukses Rekap Data .', '', 'success');
                  } else {
                    swal('Error Saving.','','warning');
                  }
                }, error : function(){
                  swal('Data Bermasalah atau sudah tersimpan.','','warning');
                }
              });
     });
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
                  '</span>'+ '  '+
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
