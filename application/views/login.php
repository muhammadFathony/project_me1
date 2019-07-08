<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url();?>assets/img/newrealJansen.png" type="image/ico" />

    <title>Welcome to JI</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/Backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assets/Backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>assets/Backend/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url();?>assets/Backend/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/Backend/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo base_url('login/login_validation');?>" method="post">
              <h1>Login Form</h1>
              <?php echo $this->session->flashdata('errorMessage');?>
              <?php echo $this->session->flashdata('successMessage');?>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username" id="username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" id="password" />
                
              </div>
              <div style="">
                <button type="submit" name="login"  class="btn btn-dafault submit">Masuk ?</button>
                <!-- <a class="btn btn-default submit" href="index.html">Log in</a> -->
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Anggota Baru ?
                  <a href="#signup" class="to_register"> Buat Akun </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-cubes"></i> Good Inventory!</h1>
                  <p>©2018 Muhammad Fathony. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="<?php echo base_url('login/register');?>" method="post">
              <h1>Buat Akun</h1>
              
              <div>
                <input type="text" class="form-control" placeholder="Username" required="min_length[5]" name="username" />
              </div>
              <div>
                <input type="hidden" class="form-control" placeholder="Level" required="" name="level" value="user" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
                <!-- <a class="btn btn-default submit" href="index.html">Submit</a> -->
                <button type="submit" class="btn btn-primary btn-block border-radius-6">Buat Akun Baru</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Sudah punya akun ?
                  <a href="#signin" class="to_register"> Masuk </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-cubes"></i> Good Inventory!</h1>
                  <p>©2018 Muhammad Fathony. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
