<?php 

$cartshow = $obj_app->showcart();


  if (isset($_POST['btn'])) {
    	
    	$obj_app->cartUpdate($_POST);
    }


    if (isset($_GET['delete'])) {
    	$delteid = $_GET['delete'];
    	$obj_app->deletecart($delteid);
    }  


 ?>


	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu" style="text-align: center">
							<td class="image">Product Image</td>
							<td class="image">Product Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td class="total">Remove</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php 

						$total =0;
						$totalqty =0;
                           while ($data =mysqli_fetch_assoc($cartshow)) { ?>
						<tr style="text-align: center">
							<td class="cart_product">
								<a href=""><img src="assets/<?php echo $data['image'] ?>" width="100px" alt=""></a>
							</td>
							<td class="name_product">
								<p><?php echo $data['product_name'] ?></p>
							</td>
							
							<td class="cart_price">
								<p>$<?php echo $data['product_price'] ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									
									<form action="" method="POST" accept-charset="utf-8">
											<input type="hidden" value="<?php echo $data['id'] ?>" name="cartId">
										<input style="text-align: center;padding: 4px" type="text"  name="qty" value="<?php echo $data['qty'] ?>" autocomplete="off" size="2">
								    <button style="border:1px solid black;padding: 6px" type="submit" name="btn" class="btn btn-silver btn-sm">Update</button>		
								    </form>	
								</div>
							</td>

							<?php 
                              
                              $price = $data['product_price'];
                              $qty = $data['qty'];

                              $multiple = $price*$qty;

							 ?>

							 <?php 

                              $total+=$multiple;
                              $totalqty += $data['qty'];


							  ?>
							<td class="cart_total">
								<p class="cart_total_price">$<?php echo $multiple ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="?delete=<?php echo $data['id'] ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                    <?php }
						?>

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<?php 
   $_SESSION['total_price'] =$total; 
   $_SESSION['total_qty'] =$totalqty; 

	 ?>

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$<?php echo $total ?></span></li>
						
							<li>Total Product<span><?php echo $totalqty ?> PEC</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$<?php echo $total ?></span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<?php 
                              
                              if (isset($_SESSION['customer_id']) AND isset($_SESSION['shipping_id'])) { ?>
                              	
							<a class="btn btn-default check_out" href="payment.php">Check Out</a>
                             <?php }elseif(isset($_SESSION['customer_id'])){ ?>

							<a class="btn btn-default check_out" href="shipping.php">Check Out</a>

                           <?php }else{ ?>

							<a class="btn btn-default check_out" href="logReg.php">Check Out</a>

                          <?php }
 
							 ?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->