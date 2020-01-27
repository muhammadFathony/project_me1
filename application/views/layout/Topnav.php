    <!-- top navigation -->
    <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <!-- setting profil -->
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php ($this->session->userdata('log_in')) ?>
                    <img src="<?php echo base_url();?>assets/img/book.png" alt=""><?php echo $this->session->userdata('nama_user') ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                   
                    <?php if ($this->session->userdata('level')=='administrator' || $this->session->userdata('level')=='admin') {?>    
                    <li><a href="<?php echo base_url('Userlog'); ?>"><i class="fa fa-users pull-right"></i>Users</a></li>
                    <?php }?>
                    <li><a href="<?php echo base_url('login/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
                <!-- setting profil -->
                <li role="presentation" class="dropdown hide">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-plus-square-o"></i>
                    <span class="badge bg-green" id="total_masuk"></span>
                  </a>
                  <!-- looping -->
                  <ul id="list_masuk" class="dropdown-menu list-unstyled msg_list" role="menu">
                    
                  </ul>
                  <!-- looping -->
                </li>
                <li role="presentation" class="dropdown hide">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-minus-square-o"></i>
                    <span class="badge bg-green" id="total_permintaan"></span>
                  </a>
                  <!-- looping -->
                  <ul id="list_keluar" class="dropdown-menu list-unstyled msg_list" role="menu">
                    
                  </ul>
                  <!-- looping -->
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->