
<?php 

if (isset($_SESSION['customer_id'])) {
   $customeriD = $_SESSION['customer_id'];
  $data=$obj_app->customerInfo($customeriD);
}

if (isset($_SESSION['customer_id'])) {
	
   $shipping=$obj_app->billinginfo();
}


if (isset($shipping['id'])) {
	$shippingId = $shipping['id'];
   $billing=$obj_app->orderDetails($shippingId);
}

if (isset($shipping['id'])) {
	$shippingId = $shipping['id'];
   $order=$obj_app->order($shippingId);
}

if (isset($shipping['id'])) {
	$shippingId = $shipping['id'];
   $payment=$obj_app->paymentview($shippingId);
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

		<section id="advertisement">
		<div class="container">
			<div class="jumbotron text-center">
				<span style="font-size: 25px"><span style="color:red">Hellow <?php echo $data['fname'] . ' '. $data['lname'] ?></span> Your Order Invoice</span> 
			</div>
		</div>
	</section>

<div class="container">
	  <div class="card">
  	<div class="card-body">
  		<div class="form-row">
  			<div class="form-group col-md-3">
  				<ul>
  				    <li style="background: silver;padding: 8px;text-align: center;text-decoration: none;border-radius: 8px;margin-top: 5px"><a style="color:black" href="cutomerAccount.php" title=""><i>Dashbord</i></a></li>
  				    <li style="background: silver;padding: 8px;text-align: center;text-decoration: none;border-radius: 8px;margin-top: 5px"><a style="color:black" href="customerOrder.php" title=""><i>Your Order</i></a></li>
  				    <li style="background: silver;padding: 8px;text-align: center;text-decoration: none;border-radius: 8px;margin-top: 5px"><a style="color:black" href="" title=""><i>Password Change</i></a></li>
  				    <li style="background: silver;padding: 8px;text-align: center;text-decoration: none;border-radius: 8px;margin-top: 5px"><a style="color:black" href="" title=""><i>Other</i></a></li>
  				   
  				</ul>
  			</div>
           
           <div class="form-group col-md-9">
  				 <div class="invoice">
  				 	 <table width="100%" class="table table-responsive">
  				 	 	<thead>
  				 	 		<tr>
  				 	 			<td width="1%"></td>
  				 	 			<td width="40%">
  				 	 				<span style="font-size: 15px"><i><b><u>Customer Info</u> :</b></i></span> <br>
  				 	 				<span>Customer Name : <i><?php echo $data['fname'] .' '. $data['lname'] ?></i></span> <br>
  				 	 				<span>Customer Email : <i><?php echo $data['email'] ?></i></span><br>
  				 	 				<span>Customer Phone : <i><?php echo $data['phone'] ?></i></span><br>
  				 	 				<span>Customer Address : <i><?php echo $data['address'] ?></i></span><br>
  				 	 			</td>
  				 	 			<td width="35%"></td>
  				 	 			<td width="45%">
  				 	 				<span style="font-size: 15px"><i><b><u>Shipping Info</u> :</b></i></span> <br>
  				 	 			    <span>Name : <i><?php echo $shipping['fname'].' '.$shipping['lname'] ?></i></span><br>
  				 	 				<span>Phone : <i><?php echo $shipping['phone'] ?></i></span><br>
  				 	 				<span>Address : <i><?php echo $shipping['address'] ?></i></span><br>
  				 	 			</td>
  				 	 		</tr>
  				 	 	</thead>
  				 	 	
  				 	 </table>
  				 	 
  				 	 <span><b><i>Order Details</i></b> :</span>

  				 	 <table class="table table-bordered table-striped">
  				 	 	<thead>
  				 	 		<tr class="text-center" style="text-align: center">
  				 	 			<th style="text-align: center">Sl</th>
  				 	 			<th style="text-align: center">Product Name</th>
  				 	 			<th style="text-align: center">Product price</th>
  				 	 			<th style="text-align: center">Product qty</th>
  				 	 			<th style="text-align: center">Sub Total</th>
  				 	 		
  				 	 			<th style="text-align: center">Product Image</th>
  				 	 		</tr>
  				 	 	</thead>
  				 	 	<tbody>
  				 	 		<?php 
  				 	 		$sl=1;
                             while ($ordertals = mysqli_fetch_assoc($billing)) { ?>
  				 	 		<tr style="text-align: center">
  				 	 			<td><?php echo $sl; $sl++; ?></td>
  				 	 			<td><?php echo $ordertals['product_name'] ?></td>
  				 	 			<td>$<?php echo $ordertals['product_price'] ?></td>
  				 	 			<td><?php echo $ordertals['product_qty'] ?></td>
  				 	 			<td>$<?php echo $ordertals['product_qty'] * $ordertals['product_price'] ?></td>
  				 	 			<td><img src="assets/<?php echo $ordertals['image'] ?>" width="50px" alt=""></td>
  				 	 		</tr>
                                 
                            <?php }
  				 	 		 ?>
  				 	 	</tbody>
  				 	 	<tr>
  				 	 		<td rowspan="" colspan="5" style="text-align: right;"><span style="font-weight: bold">Payment Type</span></td>
  				 	 		<td style="text-align: center"><?php echo $payment['payment'] ?></td>
  				 	 	</tr>
  				 	 </table>

  				 	 <table width="100%">
  				 	 	<thead>
  				 	 		<tr>
  				 	 			<td width="3%"></td>
  				 	 			<td width="30%%">
  				 	 				<u><b>Order Criteria</b></u> <br>
  				 	 				<span><b><i>Total Qty Bye :</i></b></span> <?php echo $order['total_qty']; ?> PEC<br>
  				 	 				<span><b><i>Sgipping Cost :</i></b></span> <i>Free</i> <br>
  				 	 				<span><b><i>Discount :</i></b></span> <i>0%</i> <br>
  				 	 				<span><b><i>Total Qty Price :</i></b> $<?php echo $order['total_price']; ?> </span>
  				 	 			</td>
  				 	 			<td width="44%%"></td>
  				 	 			<td width="30%%">
  				 	 				<u>Total Calculation</u> <br>
  				 	 				<span style="color:red"><b><i>Ammount :</i></b></span>$<?php echo $order['total_price']; ?>
  				 	 			</td>
  				 	 		</tr>
  				 	 	</thead>
  				 	 	
  				 	 </table>
  				 </div>
  			</div>


  		</div>
  	</div>
  </div>
</div>

</body>
</html>