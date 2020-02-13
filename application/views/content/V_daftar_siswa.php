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
                    <table class="table table-striped table-bordered" id="tbsiswa">
                      <thead>
                        <tr class="">
                          
                          <th class="">No </th>
                          <th class="">Nis </th>
                          <th class="">Nama Lengkap </th>
                          <th class="">Kelas </th>
                          <th class="">Tanggal Lahir</th>
                          <th class="">Jenis Kelamin </th>
                          <th class=""><span class="nobr">Action</span>
                          </th>
                        </tr>
                      </thead>
                      <tbody id="show_data"> 
                      </tbody>
                    </table>
                  
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
        $('#jenis_kelamin').val('1');
    })
    $('.female').on('click', function(){
        //alert('female');
        $(this).toggleClass("btn-primary")
        $('.male').removeClass("btn-primary")
        $('#jenis_kelamin').val('0')
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
            $('.female').addClass("btn-primary")
            $('.male').removeClass("btn-primary")
            
        }else{
            $('.male').addClass("btn-primary")
            $('.female').removeClass("btn-primary")
            
        }
        $('#jenis_kelamin').val(jenis_kelamin)
        $("#nama_lengkap").val(nama_lengkap)
        $("#nis").val(nis)
        $("#kelas").val(kelas)
        $("#ttl").val(ttl)
        $('#modal_edit').modal('show')
    })

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
              if ($.isEmptyObject(data.error)) {
                $(".print-error-msg").css('display','none');
                swal('Berhasil','','success');
                $('#modal_edit').modal('hide')
                $('#tbsiswa').DataTable().ajax.reload();
              } else {
                $(".print-error-msg").css('display','block');
                $(".print-error-msg").html(data.error);
              }	
            }
        });
    });
    //end of edit

    $('#tbsiswa').on('click', '#btn_delete', function(){
       
      var nis = $(this).data('nis')
      swal({
				title: "Delete Data ini?",
				type: "info",
				showCancelButton: true,
				confirmButtonText: "Simpan",
				cancelButtonText: "Cancel",
				closeOnConfirm: true,
				closeOnCancel: false
			},
      function(isConfirm){
        if (isConfirm) {
          $.ajax({
            url: '<?php echo base_url('index.php/Siswa/delete_siswa')?>',
            type: 'POST',
            dataType: 'json',
            data: {nis : nis},
            success : function(data){
            if ($.isEmptyObject(data.error)) {
                $(".print-error-msg").css('display','none');
                swal('Berhasil','','success');
            } else {
              $(".print-error-msg").css('display','block');
              $(".print-error-msg").html(data.error);
            }	
              $('#tbsiswa').DataTable().ajax.reload();
            }
          })
        }else{
          swal('Batal');
        }
      })			
    })

});
</script>
      