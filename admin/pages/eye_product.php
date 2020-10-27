
<?php 

if (isset($_GET['ViewId'])) {
	$producrtId = $_GET['ViewId'];
 $showproduct = $obj_SuperAdmin->ProductInfoBYiD($producrtId);

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
			<h4>Eye Product <a href="view_product.php" class="btn btn-success btn-sm" title=""><i class="fa fa-list"></i>Add Product</a></h4>

		




		<div class="card">
			<div class="card-body">
			     <table id="" class="table table-striped table-bordered">
			     	<tr>
			     		<td>Product Id</td>
			     		<td><?php echo $showproduct['id'] ?></td>
			     	</tr>
			     	<tr>
			     		<td>Product Name</td>
			     		<td><?php echo $showproduct['product_name'] ?></td>
			     	</tr>
			     	<tr>
			     		<td>Cateogry Name</td>
			     		<td><?php echo $showproduct['category_name'] ?></td>
			     	</tr>
			     	<tr>
			     		<td>Brand Name</td>
			     		<td><?php echo $showproduct['brand_name'] ?></td>
			     	</tr>
			     	<tr>
			     		<td>Product Price</td>
			     		<td><?php echo $showproduct['product_price'] ?></td>
			     	</tr>
			     	<tr>
			     		<td>Product Stock</td>
			     		<td><?php echo $showproduct['stock_ammount'] ?></td>
			     	</tr>
			     	<tr>
			     		<td>Min Stock Stock</td>
			     		<td><?php echo $showproduct['minumun_stock_ammount'] ?></td>
			     	</tr>
			     	<tr>
			     		<td>Product Short Description</td>
			     		<td width="76%"><?php echo $showproduct['short_description'] ?></td>
			     	</tr>
			     	<tr>
			     		<td>Description</td>
			     		<td width="76%"><?php echo $showproduct['description'] ?></td>
			     	</tr>
			     	<tr>
			     		<td>Product Image</td>
			     		<td><img src="<?php echo $showproduct['image'] ?>" alt=""></td>
			     	</tr>

			     	<tr>
			     		<td>Publicatin Status</td>
			     		<td>
			     			<?php 
                             if ($showproduct['image']=='1') { ?>
                             	<span style="font-size: 15px" class="badge badge-success">Publish</span>
                            <?php }else{ ?>

                             	<span style="font-size: 15px" class="badge badge-warning">Unpublish</span>
                            <?php }
			     			 ?>
			     		</td>
			     	</tr>
			     </table>
		    </div>
		</div>
		</div>
	</div>

</body>
</html>