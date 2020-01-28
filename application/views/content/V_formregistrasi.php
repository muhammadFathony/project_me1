<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Form Registrasi</h3>
            </div>

            <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                </span>
                </div>
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
                <br />
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url('Siswa/registrasi_siswa')?>" method="POST">

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIS <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nis" name="nis" required="required" class="form-control col-md-7 col-xs-12">
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
                        <input type="text" name="jenis_kelamin" id="jenis_kelamin" /> 
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
                    <div class="ln_solid"></div>
                    <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="button">Cancel</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<!-- jQuery -->
<script src="<?php echo base_url();?>assets/Backend/vendors/jquery/dist/jquery.min.js"></script>

<script>
$(document).ready(function () {
    $('#myDatepicker2').datetimepicker({
                // format: 'DD-MM-YYYY'
                format: 'DD-MM-YYYY'
    });
    $('.male').on('click', function(){
        //alert('male');
        $(this).toggleClass("btn-primary")
        $('.female').removeClass("btn-primary")
        $('#jenis_kelamin').val('0');
    })
    $('.female').on('click', function(){
        //alert('female');
        $(this).toggleClass("btn-primary")
        $('.male').removeClass("btn-primary")
        $('#jenis_kelamin').val('1')
    })
});
</script>