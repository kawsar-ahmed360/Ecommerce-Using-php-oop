
<?php 

 if (isset($_POST['cusReg'])) {
 	$obj_app->CustomerRegistation($_POST);
 }elseif (isset($_POST['CustoLogin'])) {
 	$obj_app->CusotomerLogin($_POST);
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
 			
 		
 		<h3 class="text-center text-success jumbotron" style="font-size: 20px; ">You Have To Login To Complete Your Valuable Order . If You Are Not Registared Than Please Register First.</h3>
 		 <div class="form-row" style="">
 		 	<div class="col-md-1">
 		 		
 		 	</div>
 		 	<div class="form-group col-md-5"  style="border:1px solid black;padding: 10px">
 		 		<h3>&nbsp;&nbsp;&nbsp;&nbsp;Registation Form</h3>
 		 		<form action="" method="POST" accept-charset="utf-8">
 		 			
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
 		 				<label for="">Password <font style="color:red">*</font></label>
 		 				<input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="Enter Password">
 		 			</div>

 		 			<div class="col-md-12">
 		 				<button style="margin-top: 7px" type="submit" name="cusReg" class="form-control btn-success">Registation</button>
 		 			</div>

 		 		</div>
 		 		</form>
 		 	</div>



 		 	<div class="form-group col-md-5" style="border:1px solid black;padding: 10px;margin-left: 30px">
 		 		<h3>&nbsp;&nbsp;&nbsp;&nbsp;Login Form</h3>
 		 		<form action="" method="POST" accept-charset="utf-8">
 		 			
 		 			<div class="form-row">
 		 			

 		 			<div class="col-md-12">
 		 				<label for="">Email <font style="color:red">*</font></label>
 		 				<input type="text" class="form-control form-control-sm" name="email" placeholder="Enter Email">
 		 			</div>

 		 			<div class="col-md-12">
 		 				<label for="">Password <font style="color:red">*</font></label>
 		 				<input type="password" class="form-control form-control-sm" name="password" placeholder="Enter Password">
 		 			</div>

 		 			<div class="col-md-12">
 		 				<button style="margin-top: 7px" type="submit" name="CustoLogin" class="form-control btn-success">LOGIN</button>
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