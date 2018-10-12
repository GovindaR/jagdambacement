<?php session_start();
include_once("library/config.php");
/*include_once("library/connection.php");
include_once("class/kml_class.php");	

$kml = new kml($conn);*/

if(isset($_POST['security_code'])):
	if(($_SESSION['rand_code'] == $_POST['security_code']) && !empty($_SESSION['rand_code'])) :
		$todaysdate = date("Y-m-d");
		$fromemail=$_POST["EmailAddress"];
		$email=$_POST["EmailAddress"];
		
	$subject="Enquiry Received From www.jagdambacement.com Website";
			
	$msg="<font style='font:normal 11pt Arial;'>Dear administrator, <br />You have received an enquiry from ".$_POST[FullName].". The details of the enquiry is shown below:</font> <br />";
	$msg.="<font style='font:normal 11pt Arial;'>Enquiry Date: ".$todaysdate."</font> <br />";
	$msg.="<font style='font:normal 11pt Arial;'>IP Address: ".$ip."</font> <br />";
	$msg.="<table width='100%' border='0' cellspacing='0' cellpadding='10' class='menutext'>";
	
	$msg.="<tr height='25'>";
	$msg.="<td colspan='6'>";
	
	//COLLECTION INFORMATION OF CLIENT
	
	$msg.="<table width='100%' height='200' border='0' cellspacing='0' cellpadding='5' class='menutext'>";
	
	$msg.="<tr>";
	$msg.="<td colspan='6' style='border-top:1px #c0c0c0 solid;'></td>";
	$msg.="</tr>";
	
	
	$msg.="<tr>";
	$msg.="<td width='132' valign='top'>Full Name:</td>";
	$msg.="<td width='368' valign='top'>$_POST[FullName]<br /></td>";
	$msg.="</tr>";
	
	if($_POST[EmailAddress]):
	$msg.="<tr>";
	$msg.="<td  valign='top'>Email:</td>";
	$msg.="<td valign='top'>$_POST[EmailAddress]<br /></td>";
	$msg.="</tr>";
	else:
	$msg.="<tr>";
	$msg.="<td  valign='top'>Phone Number:</td>";
	$msg.="<td valign='top'>$_POST[PhoneNumber]<br /></td>";
	$msg.="</tr>";
	
	$msg.="<tr>";
	$msg.="<td  valign='top'>Best time to call:</td>";
	$msg.="<td valign='top'>$_POST[timeToCall]<br /></td>";
	$msg.="</tr>";
	endif;
	
	$msg.="<tr>";
	$msg.="<td  valign='top'>Message:</td>";
	$msg.="<td valign='top'>$_POST[comment]</td>";
	$msg.="</tr>";
		
	$msg.="</table>";
	
	$msg.="</td></tr>";
	
	$msg.="</table>";

		$headersf2 = "From: ".$_POST[FullName]." <".$fromemail.">" . "\r\n";
		$headersf2 .= "Content-Type: text/html; charset=iso-8859-1\n";
		$headersf2 .= "MIME-Version: 1.0\n" ;
		$headersf2 .= "X-Priority: 1 (Highest)\n";
		$headersf2 .= "X-MSMail-Priority: High\n";
		$headersf2 .= "Importance: High\n";
		$headersf2 .= "Reply-To: ".$_POST[FullName]." <".$fromemail.">" . "\r\n";
		$headersf2 .= "Return-Path:".$_POST[FullName]." <".$fromemail.">" . "\r\n";
		$headersf2 .= "X-Mailer: PHP". phpversion() ."\r\n";
			
$adminemail="info@jagdambacement.com";
	if(mail($adminemail,$subject,$msg,$headersf2)):
		//$msg1='mailsent';
		header('location:'.URL_PATH.$_GET['back']);
	endif;
	
	else:
		echo '<font color="#FF0000">Security code doesn\'t matched. Please type the valid security code.</font>';
	endif;
endif;

?>