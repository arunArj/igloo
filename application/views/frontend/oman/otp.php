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
/* Styles for the popup */
.popup-content {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0,0,0,0.2);
    padding: 20px;
    border: 1px solid #ccc;
    width: 100%;
    height: 100%;
    z-index: 1000;
    text-align: center;
}
.popup-wrap {
    width: 500px;
    height: auto;
    margin: 0 auto;
    padding: 50px;
    background-color: #fff;
    border: 0;
    border-radius: 5px;
    position: relative;
    top: 50%;
    transform: translateY(-50%);
}
.popup-wrap p{
    font-size: 18px;
    margin: 0;
}

/* Styles for the close button */
.close-btn {
    position: absolute;
    top: 5px;
    right: 5px;
    cursor: pointer;
    font-size: 32px;
    line-height: normal;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #000;
    border-radius: 50px;
    margin: 0;
    padding: 0;
}
@media only screen and (max-width: 768px), only screen and (max-device-width: 768px) {
    .popup-wrap{
        width: 80%;
    }
}
  </style>
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
      <div class="col-lg-4 col-12 productLeft d-flex align-items-center justify-content-center unit-left animated bounceInUp"> <img src="<?php echo base_url() ?>assets/frontend/images/unit-left.png" alt=""> </div>
      <div class="col-lg-4 col-12 position-relative form-unit custom-top animated bounceInUp">
          <div class="scanforfunlogo pb-3 animated pulse infinite"><img src="<?php echo base_url() ?>assets/frontend/images/scanforfun.png" alt=""></div>
            <div class="opt-wrapper">
                <p>Please enter verification code sent to your registered email id</p>
                <div class="opt-container">
                    <?php if($this->session->flashdata('error')) { echo   '<span class="otperror">'.$this->session->flashdata("error").'</span>';}  ?>
                    <?php       
                    $attributes = array('id' => 'myform');
                    echo form_open('oman/verify_otp',$attributes); ?>
                        <input type="text" class="form-control" name="otp" id="otp" placeholder="Enter OTP">
                        <button class="border-gradient">
                        Verify
                        </button>
                    <?php echo form_close();?>
                    <div class="d-flex align-items-center justify-content-center">
                            <div class="timer-wrap"><span id="timer"></span></div>
                            <a id="otpresend" href="<?php echo base_url()?>/index/resendOtp" disabled="disabled" class="resendOtp">Resend OTP</a>
                            
                           
                    </div>
                </div>
            </div>
      </div>
    <div class="col-lg-4 col-12 d-flex align-items-center justify-content-end handset animated bounceInUp"> <img src="<?php echo base_url() ?>assets/frontend/images/handset.png" alt=""> </div>
    </div>
  </div>
</div>
 <!--popup after 15 sec if the -->
  <div class="popup-content" id="myPopup">
    <div class="popup-wrap">
        <span class="close-btn">&times;</span>
        <!--<h2>Popup Content</h2>-->
        <p>If you have not received the OTP, please double-check the email address you entered in the form.</p>
    </div>
  </div>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
    
// document.getElementById('timer').innerHTML =
// 05 + ":" + 00;
// startTimer();

function startTimer() {
var presentTime = document.getElementById('timer').innerHTML;
var timeArray = presentTime.split(/[:]+/);
var m = timeArray[0];
var s = checkSecond((timeArray[1] - 1));
if(s==59){m=m-1}
if(m<0){
      var url = '<?php echo base_url();?>index/otp'; 
      document.getElementById('timer').innerHTML ="";
        document.getElementById("otpresend").href = url;
return
}

document.getElementById('timer').innerHTML =
m + ":" + s;
//console.log(m)
setTimeout(startTimer, 1000);

}

function checkSecond(sec) {
if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
if (sec < 0) {sec = "59"};
return sec;
}
    </script>
<script>
    $(document).ready(function(){
        
        $('.js-nav-btn').click(function(){
            $('.js-nav-btn').toggleClass('is-menu-active');
            $('body').toggleClass('inactive');
            $('#nav-list-mobile').toggleClass('opened');
        });
        
      var resendTimer = '<?php echo $this->session->userdata('timer')?>'
      // Get the current time
        var currentTime = new Date();
        var targetDate = new Date(resendTimer);
        if(! resendTimer){
             $('#timer').hide()
             return;
        }
 console.log('td'+targetDate)
 console.log(currentTime)
        // Calculate the time difference in milliseconds
        var timeDifference = currentTime - targetDate;
        console.log('t'+timeDifference)
        var minutes = Math.floor(timeDifference / (1000 * 60)) % 60; // Calculate the number of minutes
        console.log('min'+minutes)
        if(minutes>5)
        {
            return true;
        }
                var seconds = Math.floor((timeDifference / 1000) % 60);
         console.log('sec'+seconds)
                seconds = 60-seconds
                var formattedTime = 4-minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
                console.log(formattedTime)
           $('.resendOtp').attr("href","#");
            document.getElementById('timer').innerHTML =
            formattedTime;
           startTimer();
        
    });
</script> 
<script>
    $(document).ready(function() {
      // Function to show the popup
      function showPopup() {
        $('#myPopup').fadeIn();
      }

      // Set a timeout of 30 seconds - 30000
      setTimeout(showPopup, 15000);

      // Close button event handler
      $('.close-btn').on('click', function() {
        $('#myPopup').fadeOut();
      });
    });
  </script>
    
</body>
</html>
