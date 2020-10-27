<?php 

ob_start();
session_start();
 include "classes/Application.php";

 $obj_app=new application();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="assets/fontend_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/fontend_assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/fontend_assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/fontend_assets/css/price-range.css" rel="stylesheet">
    <link href="assets/fontend_assets/css/animate.css" rel="stylesheet">
	<link href="assets/fontend_assets/css/main.css" rel="stylesheet">
	<link href="assets/fontend_assets/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/fontend_assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/fontend_assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/fontend_assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/fontend_assets/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<!--header_top-->
		<?php include 'include/header_top.php' ?>
		<!--/header_top-->
		 
		 <!--header-middle-->
		<?php include 'include/header_middle.php' ?>
		<!--/header-middle-->
	
			<!--header-bottom-->
		
		<?php include 'include/header_bottom.php' ?>
		<!--/header-bottom-->
	</header><!--/header-->
          <!---------Main Content-------->	
            <?php 
              if (isset($pages)) {
              	if ($pages=='bitm') {
              		include 'pages/shop_content.php';
              	}elseif($pages=='pro_details'){
              		include 'pages/product_details.php';
              	}elseif($pages=='checkoutPage'){
              		include 'pages/checkout.php';
              	}elseif($pages=='cartPage'){
              		include 'pages/cart.php';
              	}elseif($pages=='logReg'){
                  include 'pages/logReg.php';
                }elseif($pages=='shipping'){
                  include "pages/shipping.php";
                }elseif($pages=='payment'){
                  include 'pages/payment.php';
                }elseif($pages=='cutomerAccount'){
                  include "pages/cutomerAccount.php";
                }elseif($pages=='customerOrder'){
                  include "pages/customerOrder.php";
                }
              }else{
              	include 'pages/home_content.php';
              }
            ?>
          <!---------Main Content End-------->	
	
	<footer id="footer"><!--Footer-->

		<!---footer Top-->
		<?php include 'include/footer_top.php' ?>
		<!---footer Top end-->
		
		<!---footer middle-->
		<?php include 'include/footer_middle.php' ?>
	
		<!---footer middle end-->

		<?php include 'include/footer_end.php' ?>
		<!---footer bottom-->

		
		

		<!---footer bottom end-->
		
	</footer><!--/Footer-->
	

  
    <script src="assets/fontend_assets/js/jquery.js"></script>
	<script src="assets/fontend_assets/js/bootstrap.min.js"></script>
	<script src="assets/fontend_assets/js/jquery.scrollUp.min.js"></script>
	<script src="assets/fontend_assets/js/price-range.js"></script>
    <script src="assets/fontend_assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/fontend_assets/js/main.js"></script>
</body>
</html>