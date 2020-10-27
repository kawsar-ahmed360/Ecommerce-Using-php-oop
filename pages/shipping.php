
<?php 

 if (isset($_POST['shipping'])) {
 	 $obj_app->shippingInfo($_POST);
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
 			
 		
 		<h3 class="text-center text-success jumbotron" style="font-size: 20px; ">You Have To Shipping Address To Complete Your Valuable Order . </h3>
 		 <div class="form-row" style="">
 		 	<div class="col-md-4">
 		 		
 		 	</div>
 		 	<div class="form-group col-md-5"  style="border:1px solid black;padding: 10px" >
 		 		<h3>&nbsp;&nbsp;&nbsp;&nbsp;Shipping Form</h3>
 		 		<form action="" method="POST" accept-charset="utf-8" id="formsc">
 		 			
 		 			<div class="form-row">
 		 			
 		 			<div class="col-md-12">
 		 				<label for="">Fname <font style="color:red">*</font></label>
 		 				<input type="text" class="form-control form-control-sm" name="fname" id="fname" placeholder="Enter Fname">
 		 			</div>

 		 			<div class="col-md-12">
 		 				<label for="">Lname <font style="color:red">*</font></label>
 		 				<input type="text" class="form-control form-control-sm" name="lname" id="lname" placeholder="Enter Fname">
 		 			</div>

 		 			<div class="col-md-12">
 		 				<label for="">Email</label>
 		 				<input type="text" class="form-control form-control-sm" name="email" id="email" placeholder="Enter Email">
 		 			</div>

 		 			<div class="col-md-12">
 		 				<label for="">Phone <font style="color:red">*</font></label>
 		 				<input type="text" class="form-control form-control-sm" name="phone" id="phone" placeholder="Enter Phone">
 		 			</div>

 		 			<div class="col-md-12">
 		 				<label for="">Address <font style="color:red">*</font></label>
 		 				<input type="text" class="form-control form-control-sm" name="address" id="address" placeholder="Enter Address">
 		 			</div>

 		 		

 		 			<div class="col-md-12">
 		 				<button style="margin-top: 7px" type="submit" name="shipping" class="form-control btn-success">Shipping</button>
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

