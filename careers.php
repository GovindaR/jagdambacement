<?php session_start();

include_once("library/config.php");

include_once("library/connection.php");

include_once("class/kml_class.php");	



$kml = new kml($conn);


if(isset($_POST['security_code']))

{

  if(($_SESSION['rand_code'] == $_POST['security_code']) && !empty($_SESSION['rand_code'])) 

  {

    $todaysdate = date("Y-m-d");

    $ip = $_SERVER['REMOTE_ADDR'];

    $fromemail=$_POST["Email"];

    $email=$_POST["Email"];

    

  $subject="Enquiry Received From www.jagdambacement.com Website";

      

  $msg="<font style='font:normal 11pt Arial;'>Dear administrator, <br />You have received an enquiry from ".$_POST[Name].". The details of the enquiry is shown below:</font> <br />";

  $msg.="<font style='font:normal 11pt Arial;'>Enquiry Date: ".$todaysdate."</font> <br />";

  $msg.="<font style='font:normal 11pt Arial;'>IP Address: ".$ip."</font> <br />";

  $msg.="<table width='100%' border='0' cellspacing='0' cellpadding='10' class='menutext'>";

  

  $msg.="<tr height='25'>";

  $msg.="<td colspan='6'>";

  

  //COLLECTION INFORMATION OF CLIENT

  

  $msg.="<table width='100%'  border='0' cellspacing='0' cellpadding='5' class='menutext'>";

  

  $msg.="<tr>";

  $msg.="<td colspan='6' style='border-top:1px #c0c0c0 solid;'></td>";

  $msg.="</tr>";

  

  

  $msg.="<tr>";

  $msg.="<td width='132' valign='top'>Name:</td>";

  $msg.="<td width='368' valign='top'>$_POST[Name]<br /></td>";

  $msg.="</tr>";

    

  $msg.="<tr>";

  $msg.="<td  valign='top'>Email:</td>";

  $msg.="<td valign='top'>$_POST[Email]<br /></td>";

  $msg.="</tr>";

  

  $msg.="<tr>";

  $msg.="<td  valign='top'>Subject:</td>";

  $msg.="<td valign='top'>$_POST[Subject]<br /></td>";

  $msg.="</tr>";

  

  $msg.="<tr>";

  $msg.="<td  valign='top'>Message:</td>";

  $msg.="<td valign='top'>$_POST[commnet]</td>";

  $msg.="</tr>";

    

  $msg.="</table>";

  

  $msg.="</td></tr>";

  

  $msg.="</table>";



    $headersf2 = "From: ".$_POST[Name]." <".$ssemail.">" . "\r\n";

    $headersf2 .= "Content-Type: text/html; charset=iso-8859-1\n";

    $headersf2 .= "MIME-Version: 1.0\n" ;

    $headersf2 .= "X-Priority: 1 (Highest)\n";

    $headersf2 .= "X-MSMail-Priority: High\n";

    $headersf2 .= "Importance: High\n";

    $headersf2 .= "Reply-To: ".$_POST[Name]." <".$ssemail.">" . "\r\n";

    $headersf2 .= "Return-Path:".$_POST[Name]." <".$ssemail.">" . "\r\n";

    $headersf2 .= "X-Mailer: PHP". phpversion() ."\r\n";

      

$adminemail="info@jagdambacement.com";

  if(mail($adminemail,$subject,$msg,$headersf2))

    {

      $msg1='mailsent';   

    }

  }

  else

  {

    $msg1='invalid_captcha';    

  }

}




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<!-- Google Tag Manager -->

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

})(window,document,'script','dataLayer','GTM-MZ3NMML');</script>

<!-- End Google Tag Manager -->
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Jagdamba Cement</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Oswald|Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="js/output.min.js"></script>

<link rel="stylesheet" href="css/index.css" type="text/css" media="screen" />

<link href="css/feedback.css" rel="stylesheet" type="text/css">

<link href="css/dropdown.css" rel="stylesheet" type="text/css">

