
 <!-- bootstrap-daterangepicker -->
<link href="<?php echo base_url();?>assets/backend/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="<?php echo base_url();?>assets/backend/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

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
                    <h2>Analisa Metode Trend Moment</h2>

                    <ul class="nav navbar-right panel_toolbox">
                      
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p>Gudang<code>Logistik</code></p>
                    <div class="row">
                       <form>
                      <div class="input-daterange">
                        <div class="col-md-3" style="margin-bottom: 5px;" has-feedback right>   
                          <div class="input-group date" id="myDatepicker2">
                            <input type="text" class="form-control " id="awal" name="awal" placeholder="Start Date" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div> 
                        </div>
                        <div class="col-md-3" style="padding-left: 13px;">
                          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                          <span class="sr-only">Error:</span>
                          Masukan tanggal awal sampai tanggal akhir
                        </div>
                        <div class="col-md-3" style="margin-bottom: 5px;" has-feedback right>
                          <div class="input-group date" id="myDatepicker1">
                              <input type="text" class="form-control " id="akhir" name="akhir" placeholder="End Date" />
                              <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>                         
                        </div>    
                     </div>
                      </form>
                      <!-- <div class="col-md-2" style="margin-bottom: 5px;" has-feedback right>   
                          <div class="input-group date" id="">
                           <select class="form-control selectpicker show-tick" name="awal_bulan" id="awal_bulan" data-live-search="true" title="Pilih Bulan" data-width="80%" required>
                             <option> </option>
                             <?php foreach ($bulan1->result_array() as $key) {
                              ?>
                                  <option value="<?php echo $key['bulan']; ?>"><?php echo $key['bulan1'];?></option>
                              <?php }?>
                           </select>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div> 
                        </div>
                        <div class="col-md-2" style="margin-bottom: 5px;" has-feedback right>   
                          <div class="input-group date" id="">
                           <select class="form-control selectpicker show-tick" name="awal_tahun" id="awal_tahun" data-live-search="true" title="Pilih Tahun" data-width="80%" required>
                             <option> </option>
                             <?php foreach ($tahun->result_array() as $key) {
                                  $tahun=$key['tahun'];
                              ?>
                                  <option><?php echo $tahun;?></option>
                              <?php }?>
                           </select>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div> 
                        </div>
                        <div class="col-md-2" style="margin-bottom: 5px;" has-feedback right>   
                          <div class="input-group date" id="">
                           <select class="form-control selectpicker show-tick" name="akhir_bulan" id="akhir_bulan" data-live-search="true" title="Pilih Bulan" data-width="80%" required>
                             <option> </option>
                             <?php foreach ($bulan1->result_array() as $key) {
                                  $bulan=$key['bulan1'];
                              ?>
                                  <option value="<?php echo $key['bulan']; ?>"><?php echo $bulan;?></option>
                              <?php }?>
                           </select>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div> 
                        </div>
                        <div class="col-md-2" style="margin-bottom: 5px;" has-feedback right>   
                          <div class="input-group date" id="">
                           <select class="form-control selectpicker show-tick" name="akhir_tahun" id="akhir_tahun" data-live-search="true" title="Pilih Tahun" data-width="80%" required>
                             <option> </option>
                             <?php foreach ($tahun1->result_array() as $key) {
                                  $tahun=$key['tahun'];
                              ?>
                                  <option><?php echo $tahun;?></option>
                              <?php }?>
                           </select>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div> 
                        </div> -->
                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                        <select class="form-control has-feedback-left reset" name="kd_barang" id="kd_barang" title="Pilih Barang">
                          <option value=""></option>
                          <?php 
                            foreach ($cek as $key) {?>
                              <option value="<?=$key['kd_barang']?>"><?=$key['nm_barang']?></option>
                          <?php }?>
                        </select>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div> 
                      <div class="col-md-3 col-sm-3 col-xs-12 form-group">
                        <select class="form-control reset" name="id_supplier" id="id_supplier"disabled>
                          <option value=""></option>
                          <?php $sup = $this->db->get('supplier'); 
                          foreach ($sup->result() as $key){?>
                            <option value="<?=$key->id_supplier ?>"><?=$key->nama_supplier ?></option>
                          <?php } ?>  
                        </select>
                      </div>
                      <div> <button class="btn btn-primary fa fa-search-plus" id="btn_test"></button> </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action" id="tb_listpermintaan">
                        <thead>
                          <tr class="headings">
                           
                            <th class="column-title" id="">Bulan </th>
                            <th class="column-title">Nama Barang</th>
                            <th class="column-title">Kode Barang</th>
                            <th class="column-title">Jumlah (Y)</th>
                            <th class="column-title">X </th>
                            <th class="column-title">X * Y</th>
                            <th class="column-title">X2 </th>
  
                          </tr>
                        </thead>

                        <tbody id="show_data">
                          
                        </tbody>
                      </table>
                    </div>
                    <div class="x_content">
                    
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group col-md-3 has-feedback-left">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="Total">Total Y <span class="required">*</span>
                        </label>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                          <input type="text" id="total_Y" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group col-md-3 has-feedback-right">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="Total">Total X <span class="required">*</span>
                        </label>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                          <input type="text" id="total_X" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                       <div class="form-group col-md-3 has-feedback-right">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="Total">Total XY <span class="required">*</span>
                        </label>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                          <input type="text" id="total_XY" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                       <div class="form-group col-md-3 has-feedback-right">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="Total">Total X2 <span class="required">*</span>
                        </label>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                          <input type="text" id="total_X2" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group col-md-3 has-feedback-right">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="N">N<span class="required">*</span>
                        </label>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                          <input type="text" id="N" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group col-md-10">
                        <label class="control-label col-md-2 col-sm-6 col-xs-12" for="Trend">Hasil Trend Moment<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="hasil" name="hasil" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-2 col-sm-6 col-xs-12" for="Trend">Pembulatan Analisa<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="Trend" name="Trend" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5"> 
                          <button class="btn btn-secondary" type="reset"><i class="fa fa-close"></i></button>
                          <button type="button" id="save" class="btn btn-secondary"><i class="fa fa-check"></i></button>
                        </div>
                      </div>

                    </form>
                  </div>
            
                  </div>
                </div>
              </div>
            </div>
          </div>
          
