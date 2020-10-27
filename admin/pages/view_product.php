
<?php 

 $showproduct = $obj_SuperAdmin->showproduct();

 if (isset($_GET['status'])) {
 	
 	if ($_GET['status']=='active') {
 		$activeId = $_GET['activeId'];
 		$activemee = $obj_SuperAdmin->productDeactive($activeId);
 	}elseif($_GET['status']=='deactive'){
      $deactiveId = $_GET['deactiveID'];
      $obj_SuperAdmin->productActive($deactiveId);
       
 	}elseif($_GET['status']=='delete'){

 		$deleteId = $_GET['deleteId'];
 		$obj_SuperAdmin->deleteProduct($deleteId);
 	}
 }

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="card">
		<div class="card-body">
			<h4>View Product <a href="add_product.php" class="btn btn-success btn-sm" title=""><i class="fa fa-plus-circle"></i>Add Product</a></h4>

			<h4 style="color:green">
				<?php 
              
              if (isset($_SESSION['product_insert'] )) {
              	echo $_SESSION['product_insert'] ;
              	unset($_SESSION['product_insert'] );
              }elseif(isset($_SESSION['Updatesucceess'])) {
              	echo $_SESSION['Updatesucceess'];
              	unset($_SESSION['Updatesucceess']);
              	
              }
 
			 ?>
			</h4>




		<div class="card">
			<div class="card-body">
			     <table id="datatable" class="table table-striped table-bordered">
			     	<thead>
			     		<tr style="text-align: center">
			     			<th>Sl</th>
			     			<th>Product Name</th>
			     			<th>Category Name</th>
			     			<th>Brand Name</th>
			     			<th>Product Price</th>
			     			<th>product Stock</th>
			     			<th>product Status</th>
			     			<th>Action</th>
			     		</tr>
			     	</thead>
			     	<tbody>

			     		<?php 
                            $sl=1;
                            while ($data = mysqli_fetch_assoc($showproduct)) { ?>
						     		<tr style="text-align: center">
						     			<td><?php echo $sl; $sl++; ?></td>
						     			<td><?php echo $data['product_name'] ?></td>
						     			<td><?php echo $data['category_name'] ?></td>
						     			<td><?php echo $data['brand_name'] ?></td>
						     			<td><?php echo $data['product_price'] ?> Taka</td>
						     			<td><?php echo $data['stock_ammount'] ?> PEC</td>
						     			<td>
						     				<?php 
                                               if ($data['publication_status']=='1') { ?>
                                               	<span class="badge badge-success">Publish</span>
                                            <?php }else{ ?>
                                               	<span class="badge badge-warning">Unpublish</span>

                                           <?php }

						     				 ?>
						     			</td>

						     			<td width="150px">
						     				<?php 
                                               if ($data['publication_status']=='1') { ?>
                                               	<a href="?status=active&&activeId=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm" onclick="deactive_item()" title=""><i class="fa fa-arrow-alt-circle-up"></i></a>
                                            <?php }else{ ?>
                                               	
                                                	<a href="?status=deactive&&deactiveID=<?php echo $data['id'] ?>" class="btn btn-success btn-sm" onclick="active_item()" title=""><i class="fa fa-arrow-alt-circle-down"></i></a>
                                           <?php }

						     				 ?>

						     				 <a href="eye_product.php?ViewId=<?php echo $data['id'] ?>" class="btn btn-primary btn-sm" title="View Product"><i class="fa fa-eye"></i></a>
						     				 <a href="add_product.php?editeId=<?php echo $data['id'] ?>" class="btn btn-info btn-sm" title=""><i class="fa fa-edit"></i></a>
						     				 <a href="?status=delete&&deleteId=<?php echo $data['id'] ?>" onclick="delte_item()" class="btn btn-danger btn-sm" title=""><i class="fa fa-trash"></i></a>
						     			</td>
						     		</tr>
                                
                          <?php }
                             
			     		 ?>
			     	</tbody>
			     </table>
		    </div>
		</div>
		</div>
	</div>

</body>
</html>