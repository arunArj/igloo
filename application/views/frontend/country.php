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

        </div>
        <div class="container country-container">
            <div class="row p-5">
                <div class="col-12 text-center"><img src="<?php echo base_url() ?>assets/frontend/images/scanforfun.png" alt="" class="img-fluid"></div>
                <div class="col-12 country-wrap">
                    <h1 class="text-center">select your country to participate</h1>
                    <div class="country-list">
                        <ul>
                            <li><a href="javascript:void(0);"><img src="<?php echo base_url() ?>assets/frontend/images/country/united-arab-emirates.png" alt="UAE" class="img-fluid"><span>UAE</span></a></li>
                            <li><a href="javascript:void(0);"><img src="<?php echo base_url() ?>assets/frontend/images/country/saudi-arabia.png" alt="saudi-arabia" class="img-fluid"><span>KSA</span></a></li>
                            <li><a href="javascript:void(0);"><img src="<?php echo base_url() ?>assets/frontend/images/country/oman.png" alt="oman" class="img-fluid"><span>Oman</span></a></li>
                            <li><a href="javascript:void(0);"><img src="<?php echo base_url() ?>assets/frontend/images/country/kuwait.png" alt="kuwait" class="img-fluid"><span>Kuwait</span></a></li>
                            <li><a href="javascript:void(0);"><img src="<?php echo base_url() ?>assets/frontend/images/country/bahrain.png" alt="bahrain" class="img-fluid"><span>Bahrain</span></a></li>
                            <li><a href="javascript:void(0);"><img src="<?php echo base_url() ?>assets/frontend/images/country/jordan.png" alt="jordan" class="img-fluid"><span>Jordan</span></a></li>
                            <li><a href="javascript:void(0);"><img src="<?php echo base_url() ?>assets/frontend/images/country/tunisia.png" alt="tunisia" class="img-fluid"><span>Tunisia</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
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
