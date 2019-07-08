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
                    <h2>Daftar Suplier</h2>

                    <ul class="nav navbar-right panel_toolbox">
                      &nbsp;
                      &nbsp;
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                  	<p>Daftar Suplier <code>PT. Jansen Indonesia</code></p> 

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">
                              Nomor
                            </th>
                           <th class="column-title">Nama Suplier </th>
                            <th class="column-title">Alamat </th>
                            <th class="column-title">Kategori </th>
                            <th class="column-title">Email </th>
                            <th class="column-title">Telepon </th>
                            <th class="column-title">Fax</th>
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
                </div>
              </div>
            </div>
          </div>

          <!-- modals edit -->
                   <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="Modal_Edit">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Edit Suplier</h4>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal form-label-left input_mask" id="form_suplier">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="nama_supplier" placeholder="Nama Suplier" name="nama_supplier">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="fax" placeholder="Fax" name="fax">
                        <span class="fa fa-fax form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="email" placeholder="Email" name="email">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="telepon" placeholder="Phone" name="telepon">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12">Alamat</label>
                        <div class="col-md-7 col-sm-9 col-xs-12">
                          <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat" id="alamat"></textarea>
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12">Kategori</label>
                        <div class="col-md-4 col-sm-3 col-xs-12">
                          <select class="form-control has-feedback-left" name="kategori" id="kategori">
                            <option value=""></option>
                              <?php $opsi = $this->db->get('kategori');
                              foreach ($opsi->result() as $key) { ?>
                            <option value="<?=$key->id_kategori?>" >Kategori <?=$key->kategori?></option>
                              <?php }?> 
                          </select>
                          <span class="fa fa-tasks form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                     
                         <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i></button>
                         <button type="button" id="btn_update" class="btn btn-secondary"><i class="fa fa-check"></i></button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Anda yakin ingin menghapus data ini?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id_supplier" id="id_supplier" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i></button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-secondary"><i class="fa fa-check"></i></button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL DELETE-->
<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/sweetalert/css/sweetalert.css" />
<script src="<?php echo base_url();?>assets/sweetalert/lib/sweet-alert.js"></script>
<!-- io -->
<script src="<?php echo base_url();?>node_modules/socket.io-client/dist/socket.io.js"></script>
<!-- io -->
<script type="text/javascript">
$(document).ready(function(){
  list_suplier();
  $('#datatable').DataTable()
  socket_on();
// get suplier
function socket_on(){
  var socket = io.connect('http://'+ window.location.hostname+':8000');
  socket.on( 'edit', function( data ) {
    list_suplier();
  });
}
  function list_suplier()
  {
    $.ajax({
      type    : 'ajax',
      url     : '<?php echo base_url('Suplier/listsuplier')?>',
      
      dataType: 'json',
      success : function(data){
        var html = '';
        var i;
        var a = 1;
        for(i=0; i<data.length; i++){
          html += '<tr class="even pointer">'+
                // '<td class="a-center ">'+
                //   '<input type="checkbox" class="flat" name="table_records">'+
                // '</td>'+
                '<td class=" ">'+[a++]+'.'+'</td>'+
                '<td class=" ">'+data[i].nama_supplier+'</td>'+
                '<td class=" ">'+data[i].alamat+'</td>'+
                '<td class=" ">'+data[i].id_kategori+'</td>'+
                '<td class=" ">'+data[i].email+'</td>'+
                '<td class=" ">'+data[i].telepon+'</td>'+
                '<td class="a-right a-right ">'+data[i].fax+'</td>'+
                '<td style="text-align:left;">'+
                <?php if ($this->session->userdata('level')=='admin' || $this->session->userdata('level')=='administrator') {?>
                        '<a href="javascript:void(0);" class="btn btn-default btn-sm item_edit" data-id_supplier="'+data[i].id_supplier+'" data-nama_supplier="'+data[i].nama_supplier+'" data-alamat="'+data[i].alamat+'" data-kategori="'+data[i].id_kategori+'" data-email="'+data[i].email+'" data-telepon="'+data[i].telepon+'" data-fax="'+data[i].fax+'"><i class="fa fa-pencil"></i></a>'+' '+

                        '<a href="javascript:void(0);" class="btn btn-default btn-sm item_delete" data-id_supplier="'+data[i].id_supplier+'"><i class="fa fa-trash"></i></a>'+
                <?php } ?>
                    '</td>'+
                '</tr>';
        }
        $('#show_data').html(html);
      }
    });
  } 
  // end get suplier

  // get data edit
  $('#show_data').on('click','.item_edit',function(){
  
   var nama_supplier = $(this).data('nama_supplier'); 
   var alamat        = $(this).data('alamat');
   var kategori      = $(this).data('kategori');
   var email         = $(this).data('email');
   var telepon       = $(this).data('telepon');
   var fax           = $(this).data('fax');
   var id_supplier   = $(this).data('id_supplier');

   $('#Modal_Edit').modal('show');
   $('[name="id_supplier"]').val(id_supplier);
   $('[name="nama_supplier"]').val(nama_supplier);
   $('[name="alamat"]').val(alamat);
   $('[name="kategori"]').val(kategori);
   $('[name="email"]').val(email);
   $('[name="telepon"]').val(telepon);
   $('[name="fax"]').val(fax);
  });
  //end of get edit

  //edit
  $('#btn_update').on('click',function(){
  var id_supplier = $('#id_supplier').val();
  var nama_supplier = $('#nama_supplier').val();
  var alamat = $('#alamat').val();
  var kategori = $('#kategori').val();
  var email = $('#email').val();
  var telepon = $('#telepon').val();
  var fax = $('#fax').val();
 
  $.ajax({
      type      : "POST",
      url       : "<?php echo base_url('Suplier/update_suplier')?>",
      dataType  : "JSON",
      data      : {
                    id_supplier : id_supplier,
                    nama_supplier : nama_supplier,
                    alamat : alamat,
                    kategori : kategori,
                    email : email,
                    telepon : telepon,
                    fax :fax
                  },
      success: function(data){
        var socket = io.connect( 'http://'+window.location.hostname+':8000' );
          socket.emit('edit', {
            id_supplier : id_supplier,
            nama_supplier : nama_supplier,
            alamat : alamat,
            kategori : kategori,
            email : email,
            telepon : telepon,
            fax :fax
          });
       $('[name="id_supplier"]').val("");
       $('[name="nama_supplier"]').val("");
       $('[name="alamat"]').val("");
       $('[name="kategori"]').val("");
       $('[name="email"]').val("");
       $('[name="telepon"]').val("");
       $('[name="fax"]').val("");
       swal({
        title: "Berhasil Update!",
        text: "Selamat Bekerja!",
        icon: "success",
        button: "Aww yiss!",
      });
       $('#Modal_Edit').modal('hide');
        
       list_suplier();
      }
  });
    return false;
  });
  //end of edit
 //get data for delete record
  $('#show_data').on('click','.item_delete',function(){
      var id_supplier = $(this).data('id_supplier');
      
      $('#Modal_Delete').modal('show');
      $('[name="id_supplier"]').val(id_supplier);
  });

   //delete record to database
   $('#btn_delete').on('click',function(){
      var id_supplier = $('#id_supplier').val();
      $.ajax({
          type : "POST",
          url  : "<?php echo base_url('Suplier/hapus')?>",
          dataType : "JSON",
          data : {id_supplier:id_supplier},
          success: function(data){
              $('[name="id_supplier"]').val("");
              $('#Modal_Delete').modal('hide');
              list_suplier();
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
                  '</span>'+'  ' +
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
        