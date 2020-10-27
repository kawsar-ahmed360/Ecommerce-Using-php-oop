<?php 

class Super_Admin{

	private $db_connect;

	public function __construct(){

		$host = "localhost";
		$username = "root";
		$password ="";
		$dbname = "db_seip_ecommerce";

		$this->db_connect = mysqli_connect($host,$username,$password,$dbname);
	}

	public function categoryAdd($data){

		$match = "SELECT * FROM category WHERE category_name='$data[category_name]'";
		$matchquery =mysqli_query($this->db_connect,$match);

		$matchassoc = mysqli_fetch_assoc($matchquery);



		if ($matchassoc==true) {
           
			 $_SESSION['existsmesage'] = "Already Exists";

			 header('location:add_category.php');
			
		}else{


		 $sql = "INSERT INTO category(category_name,category_status)VALUES('$data[category_name]','$data[category_status]')";

		 $run = mysqli_query($this->db_connect,$sql);

		 if ($run) {

		 	$_SESSION['message'] = "Category Successfull;y Inserted";
		 	header('location:category.php');
		 	
		 }else{

		 	echo "Sql Problem".mysqli_error($this->db_connect);
		 }

		}
	}

	public function viewCategory(){

		$sql ="SELECT * FROM category";
		$run = mysqli_query($this->db_connect,$sql);
		if ($run) {

			return $run;
			
		}else{

			echo "Query Problem".$this->db_connect;
		}
	}

	public function DeactiveCategory($DeaactiveId){

		$sql = "UPDATE category SET category_status='2' WHERE id='$DeaactiveId'";

		$run = mysqli_query($this->db_connect,$sql);

		if ($run) {

			$_SESSION['message'] = "Unpulbish SuccessFully";

			header('location:category.php');
			
		}else{

			echo "Sql proble".mysqli_error($this->db_connect);
		}
	}

	public function ActiveCategory($activeId){
		$spl = "UPDATE category SET category_status='1' WHERE id='$activeId'";
		$run = mysqli_query($this->db_connect,$spl);

		if ($run) {
			$_SESSION['activemessage'] = "Category Active SuccessFULLY";
			header('location:category.php');
		}else{

			echo "SQL error".mysqli_error($this->cononect);
		}
	}

	public function DeleteCategory($deleteId){

		$sql = "DELETE FROM category where id='$deleteId'";

		$run = mysqli_query($this->db_connect,$sql);

		if ($run) {
         
          $_SESSION['deltemessage'] = "CATEGORY SuccessFullY Deleted";
          header('location:category.php');		
 
		}else{
           
           echo "SQL ERROR".mysqli_error($this->db_connect);
		}
	}

	public function EditeCategory($editeId){

		$sql = "SELECT * FROM category where id='$editeId'";

		$run = mysqli_query($this->db_connect,$sql);

		if ($run) {
			return $run; 
		}else{

			echo "sql wrong".mysqli_error($this->connect);
		}


	}

	public function UpdateCategoyr($EditeID){

		if (isset($EditeID)) {
			
			$sql = "UPDATE category SET category_name='$EditeID[category_name]' WHERE id='$EditeID[NeEditeId]'";
			$run = mysqli_query($this->db_connect,$sql);

			if ($run) {
				 $_SESSION['editesuccesmessage'] = "Category succesfuuly Update";



				 header('location:category.php');
			}else{

				echo "sql error".mysqli_error($this->connect);
			}
		}
	}

//.................................................Manage Brands...........................................

