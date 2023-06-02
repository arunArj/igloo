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
        <a href="<?php echo base_url() ?>dashboard" class="nav-link">
          Redeem Code
        </a>
      </li>
    <li>
        <a href="<?php echo base_url() ?>dashboard/redeemItem" class="nav-link active">
        Claim Prize
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
<?php
    $error = $this->session->flashdata('error');
    if($error){?>
        <div class="row g-5 mb-4">
            <div class="col-12 p-4 custom-box pointsbig">  
               <p><?php echo $error; ?>  </p>
            </div>
        </div>           
<?php } ?>
<?php
    $success = $this->session->flashdata('success');
    if($success){?>
        <div class="row g-5 mb-4">
            <div class="col-12 p-4 custom-box pointsbig">  
               <p><?php echo $success; ?>  </p>
            </div>
        </div>           
<?php } ?>
            <div class="row">
                <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                    <div class="card bgred">
                        <div class="card-body">
                            <img src="<?php echo base_url();?>assets/frontend/dashboard/images/point-5000.png" alt="" class="img-fluid">
                            <a href="<?php echo base_url() ?>dashboard/redeemPrize?prize=iphone"><button class="btn btnsubmit-red">Redeem Prize</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                    <div class="card bgred">
                        <div class="card-body">
                            <img src="<?php echo base_url();?>assets/frontend/dashboard/images/point-2000.png" alt="" class="img-fluid">
                    <a href="<?php echo base_url() ?>dashboard/redeemPrize?prize=playstation"><button class="btn btnsubmit-red">Redeem Prize</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                    <div class="card bgred">
                        <div class="card-body">
                            <img src="<?php echo base_url();?>assets/frontend/dashboard/images/point-1000.png" alt="" class="img-fluid">
                              <a href="<?php echo base_url() ?>dashboard/redeemPrize?prize=airpods"><button class="btn btnsubmit-red" id="redirectBtn">Redeem Prize</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-lg-5 mt-0">
                <div class="col-12">
                    <div class="card custom-box">
                        <div class="card-header boxTitle">Redeemed list</div>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-4 text-center boxSubtitle">
                                Prize
                            </div>
                            <div class="col-4 text-center boxSubtitle">
                                Points Spend
                            </div>
                            <div class="col-4 text-center boxSubtitle">
                                Status
                            </div>
                            </div>
                            <?php if($winner)
                            foreach($winner as $item)
                            {
                                if($item['prize']==1){$image ="iphone-single.png";$spend =  5000;}else if($item['prize']==2){ $image = "playstation-single.png";$spend = 2000; }else{$image = 'airpod-single.png';$spend =  1000;}
                                ?>
                                <div class="row">
                                    <div class="col-4 text-center boxContent">
                                        <img src="<?php echo base_url().'assets/frontend/dashboard/images/'.$image;?>" alt="" width="150">
                                    </div>
                                    <div class="col-4 text-center boxContent">
                                        <?php  echo $spend; ?>
                                    </div>
                                    <div class="col-4 text-center boxContent">
                                        <?php  if( $item['status']=='0'){echo 'pending';}if($item['status']=='1'){echo 'approved';}?>
                                    </div>
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
        $('#redirectBtn').click(function(e) {
            e.preventDefault(); // Prevent the default redirect behavior

            // Display the confirmation popup
            if (confirm("Are you sure you want to redirect?")) {
                // If user clicks 'OK' in the confirmation popup, perform the redirect
                window.location.href = "your-redirect-url";
            }
        });
    });
</script>
</body>
</html>
