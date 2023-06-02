<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/frontend/dashboard/images/favicon.ico">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="<?php echo base_url();?>assets/frontend/dashboard/css/style.css" rel="stylesheet">
<title>Igloo Quanta - Consumer Promotion 2023</title>
</head>

<body>
<div class="wrapper">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-between p-3"> <img src="<?php echo base_url();?>assets/frontend/dashboard/images/logo.png" alt="" class="img-fluid" style="max-height: 100%"> <img src="<?php echo base_url();?>assets/frontend/dashboard/images/scanforfun.png" class="img-fluid" alt="" style="max-height: 100%; max-width: 100%;">
    <button class="btn-ham btn--hamburger navbar__hamburger js-nav-btn formobilehamburger"> <span class="btn--hamburger__line top"></span> <span class="btn--hamburger__line mid"></span> <span class="btn--hamburger__line bottom"></span> </button>
  </header>
  <div id="nav-menu" class="nav-left">
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item"> <a href="<?php echo base_url() ?>dashboard/profile" class="nav-link" aria-current="page"> Profile </a> </li>
      <li> <a href="<?php echo base_url() ?>dashboard" class="nav-link"> Redeem Code </a> </li>
      <li> <a href="<?php echo base_url() ?>dashboard/redeemItem" class="nav-link"> Claim Prize </a> </li>
      <li> <a href="<?php echo base_url() ?>consumer_auth/logout" class="nav-link"> Logout </a> </li>
    </ul>
  </div>
  <div class="content-right">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card custom-box">
            <div class="card-header boxTitle"> Scratch and win points! </div>
            <div class="card-body">
              <div class="scratch-card-container" id="js-container">
                <?php  
                    if($point){?>
                <canvas class="canvas" id="js-canvas" width="300" height="300"></canvas>
                <?php  

                        $attributes = array('id' => 'myform');
                        echo form_open('dashboard/claimPrize',$attributes); ?>
                <div class="congrats"><img src="<?php echo base_url();?>assets/frontend/images/congrates-text.png" alt=""></div>
                <h2>You've won</h2>
                <h1><?php echo $point->point ?></h1>
                <h2>Points</h2>
                <div>
                  <input type="hidden"  value="<?php echo $point->code;?>" name="code">
                  <input type="submit" value="Redeem points" class="redeembtn">
                </div>
                <?php echo form_close();
                    }
                    else{
                    ?>
                <div>
                  <h2>no codes available!!</h2>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/dashboard/js/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/dashboard/js/app.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
<script>
    $(document).ready(function(){
        $('.js-nav-btn').click(function(){
            $('.js-nav-btn').toggleClass('is-menu-active');
            $('body').toggleClass('inactive');
            $('#nav-menu').toggleClass('nav-menu-active');
        });
    });
</script>
</body>
</html>
