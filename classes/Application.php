<?php 



class application{

   private $db_connect;
	public function __construct(){

		$host="localhost";
		$username ="root";
		$password="";
		$db_name ="db_seip_ecommerce";
         $this->db_connect =mysqli_connect($host,$username,$password,$db_name);
         if (!$this->db_connect) {
         	echo "DB Connection Error".mysqli_error($this->db_connect);
         }
		 
	}

	public function selectAll_Publish_Category(){

		$sql ="SELECT * FROM category WHERE category_status='1'";

		$run = mysqli_query($this->db_connect,$sql);

		if ($run) {
			return $run;
		}else{

			echo "SQL error".mysqli_error($this->db_connect);
		}
	}

	public function menufatue_all_show(){

		$sql = "SELECT * FROM brand WHERE brand_status='1'";
		$run = mysqli_query($this->db_connect,$sql);

		if ($run) {
			return $run;
		}else{

			echo "sql error".mysqli_error($this->db_connect);
		}
	}

	public function showhomeProduct(){

	$sql ="SELECT * FROM product WHERE publication_status='1' ORDER BY id DESC LIMIT 6";

	$run = mysqli_query($this->db_connect,$sql);

	if ($run) {
		return $run;
	}else{

		echo "SQL ERROR".mysqli_error($this->db_connect);
	}
}

   public function singleProducts($singeSlug){

   	 $sql ="SELECT p.*,b.brand_name from product as p,brand as b WHERE p.brand_id=b.id AND slug='$singeSlug'";
   	 $run = mysqli_query($this->db_connect,$sql);
   	 $assoc = mysqli_fetch_assoc($run);
   	 if ($assoc) {
   	 	return $assoc;
   	 }else{
   	 	echo "SQL error".mysqli_error($this->db_connect);
   	 }
   }

   public function recomendardprodcut($catId){
   	$sql = "SELECT * FROM product WHERE category_id='$catId' limit 3";
   	$run = mysqli_query($this->db_connect,$sql);
   	if ($run) {
   		return $run;
   	}else{
   		echo "SQL error".mysqli_error($this->db_connect);
   	}
   }

   //,..........................Add To card........................

   public function add_to_cat($data){
     
   $match = "SELECT id,product_name,product_price,image FROM product WHERE id='$data[product_id]'";
   $mrun = mysqli_query($this->db_connect,$match);
   $massoc = mysqli_fetch_assoc($mrun);

   $ip_adr=$_SERVER['REMOTE_ADDR'];


   $catsql = "INSERT INTO tb_cart_product(qty,product_id,product_name,product_price,ip_addr,image)VALUES('$data[qty]','$massoc[id]','$massoc[product_name]','$massoc[product_price]','$ip_adr','$massoc[image]')";
   $catrun = mysqli_query($this->db_connect,$catsql);

   if ($catrun==true) {
    header('location:cart.php');
   }else{

   	echo "sql error".mysqli_error($this->db_connect);
   }

   }

   public function showcart(){

   	$ip_adr=$_SERVER['REMOTE_ADDR'];

   	$sql ="SELECT * from tb_cart_product WHERE ip_addr='$ip_adr'";
   	$run = mysqli_query($this->db_connect,$sql);
   	if ($run) {
   		return $run;
   	}else{
   		echo "SQL problem".mysqli_error($this->db_connect);
   	}
   }

   public function cartUpdate($update){
       
       if (isset($update['cartId'])) {
       	  $sql = "UPDATE tb_cart_product SET qty='$update[qty]' WHERE id='$update[cartId]'";
       	  $run = mysqli_query($this->db_connect,$sql);
       	  if ($run) {
       	  	header('location:cart.php');
       	  }else{
       	  	echo "sql error".mysqli_error($this->db_connect);
       	  }
       }else{
       	echo "Update Id Not Fount";
       }
   }

   public function deletecart($deleteiD){

   	$sql = "DELETE FROM tb_cart_product where id='$deleteiD'";
   	  $run = mysqli_query($this->db_connect,$sql);
       	  if ($run) {
       	  	header('location:cart.php');
       	  }else{
       	  	echo "sql error".mysqli_error($this->db_connect);
     }
   }

   public function CustomerRegistation($data){
   
    $sql = "INSERT INTO customer_regisration(fname,lname,email,phone,address,password)VALUES('$data[fname]','$data[lname]','$data[email]','$data[phone]','$data[address]','$data[password]')";

    $run=mysqli_query($this->db_connect,$sql);
    // $assoc = mysqli_fetch_assoc($run);

    	$_SESSION['customer_id'] = mysqli_insert_id($this->db_connect);
    	// $_SESSION['customer_name'] = $sql['name'];
    	$_SESSION['mes'] = "nice naee";
    if ($run) {
       $ipadd = $_SERVER['REMOTE_ADDR'];
       $csql = "SELECT ip_addr FROM tb_cart_product WHERE ip_addr='$ipadd'";
       $crun = mysqli_query($this->db_connect,$csql);
      

       if ($crun) {
      header('location:cutomerAccount.php');
         
       }else{

    	header('location:shipping.php');

       }

    	
    }else{

    	echo "SQL problem".mysqli_error($this->db_connect);
    }

   }

   public function Logout(){
         
         unset($_SESSION['customer_id']);

         header('location:index.php');


   }

