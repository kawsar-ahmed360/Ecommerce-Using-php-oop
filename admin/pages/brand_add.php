
<?php 

 if (isset($_POST['btn'])) {

 	$newobj = $obj_SuperAdmin->brand_add($_POST);
 }elseif(isset($_POST['edite_btn'])){

 
 	$obj_SuperAdmin->UpdateBrand($_POST);
 }

 if (isset($_GET['editeId'])) {
 	
 	$editeID = $_GET['editeId'];
    $showedite = $obj_SuperAdmin->editeBrand($editeID);


 }

 ?>


<div class="card">
	<div class="card-body">

		<?php 
          if(isset($showedite)) { ?>
		<h4>Edite Brands</h4>
          	
        <?php  }else{ ?>

		<h4>Add Brands <a href="view_brand.php" class="btn btn-success btn-sm" title=""><i class="fa fa-list"></i>View Brand</a></h4>

        <?php }

		 ?>
         
     <h4 style="color:red">
     	<?php 

          if (isset($_GET['nullmessage'])) {
           if ($_GET['nullmessage']==true) {
           	echo $_GET['nullmessage'];
           	unset($_GET['nullmessage']);
           }
          }
     	 ?>
     </h4>

		<div class="card">
			<div class="card-body">
		      <form action="" method="POST" id="formall">
		      	
		      	   <div class="form-row">
		         	<div class="form-group col-md-4">
		         		<label>Brand Name</label>
		         		<input type="text" class="form-control form-control-sm" name="brand_name" id="brand_name" placeholder="Enter Brand Name.......">
		         	</div>

		         	<div class="form-group col-md-4">
		         		<label>Brand Status</label>
		         		 <select class="form-control form-control-sm" name="brand_status" id="brand_status">
		         		 	<option disabled="" selected="">--------Select Brand Status--------</option>
		         		 	<option value="1">Publish</option>
		         		 	<option value="2">Unpublish</option>
		         		 </select>
		         	</div>

		         	<div class="form-group col-md-2" style="padding-top: 30px">
		         		<?php 
                            if (isset($showedite)) { ?>
                            	<input type="hidden" value="<?php echo $showedite['id'] ?>" name="editeId">
		         		  <button type="submit" class="btn btn-success btn-sm" name="edite_btn">Edite Brand</button>
                            	
                          <?php }else{ ?>
		         		<button type="submit" class="btn btn-success btn-sm" name="btn">Add Brand</button>

                           <?php }
		         		 ?>
		         		
		         	</div>
		         </div>
		      </form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	document.forms['formall'].elements['brand_status'].value="<?php echo $showedite['brand_status'] ?>";
	document.forms['formall'].elements['brand_name'].value="<?php echo $showedite['brand_name'] ?>";
</script>