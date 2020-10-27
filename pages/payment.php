
<?php 

if (isset($_POST['pay'])) {
	
	$obj_app->payments($_POST);
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	 <div class="" style="margin-bottom: 20px">
 	<div class="">
 		<div class="container">
 			
 		
 		<h3 class="text-center text-success jumbotron" style="font-size: 20px; ">You Have To Payment Address To Complete Your Valuable Order . </h3>
 		 <div class="form-row" style="">
 		 	<div class="col-md-4">
 		 		
 		 	</div>
 		 	<div class="form-group col-md-5"  style="border:1px solid black;padding: 10px" >
 		 		<h3>&nbsp;&nbsp;&nbsp;&nbsp;Select Payment Form</h3>
 		 		<form action="" method="POST" accept-charset="utf-8" id="formsc">
 		 			
 		 			<div class="form-row">
 		 			
 		 			
                      <table width="100%" class="table table-striped">

                      

                      	<thead>
                      		
                      		<tr>
                      			<th width="7%"></th>
                      			<th>Cash On Delevary</th>
                      			<th><input type="radio" name="payment" value="cash_on_delevary"></th>
                      			<th width="7%"></th>
                      		</tr>
                      			<tr>
                      			<th width="7%"></th>
                      			<th>Stripe</th>
                      			<th><input type="radio" name="payment" value="stripe"></th>
                      			<th width="7%"></th>
                      		</tr>

                      			<tr>
                      			<th width="7%"></th>
                      			<th>Paypal</th>
                      			<th><input type="radio" name="payment" value="paypal"></th>
                      			<th width="7%"></th>
                      		</tr>

                      			<tr>
                      			<th width="7%"></th>
                      			<th>Other</th>
                      			<th><input type="radio" name="payment" value="other"></th>
                      			<th width="7%"></th>
                      		</tr>
                      	</thead>
                      
                      </table>

 		 			

 		 		

 		 			<div class="col-md-12">
 		 				<button style="margin-top: 7px" type="submit" name="pay" class="form-control btn-success">Shipping</button>
 		 			</div>

 		 		</div>
 		 		</form>
 		 	</div>




 		 </div>
 	</div>
 </div>
	</div>

</body>
</html>