<style>
    canvas{
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
</style>

<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="row top_tiles">
              <?php
                foreach ($cek_stok as $key ) {
                  if ($key->stok < $key->min_stok) {?>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-info-circle"></i></div>
                  <div class="count" id=""><a href="<?= base_url('Kelola_Stok/test/'.$key->kd_barang) ?>">Stok <?php echo $key->stok?></a></div>
                  <!-- <div class="count" id="coba" data-kd_barang="<?= $key->kd_barang ?>">Stok <?php echo $key->stok?></div> -->
                  <h3>dari min. stok <?= $key->min_stok ?></h3>
                  <p>Nama Barang : <?php echo $key->nm_barang ?></p>
                  <p>Suplier : <?php echo $key->nama_supplier ?>&nbsp;&nbsp;<code>PERHATIAN</code></p> 
                </div>
              </div>
              <?php }}?>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Selamat Datang <small>Ineventori Jansen Indonesia</small></h2>
                    <div class="filter">
                      <!-- <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                      </div> -->
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                      <div class="demo-container" style="">
                        <canvas id="canvas" class="demo-placeholder"></canvas>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-12 col-xs-12">
                      <div>
                        <div class="x_title">
                          <h2>Transaksi terakhir</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
                          <?php $a = 1; foreach ($transaksi as $key => $value)  {?>
                            
                          
                          <li class="media event">
                            <a class="pull-left border-aero profile_thumb">
                              <i class="fa fa-cube aero"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#"><?php echo $value->nm_barang ?></a>
                              <p><strong><?php echo $a++ ?>. </strong>ID <?php echo $value->id_tkeluar ?> </p>
                              <p>Jumlah <?php echo $value->jumlah ?> <small><?php echo $value->tanggal ?></small>
                              </p>
                            </div>
                          </li>
                         <?php } ?>
                        </ul>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Transaksi Keluar <small>Terbanyak</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php $a=1; foreach ($top_rate_out as $key => $value) {?>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month"><?php echo $value->nm_barang ?></p>
                        <p class="day"><?php echo $a++ ?></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#"><?php echo $value->departemen ?></a>
                        <p><?php echo $value->keterangan?> - Jumlah. <?php echo $value->bnyak_nama?></p>
                      </div>
                    </article>
                    <?php } ?>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Transaksi Masuk <small>Terbanyak</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php $a=1; foreach ($top_rate_in as $key => $value) {?>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month"><?php echo $value->nm_barang ?></p>
                        <p class="day"><?php echo $a++ ?></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#"><?php echo $value->nama_supplier ?></a>
                        <p><?php echo $value->alamat?> - Telp. <?php echo $value->telepon?> - Email : <?php echo $value->email ?></p>
                      </div>
                    </article>
                    <?php } ?>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Transaksi <small>Bulan Terakhir</small></h2>
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
                    <?php $l=1; foreach ($each_month as $key) {?>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month"><?php echo $key->bulan1 ?></p>
                        <p class="day"><?php echo $l++ ?></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#"><?php echo $key->nm_barang ?></a>
                        <p><?php echo $key->departemen ?> - <?php echo $key->keterangan ?> - Jumlah <?php echo $key->jumlah1 ?></p>
                      </div>
                    </article>
                  <?php }?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<script src="<?php echo base_url();?>assets/js/jquery.js"></script>

<!-- Chart.js -->
<script src="<?php echo base_url();?>assets/Backend/vendors/Chart.js/dist/Chart.min.js"></script>
<script src="<?php echo base_url();?>assets/Backend/vendors/Chart.js/dist/Chart.bundle.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#coba").on('click', function(event) {
      event.preventDefault();
      /* Act on the event */
        const b = $(this).data('kd_barang');
        console.log(b);
        //window.location.replace("<?php echo base_url('Kelola_Stok.html')?>");
        window.location.replace("<?php echo base_url()?>"+"Kelola_Stok/test/"+$(this).data('kd_barang'));
    });
  });
</script>
    <script>
        var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        
        var randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
            //return 0;
        };
        var randomColorFactor = function() {
            return Math.round(Math.random() * 255);
        };
        var randomColor = function(opacity) {
            return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
        };
         <?php foreach ($chart_out as $key => $value) {
                        $bulan[] = $value->bulan;
                        $total_out[] = (float) $value->total;
                    } ?>
        <?php foreach ($chart_in as $key) {
            $bulan = $key->bulan;
            $total_in[] = (float) $key->total;
        } ?>
        var config = {
            type: 'line',
            data: {
                labels: MONTHS,
                datasets: [{
                    label: "Transaksi Barang Masuk",
                    data: <?php echo json_encode($total_in) ?>,
                    fill: false,
                    borderDash: [5, 5],
                }, {
                    hidden: true,
                    label: 'hidden dataset',
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                }, {
                    label: "Transaksi Permintaan",
                    data: <?php echo json_encode($total_out) ?>,
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:false,
                    text:'Chart.js Line Chart'
                },
                tooltips: {
                    mode: 'label',
                    callbacks: {
                        // beforeTitle: function() {
                        //     return '...beforeTitle';
                        // },
                        // afterTitle: function() {
                        //     return '...afterTitle';
                        // },
                        // beforeBody: function() {
                        //     return '...beforeBody';
                        // },
                        // afterBody: function() {
                        //     return '...afterBody';
                        // },
                        // beforeFooter: function() {
                        //     return '...beforeFooter';
                        // },
                        // footer: function() {
                        //     return 'Footer';
                        // },
                        // afterFooter: function() {
                        //     return '...afterFooter';
                        // },
                    }
                },
                hover: {
                    mode: 'dataset'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Value'
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 100,
                        }
                    }]
                }
            }
        };

        $.each(config.data.datasets, function(i, dataset) {
            dataset.borderColor = randomColor(0.4);
            dataset.backgroundColor = randomColor(0.5);
            dataset.pointBorderColor = randomColor(0.7);
            dataset.pointBackgroundColor = randomColor(0.5);
            dataset.pointBorderWidth = 1;
        });

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myLine = new Chart(ctx, config);
        };
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
