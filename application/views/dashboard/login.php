<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/frontend/dashboard/images/favicon.ico">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="<?php echo base_url() ?>assets/frontend/dashboard/css/style.css" rel="stylesheet">
<title>Igloo Quanta - Consumer Promotion 2023</title>
<style>
.wrapper, body, html {height: 100%}
</style>
</head>

<body>
<div class="wrapper">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-between p-3 loginheader"> 
  <img src="<?php echo base_url() ?>assets/frontend/dashboard/images/logo.png" alt="" class="img-fluid" style="max-height: 100%"> 
  <img src="<?php echo base_url() ?>assets/frontend/dashboard/images/scanforfun.png" class="img-fluid" alt="" style="max-height: 100%; max-width: 100%;"> 
  </header>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-11 m-auto">
        <?php  echo form_open('consumer_auth/login'); ?>
        <!-- <form action="<?php echo base_url('consumer_auth/login') ?>" method="post"> -->
          <div class="row loginwrap">
              <div class="boxTitle pb-4 text-center">Log in</div>
            <div class="col-12 pb-4">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email ID" autocomplete="off">
              <?php echo form_error('email'); ?>
              <?php if(!empty($errors)) {
                  echo $errors;
                } ?>
            </div>
            <div class="col-12 pb-4">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
              <?php echo form_error('password'); ?>
            </div>
              <div class="col-12">
              <button type="submit">Log in</button>
            </div>
              <div class="col-12 text-center pt-4">
                  <a href="<?php echo base_url('consumer_auth/reset_password') ?>" class="forgotpass">Forgot Password?</a>
              </div>
          </div>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
