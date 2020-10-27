<?php 

    if (isset($_GET['status'])) {
    	

    	if ($_GET['status']=='Unpbulish') {
    	$category_id = $_GET['deactiveId'];
    		
           $mesage =$obj_SuperAdmin->DeactiveCategory($category_id);

    	}elseif($_GET['status']=='active'){
            
    	$activecategory_id = $_GET['activeId'];
           $activemessage =$obj_SuperAdmin->ActiveCategory($activecategory_id);

    	}elseif($_GET['status']=='delete'){
    		$delteId = $_GET['deleteid'];

    	 $obj_SuperAdmin->DeleteCategory($delteId);
    	}
    }


    	 // $obj_SuperAdmin->EditeCategory();

   

 


  $view = $obj_SuperAdmin->viewCategory();

 


 ?>

<div class="card">
	<div class="card-body">

	
		   <h5 style="color:green">
		   	<?php 
              if (isset($_SESSION['message'])) {
              	echo $_SESSION['message'];
              	unset($_SESSION['message']);
              }elseif(isset($_SESSION['activemessage'])){
              	echo $_SESSION['activemessage'];
              	unset($_SESSION['activemessage']);
              }
		   	 ?>
		   </h5>

		   <h5 style="color: red">
		   	 <?php 
		   	 
                if (isset($_SESSION['deltemessage'])) {
                 	echo $_SESSION['deltemessage'];
              	unset($_SESSION['deltemessage']);
                 }		
		   	  ?>
		   </h5> 


		    <h5 style="color: green">
		   	 <?php 
		   	 
                if (isset($_SESSION['editesuccesmessage'])) {
                 	echo $_SESSION['editesuccesmessage'];
              	unset($_SESSION['editesuccesmessage']);
                 }		
		   	  ?>
		   </h5>  

		 
	
		  <h4>View Category <a href="add_category.php" class="btn btn-success btn-sm" title=""><i class="fa fa-plus-circle"></i>Add Category</a></h4>

		  <table id="datatable" class="table table-striped table-bordered">
		  	<thead>
		  		<tr style="text-align: center">
		  			<th>Sl</th>
		  			<th>Category Name</th>
		  			<th>Status</th>
		  			<th>Action</th>
		  		</tr>
		  	</thead>
		  	<tbody>

		  		<?php 
                    $sl=1;
                    while ($data =mysqli_fetch_assoc($view)) { ?>

                    	<tr style="text-align: center;">
                    		<td><?php echo $sl; $sl++ ?></td>
                    		<td><?php echo $data['category_name'] ?></td>
                    		<td>
                    			<?php 
                                  if ($data['category_status']=='1') {?>
                                  	<span class="badge badge-success">Active</span>
                                 <?php }else{ ?>
                                      
                                  	<span class="badge badge-danger">Deactive</span>
                                <?php }
                    			 ?>
                    		</td>
                    		<td>
                    			<?php 
                                  if ($data['category_status']=='1') { ?>
                                  	 <a href="?status=Unpbulish&&deactiveId=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm" title=""><i class="fa fa-arrow-alt-circle-up"></i></a>
                                 <?php }else{ ?>

                                  	 <a href="?status=active&&activeId=<?php echo $data['id']?>" class="btn btn-success btn-sm" title=""><i class="fa fa-arrow-alt-circle-down"></i></a>

                                <?php }
                    			 ?>
                    			<a href="add_category.php?editeId=<?php echo $data['id'] ?>" class="btn btn-info btn-sm" title=""><i class="fa fa-edit"></i></a>
                    			<a href="?status=delete&&deleteid=<?php echo $data['id'] ?>" onclick="return delte_item()" class="btn btn-danger btn-sm" title=""><i class="fa fa-trash"></i></a>
                    		</td>
                    	</tr>
                        
                <?php    }
 
		  		 ?>
		  		
		  	</tbody>
		  </table>
	</div>
</div>