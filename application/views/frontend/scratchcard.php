<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/frontend/images/favicon.ico">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="<?php echo base_url() ?>assets/frontend/css/style.css" rel="stylesheet">
<title>Igloo Quanta - Consumer Promotion 2023</title>
<style>
  #myform{
     visibility: hidden;
  }  
</style>
</head>

<body class="site_registration">
    
    
    <div class="popup-container">
        <div class="popup-box">
          
          <p>You have successfully created your account, please check your registered email id for <strong>username</strong> and <strong>password</strong>.</p>
          
          <p>Please scratch you card and add your point</p>
          <button class="close-button">Close</button>
        </div>
  </div>
  
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
      <div class="col-lg-4 col-12 productLeft d-flex align-items-center justify-content-center unit-left animated bounceInUp"> <img src="<?php echo base_url() ?>assets/frontend/images/unit-left.png" alt=""> </div>
      <div class="col-lg-4 col-12 position-relative form-unit custom-top animated bounceInUp">




          <?php if($checkPointAdded != true) { ?>
          <div class="subHead">Scratch and win points!</div>
          <div class="scratch-card-wrapper">
              <div class="scratch-card-container" id="js-container">
                <canvas class="canvas" id="js-canvas" width="300" height="300"></canvas>
            <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
              <?php echo $this->session->flashdata('success'); 
                          $this->session->unset_userdata('success');
              ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-danger alert-dismissible" role="alert">
              <button type="button" class="btn-close close" data-dismiss="alert" aria-label="Close"></button>
              <?php echo $this->session->flashdata('error'); 
                    $this->session->unset_userdata('error');
              ?>
            </div>
        <?php endif; ?>
            <?php       
            $attributes = array('id' => 'myform','class' =>'form');
            echo form_open('scratchcard/registration',$attributes); ?>
                <div class="congrats">
                    <!--<img src="<?php echo base_url() ?>assets/frontend/images/congrates-text.png" alt="">-->
                    <span class="congrats">CONGRATS</span>
                </div>
                <h2>You've won</h2>
                <h1><?php echo $point ?></h1>
                <input type="hidden" id="cardPoint" name="cardPoint" value="<?php echo $point ?>">
                <h2>Points</h2>
                <div>
                    <input type="submit" value="Add points" class="redeembtn2">
                </div>
            <?php echo form_close();?>
            </div>
          </div>
        <?php }
        else {
        ?>
        
       <h1>You have already redeem this point </h1>
       
       <h2>Please Login for view points </h2>
        
        <?php } ?>
        
        <div class="alert alert-success d-flex align-items-center alert-dismissible mt-4" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
</svg>
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div class="text-start">
   You have successfully created your account, please check your registered email id for username and password.<button type="button" class="closebtn-custom" data-bs-dismiss="alert" aria-label="Close">X</button>
  </div>
</div>
      </div>
    <div class="col-lg-4 col-12 d-flex align-items-center justify-content-end handset animated bounceInUp"> <img src="<?php echo base_url() ?>assets/frontend/images/handset.png" alt=""> </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/jquery-3.5.1.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/app.js"></script>
<script>
    $(document).ready(function () {

    $('.js-nav-btn').click(function(){
    		$('.js-nav-btn').toggleClass('is-menu-active');
    		$('body').toggleClass('inactive');
    		$('#nav-list-mobile').toggleClass('opened');
	});
    
});
</script>
<script>
    $(document).ready(function() {
      $('.popup-container').fadeIn(); // Show the popup container
      
      // Close the popup when the close button is clicked
      $('.close-button').click(function() {
        $('.popup-container').fadeOut(); // Hide the popup container
      });
    });
  </script>
</body>
</html>
