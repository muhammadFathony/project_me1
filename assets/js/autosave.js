function autosavetag(){
  var time = setTimeout("autosavetag()", 8000);

  var kd_brg = $('#kd_brg').val();
  var tag = $('#tag').val();

  if (kd_brg.length > 7 ) {
    $.ajax({
        type : "POST",
        url : "tambahbarang_terbaru",
        dataType : "JSON",
        data : { 
              tag: tag,
              kd_brg : kd_brg,
            },
        success : function(data){
          alert(data)
          listtag1();

          var socket = io.connect( 'http://'+window.location.hostname+':3000' ); 
          socket.on('new_message', function(tag){
          $("#tag").val(tag.new_message); 
          });
          if ($.isEmptyObject(data.eror)) {
          $(".print-error-msg").css('display','none');
          $("#tag").val('');
          // $('[name="kd_barang"]').val("");
          listtag1();
          } else {
            $(".print-error-msg").css('display','block');
            $(".print-error-msg").html(data.eror);
          }
          
        }
      });
      return false;
  }
}

function listtag1()
        {
          $.ajax({
                type    : 'ajax',
                url     : 'list_tag',
               
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


function autosave_tambah_stok () {
	var t = setTimeout("autosave_tambah_stok()", 8000);


	var id_tag = $('#id_tag').val();
	var kd_barang = $('#kd_barang').val();
	var nm_barang = $('#nm_barang').val();
	var jumlah = $('#jumlah').val();
	var id_tmasuk = $('#id_tmasuk').val();

	if (id_tag.length > 0 ) {
			$.ajax({
        type : "POST",
        url : "Kelola_Stok/add_tabel",
        dataType : "JSON",
        data : { 
              id_tag: id_tag,
              kd_barang : kd_barang,
              nm_barang : nm_barang,
              jumlah : jumlah,
              id_tmasuk : id_tmasuk
            },
        success : function(data){
          var socket = io.connect( 'http://'+window.location.hostname+':3000' ); 
            socket.on('new_message', function(tag){
            $("#id_tag").val(tag.new_message); 
            });
          if ($.isEmptyObject(data.error)) {
          $(".print-error-msg").css('display','none');
          $('[name="id_tag"]').val("");
          $('[name="kd_barang"]').val("");
          $('[name="nm_barang"]').val("");
          $('[name="jumlah"]').val("");
          // $('[name="id_tmasuk"]').val("");
          $('.reset').val('');
          //$('#nomer').hide();
          tampil_data1();
          count_data1();
          } else {
            $(".print-error-msg").css('display','block');
            $(".print-error-msg").html(data.error);
          }
        }
      });
      return false;
	}

}
function tampil_data1()
{
  $.ajax({
    type    : 'ajax',
    url     : 'Kelola_Stok/transaksi',
   
    dataType : 'JSON',
    success : function(data){
      var html = '';
      var i;
      for (i = 0; i < data.length; i++) {
        html += '<tr>'+
                '<td>'+data[i].id_tag+'</td>'+
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
//hitung
function count_data1()
{
  $.ajax({
    type : 'ajax',
    url : 'Kelola_Stok/count',
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

function autosave_permintaan()
{
  var time = setTimeout("autosave_permintaan()", 7000);

    var id_tag = $('#id_tag').val();
    var kd_barang = $('#kd_barang').val();
    var nm_barang = $('#nm_barang').val();
    var jumlah = $('#jumlah').val();
    var id_tkeluar = $('#id_tkeluar').val();
            
    if (id_tag.length > 0) {
    $.ajax({
      type : "POST",
      url : "Kelola_Permintaan/add_tabel_permintaan",
      dataType : "JSON",
      data : { 
            id_tag: id_tag,
            kd_barang : kd_barang,
            nm_barang : nm_barang,
            jumlah : jumlah,
            id_tkeluar : id_tkeluar,                   
          },
      success : function(data){

        var socket = io.connect( 'http://'+window.location.hostname+':3000' ); 
          socket.on('new_message', function(tag){
          $("#id_tag").val(tag.new_message); 
          });

        if ($.isEmptyObject(data.problem)) {
        $(".print-error-msg").css('display','none');
        $('[name="id_tag"]').val("");
        $('[name="kd_barang"]').val("");
        $('[name="nm_barang"]').val("");
        $('[name="jumlah"]').val("");
        // $('[name="departemen"]').val("");
        // $('[name="id_tkeluar"]').val("");
        $('.reset').val('');
        // $('#nomer').hide();
        
        tampil_data_permintaan();
        count_data_permintaan();
        } else {
          $(".print-error-msg").css('display','block');
          $(".print-error-msg").html(data.problem);
        }
      }
    });
    return false;
  }
}
 //ambil list
function tampil_data_permintaan()
{
  $.ajax({
    type    : 'ajax',
    url     : 'Kelola_Permintaan/transaksi_permintaan',
   
    dataType : 'JSON',
    success : function(data){
      var html = '';
      var i;
      for (i = 0; i < data.length; i++) {
        html += '<tr>'+
                '<td>'+data[i].id_tag+'</td>'+
                '<td>'+data[i].kd_barang+'</td>'+
                '<td>'+data[i].nm_barang+'</td>'+
                '<td>'+data[i].jumlah+'</td>'+
                '<td>'+data[i].id_tkeluar+'</td>'+
                '<td style="text-align:left;">'+
                        '<a href="javascript:;" class="btn btn-toolbar item_hapus" data-id_tag="'+data[i].id_tag+'"><i class="fa fa-trash"></i></a>'+
                    '</td>'+
                '</tr>';
      }
      $('#show_data').html(html);
    }
  });
}

function count_data_permintaan()
{
  $.ajax({
    type : 'ajax',
    url : 'Kelola_Permintaan/count_total_permintaan',
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