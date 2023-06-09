<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/frontend/images/favicon.ico">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="<?php echo base_url() ?>assets/frontend/oman/css/style.css" rel="stylesheet">
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
        <!--<li class="nav-item"><a href="<?php echo base_url() ?>login" class="nav-link">Redeem Points</a></li>-->
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
      <div class="col-lg-4 col-12 productLeft"> <img src="<?php echo base_url() ?>assets/frontend/images/unit-left.png" alt=""> </div>
      <div class="col-lg-4 col-12 position-relative form-unit custom-top animated bounceInUp">
          <div class="scanforfunlogo pb-3 animated pulse infinite"><img src="<?php echo base_url() ?>assets/frontend/images/scanforfun.png" alt=""></div>
          <div class="col-12  d-md-block d-lg-none promo-unit-registration-mobile">
              <img src="<?php echo base_url() ?>assets/frontend/oman/images/screen02mobile.png" alt="" class="img-fluid">
          </div>
            <div class="steps pb-3 position-relative">
              <img src="<?php echo base_url() ?>assets/frontend/images/steps.png" alt="">
              <img src="<?php echo base_url() ?>assets/frontend/images/code-pointer.png" class="codepointer" alt="">
            </div>
        <div class="py-3 text-goforit"> <img src="<?php echo base_url() ?>assets/frontend/images/goforit.png" alt="GO FOR IT!"> </div>
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
        $attributes = array('id' => 'myform');
        echo form_open('oman/registration_submit/en',$attributes); ?>
                <?php if(form_error('email')){ ?>
            <div id="confirmationPopup">
                <div class="confirmation-content">
                    <span id="cancelRedirectBtn" class="close-btn">&times;</span>
                    <h2><?php //echo form_error('email'); ?></h2>
                    <p>It appears that you are already a registered user. Kindly proceed to log in and update your points.</p>
                    <button id="confirmRedirectBtn">Log In</button>
                </div>
            </div>
            <?php } ?>
          <div class="row g-3">
            <div class="col-12 position-relative">
              <input type="text" id="code" name="code" class="form-control uni-code" placeholder="Enter your code here" required="" autocomplete="off">
              <div id="ip_block" style="background-color:transparent"> <label id='code-error' class='error' for='code'></label></div>
              <?php echo form_error('code'); ?>
              <div id="ajxerror"></div>
              <div id="loader" style="display:none">
                  <div class="spinner-border text-info spinner-border-md" role="status"></div>
              </div>
            </div>
            <div class="col-12 position-relative">
              <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="" autocomplete="off">
                 <?php echo form_error('name'); ?>
            </div>
            <div class="col-12 position-relative">
              <input type="text" class="form-control" id="national_id" name="national_id" placeholder="National ID Number" value="" autocomplete="off">
              <?php echo form_error('national_id'); ?>
            </div>
            <div class="col-sm-6 col-12 position-relative">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" autocomplete="off">
               <?php //echo form_error('email'); 
               ?>
            </div>
            <div class="col-sm-6 col-12 position-relative"> <span class="input-group-text" id="mobile_code">+968</span>
              <input type="tel" class="form-control phone-number" id="phone" name="phone" placeholder="Phone Number" autocomplete="off">
               <?php echo form_error('phone'); ?>
            </div>
            
            <div class="col-12 d-flex align-items-center justify-content-center position-relative">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="tc" id="same-address">
                <label class="form-check-label" for="same-address">I agree to <a href="#" data-bs-toggle="modal" data-bs-target="#termsConditionsmodal">Terms and conditions</a></label>
                <?php echo form_error('tc'); ?>
              </div>
            </div>
            <div class="col-12">
              <!--<button class="submitBtn" type="submit" data-bs-toggle="modal" data-bs-target="#otpModal"></button>-->
               <button class="submitBtn" type="submit">Submit</button>
            </div>
            <div class="col-12 pb-4 validityText">
                <p>Promotion valid from 1<sup>st</sup> June 2023 to 30<sup>th</sup> June 2023</p>
            </div>
          </div>
        <?php echo form_close();?>
      </div>
      <div class="col-12 d-md-block d-lg-none">
          <img src="<?php echo base_url() ?>assets/frontend/images/products-bottom.png" alt="" class="img-fluid">
      </div>
      <div class="col-lg-4 col-12 d-flex align-items-center justify-content-end handset animated bounceInUp"> <img src="<?php echo base_url() ?>assets/frontend/images/handset.png" alt=""> </div>
    </div>
  </div>
</div>

