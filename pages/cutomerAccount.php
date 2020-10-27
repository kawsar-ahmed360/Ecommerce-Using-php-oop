
<?php 

if (isset($_SESSION['customer_id'])) {
   $customeriD = $_SESSION['customer_id'];
  $data=$obj_app->customerInfo($customeriD);
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
				<span style="font-size: 25px"><span style="color:red">Hellow <?php echo $data['fname'] . ' '. $data['lname'] ?></span> Wellcome Your Deshobrd</span> 
			</div>
		</div>
	</section>

<div class="container">
	  <div class="card">
  	<div class="card-body">
  		<div class="form-row">
  			<div class="form-group col-md-3">
  				<ul>
  				    <li style="background: silver;padding: 8px;text-align: center;text-decoration: none;border-radius: 8px;margin-top: 5px"><a style="color:black" href="" title="cutomerAccount.php"><i>Dashbord</i></a></li>
  				    <li style="background: silver;padding: 8px;text-align: center;text-decoration: none;border-radius: 8px;margin-top: 5px"><a style="color:black" href="customerOrder.php" title=""><i>Your Order</i></a></li>
  				    <li style="background: silver;padding: 8px;text-align: center;text-decoration: none;border-radius: 8px;margin-top: 5px"><a style="color:black" href="" title=""><i>Password Change</i></a></li>
  				    <li style="background: silver;padding: 8px;text-align: center;text-decoration: none;border-radius: 8px;margin-top: 5px"><a style="color:black" href="" title=""><i>Other</i></a></li>
  				   
  				</ul>
  			</div>
           
           <div class="form-group col-md-7">
  				<table class="table table-bordered">
  					<thead>
  						<tr>
  							<td colspan="2" style="text-align: center"><img src="assets/<?php echo $data['image']?>" alt=""></td>
  						</tr>
  						<tr>
  							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Name</td>
  							<td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['fname'] . ' '.$data['lname'] ?></td>
  						</tr>
  						<tr>
  							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email</td>
  							<td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['email']?></td>
  						</tr>

  						<tr>
  							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile</td>
  							<td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['phone']?></td>
  						</tr>

  						<tr>
  							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address</td>
  							<td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['address']?></td>
  						</tr>
  						<tr>
  							
  							<td colspan="2" style="text-align: center">
  								<a href="" class="btn btn-success btn-sm" title="">Edite Info</a>
  								<a href="" class="btn btn-danger btn-sm" title="">Password Change</a>
  								<a href="" class="btn btn-info btn-sm" title="">Upload Porfile</a>
  							</td>
  						</tr>

  					</thead>
  				
  				</table>
  			</div>


  		</div>
  	</div>
  </div>
</div>

</body>
</html>