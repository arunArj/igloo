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
        <a href="<?php echo base_url() ?>dashboard" class="nav-link">
          Redeem Code
        </a>
      </li>
    <li>
        <a href="<?php echo base_url() ?>dashboard/redeemItem" class="nav-link active">
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
                    
            <div class="row pointsection">
                <div class="col-sm-4 col-12 mb-4 mb-lg-0 text-center">
                    <div class="card bgred <?php if($balancePoints >= 5000) { echo "";  } else { echo "noactive"; } ?>">
                        <div class="card-body">
                            <img src="<?php echo base_url();?>assets/frontend/dashboard/images/point-5000.png" alt="" class="img-fluid">
                            
                            <a class="redirectBtn btn btnsubmit-red" href="<?php echo base_url() ?>dashboard/redeemPrize?prize=iphone">Redeem Now!</a>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-12 mb-4 mb-lg-0 text-center">
                    <div class="card bgred <?php if($balancePoints >= 2000) { echo "";  } else{ echo "noactive"; }  ?>">
                        <div class="card-body">
                            <img src="<?php echo base_url();?>assets/frontend/dashboard/images/point-2000.png" alt="" class="img-fluid">
                    <a class="redirectBtn btn btnsubmit-red" href="<?php echo base_url() ?>dashboard/redeemPrize?prize=playstation">Redeem Now!</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-12 mb-4 mb-lg-0 text-center">
                    <div class="card bgred <?php if($balancePoints >= 1000) { echo "";  } else{ echo "noactive"; } ?>">
                        <div class="card-body">
                            <img src="<?php echo base_url();?>assets/frontend/dashboard/images/point-1000.png" alt="" class="img-fluid">
                              <a class="redirectBtn btn btnsubmit-red" href="<?php echo base_url() ?>dashboard/redeemPrize?prize=airpods">Redeem Now!</a>
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
                                        <img src="<?php echo base_url().'assets/frontend/dashboard/images/'.$image;?>" alt="" class="img-fluid">
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
<div id="confirmationPopup" >
    <div class="confirmation-content">
        <h2>Confirmation</h2>
        <p>Are you sure you want redeem your point</p>
        <button id="confirmRedirectBtn" class="btn btnsubmit">Yes</button>
        <button id="cancelRedirectBtn" class="btn btnsubmit">No</button>
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
    $(function() {
        var href ="";
        $('.redirectBtn').click(function(e) {
           
            e.preventDefault(); // Prevent the default redirect behavior
             href = $(this).attr('href');
            // Show the confirmation popup
            $('#confirmationPopup').fadeIn();
        });

        $('#confirmRedirectBtn').click(function() {
            
            var href2 = event.href2;
            // Perform the redirect
            window.location.href = href;
        });

        $('#cancelRedirectBtn').click(function() {
            // Hide the confirmation popup
            $('#confirmationPopup').fadeOut();
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
