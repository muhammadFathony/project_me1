function notif_in(){
 $.ajax({
    url     : 'Notification',
    type    : 'post',
    dataType : 'json',
    success : function(data){
      $('#total_masuk').html(data);
    }
 });
}

function notif_out(){
 $.ajax({
    url     : 'Notification/notif_out',
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
      url     : 'Notification/list_in',
      type    : 'post',
      dataType : 'json',
      success : function(data){
        var html = '';
        var i;
        for (i = 0; i < data.length; i++) {
          html += '<li>'+
                  '<a class="btn-one" data-id_tmasuk="'+data[i].id_tmasuk+'" name="id_tmasuk" id="id_tmasuk">'+          
                  '<span class="image">'+'<span class="fa fa-bell-o">'+'</span>'+
                  '</span>'+ '   ' +
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
      url     : 'Notification/list_out',
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
      url: 'Notification/ubah_list_out',
      type: 'POST',
      crossOrigin : false,
      dataType: 'json',
      success : function(data){
        $('[name="id_tkeluar"]').val("");
        notif_in();
        list_in();
        notif_out();
        list_out();
        window.location.replace("Kelola_Permintaan/lihatpermintaan.html");
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
      url: 'Notification/ubah_list_in',
      type: 'POST',
      crossOrigin : false,
      async : false,
      dataType: 'json',
      success : function(data){
        $('[name="id_tmasuk"]').val("");
        notif_in();
        list_in();
        notif_out();
        list_out();
        window.location.replace("Kelola_Stok/view_ledger.html");
      }
    })
});
//overall
}

//each-IN
$('#list_masuk').on('click', '.btn-one', function(){
  var id_tmasuk = $(this).data('id_tmasuk');
  
  $.ajax({
    url: 'Notification/update_each_in',
    type: 'POST',
    dataType: 'json',
    data: {id_tmasuk: id_tmasuk},
    success : function(){
      $('[name="id_tmasuk"]').val("");
      notif_in();
      list_in();
      notif_out();
      list_out();
      //window.location.replace("Kelola_Stok/view_ledger.html");
    }
  })
})
//each

//each-OUT
$('#list_keluar').on('click', '.btn-one', function(){
  var id_tkeluar = $(this).data('id_tkeluar');
  
  $.ajax({
    url: 'Notification/update_each_out',
    type: 'POST',
    dataType: 'json',
    data: {id_tkeluar: id_tkeluar},
    success : function(){
      $('[name="id_tmasuk"]').val("");
      notif_in();
      list_in();
      notif_out();
      list_out();
      //window.location.replace("Kelola_Permintaan/lihatpermintaan.html");
    }
  })
})
//each