	public function brand_add($data){

		if (empty($data['brand_name'] && $data['brand_status'])) {
				// $nullmessage = "YOUR Form is NUll";

				header('location:brand_add.php?nullmessage=YOUR Form is NUll');

				
			}else{


		$unqu = "SELECT * brand Where brand_name='$data[brand_name]'";

		$runun = mysqli_query($this->db_connect,$unqu);

		$assooc = mysqli_fetch_assoc($runun);

		if ($assooc) {

			$_SESSION['match']="Brand name already Exists";

			header('location:brand_add.php');
			
		}else{


			

			$sql ="INSERT INTO brand(brand_name,brand_status)VALUES('$data[brand_name]','$data[brand_status]')";

			$run = mysqli_query($this->db_connect,$sql);

			if ($run) {

				$_SESSION['success'] = "Brand succesfully inserted";

				header('location:view_brand.php');
				
			}else{

				echo "Sql error".mysqli_error($this->db_connect);
			}


            }         

		}
	}

	public function showbrand(){

		$sql ="SELECT * from brand";
		$run = mysqli_query($this->db_connect,$sql);

		if ($run) {
			return $run;
		}else{

			echo "sql error".mysqli_error($this->db_connect);
		}
	}

	public function deactiveBrand($activeId){
      
      $sql = "UPDATE brand SET brand_status='2' WHERE id='$activeId'";

      $run = mysqli_query($this->db_connect,$sql);

      if ($run) {
      	$_SESSION['deactive'] = "Deactive SuccessFully";
      	header('location:view_brand.php');
      }else{
      	echo "sql error".mysqli_error($this->db_connect);
      }

	}

	public function ActiveBrand($deactiveId){

		$sql = "UPDATE brand SET brand_status='1' WHERE id='$deactiveId'";

		$run = mysqli_query($this->db_connect,$sql);

		if ($run) {
	 	$_SESSION['active'] = "active SuccessFully";
      	header('location:view_brand.php');	  
		}else{

			echo "sql error".mysqli_error($this->db_connect);
		}
	}

	public function DeleteBrand($delteId){

		$sql ="DELETE FROM brand WHERE id='$delteId'";

		$run = mysqli_query($this->db_connect,$sql);

		if ($run) {
		$_SESSION['delete'] = "Delete SuccessFully";
      	header('location:view_brand.php');

		}else{

			echo "sql error".mysqli_error($this->db_connect);
		}
	}

	public function editeBrand($editeId){

		$sql = "SELECT * FROM brand WHERE id='$editeId'";
		$run = mysqli_query($this->db_connect,$sql);
		$assos = mysqli_fetch_assoc($run);

		if ($assos) {
			return $assos;
		}else{

			echo "SQL Error".mysqli_error($this->db_connect);
		}
	}

	public function UpdateBrand($EdteId){

		if (isset($EdteId['editeId'])) {
			
			$sql = "UPDATE brand SET brand_name='$EdteId[brand_name]',brand_status='$EdteId[brand_status]' WHERE id='$EdteId[editeId]'";

			$run = mysqli_query($this->db_connect,$sql);

			if ($run) {
				$_SESSION['editeAll'] = "SuccesFuLLY Updated";
				header('location:view_brand.php');
			}else{

				echo "sql error".mysqli_error($this->db_connect);
			}
		}
	}

	//....................................................Product Add.......................................

