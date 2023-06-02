<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>404 Page Not Found</title>
<style type="text/css">

body {
	background-color: #a0e1fe;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #000;
}
.container {
    width: 90%;
    max-width: 1024px;
    margin: 0 auto;
    text-align: center;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}
.back-btn{
    margin: 20px 0 0 0;
    text-decoration: none;
    display: inline-block;
    font-size: 13px;
    border-radius: 30px;
    color: #fff;
    background-color: #006db3;
    padding: 0.5rem 1.5rem;
}

h1 {
    font-size: 4rem;
    margin: 0;
    padding: 20px 0;
    clear: both;
    line-height: normal;
}
p {
    font-size: 1.5rem;
    margin: 0;
    padding: 0;
    clear: both;
    line-height: normal;
}
@media (max-width: 576px) {
    h1 {
    font-size: 2rem;
    margin: 0;
    padding: 0 0 8px 0;
    clear: both;
    line-height: normal;
}
p {
    font-size: 1rem;
    margin: 0;
    padding: 0;
    clear: both;
    line-height: normal;
}
}
</style>
</head>
<body>
	<div id="container" class="container">
		<h1><?php echo $heading; ?></h1>
		<p><?php echo $message; ?></p>
		<a href="https://kgapps.in/web-projects/2023/iglooquanta" class="back-btn">Return Home</a>
	</div>
</body>
</html>