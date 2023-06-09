<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/frontend/images/favicon.ico">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="<?php echo base_url() ?>assets/frontend/css/style.css" rel="stylesheet">
<title>Igloo Quanta - Consumer Promotion 2023</title>
</head>

<body class="site_registration">
<div class="wrapper">
  <div class="container-fluid">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 headerlarge"> 
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none logo-wrap"> 
            <img class="logo" src="<?php echo base_url() ?>assets/frontend/images/logo.png"  alt="logo"> 
        </a>
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="<?php echo base_url() ?>" class="nav-link" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="<?php echo base_url() ?>login" class="nav-link">Redeem Points</a></li>
        <li class="nav-item"><a href="<?php echo base_url() ?>winners" class="nav-link">Winners</a></li>
        <li class="nav-item"><a href="#" class="nav-link">العربية</a></li>
      </ul>
    </header>
    <header class="headerMobile">
                <a href="/" class="logo"><img src="<?php echo base_url() ?>assets/frontend/images/logo.png" alt="logo" class="img-fluid"></a>
                    <div id="toggle">
                        <button class="btn btn--hamburger navbar__hamburger js-nav-btn formobilehamburger">
                            <span class="btn--hamburger__line top"></span> 
                            <span class="btn--hamburger__line mid"></span> 
                            <span class="btn--hamburger__line bottom"></span>
                        </button>
                    </div>
                        
                    
            </header>
            <div id="nav-list-mobile">
                <ul class="nav nav-pills">
                    <li><a href="<?php echo base_url() ?>">Home</a></li>
                    <li><a href="<?php echo base_url() ?>login" class="">Redeem Points</a></li>
                    <li><a href="<?php echo base_url() ?>winners" class="">Winners</a></li>
                    <li><a href="javascript:void(0);" class="">العربية</a></li>
                </ul>
            </div>
  </div>

  <div class="container-fluid">
    <div class="row text-center">
      <div class="col-lg-3 col-12 productLeft d-flex align-items-center justify-content-center unit-left animated bounceInUp"> <img src="<?php echo base_url() ?>assets/frontend/images/unit-left.png" alt=""> </div>
      <div class="col-lg-6 col-12 position-relative form-unit custom-top animated bounceInUp">
          <div class="row">
              <div class="col-12 leaderboard">
                  <h1>Leaderboard</h1>
              </div>
          </div>
          <div class="row">
              <div class="col-12 winner-content">
                  <div class="card winner-wrap">
                      <div class="card-header">
                          <div>SL</div>
                          <div>Name</div>
                          <div>Prize</div>
                      </div>
                      <div class="card-body">
                        <?php
                         
                        if(!empty($winner))
                        { 
                           
                            foreach($winner as $key => $data){
                               
                                switch ($data['prize']) {
                                    case 1:
                                        $imppath = "assets/frontend/images/iphone-single.png";
                                        break;
                                    case 2:
                                        $imppath = "assets/frontend/images/playstation-single.png";
                                        break;
                                    case 3:
                                        $imppath = "assets/frontend/images/airpod-single.png";
                                        break;
                                }
                                
                        ?>
                              <div class="winnerdetails">
                                  <div><?php echo ++$key;?></div>
                                  <div><?php echo  $this->encryption->decrypt($data['name']); ?></div>
                                  
                                  <div><img src="<?php echo base_url().$imppath ?>"></div>
                              </div>
                            <?php } ?>
                              
                        <?php }
                        else { ?>
                            <div>
                                      <div><b>To be Announced soon</b></div>
                            </div>
                        <?php } ?>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    <div class="col-lg-3 col-12 d-flex align-items-center justify-content-end handset animated bounceInUp"> <img src="<?php echo base_url() ?>assets/frontend/images/handset.png" alt=""> </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        $('.js-nav-btn').click(function(){
    		$('.js-nav-btn').toggleClass('is-menu-active');
    		$('body').toggleClass('inactive');
    		$('#nav-list-mobile').toggleClass('opened');
	});
    });
</script>    
    
</body>
</html>
