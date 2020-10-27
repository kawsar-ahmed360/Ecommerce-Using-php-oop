<?php 


include "../classes/Application.php";
$obj_cate = new application();
$showcategory=$obj_cate->selectAll_Publish_Category();
$showbrand=$obj_cate->menufatue_all_show();
// $fetch_assoc = mysqli_fetch_assoc();

if (isset($_POST['btn'])) {
	$obj_SuperAdmin->product_add($_POST);
}elseif(isset($_POST['edite_btn'])){

	$obj_SuperAdmin->UpdatePro($_POST);

}

if (isset($_GET['editeId'])) {
	$editeId = $_GET['editeId'];

	$editeview=$obj_SuperAdmin->editeProduct($editeId);
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

			<?php 
             if (isset($editeview)) { ?>
             	
			<h4>Edite Product</h4>
            <?php }else{ ?>

			<h4>Add Product <a href="view_product.php" class="btn btn-success btn-sm" title=""><i class="fa fa-list"></i>View Product</a></h4>

           <?php }

			 ?>

      <?php 
      
        if (isset($_get['status'])) {
        	echo $_get['status'];
        }

       ?>
		<div class="card">
			<div class="card-body">

			   <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="editeform">
			   		  <div class="form-row">

		       	 <div class="form-group col-md-3">
		       	 	<label>Product Name</label>
		       	 	<input type="text" name="product_name" class="form-control form-control-sm" placeholder="Enter Product Name.......">
		       	 </div>
                  
                  <div class="form-group col-md-3">
		       	 	<label>Category Name</label>
		       	 	<select class="form-control form-control-sm" name="category_id" id="category_id">
		       	 		<option disabled="" selected="">--------Select Category Name--------</option>

		       	 		<?php 
                           while ($data = mysqli_fetch_assoc($showcategory)) { ?>
                               <option value="<?php echo $data['id'] ?>"><?php echo $data['category_name'] ?></option>
                               
                         <?php }
		       	 		 ?>
		       	 		
		       	 	</select>
		       	 </div>

		       	   <div class="form-group col-md-3">
		       	 	<label>Brand Name</label>
		       	 	<select class="form-control form-control-sm" name="brand_id" id="brand_id">
		       	 		<option disabled="" selected="">--------Select Brand Name--------</option>
		       	 		<?php 
                           while ($data = mysqli_fetch_assoc($showbrand)) { ?>
                               <option value="<?php echo $data['id'] ?>"><?php echo $data['brand_name'] ?></option>
                               
                         <?php }
		       	 		 ?>
		       	 	</select>
		       	 </div>

		       	  <div class="form-group col-md-3">
		       	 	<label>Product Price</label>
		       	 	<input type="text" name="product_price" class="form-control form-control-sm" placeholder="Enter Product price.......">
		       	 </div>

		       	  <div class="form-group col-md-3">
		       	 	<label>Stock Ammount</label>
		       	 	<input type="number" name="stock_ammount" class="form-control form-control-sm" placeholder="Enter Stock.......">
		       	 </div>

		       	 <div class="form-group col-md-3">
		       	 	<label>Min Stock Qty</label>
		       	 	<input type="number" name="minumun_stock_ammount" class="form-control form-control-sm" placeholder="Enter Stock.......">
		       	 </div>

		       	 	 <div class="form-group col-md-6">
		       	 	<label>Short Description</label>
		       	     <textarea class="form-control form-control-sm" name="short_description" id="short_description" placeholder="Enter Description.."></textarea>
		       	 </div>

		       	  <div class="form-group col-md-12">
		       	 	<label>Description</label>
		       	     <textarea class="form-control form-control-sm" name="description" id="description" placeholder="Enter Description.."></textarea>
		       	 </div>

		       	  <div class="form-group col-md-3">
		       	 	<label>Publication Status</label>
		       	 	<select class="form-control form-control-sm" name="publication_status" id="publication_status">
		       	 		<option disabled="" selected="">--------Select Once--------</option>
		       	 		<option value="1">Publish</option>
		       	 		<option value="2">Unpublish</option>
		       	 		
		       	 	</select>
		       	 </div>

		       	 <div class="form-group col-md-4">
		       	 	<label>Image</label>
		       	     <input type="file" class="form-control form-control-sm" name="image" id="image">
		       	 </div>

		       	  <div class="form-group col-md-3">
		       	 	<label>Preview Image</label>
		       	   <img src="" alt="">
		       	 </div>

		       	  <div class="form-group col-md-3">
		       	 	<label>Old Image</label>
		       	   <img src="<?php echo $editeview['image'] ?>" alt="" id="oldimag" width="100px">
		       	 </div>

		       	 <div class="form-group col-md-2" style="padding-top: 30px">
		       	 	<?php 
                      if (isset($editeview)) { ?>
                      	<input type="hidden" value="<?php echo $editeview['id'] ?>" name="UpdateId">
		       	  <button type="submit" name="edite_btn" class="btn btn-success btn-sm">Update Product</button>
                      	
                     <?php }else{ ?>

		       	  <button type="submit" name="btn" class="btn btn-success btn-sm">Add Product</button>

                    <?php }

		       	 	 ?> 
		       	 </div>

		       </div>
			   		
			   	</form>	
		     
		    </div>
		</div>
		</div>
	</div>

</body>
</html>

<script type="text/javascript">
	
	document.forms['editeform'].elements['product_name'].value="<?php echo $editeview['product_name'] ?>";
	document.forms['editeform'].elements['category_id'].value="<?php echo $editeview['category_id'] ?>";
	document.forms['editeform'].elements['brand_id'].value="<?php echo $editeview['brand_id'] ?>";
	document.forms['editeform'].elements['product_price'].value="<?php echo $editeview['product_price'] ?>";
	document.forms['editeform'].elements['stock_ammount'].value="<?php echo $editeview['stock_ammount'] ?>";
	document.forms['editeform'].elements['minumun_stock_ammount'].value="<?php echo $editeview['minumun_stock_ammount'] ?>";
	document.forms['editeform'].elements['short_description'].value="<?php echo $editeview['short_description'] ?>";
	document.forms['editeform'].elements['description'].value="<?php echo $editeview['description'] ?>";
	document.forms['editeform'].elements['publication_status'].value="<?php echo $editeview['publication_status'] ?>";
	
</script>