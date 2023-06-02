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

<body class="site_home">
    
    <div class="wrapper">
        <div class="position-absolute promo-unit-home animated flipInY"><img src="<?php echo base_url() ?>assets/frontend/images/promo-unit-home.png" alt="" class="img-fluid"></div>
        <div class="position-absolute promo-unit-home animated bounceInUp"><img src="<?php echo base_url() ?>assets/frontend/images/promo-unit-home-products.png" alt="" class="img-fluid"></div>
        <div class="container-fluid">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 headerlarge">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none logo-wrap">
            <img src="<?php echo base_url() ?>assets/frontend/images/logo.png" alt="logo">
            </a>

            <ul class="nav nav-pills">
            <li class="nav-item"><a href="<?php echo base_url() ?>" class="nav-link active" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="<?php echo base_url() ?>login" class="nav-link">Redeem Points</a></li>
            <li class="nav-item"><a href="<?php echo base_url() ?>winners" class="nav-link">Winners</a></li>
            <li class="nav-item"><a href="javascript:void(0);" class="nav-link">العربية</a></li>
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
                    <li><a href="<?php echo base_url() ?>" class="active" aria-current="page">Home</a></li>
                    <li><a href="<?php echo base_url() ?>login" class="">Redeem Points</a></li>
                    <li><a href="<?php echo base_url() ?>winners" class="">Winners</a></li>
                    <li><a href="javascript:void(0);" class="">العربية</a></li>
                </ul>
            </div>
            <div class="container promo-unit-home-mobile">
            <div class="row">
                <div class="col-12 custom-margin-top">
                   <img src="<?php echo base_url() ?>assets/frontend/images/screen01mobile.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
            <footer>
            <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <a href="<?php echo base_url() ?>registration" class="btn registration-btn animated pulse infinite"><img src="<?php echo base_url() ?>assets/frontend/images/register-btn.png" alt=""></a>
                </div>
            </div>
        </div>
            </footer>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.kreataglobal.com/wp-content/themes/kreata/js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.js-nav-btn').click(function(){
    		$('.js-nav-btn').toggleClass('is-menu-active');
    		$('body').toggleClass('inactive');
    		$('#nav-list-mobile').toggleClass('opened');
    		$('#floating-enquire-button').toggleClass('inactive');
	});
	
	
    });
</script>
</body>
</html>
