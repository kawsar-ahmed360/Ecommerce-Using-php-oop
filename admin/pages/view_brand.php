
<?php 

$showbrands =$obj_SuperAdmin->showbrand();

if (isset($_GET['status'])) {
	if ($_GET['status']=='active') {
		$activeId = $_GET['activeId'];
	    $obj_SuperAdmin->deactiveBrand($activeId);
	}elseif($_GET['status']=='deactive'){
		$deactiveId = $_GET['deactiveId'];

	    $obj_SuperAdmin->ActiveBrand($deactiveId);
	}elseif($_GET['status']=='delete'){

		$deleteiD = $_GET['deleteId'];

	    $obj_SuperAdmin->DeleteBrand($deleteiD);
	}
}

 ?>

<div class="card">
	<div class="card-body">
		<h4>View Brands <a href="brand_add.php" class="btn btn-success btn-sm" title=""><i class="fa fa-plus-circle"></i>Add Brand</a></h4>

		<h4 style="color:green">
			<?php 
              if (isset($_SESSION['success'])) {
              	echo $_SESSION['success'];
              	unset($_SESSION['success']);
              }elseif(isset($_SESSION['deactive'])){
              	echo $_SESSION['deactive'];
              	unset($_SESSION['deactive']);
              }elseif(isset($_SESSION['active'])){

              	echo $_SESSION['active'];
              	unset($_SESSION['active']);
              }elseif(isset($_SESSION['delete'])){
              	echo $_SESSION['delete'];
              	unset($_SESSION['delete']);
              }elseif(isset($_SESSION['editeAll'])){
                echo $_SESSION['editeAll'];
                unset($_SESSION['editeAll']);
              }
			 ?>
		</h4>

		<div class="card">
			<div class="card-body">
				<table class="table table-striped table-bordered" id="datatable">
					<thead>
						<tr style="text-align: center">
							<th>SL</th>
							<th>Brand Name</th>
							<th>Brand Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php 
						$sl=1;
                            while ($data = mysqli_fetch_assoc($showbrands)) { ?>
                                
						<tr style="text-align: center">
							<td><?php echo $sl; $sl++; ?></td>
							<td><?php echo $data['brand_name'] ?></td>
							<td>
								<?php 
                                  if ($data['brand_status']=='1') { ?>
                                  	<span class="badge badge-success">Publish</span>
                                <?php }else{ ?>
                                  	<span class="badge badge-warning">Unpublish</span>


                                <?php }

								 ?>
							</td>
							<td>
								<?php 
                                  if ($data['brand_status']=='1') { ?>
                                  	 <a href="?status=active&&activeId=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm" title=""><i class="fa fa-arrow-alt-circle-up"></i></a>
                                 <?php }else{?>

                                  	 <a href="?status=deactive&&deactiveId=<?php echo $data['id'] ?>" class="btn btn-success btn-sm" title=""><i class="fa fa-arrow-alt-circle-down"></i></a>

                                 <?php }
								 ?>
								<a href="brand_add.php?editeId=<?php echo $data['id'] ?>" class="btn btn-info btn-sm" title=""><i class="fa fa-edit"></i></a>
								<a href="?status=delete&&deleteId=<?php echo $data['id'] ?>" onclick="return delte_item() " class="btn btn-danger btn-sm" title=""><i class="fa fa-trash"></i></a>
							</td>
						</tr>
                          <?php  }

						 ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>