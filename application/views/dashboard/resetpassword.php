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
    #otpF{
        display: none;
    }
</style>
</head>

<body>
<div class="wrapper">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-between p-3 loginheader"> 
  <img src="<?php echo base_url() ?>assets/frontend/dashboard/images/logo.png" alt="" class="img-fluid" style="max-height: 100%"> 
  <img src="<?php echo base_url() ?>assets/frontend/dashboard/images/scanforfun.png" class="img-fluid" alt="" style="max-height: 100%; max-width: 100%;"> 
    <button class="btn btn--hamburger navbar__hamburger js-nav-btn formobilehamburger">
      <span class="btn--hamburger__line top"></span> 
      <span class="btn--hamburger__line mid"></span> 
      <span class="btn--hamburger__line bottom"></span>
    </button>
  </header>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-11 m-auto">
         
        <?php  echo form_open('consumer_auth/reset_password'); ?>
        <!-- <form action="<?php echo base_url('consumer_auth/reset_password') ?>" method="post"> -->
          <div class="row loginwrap">
              <div class="boxTitle pb-4 text-center">Reset Password</div>
            <div class="col-12 pb-4">
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" placeholder="Email ID" autocomplete="off">
              <?php echo form_error('email'); ?>
              <?php if(!empty($errors)) {
                  echo $errors;
                } 
                if(!empty($success)) { echo $success; } 
                
                ?>
            </div>
            <div class="col-12 pb-4" id="otpF">
              <input type="text" class="form-control" id="otp" name="otp" placeholder="OTP" autocomplete="off">
              <?php if(!empty($errors_otp)) {
                  echo $errors_otp;
                } 
                //if(!empty($success)) { echo $success; } 
                
                ?>
            </div>
            <div class="col-12">
                <button type="submit">Send</button>
            </div>
            <div class="col-12 text-center pt-4">
                  <a href="<?php echo base_url('consumer_auth/login') ?>" class="forgotpass">Go to login</a>
            </div>
          </div>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/dashboard/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        
        var inputValue = $('#email').val();
        
        if(inputValue != "")
        {
            //alert(inputValue);
            $('#otpF').css('display','block');
        }
        
    });
</script>
</body>
</html>
