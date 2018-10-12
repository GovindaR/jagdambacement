<?php session_start();

//print $_SESSION['username']." fgfhfhg".$_SESSION['lastLogin'];

include_once('config.php');

if($_SESSION['AdminUsers']==""){	

	header ( "location:" . ADMIN_PATH . "login.php" );

}

?>