<?php 

class Admin{

	private $db_connect;

	public function __construct(){
         $hostName ="localhost";
         $username ="root";
         $password ="";
         $db_name ="db_seip_ecommerce";

         $this->db_connect = mysqli_connect($hostName,$username,$password,$db_name);

         if (!$this->db_connect) {
          die('Connect Faield'.mysqli_error($this->db_connect));	
         }
	}

	public function Admin_login_check($data){

		$email = $data['email'];

		$pass = md5($data['password']);

		$query = "SELECT * FROM db_admin WHERE email='$email' AND password='$pass'";

		$run = mysqli_query($this->db_connect,$query);

		if ($run) {
			 
			 $admin_info = mysqli_fetch_assoc($run);
			 if ($admin_info) {

			 	session_start();
			 	$_SESSION['admin_name'] = $admin_info['name'];
			 	$_SESSION['admin_id'] = $admin_info['admin_id'];

			 	header('location:admin_master.php');
			 	
			 }else{
			 	$message ="Your Email Or Passwrod Invalid";
			 	return $message;
			 }
		}else{

			die('query problem'.mysqli_error($this->db_connect));
		}

	}
}


 ?>