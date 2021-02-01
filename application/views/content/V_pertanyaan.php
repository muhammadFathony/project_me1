<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Mulai Pertanyaan</h3>
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
                        <h2>Form Paket Soal</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 text-center">
                               <div class="">
                                   <div class="">
                                       <button id="btn_paketA" class="btn btn-primary"><h1>Paket A</h1></button>
                                   </div>
                               </div>
                            </div> 
                            <div class="col-md-6 text-center">
                                <div class="">
                                   <div class="">
                                        <button id="btn_paketB" class="btn btn-primary"><h1>Paket B</h1></button>
                                   </div>
                               </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal cari siswa  -->

<!-- modal cari siswa -->

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

        $('#nis').on('keyup', function() {
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

        var tabel = $('#tbsiswa').dataTable({

            "bProcessing": true,
            "bAutoWidth": false,
            "bserverSide": true,
            //
            "order": [],
            "lengthMenu": [25, 50, 75, 100],
            "sAjaxSource": '<?php echo base_url(); ?>Siswa/get_daftar_siswa',

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
                    "mData": "ttl"
                },
                {
                    "mData": "jenis_kelamin"
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
        });

        $('#tbsiswa').on('click', '#btn_edit', function(){
            $('#modal_edit').modal('show');
        });

        $('#btn_cari').on('click', function(){
            $('#modal_siswa').modal('show');
        });

        $('#btn_simpan').on('click', function() {
            const nis = $('#nis').val();
            const nama_lengkap = $('#nama_lengkap').val();
            const kelas = $('#kelas').val();
            const jenis_kelamin = $('#jenis_kelamin').val();
            const ttl = $('#ttl').val();
            const nilai = $('#nilai').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('penilaian/simpanNilai') ?>",
                data: {
                    nis: nis,
                    nama_lengkap: nama_lengkap,
                    kelas: kelas,
                    jenis_kelamin: jenis_kelamin,
                    ttl: ttl,
                    nilai: nilai
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

        $('#btn_paketA').on('click', function(){
            const soal = 'A';
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('pertanyaan/simpansoal')?>",
                data: {
                    soal: soal
                },
                dataType: "json",
                success: function(data){
                    if(data === true){
                        swal('Berhasil', 'update sukses', 'success');
                    } else {
                        swal('Maaf', 'update gagal', 'info');
                    }
                }
            });
        });

        $('#btn_paketB').on('click', function(){
            const soal = 'B';
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('pertanyaan/simpansoal')?>",
                data: {
                    soal: soal
                },
                dataType: "json",
                success: function(data){
                    if(data === true){
                        swal('Berhasil', 'update sukses', 'success');
                    } else {
                        swal('Maaf', 'update gagal', 'info');
                    }
                }
            });
        });
    });
</script>