	public function product_add($data){

		if (empty($data['product_name'] && $data['category_id'] && $data['brand_id'] && $data['product_price'] && $data['stock_ammount'] )) {
			header('location:add_product.php?status=form field null');
		}else{
          
         if (!empty($_FILES['image']['name'])) {

         	   $slug = str_replace(' ', '-', $data['product_name']);

            $slect = "SELECT * FROM product where slug='$slug'";
         

             if ($slect>0) {
             	$slug = time().'.'.$slug;
             }

         	$imageName = $_FILES['image']['name'];
         	$directory = '../assets/backend_assets/product_image/';
         	$imagepath = $directory.$imageName;
         	$imageExtesion = pathinfo($imageName,PATHINFO_EXTENSION);
         	$size = $_FILES['image']['size'];

         	$imagesize = getimagesize($_FILES['image']['tmp_name']);
            
            if ($imagesize) {
            	if (file_exists($imagepath)) {
            		die('<span style="color:red">Image Already Exist Pleas Select New Image</span>');
            	}else{
                  if ($_FILES['image']['size']>272994000) {
                  	  die('<span style="color:red">Image Size Very Large Please max size  select image</span>');
                  }else{
                     
                     if ($imageExtesion!='jpg' && $imageExtesion!='png' && $imageExtesion!='JPEG') {
                     	die('<span style="Image Formate Not supprot!!!Please Another Image Try Again"></span>');
                     }else{
                         
                       

         	        $sql = "INSERT INTO product(product_name,category_id,brand_id,product_price,stock_ammount,minumun_stock_ammount,short_description,description,publication_status,slug,image)VALUES('$data[product_name]','$data[category_id]','$data[brand_id]','$data[product_price]','$data[stock_ammount]','$data[minumun_stock_ammount]','$data[short_description]','$data[description]','$data[publication_status]','$slug','$imagepath')";

         	        $run = mysqli_query($this->db_connect,$sql);
         	            move_uploaded_file($_FILES['image']['tmp_name'],$imagepath);

         	        if ($run) {
         	        	$_SESSION['product_insert'] = "Successfully inserted";
          	            header('location:view_product.php');
         	        }else{

         	        	echo "SQL error".mysqli_error($this->db_connect);
         	        }
                     
                     }
                  
                  }
            	}
            }else{

            	die('<span style="color:red">Its not a image Plsease Select Image</span>');
            }

         	
         }else{


            $slug = str_replace(' ', '-', $data['product_name']);

            $slect = "SELECT * FROM product where slug='$slug'";
         

             if ($slect>0) {
             	$slug = time().'.'.$slug;
             }

         	$sql = "INSERT INTO product(product_name,category_id,brand_id,product_price,stock_ammount,minumun_stock_ammount,short_description,description,publication_status,slug)VALUES('$data[product_name]','$data[category_id]','$data[brand_id]','$data[product_price]','$data[stock_ammount]','$data[minumun_stock_ammount]','$data[short_description]','$data[description]','$data[publication_status]','$slug')";
          $run = mysqli_query($this->db_connect,$sql);
          if ($run) {
          	$_SESSION['product_insert'] = "Successfully inserted";
          	header('location:view_product.php');
          }else{

          	echo "sql error".mysqli_error($this->db_connect);
          }

         }
		}
	}

	public function showproduct(){

		$sql = "SELECT p.id,p.product_name,p.category_id,p.brand_id,p.product_price,p.stock_ammount,p.publication_status,c.category_name,b.brand_name FROM product as p,category as c,brand as b WHERE p.category_id=c.id AND p.brand_id=b.id ";

		$run = mysqli_query($this->db_connect,$sql);

		if ($run) {
			return $run;
		}else{

			echo "sql error".mysqli_error($this->db_connect);
		}
	}

	public function productDeactive($activeId){

		$sql = "UPDATE product SET publication_status='2' WHERE id='$activeId'";

		$run = mysqli_query($this->db_connect,$sql);

		if ($run) {
			$message = "SuccessFully Deactice Item";
			return $message;
		}else{

			echo "SQL error".mysqli_error($this->db_connect);
		}
	}

	public function productActive($daectveiD){

		$sql = "UPDATE product SET publication_status='1' WHERE id='$daectveiD'";

		$run = mysqli_query($this->db_connect,$sql);

		if ($run) {
			header('location:view_product.php');
		}else{

			echo "Sql error".mysqli_error($this->db_connect);
		}
	}

	public function ProductInfoBYiD($vieWId){
     
     $sql = "SELECT p.*,c.category_name,b.brand_name FROM product as p,category as c,brand as b WHERE p.category_id=c.id AND p.brand_id=b.id AND P.id='$vieWId'";

     $run= mysqli_query($this->db_connect,$sql);
     $assoc = mysqli_fetch_assoc($run);


     if ($assoc) {

     	return $assoc;
     	
     }else{

     	echo "Sql error".mysqli_error($this->db_connect);
     }
      
	}

