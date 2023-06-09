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
<div class="popup-container">
    <div class="popup-box">
      <?php
                    $error = $this->session->flashdata('error');
                    if($error){?>
                            <div>  
                               <?php echo $error; ?>
                            </div>
                <?php } ?>
                <?php
                    $success = $this->session->flashdata('success');
                    if($success){?>
                        
                            <div>  
                             <?php echo $success; ?>
                            </div>
         
                <?php } ?>
                <span class="close-button">Close</span>
    </div>
  </div>
<div class="wrapper">
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-between p-3">
<img src="<?php echo base_url();?>assets/frontend/dashboard/images/logo.png" alt="" class="img-fluid" style="max-height: 100%">
<img src="<?php echo base_url();?>assets/frontend/dashboard/images/scanforfun.png" class="img-fluid" alt="" style="max-height: 100%; max-width: 100%;">
<button class="btn-ham btn--hamburger navbar__hamburger js-nav-btn formobilehamburger">
      <span class="btn--hamburger__line top"></span> 
      <span class="btn--hamburger__line mid"></span> 
      <span class="btn--hamburger__line bottom"></span>
</button>
</header>
    <div id="nav-menu" class="nav-left">
        <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="<?php echo base_url() ?>dashboard/profile" class="nav-link" aria-current="page">
          Profile
        </a>
      </li>
      <li>
        <a href="<?php echo base_url() ?>dashboard" class="nav-link active">
          Redeem Code
        </a>
      </li>
    <li>
        <a href="<?php echo base_url() ?>dashboard/redeemItem" class="nav-link">
        Claim Now
        </a>
    </li>
        <li>
        <a href="<?php echo base_url() ?>consumer_auth/logout" class="nav-link">
        Logout
        </a>
        </li>

    </ul>
    </div>  
    <div class="content-right">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-lg-5 col-12">
                        <div class="card custom-box">
                            <div class="card-body point-display"><span><?php echo $balancePoints?$balancePoints:0;  ?></span> Your total points</div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-12 mb-4">
                    <div class="card custom-box">
                        <div class="card-header boxTitle">Add more unique codes</div>
                        <div class="card-body">
                            <?php       
                        $attributes = array('id' => 'myform');
                        echo form_open('dashboard/store',$attributes); ?>
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" name="code" class="form-control" id="" placeholder="Enter code">
                               <?php echo form_error('code'); ?>
                                </div>
                                <div class="col-4">
                                    <button class="btn btnsubmit" type="submit">Add</button>
                                </div>
                            </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
                </div>
            <div class="row">
                <div class="col-12">
                    <div class="card custom-box">
                        <div class="card-body">
                            <div class="row">
                            <div class="col-6 text-center boxSubtitle">
                                Codes
                            </div>
                            <div class="col-6 text-center boxSubtitle">
                                Points
                            </div>
                            </div>
                            <?php 
                    if($points)
                    foreach($points as $item){
                    ?>
                            <div class="row">
                                <div class="col-6 text-center boxContent"><?php echo $item['code']; ?></div>
                                <div class="col-6 text-center boxContent"><?php echo $item['status']? $item['point']:'<a href=" '.base_url().'dashboard/scratchcard?code='.$item['code'].'" class="redeembtn">Redeem Point</a>'; ?></div>
                            </div>
                    <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
   
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/dashboard/js/jquery.min.js"></script>
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
<script>
    $(document).ready(function() {
      <?php if (isset($_SESSION['error']) OR isset($_SESSION['success'])): ?>
        $(window).on('load', function() {
          $('.popup-container').show();
        });
        <?php //unset($_SESSION['success']); ?>
      <?php endif; ?>
      
      $('.close-button').click(function() {
        $('.popup-container').fadeOut(); 
      });
    });
  </script>
</body>
</html>
