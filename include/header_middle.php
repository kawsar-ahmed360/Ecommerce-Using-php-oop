
<?php

if (isset($_GET['status'])) {

	if ($_GET['status']=='logout') {
		

        $obj_app->Logout();	
	}

}

 ?>

<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.html"><img src="assets/fontend_assets/images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right clearfix">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canada</a></li>
									<li><a href="">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canadian Dollar</a></li>
									<li><a href="">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">

								<?php 
                                 if (isset($_SESSION['customer_id'])) { ?>
                                 	
								<li><a href="cutomerAccount.php"><i class="fa fa-lock"></i> Account</a></li>
								<li><a href="?status=logout&&Logout=<?php echo $_SESSION['customer_id'] ?>"><i class="fa fa-lock"></i> LogOut</a></li>
                                 <?php }else{ ?>
								<li><a href="logReg.php"><i class="fa fa-lock"></i> Login</a></li>

                                 <?php }
								?>
								<!-- <li><a href=""><i class="fa fa-user"></i> Account</a></li> -->
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href=""><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href=""><i class="fa fa-shopping-cart"></i> Cart</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>