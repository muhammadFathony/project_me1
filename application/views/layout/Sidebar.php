       
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url('');?>" class="site_title"><div class=""></div> <span style="
                font-family: monospace; font-size: inherit;">Pembelajaran Warna</span></a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url();?>assets/img/book.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <?php ($this->session->userdata('log_in')) ?>
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('nama_user').' <br> ( '. $this->session->userdata('level').' )'?></h2>

              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <?php
                    $location = $this->uri->segment(1); 
                  ?>
                  <li><a><i class="fa fa-info-circle "></i> Beranda <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a class="" href="<?php echo base_url('Home.html');?>">Informasi</a></li>
                    </ul>
                  </li>
                  <?php if ($this->session->userdata('level')=='admin' || $this->session->userdata('level')=='user' || $this->session->userdata('level')=='guru') {?>
                    <li><a><i class="fa fa-cubes"></i> Siswa <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?php echo base_url('index.php/siswa/daftar_siswa');?>">Lihat Daftar Siswa</a></li>
                        <?php if ($this->session->userdata('level')=='admin' || $this->session->userdata('level')=='guru') {  
                        ?>
                        <li><a href="<?php echo base_url('index.php/Siswa');?>">Tambah Data Siswa</a></li>
                        <?php }?>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-bullhorn "></i> Penilaian <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a class="" href="<?php echo base_url('Home.html');?>">Penilaian
                      </a></li>
                    </ul>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <div class="kosong"></div>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <div class="kosong"></div>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Refresh" href="<?php echo base_url()?>">
                <!-- <div class="kosong"></div> -->
                <span class="fa fa-institution" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('index.php/login/logout');?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <style type="text/css">
        .kosong {
            clear: both;
            display: block;
            padding: 12px;
        }
        </style>