<link rel="stylesheet" href="<?php echo base_url();?>assets/sweetalert/css/sweetalert.css" />
<script src="<?php echo base_url();?>assets/sweetalert/lib/sweet-alert.js"></script>
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
  $(document).ready(function () {
    $('#myDatepicker2').datetimepicker({
                // format: 'DD-MM-YYYY'
                format: 'DD-MM-YYYY'
    });
    $('#myDatepicker1').datetimepicker({
                // format: 'DD-MM-YYYY'
                format: 'DD-MM-YYYY'
    });

    function Total_X2() {
      var TotalValue = 0;
      $('.X2').each(function(){
          TotalValue = TotalValue + parseInt($(this).html());
      });
      console.log(TotalValue);
      $('#total_X2').val(TotalValue);
    }
    function Total_Y() {
      var TotalValue = 0;
      $('.Y').each(function(){
          TotalValue = TotalValue + parseInt($(this).html());
      });
      console.log(TotalValue);
      $('#total_Y').val(TotalValue);
    }
    function Total_XY() {
      var TotalValue = 0;
      $('.XY').each(function(){
          TotalValue = TotalValue + parseInt($(this).html());
      });
      console.log(TotalValue);
      $('#total_XY').val(TotalValue);
    }
    function Total_X()
    {
    var TotalValue = 0;
    $('.X').each(function(){
          TotalValue = TotalValue + parseInt($(this).html());
    });
    console.log(TotalValue);
    $('#total_X').val(TotalValue);
    }
    function analis()
    {
      var count = $("#tb_listpermintaan tbody tr").length;
      var totaly = $("#total_Y").val();
      var totalx = $("#total_X").val();
      var totalxy = $("#total_XY").val();
      var total_X2 = $("#total_X2").val();

      var b1 = (count * totalxy) - (totaly * totalx);
      var b2 =  (count * total_X2)-(totalx * totalx );
      var b = b1 / b2 ;
      var a1 = (totaly * total_X2) - (totalx * totalxy);
      var a2 = (count * total_X2) - (totalx * totalx);
      var a = a1 / a2 ;
      var trend = a + (b * count);
      //alert(trend);
      console.log('hasil=>Y',b);
      console.log('hasil=>X',a);
      console.log('hasil analisa', trend);
      $('#N').val(count);
      $('#hasil').val(trend);
      $('#Trend').val(Math.round(trend));
      if (count <= 1) {
        swal('Error, Data Kurang !!!','','warning');
        $('#hasil').val(0);
        $('#Trend').val(0);
      } else if (count <= 10)
      {
        swal('Error, Data Kurang !!!','','warning');
      }
    }   
    
    $('#btn_test').on('click', function() {
      //var TotalValue = 0;
       var totalvalue = 0
       $('.X2').each(function(){
          //TotalValue = TotalValue + parseInt($(this).html());
         
          var test = parseInt($(this).html());
          totalvalue = totalvalue + test;
          ;
        });
       alert(totalvalue)
      // alert(TotalValue);
      var kd_barang = $('#kd_barang').val();
      var awal = $('#awal').val();
      var akhir = $('#akhir').val();

      if (awal != '' && akhir !='') {
        $.ajax({
        type      : "POST",
        url       : "<?php echo base_url('Trend/analis') ?>",
        async     : false,
        data      : { awal : awal,
                      akhir : akhir,
                      kd_barang : kd_barang
                    },
        dataType  : "JSON",
        success : function(data){
          var html='';
          var i;
          for (i = 0; i < data.length; i++) {
            html +='<tr class="even pointer">'+
                    '<td>'+data[i].Bulan+'</td>'+
                    '<td>'+data[i].nm_barang+'</td>'+
                    '<td>'+data[i].kd_barang+'</td>'+
                    '<td class="Y">'+data[i].jumlah+'</td>'+
                    '<td class="X">'+[i]+'</td>'+
                    '<td class="XY">'+[i]*data[i].jumlah+'</td>'+
                    '<td class="X2">'+[i]*[i]+'</td>'+
                    '</tr>';
          }
         $('#show_data').html(html);
         Total_X();
         Total_Y();
         Total_XY();
         Total_X2();
         analis();
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
            // 'departemen' : $(tr).find('td:eq(3)').text()
          };
          tabel_data.push(sub);
        }
      });
      console.log(tabel_data);
      /* Act on the event */
     // simpan ke rekap
      swal({
            title : 'Save all list data ?',
            text : '',
            type : '',
            showLoaderOnConfirm : true,
            showCancelButton : true,
            ConfirmButtonText : 'Yes',
            CloseOnConfirm : false},

            function() {

              var data = { 'tb_filter' : tabel_data,
                            bulan : bulan};

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
    $('#save').on('click', function(event) {
      event.preventDefault();
      var akhir = $('#akhir').val();
      var kd_barang = $('#kd_barang').val();
      var id_supplier = $('#id_supplier').val();
      var hasil = $('#Trend').val();

      $.ajax({
        url: '<?php echo base_url('Trend/save')?>',
        type: 'POST',
        dataType: 'json',
        data: {akhir: akhir,
              kd_barang : kd_barang,
              id_supplier : id_supplier,
              Trend : hasil
            },
        success : function(data){
          swal("Berhasil!", "Selamat Bekerja!", "success");
          $('.reset').val('');
        }
      });
      return false;
    });

    $('#kd_barang').on('change', function(event) {
      event.preventDefault();
      var kd_barang = $('#kd_barang').val();
      var id_supplier = $('#id_supplier').val();
      $.ajax({
        url: '<?php echo base_url('Trend/onchange')?>',
        type: 'POST',
        dataType: 'json',
        data: { kd_barang: kd_barang,
              },
        cache : false,
        success : function(data){
          $.each(data, function(kd_barang, id_supplier) {
             $('[name="id_supplier"]').val(data.id_supplier);

          });
        }
      })
      
    });     
  });
</script>
