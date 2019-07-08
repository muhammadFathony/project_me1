
    <!-- NProgress -->
    <link href="<?php echo base_url();?>assets/backend/vendors/nprogress/nprogress.css" rel="stylesheet">
   
    <!-- Ion.RangeSlider -->
    <link href="<?php echo base_url();?>assets/backend/vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/backend/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/backend/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
   
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url();?>assets/backend/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo base_url();?>assets/backend/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/backend/vendors/cropper/dist/cropper.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/backend/build/css/custom.min.css" rel="stylesheet">

 
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">

              <div class="title_right">
                <div class="notif">
                <?php echo $this->session->flashdata('errorMessage');?>
                <?php echo $this->session->flashdata('succesMessage');?>
                </div> 
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Barang <small>Cek kembali Jumlah dan nama suplier &nbsp;&nbsp;</small></h2> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suplier"><span class="fa fa-plus">&nbsp;&nbsp;</span>Tambah Suplier</button>
                    
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

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url('Register/tambah')?>">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nama Suplier" name="suplier">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess3" placeholder="Alamat" name="alamat">
                        <span class="fa fa-truck form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email" name="email">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess5" placeholder="Telepon" name="telepon">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>

                       <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                        <label class="control-label">Nama Barang :</label>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nama Barang" name="nm_barang">
                        <span class="fa fa-cube form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label  class="control-label">Jumlah Barang :</label>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Jumlah Barang" name="jumlah">
                        <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <!-- <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback xdisplay_inputx">
                        <label class="control-label">Tanggal</label>              
                        <input type="text" class="form-control has-feedback-left" id="single_cal1" placeholder="Tanggal" aria-describedby="inputSuccess2Status" name="tanggal">
                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                      </div> -->

                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label class="control-label">Kategori Barang :</label>
                        <select class="form-control has-feedback-left" name="kategori">
                          <option value=""></option>}
                          option
                          <?php $opsi = $this->db->get('kategori');
                          foreach ($opsi->result() as $key) { ?>
                            <option value="Kategori <?=$key->kategori?>">Kategori <?=$key->kategori?></option>
                          <?php }?>                         
                        </select>
                        <span class="fa fa-tasks form-control-feedback left" aria-hidden="true"></span>
                      </div>

                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
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
        <!-- modal add suplier -->
                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="suplier">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                           <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url('Register/tambah_suplier')?>">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nama Suplier" name="suplier">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess3" placeholder="Alamat" name="alamat">
                        <span class="fa fa-truck form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email" name="email">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess5" placeholder="Telepon" name="telepon">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                      </div>

                    </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                          <a href="<?php echo base_url('Register/tambah_suplier')?>" title="">kkkk</a>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- end of modal add suplier -->


    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/Backend/vendors/jquery/dist/jquery.min.js"></script>
    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo base_url();?>assets/Backend/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
  
    <!-- jquery.inputmask -->
    <script src="<?php echo base_url();?>assets/backend/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="<?php echo base_url();?>assets/backend/vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- Cropper -->
    <script src="<?php echo base_url();?>assets/backend/vendors/cropper/dist/cropper.min.js"></script>


 <!-- PNotify -->
  
<script type="text/javascript">
        $(document).ready(function(){
            $( "#nama" ).autocomplete({
              source: "<?php echo base_url('Register/getAutoComplete/?');?>"
            });
        });
    </script>