<!-- T&C Modal -->
<div class="modal fade" id="termsConditionsmodal" tabindex="-1" aria-labelledby="tcModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="tcModalLabel">Terms and conditions</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce lorem justo, ullamcorper eget mauris at, venenatis faucibus nisl. Vivamus faucibus odio et metus accumsan sagittis. Cras finibus vulputate neque et venenatis. Pellentesque auctor interdum augue, ut pulvinar massa varius eu. Maecenas aliquet commodo arcu, sed imperdiet turpis condimentum sit amet. Fusce cursus urna pharetra suscipit rhoncus. Etiam imperdiet sem id facilisis dignissim. Aenean blandit a lorem quis accumsan. Vestibulum cursus, sem ac condimentum posuere, dui elit molestie augue, in finibus mauris diam nec nibh. Nunc fermentum semper ultricies. Morbi finibus imperdiet vehicula. Nunc lacinia malesuada dui nec suscipit. Nulla mollis, mi ac elementum placerat, ex lacus accumsan sem, ut ultricies massa ligula in purus. Donec massa nulla, eleifend sed accumsan vitae, luctus a neque.
          
          Nullam dapibus tortor quis ex rutrum, a bibendum leo lacinia. Nam et est quis velit bibendum lacinia. Vivamus at molestie nulla. Fusce quis dictum ligula, sed dapibus dolor. Phasellus vel massa ut ex tincidunt viverra. Fusce tempus in elit a fringilla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec diam nibh, laoreet sit amet neque at, sodales fringilla neque. Mauris a mi a ante venenatis ornare vitae in urna. Vestibulum accumsan luctus felis quis lobortis. Fusce mattis nunc leo, sed rhoncus mauris auctor id.
          
          Nam feugiat ornare molestie. Vivamus non nunc ut leo fringilla feugiat. Etiam nec feugiat dui. Quisque molestie mi consequat iaculis consectetur. Fusce fringilla fringilla nisi in lacinia. Sed blandit, dui sed fringilla efficitur, tellus orci ultricies orci, at suscipit nunc nibh sed mauris. Phasellus in elit eu erat tempor porttitor a quis enim. Nullam posuere leo quis sapien iaculis, id dapibus nulla tincidunt. In faucibus cursus pretium. Quisque quis tellus lectus. In hac habitasse platea dictumst. In tempus purus ante, id posuere dui malesuada in.
          
          Donec auctor mauris in felis laoreet, facilisis tempor urna suscipit. Quisque at leo consectetur, congue lorem at, ullamcorper ligula. Praesent accumsan ultricies magna. Nunc ut urna sed risus varius tincidunt. Donec congue velit id magna porttitor, ac mattis odio consequat. Nunc sodales sapien non viverra blandit. Nunc a tincidunt dolor. Vivamus at maximus est, in tempor nisl. Integer ultricies, augue eget placerat elementum, nisi urna imperdiet nisi, fringilla vehicula est ante vitae sapien. Donec velit libero, tincidunt ac tellus non, porta ornare ipsum. Nulla in molestie quam.</p>
      </div>
    </div>
  </div>
</div>
    
<!-- OTP Modal -->
<div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="otpModalLabel">Terms and conditions</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/jquery-3.5.1.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
</body>
</html>
<script>
$(document).ready(function(){
  var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
  var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
 $('#code').change(function(){
    var code = $('#code').val();
    $('#loader').attr('style', 'visibility:visible');
    var ajaxresponse = "";
    //var ipblock = "";
    var dataJson = { [csrfName]: csrfHash,"code":code};
    if(code != '')
    {
      $.ajax({
        url:"<?php echo base_url(); ?>oman/check_code",
        method:"POST",
        dataType: 'json',
        data: dataJson,
        success:function(response)
        {
          if(response.success === true)
          {
           
            ajaxresponse = "<img src='<?php echo base_url() ?>assets/frontend/images/check.png'>";
            csrfName = response.csrfName;
            csrfHash = response.csrfHash;

          }
          else
          {
            
            
            ajaxresponse = "<img src='<?php echo base_url() ?>assets/frontend/images/cross.png'>";
            document.getElementById("code").value = "";
            csrfName = response.csrfName;
            csrfHash = response.csrfHash;
            $("#code-error").attr('style', 'visibility:visible');

          }
         $("#code-error").text(response.messages);
        
         $("#ajxerror").html(ajaxresponse);
         $('#loader').attr('style', 'display:none');
    
        }
      });
    }  
  }); 
  
 
  
});

  
$(document).ready(function () {

    $('#myform').validate({ // initialize the plugin
        rules: {
            code: {
                required: true
          },
            name: {
                required: true
            },
            national_id: {
                required: true
            },
            mobile: {
                required: true
            },
            email: {
                required: true
            },
            tc: {
                required: true
            }
        },
        messages: {
          tc:"Please agree to our terms and conditions"
        }
    });
    
    
    $('.js-nav-btn').click(function(){
    		$('.js-nav-btn').toggleClass('is-menu-active');
    		$('body').toggleClass('inactive');
    		$('#nav-list-mobile').toggleClass('opened');
	});
    
});
</script>
<script>
    
    $(function() {

        $('#confirmRedirectBtn').click(function() {
            
            var href2 = event.href2;
            // Perform the redirect
            window.location.href = "https://kgapps.in/web-projects/2023/iglooquanta/login";
        });

        $('#cancelRedirectBtn').click(function() {
            // Hide the confirmation popup
            $('#confirmationPopup').fadeOut();
        });
    });
</script>