<link href="css/bootstrap-overwrite.css" rel="stylesheet" type="text/css">

<link href="poll/css/style.css" rel="stylesheet" type="text/css">
<link href="css/essential.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/style2.css" />
<link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>
<body>
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MZ3NMML"

height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<!-- End Google Tag Manager (noscript) -->


<?php include("includes/pop-up.php");?>

<?php include("includes/feedback.php");?>

<div class="header_wrap">

        <?php include('includes/header.php');?>

      </div>
<div class="menu__header">
  <div class="container">
    <div class="row">
      <?php include('includes/menu.php');?>
    </div>
  </div>
</div>

<div class="banner"><img src="uploads/slideshow_18.jpg" alt="slide" style="display: block;width: 100%;"></div>


  <div class="container top-shadow company__profile" style="position:relative;z-index:99;top:-1px;">

  <div style="padding: 15px">
          <div class="row">
            <div class="col-md-12 col-sm-12">
               <div class="col-sm-12 our__product download-border">
                 <small style="margin-bottom: 10px;">
                  <h2>APPLY NOW</h2>
                 </small>
                </div>
                 <form action="" method="post">
                <div class="col-sm-12">
                   <div class="quickForm quickForm1">
                    <input type="text" required="required" placeholder="NAME*" name="Name" value="" class="form-control">
                    <input type="email" required="required" placeholder="EMAIL*" name="Email" id="" value="" class="form-control">
                </div>
                </div>
                 <div class="col-sm-12">
                   <div class="quickForm quickForm1">
                    <input type="number" required="required" placeholder="CONTACT NO*" name="Phone" value="" class="form-control">
                    <input type="text" required="required" placeholder="ADDRESS*" name="Address" id="" value="" class="form-control">
                </div>
                </div>
            
                <div class="col-sm-12 form-group1">
                  <div class="form-group">
                    <div class="col-md-6">
                        <label>
                        Passport Size Photo
                        <!--<small class="text-muted">Passport Size Photo</small>-->
                      </label>
                      <div class="fancy-file-upload fancy-file-primary">
                        <i class="fas fa-upload"></i>
                        <input type="file" class="form-control" name="file_attach[]" onchange="jQuery(this).next('input').val(this.value);" required>
                        <input type="text" class="form-control" placeholder="no file selected" readonly="">
                        <span class="button">Choose File</span>
                      </div>
                      <span class="text-muted block">Max file size: 2.5 Mb (jpg/png)</span>
                    </div>
                    <div class="col-md-6">
                        <label>
                          File Attachment 
                          <span class="text-muted">Curriculum Vitae</span>
                          </label>

                          <!-- custom file upload -->
                          <div class="fancy-file-upload fancy-file-primary">
                          <i class="fas fa-upload"></i>
                          <input type="file" class="form-control" name="file_attach[]" onchange="jQuery(this).next('input').val(this.value);" required>
                          <input type="text" class="form-control"  placeholder="no file selected" readonly="">
                          <span class="button">Choose File</span>
                          </div>
                          <span class="text-muted block">Max file size: 2.5 Mb (zip/pdf/jpg/png)</span>
                      </div>
                  </div>
                </div>
              <div class="col-md-12 col-sm-12 recaptcha quickForm">
               <input type="submit" name="contactOption" value="Send Applicantion" class="btm">
              </div>
                </form>
          </div>

        </div>

    </div>

  </div>
  <!-- video play -->

  <div class="container footerIcon"> </div>

  <div id="footerWrap">

    <div class="container footer">

      <div class="row">

        <?php include('includes/footer.php');?>

      </div>

    </div>

  </div>

</div>
<!-- footer -->
<?php include('includes/footer-last.php');?>

<script>
    function loadImage() {
    var imgDefer = document.getElementsByTagName('img');
    for (var i=0; i<imgDefer.length; i++) {
    if(imgDefer[i].getAttribute('data-src')) {
    imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-src'));
    } } }
    window.onload = loadImage();
  </script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b614126df040c3e9e0c281a/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>

</html>

