<?php 


if (isset($_POST['btn'])) {

 $newme =$obj_SuperAdmin->categoryAdd($_POST);	
 

}elseif(isset($_POST['btn_edite'])){

	// $editId = $_POST['NeEditeId'];

	$obj_SuperAdmin->UpdateCategoyr($_POST);
}
 
 if (isset($_GET['editeId'])) {
   $editeId = $_GET['editeId'];
 	
   $fetch=$obj_SuperAdmin->EditeCategory($editeId);

   $newfe = mysqli_fetch_assoc($fetch);
 }


 ?>

<div class="card">
	<div class="card-body">
		<div class="">
			


			<h4 style="color:red">
				  
				 
				  <?php 
                      if (isset($_SESSION['existsmesage'])) {
                      	echo $_SESSION['existsmesage'];
                      	unset($_SESSION['existsmesage']);
                      }
				   ?>
			</h4>

		</div>
		 
          
          <?php 
             
             if (isset($newfe)) { ?>
             	 <h4>Edite Category</h4>
           <?php  }else{ ?>
             	<h4>Add Category</h4>  <a href="category.php" class="btn btn-success btn-sm" title=""><i class="fa fa-list"></i>View Category</a>
           <?php  }

           ?>

		</h4>
           
           <div class="card">
           	 <div class="card-body">
           	 	<form action="" method="POST" accept-charset="utf-8">
           	 		
           	 		 <div class="form-row">
           	 	 	 <div class="form-group col-md-4">
           	 	 	 	<label>Category Name</label>
           	 	 	 	<input type="text" class="form-control form-control-sm" name="category_name" value="<?php if(isset($newfe))echo $newfe['category_name'] ?>" id="category_name" placeholder="Category Name........">
           	 	 	 </div>

           	 	 	 <div class="form-group col-md-4">
           	 	 	 	<label>Category Status</label>
           	 	 	    <select class="form-control form-control-sm" id="category_status" name="category_status">
           	 	 	    	<option disabled="" selected="">-----------Select Once-------</option>
           	 	 	    	<option value="1" <?php if(isset($newfe))if($newfe['category_status']=='1')echo "selected" ?>>Publsh</option>
           	 	 	    	<option value="2" <?php if(isset($newfe))if($newfe['category_status']=='2')echo "selected" ?>>UnPublsh</option>
           	 	 	    </select>
           	 	 	 </div>

           	 	 	 <div class="form-group col-md-4" style="padding-top: 30px">
           	 	 	 	<?php 
                          if (isset($newfe)) { ?>
                          	<input type="hidden" value="<?php echo $newfe['id'] ?>" name="NeEditeId">
           	 	 	 	<button type="submit" name="btn_edite" class="btn btn-success btn-sm">Edite Category</button>
                          	
                         <?php }else{ ?>
           	 	 	 	<button type="submit" name="btn" class="btn btn-success btn-sm">Add Category</button>

                       <?php  }
           	 	 	 	 ?>
           	 	 	 </div>
           	 	 </div>
           	 		
           	 	</form>
           	 </div>
           </div>
	</div>
</div>