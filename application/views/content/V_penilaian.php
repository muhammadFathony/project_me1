<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form Penilaian</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <!-- <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                </span>
                </div> -->
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <!-- <h2>Form Design <small>different form elements</small></h2> -->
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left">
                           
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIS <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="nis" id="nis" required class="form-control  col-md-7 col-xs-12">
                                    </select>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Lengkap <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kelas </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="kelas" class="form-control col-md-7 col-xs-12" type="text" name="kelas">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir <span class="required">*</span>
                                </label>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <div class="input-group date" id="myDatepicker2">
                                        <input type="text" class="form-control " id="ttl" name="ttl" placeholder="Tanggal" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nilai </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="nilai" size="1" maxlength="1" value="0" min="0" max="5" class="form-control col-md-7 col-xs-12" type="number" name="nilai">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan Nilai </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="keterangan" class="form-control col-md-7 col-xs-12" readonly type="text" name="keterangan">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="x_content">
                        <table class="table table-striped table-bordered" id="tbPenilaian">
                            <thead>
                                <tr>
                                    <th>No </th>
                                    <th>Nis </th>
                                    <th>Nama Lengkap </th>
                                    <th>Kelas </th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                    <th><span class="nobr">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <button id="btn_simpan" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal cari siswa  -->
<!-- modal cari siswa -->
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
                        <input type="text" class="form-control has-feedback-left" id="nis_edit" placeholder="Nis" name="nis_edit" readonly="">
                        <input type="hidden" name="nomor" id="nomor">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="nama_lengkap_edit" placeholder="Nama Lengkap" readonly name="nama_lengkap_edit" required>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="nilai_edit" placeholder="Nilai" name="nilai_edit" required>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="kelas_edit" placeholder="Kelas" name="kelas_edit" readonly required>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
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
<!-- /page content -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/Backend/vendors/jquery/dist/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#ttl').datetimepicker({
            format: 'DD-MM-YYYY'
        });

        $('.male').on('click', function() {
            //alert('male');
            $(this).toggleClass("btn-primary")
            $('.female').removeClass("btn-primary")
            $('#jenis_kelamin').val('1');
        })

        $('.female').on('click', function() {
            //alert('female');
            $(this).toggleClass("btn-primary")
            $('.male').removeClass("btn-primary")
            $('#jenis_kelamin').val('0')
        })

        const showSiswa = () => {
            let list = '';
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('penilaian/getsiswa')?>",
                dataType: "JSON",
                success: function(response){
                    response.map((data, key)=> {
                        list += `<option value="${data.nis}">${data.nis}</option>`;
                    })                  
                    $('#nis').html(list);
                }
            });
        }
        showSiswa();
        $('#nis').on('change', function() {
            const nis = $(this).val();
            let gender;
            if (nis.length > 5) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('penilaian/getsiswabynis') ?>?nis=" + nis,
                    dataType: "json",
                    success: function(data) {
                        if (data !== null) {
                            data.jenis_kelamin === '1' ? gender = 'Laki-laki' : gender = 'Perempuan';
                            if (data.jenis_kelamin === '1') {
                                $('.male').addClass("btn-primary")
                                $('.female').removeClass("btn-primary")
                            } else {
                                $('.female').addClass("btn-primary")
                                $('.male').removeClass("btn-primary")
                            }
                            $('#nama_lengkap').val(data.nama_lengkap);
                            $('#kelas').val(data.kelas);
                            $('#jenis_kelamin').val(data.jenis_kelamin);
                            $('#ttl').val(moment(data.ttl).format('DD-MM-YYYY'));
                            return
                        }
                        $('#nama_lengkap').val('');
                        $('#kelas').val('');
                        $('#jenis_kelamin').val('');
                        $('#ttl').val('');
                        swal('Upss', 'data tidak ditemukan', 'info')
                    }
                })
            }
        })

        let tbPenilaian = $('#tbPenilaian').dataTable({
            "bProcessing": true,
            "bAutoWidth": false,
            "bserverSide": true,
            //
            "order": [],
            "lengthMenu": [25, 50, 75, 100],
            "sAjaxSource": '<?php echo base_url(); ?>penilaian/getNilaiSiswa',

            "aoColumns": [{
                    "mData": "nomor"
                },
                {
                    "mData": "nis"
                },
                {
                    "mData": "nama_lengkap"
                },
                {
                    "mData": "kelas"
                },
                {
                    "mData": "nilai"
                },
                {
                    "mData": "keterangan"
                },
                {
                    "mData": "action"
                }
            ],
            "columnDefs": [{
                    className: "text-center",
                    "targets": [0, 4]
                },
                {
                    width: 30,
                    targets: 0
                },
                {
                    width: 50,
                    targets: 4
                }
            ],
            "fixedColumns": true
        })

        $('#btn_simpan').on('click', function() {
            const nis = $('#nis').val();
            const nama_lengkap = $('#nama_lengkap').val();
            const kelas = $('#kelas').val();
            const jenis_kelamin = $('#jenis_kelamin').val();
            const ttl = $('#ttl').val();
            const nilai = $('#nilai').val();
            const keterangan = $('#keterangan').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('penilaian/simpanNilai') ?>",
                data: {
                    nis: nis,
                    nama_lengkap: nama_lengkap,
                    kelas: kelas,
                    jenis_kelamin: jenis_kelamin,
                    ttl: ttl,
                    nilai: nilai,
                    keterangan: keterangan
                },
                dataType: "json",
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        swal('Berhasil', '', 'success')
                        $(".print-error-msg").css('display', 'none');
                        $('#tbPenilaian').DataTable().ajax.reload();
                    } else {
                        $(".print-error-msg").css('display', 'block');
                        $(".print-error-msg").html(data.error);
                    }
                }
            });
        });

        $('#nilai').on('keyup', function(){
            const nilai = $(this).val();
            nilai.length === 0 && $('#keterangan').val('Belum Berkembang');
            nilai === '0' && $('#keterangan').val('Belum Berkembang');
            nilai === '1' && $('#keterangan').val('Mulai Berkembang');
            nilai === '2' && $('#keterangan').val('Mulai Berkembang');
            nilai > '2' && $('#keterangan').val('Sudah Berkembang');
        });

        $('#tbPenilaian').on('click', '#btn_delete', function(){
            const nomor = $(this).data('nomor');
            const nis = $(this).data('nis');

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('penilaian/deleteNilai')?>/"+nomor+'/'+nis,
                dataType: "JSON",
                success: function(data){
                    if(data === true){
                        swal('Berhasil', '', 'success')
                    } else {
                        swal('Maaf', 'delete tidak berhasil', 'error');
                    }
                    $('#tbPenilaian').DataTable().ajax.reload();
                }
            });
        });

        $('#tbPenilaian').on('click', '#btn_edit', function(){
            const nomor = $(this).data('nomor');
            const nis = $(this).data('nis');
            const nama_lengkap = $(this).data('nama_lengkap');
            const kelas = $(this).data('kelas');
            const nilai = $(this).data('nilai');

            $('#nomor').val(nomor);
            $('#nis_edit').val(nis);
            $('#nama_lengkap_edit').val(nama_lengkap);
            $('#nilai_edit').val(nilai);
            $('#kelas_edit').val(kelas);
            $('#modal_edit').modal('show');
        });

        $('#btn_update').on('click', function(){
           const nis = $('#nis_edit').val();
           const nilai = $('#nilai_edit').val();
           const nomor = $('#nomor').val();

           $.ajax({
            type: "POST",
                url: "<?php echo base_url('penilaian/editnilai') ?>",
                data: {
                    nis: nis,
                    nomor: nomor,
                    nilai: nilai
                },
                dataType: "json",
                success: function(data) {
                    if(data === true){
                        $('#tbPenilaian').DataTable().ajax.reload();
                        swal('Berhasil', 'update sukses', 'success');
                    } else {
                        swal('Maaf', 'update gagal', 'info');
                    }
                    $('#modal_edit').modal('hide');
                }
           });
        });
    });
</script>