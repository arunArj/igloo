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
        <a href="<?php echo base_url() ?>dashboard/profile" class="nav-link active" aria-current="page">
          Profile
        </a>
      </li>
      <li>
        <a href="<?php echo base_url() ?>dashboard" class="nav-link">
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
            <div class="row">

                <div class="col-lg-7 col-12 mb-4">
                    <div class="card custom-box">
                        <div class="card-header boxTitle">Profile</div>
                        <div class="card-body">
                            <div class="row pb-3">
                        <div class="col-lg-4 col-12 subTitle">Full Name:</div>
                        <div class="col-lg-8 col-12"><?php echo $this->encryption->decrypt($profile->name);?></div>
                    </div>
                    <div class="row pb-3">
                        <div class="col-lg-4 col-12 subTitle">Country:</div>
                        <div class="col-lg-8 col-12"><?php echo $profile->country;?></div>
                    </div>
                    <div class="row pb-3">
                        <div class="col-lg-4 col-12 subTitle">National ID Number:</div>
                        <div class="col-lg-8 col-12"><?php echo $this->encryption->decrypt($profile->national_id);?></div>
                    </div>
                    <div class="row pb-3">
                        <div class="col-lg-4 col-12 subTitle">Email ID:</div>
                        <div class="col-lg-8 col-12"><?php echo $this->encryption->decrypt($profile->email);?></div>
                    </div>
                    <div class="row pb-3">
                        <div class="col-lg-4 col-12 subTitle">Phone Number</div>
                        <div class="col-lg-8 col-12"><?php echo $this->encryption->decrypt($profile->mobile)    ;?></div>
                    </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="card custom-box">
                        <div class="card-header boxTitle">Change Password</div>
                        <div class="card-body">
                            <?php
                    $error = $this->session->flashdata('error');
                    if($error){?>
                        
                            <div class="alert alert-danger">  
                               <?php echo $error; ?>
                            </div>
                          
                <?php } ?>
                <?php
                    $success = $this->session->flashdata('success');
                    if($success){?>
                        
                            <div class="alert alert-success">  
                               <?php echo $success; ?>
                            </div>
                   
                <?php } ?>
                            <?php       
                        $attributes = array('id' => 'myform');
                        echo form_open('dashboard/update_profile',$attributes); ?>
                   
                        <div class="row g-4">
                            <div class="col-12">
                            <label for="" class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control" id="">
                            <?php echo form_error('password'); ?>
                            </div>
                            <div class="col-12">
                            <label for="" class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" id="">
                                <?php echo form_error('confirm_password'); ?>
                            </div>
                            <div class="col-12">
                            <button class="btn btnsubmit" type="submit">Set Password</button>
                            </div>
                        </div>
                   <?php echo form_close();?>
                        </div>
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
</body>
</html>