	public function deleteProduct($deleteId){


		$sql = "SELECT image FROM product Where id ='$deleteId'";
		$query = mysqli_query($this->db_connect,$sql);

		$assoc = mysqli_fetch_assoc($query);

		@unlink($assoc['image']);

		$delsql = "DELETE FROM product WHERE id='$deleteId'";

		$run = mysqli_query($this->db_connect,$delsql);

		if ($run) {
			header('location:view_product.php');
		}else{

			echo "sql problem".mysqli_error($this->db_connect);
		}
	}

	public function editeProduct($editeId){

		$sql = "SELECT * FROM product WHERE id='$editeId'";
		$run = mysqli_query($this->db_connect,$sql);
        $assoc = mysqli_fetch_assoc($run);
		if ($assoc) {
			return $assoc;
		}else{

			echo "sql error".mysqli_error($this->db_connect);
		}
	}

	public function UpdatePro($UpdateDate){

		 if (isset($UpdateDate['UpdateId'])) {
		 	if ($_FILES['image']['name']) {
		 		$image_name = $_FILES['image']['name'];
		 		$directory = '../assets/backend_assets/product_image/';
		 		$imagepath = $directory.$image_name;
		 		$imageExtension = pathinfo($image_name,PATHINFO_EXTENSION);
		 		$imageSize = $_FILES['image']['size'];
		 		$image = getimagesize($_FILES['image']['tmp_name']);
                 
                 $imgsql = "SELECT image FROM product WHERE id='$UpdateDate[UpdateId]'";

                 $imgrun = mysqli_query($this->db_connect,$imgsql);
                 $imgassoc = mysqli_fetch_assoc($imgrun);

                 @unlink($imgassoc['image']); 

		 		if ($image) {
		 			if ($imageSize>272994000) {
		 				die('Image Size is very Long Please Select Short Size Image');
		 			}else{
                      if ($imageExtension!='jpg' && $imageExtension!='png' && $imageExtension!='JPEG') {
                      	die('Image Formate Not Suppot');
                      }else{
                        $sql ="UPDATE product SET product_name='$UpdateDate[product_name]',category_id='$UpdateDate[category_id]',brand_id='$UpdateDate[brand_id]',product_price='$UpdateDate[product_price]',stock_ammount='$UpdateDate[stock_ammount]',minumun_stock_ammount='$UpdateDate[minumun_stock_ammount]',short_description='$UpdateDate[short_description]',description='$UpdateDate[description]',image='$imagepath' WHERE id='$UpdateDate[UpdateId]'";
                        $run = mysqli_query($this->db_connect,$sql);

                        if ($run) {
                        	move_uploaded_file($_FILES['image']['tmp_name'],$imagepath);
                        	$_SESSION['Updatesucceess']="Update successfully";
		 			        header('location:view_product.php');
                        }else{
                        	echo "SQL error".mysqli_error($this->db_connect);
                        }
                      }
		 			}
		 		}else{
		 			die('This is not image pleas select image');
		 		}

		 	}else{
		 		$sql ="UPDATE product SET product_name='$UpdateDate[product_name]',category_id='$UpdateDate[category_id]',brand_id='$UpdateDate[brand_id]',product_price='$UpdateDate[product_price]',stock_ammount='$UpdateDate[stock_ammount]',minumun_stock_ammount='$UpdateDate[minumun_stock_ammount]',short_description='$UpdateDate[short_description]',description='$UpdateDate[description]' WHERE id='$UpdateDate[UpdateId]'";

		 		$run = mysqli_query($this->db_connect,$sql);

		 		if ($run) {
		 			$_SESSION['Updatesucceess']="Update successfully";
		 			header('location:view_product.php');
		 		}else{
		 			echo "sql Problem".mysqli_error($this->db_connect);
		 		}
		 	}
		 }else{

		 	echo "Edtie Page Problem Please Check Edite page";
		 }
		
	}





	public function logout(){
		unset($_SESSION['admin_id']);
		unset($_SESSION['admin_name']);

		header('location:index.php');
	}

}

 ?>