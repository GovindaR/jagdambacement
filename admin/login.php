<?php
session_start();
include_once('../library/config.php');
if(isset($_SESSION['AdminUsers'])){	
	header ( "location:" . ADMIN_PATH);
}
$msg="";
if(isset($_POST['Username'])){	
	include_once("../class/login_class.php");
	user_login::check_login($_POST['Username'],$_POST['Password']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login - <?php echo COMPANY_NAME; ?></title>
<link href="css/login.css" type="text/css" rel="stylesheet"  />
<link href='http://fonts.googleapis.com/css?family=Averia+Libre|Marmelad' rel='stylesheet' type='text/css'>
</head>

<body>

<div id="siteWrapper">
  <div class="wrap">
  	<div class="login">
    
      <div class="logo">
          <a href="index.php"><img src="../img/logo01.png" width="300" /></a>
        </div>
        
        <?php echo $msg; ?>
    
    <form method="post" name="login" action="">
    <input type="text" placeholder="Username" name="Username"  />
    <input type="password" placeholder="Password" name="Password"  />
    <input type="submit" value="login" class="btn" />
    </form>
    </div>
  </div><!-- end wrap -->
</div><!-- end siteWrapper -->


</body>
</html>