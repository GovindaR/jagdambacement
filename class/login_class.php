<?php 
class user_login {
	
	function check_login($username,$password){
		
		global $msg;
		
		include_once("../library/connection.php");		
		
		$query = "SELECT * FROM admin_users WHERE AdminUsername=:username AND AdminPassword=:password";
		$stmt = $conn->prepare($query);		
		$stmt->bindParam('username', $username);
		$stmt->bindParam('password', $password);	
		
		$stmt->execute();
				
		$total = $stmt->rowCount();
		
		if($total > 0){
			
			session_start();
			
			$_SESSION['AdminUsers'] = $username;			
			
			$query = "SELECT LastLogin FROM admin_users WHERE AdminUsername='$username'";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			
			$userData = $stmt->fetch();
			$_SESSION['LastLogin'] = $userData['LastLogin'];
			
			$query = "UPDATE admin_users SET LastLogin='".date('Y-m-d H:i:s')."' WHERE AdminUsername='$username'";
			$stmt = $conn->prepare($query);
			$stmt->execute();
						
			header('location:'.ADMIN_PATH);
			
		}else{
			
			$msg =  '<p style="color:red;"><b>Wrong username and Passwrod</b></p>';
			
		}		
		//$conn = null;
		
	}
}
?>