   public function CusotomerLogin($data){

   	$sql ="SELECT * from customer_regisration Where email='$data[email]' AND password='$data[password]'";
   	$run = mysqli_query($this->db_connect,$sql);


   	if ($run) {
 
   	$assoc = mysqli_fetch_assoc($run);
    $_SESSION['customer_id'] = $assoc['id'];

      $ipadd = $_SERVER['REMOTE_ADDR'];
       $csql = "SELECT ip_addr FROM tb_cart_product WHERE ip_addr='$ipadd'";
       $crun = mysqli_query($this->db_connect,$csql);
       

       if ($crun) {
      header('location:cutomerAccount.php');
         
       }else{

      header('location:shipping.php');

       }
   	
   		
   	}else{

   		echo "Passwrod and Email not match".mysqli_error($this->db_connect);
   	}
   }

   public function shippingInfo($data){

   	$customerId = $_SESSION['customer_id'];
      
     $sql = "INSERT INTO shipping(customer_id,fname,lname,email,phone,address)VALUES('$customerId','$data[fname]','$data[lname]','$data[email]','$data[phone]','$data[address]')";

     $run = mysqli_query($this->db_connect,$sql);

     if ($run) {
     $_SESSION['shipping_id'] = mysqli_insert_id($this->db_connect);
     header('location:payment.php');
     	
     }else{

     	echo "SQL ERROR".mysqli_error($this->db_connect);
     }


   }

   public function payments($dat){
     
     $ship_id = $_SESSION['shipping_id'];
     $total = $_SESSION['total_price'];
     $total_qty = $_SESSION['total_qty'];
     $customer_id = $_SESSION['customer_id'];
     $sql ="INSERT INTO orders(shipping_id,total_price,total_qty,cutomer_id)VALUES('$ship_id','$total','$total_qty','$customer_id')";

     $run = mysqli_query($this->db_connect,$sql);

     $orderid = mysqli_insert_id($this->db_connect);

     if ($run) {
     	$sql1 = "INSERT INTO payment(shipping,order_id,payment)VALUES('$ship_id','$orderid','$dat[payment]')";
     	 $run1 = mysqli_query($this->db_connect,$sql1);
     	 $paymnetid = mysqli_insert_id($this->db_connect);
     	 if ($run1) {
     	 	// session_start();
     	 	$ipadd = $_SERVER['REMOTE_ADDR'];
     	 	$catselect = "SELECT * FROM tb_cart_product where ip_addr='$ipadd'";
     	 	$carrun = mysqli_query($this->db_connect,$catselect);
     	 	
     	 	while ($data=mysqli_fetch_assoc($carrun)) {

     	 	$sql2 = "INSERT INTO billing(order_id,shipping_id,payment_id,product_id,product_price,product_qty)values('$orderid','$ship_id','$paymnetid','$data[product_id]','$data[product_price]','$data[qty]')";
     	 	 	$sql2run = mysqli_query($this->db_connect,$sql2);
     	 
     	 	    }
         	if ($sql2run) {
         		$ipadd = $_SERVER['REMOTE_ADDR'];
         		$delql = "DELETE FROM tb_cart_product WHERE ip_addr='$ipadd'";
         		$runde = mysqli_query($this->db_connect,$delql);
     	 		$message ="success all";
     	 		return $message;
     	 	}else{
     	 		echo "billing Sql problem".mysqli_error($this->db_connect);

     	 	}
     	 }else{
     	 	echo "payment Sql problem".mysqli_error($this->db_connect);
     	 }
     }else{

     	echo "Order Sql problem".mysqli_error($this->db_connect);
     }

   }

   public function CatWiseProduct($CatId){

    $sql = "SELECT * FROM product WHERE category_id='$CatId' ORDER BY id desc limit 8";

    $run = mysqli_query($this->db_connect,$sql);

    if ($run) {
      return $run;
    }else{
      echo "SQL error".mysqli_error($this->db_connect);
    }
   }

   public function customerInfo($custId){
    
    $sql = "SELECT * FROM customer_regisration WHERE id='$custId'";
    $run = mysqli_query($this->db_connect,$sql);
    $asssoc = mysqli_fetch_assoc($run);
    if ($asssoc) {
      return $asssoc;
    }else{
      echo "SQL error".mysqli_error($this->db_connect);
    }
   }

   public function billinginfo(){
    $customer = $_SESSION['customer_id'];
    $sql = "SELECT * FROM shipping WHERE customer_id='$customer'";
     $run = mysqli_query($this->db_connect,$sql);
    $asssoc = mysqli_fetch_assoc($run);
    if ($asssoc) {
      return $asssoc;
    }else{
      echo "SQL error".mysqli_error($this->db_connect);
    }
   }

   public function orderDetails($shippingId){
   
    $sql = "SELECT b.*,p.product_name,p.image FROM billing as b,product as p WHERE b.product_id=p.id AND shipping_id='$shippingId'";
     $run = mysqli_query($this->db_connect,$sql);
    if ($run) {
      return $run;
    }else{
      echo "SQL error".mysqli_error($this->db_connect);
    }

   }

   public function order($shippingId){

     $sql = $sql = "SELECT * FROM orders WHERE shipping_id='$shippingId'";
     $run = mysqli_query($this->db_connect,$sql);
     $assoc = mysqli_fetch_assoc($run);
    if ($assoc) {
      return $assoc;
    }else{
      echo "SQL error".mysqli_error($this->db_connect);
    }

   }   

   public function paymentview($shippingId){

     $sql = $sql = "SELECT * FROM payment WHERE shipping='$shippingId'";
     $run = mysqli_query($this->db_connect,$sql);
     $assoc = mysqli_fetch_assoc($run);
    if ($assoc) {
      return $assoc;
    }else{
      echo "SQL error".mysqli_error($this->db_connect);
    }

   }


}




 ?>