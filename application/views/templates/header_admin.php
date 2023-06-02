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
        <a href="<?php echo base_url() ?>admin/dashboard/getUsers" class="nav-link" aria-current="page">
          Users List
        </a>
      </li>
      <li>
        <a href="<?php echo base_url() ?>admin/dashboard/winnersList" class="nav-link active">
            Request List
        </a>
      </li>
    <li>
        <a href="<?php echo base_url() ?>admin/dashboard/winner" class="nav-link">
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