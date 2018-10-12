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

<html xmlns="http://www.w3.org/1999/xhtml" lang="en-us">

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
<link href="https://fonts.googleapis.com/css?family=Hind:400,500,600,700" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Oswald|Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="owl/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="owl/owl.theme.default.min.css">
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
<!-- vastu -->
<?php 
$pg = $_GET['page'];

$allow = array('आँगन','बालकोनीर','ब्रम्हस्थान','सर्वेन्ट','नाली','बच्चाको-शयनकक्ष','कारखाना','पोर्टिको','ग्यारेज');
if ( !in_array($pg, $allow) ) {
    $pg = NULL;
}
?>

<section class="vastu">
  <div class="container top-shadow home-top" style="position:relative;">

    <div class="row">

      <div class="col-sm-12">

        <div style="padding: 15px 15px 0 15px;" class="our__product">
<small style="margin-bottom: 10px;">
         <h1>Vastu Shastra</h1>
          
        </small></div><small style="margin-bottom: 10px;">

        <div class="row">

          <div class="col-sm-9" style="padding-bottom:20px;">

            <div style="padding: 0 15px 15px 15px;">

              <h3>What is Vastu Shastra?</h3>

              <p>Vastu Shastra is an ancient Indian science of harmony and prosperous living by eliminating negative and enhancing positive energies around us. <br> A home other than being just a house to live, it is an augmentation of our mental space and manifestation of our personality. Each fragment of our life is deeply entwined with the design, décor and maintenance of our home.If the home is not designed according to the Vastu principles then the energy which gets resonated in the house may result to some irreparable harm and loss to owner and the inmates.</p>

              <a href="http://jagdambacement.com/company-profile.html" class="more">more infos »</a></div>

          </div>

          <div class="col-sm-3">
            <a href="#" class="vaastu-sastra">
              <img src="img/vaastu.png" alt="vaastu">
            </a>
          </div>

        </div>

      </small></div><small style="margin-bottom: 10px;">

    </small></div><small style="margin-bottom: 10px;">

 	 </small>
 	 <div class="row" style="margin-top: 20px;">
 	 	<div class="col-sm-12 our__product">
                 <small style="margin-bottom: 10px;">
                  <h2>Vaastu Tips</h2>
                 </small>
        </div>
        <div class="col-sm-12 tab-wrapper">
        <section id="wrapper" class="wrapper">
  <div id="v-nav">
 	<div class="overflow">
 		 <ul>
    <li class="<?php if($pg == 'नाली'){
    	echo 'current';
    }?> "><a href="vaastu.php?page=नाली#v-nav">नाली व्यवस्थापन तथा निकास</a></li>
    <li class="<?php if($pg == 'सर्वेन्ट'){echo 'current';} ?>"><a href="vaastu.php?page=सर्वेन्ट#v-nav">सर्वेन्ट रूम (कुरुवा आवासगृह)</a></li>
    <li class="<?php if($pg == 'आँगन'){echo 'current';} ?>"><a href="vaastu.php?page=आँगन#v-nav">आँगन</a></li>
    <li class="<?php if($pg == 'बालकोनीर'){echo 'current';} ?>"><a href="vaastu.php?page=बालकोनीर#v-nav">बालकोनीर बराण्डा</a></li>
    <li class="<?php if($pg == 'ब्रम्हस्थान'){echo 'current';} ?>"><a href="vaastu.php?page=ब्रम्हस्थान#v-nav">ब्रम्हस्थान 
</a></li>
     <li class="<?php if($pg == 'बच्चाको-शयनकक्ष'){echo 'current';} ?>"><a href="vaastu.php?page=बच्चाको-शयनकक्ष#v-nav">बच्चाको शयनकक्ष </a></li>
    <li class="<?php if($pg == 'कारखाना'){echo 'current';} ?>"><a href="vaastu.php?page=कारखाना#v-nav">कारखाना र फ्याक्ट्री</a></li>
    <li class="<?php if($pg == 'पोर्टिको'){echo 'current';} ?>"><a href="vaastu.php?page=पोर्टिको#v-nav">पोर्टिको</a></li>
    <li class="<?php if($pg == 'ग्यारेज'){echo 'current';} ?>"><a href="vaastu.php?page=ग्यारेज#v-nav">ग्यारेज</a></li>
   
 </ul>
 	</div>
 <div class="tab-content clearfix" style="display: block;">
 	<!-- <?php 
 				include('tabs/house.php');
 	?> -->
 <?php
 	$p = $_GET['page'];

 	$page = "tabs/".$p.".php";

 	if (file_exists($page)) {
 		# code...
 		include($page); 		
 	}
 	else
 		{
 				include('tabs/नाली.php');
 				
 	}
 ?>
 </div>

</section>

        </div>
 	 </div>
	</div>
</section>

 <div class="video">
  <div class="container">
    <div class="video-show ">
      <div class="video-carousel">
      <iframe id="thumb1"  class="youtube-video active-iframe" width="560" height="500" src="https://www.youtube.com/embed/WBWuHX2NEzs?enablejsapi=1&version=3&playerapiid=ytplayer"   allowfullscreen allowscriptaccess="always"></iframe>
      <iframe id="thumb2" class="youtube-video"   width="560" height="500" src="https://www.youtube.com/embed/gkkZFrgTBkk?enablejsapi=1&version=3&playerapiid=ytplayer"  allowfullscreen allowscriptaccess="always"></iframe>
      <iframe id="thumb3" class="youtube-video"  width="560" height="500" src="https://www.youtube.com/embed/P5z1ZvnwkGA?enablejsapi=1&version=3&playerapiid=ytplayer"  allowfullscreen allowscriptaccess="always"></iframe>
      <iframe id="thumb4" class="youtube-video" width="560" height="500" src="https://www.youtube.com/embed/N2oFl5Oc56w?enablejsapi=1&version=3&playerapiid=ytplayer"  allowfullscreen allowscriptaccess="always"></iframe>
      </div>
    </div>
  </div>
    <div class="main-video-carousel">
      <div class="video-carousel">
        <div class="video-carousel1 owl-carousel owl-theme">
                <div class="item item1" onclick="myclick('thumb1','thumb2','thumb3','thumb4')">
                  <a href="#thumb1">
                    <img src="uploads/bato.png" alt="THUMB1">
                  <span>
                    <i class="far fa-play-circle"></i>
                  </span>
                  </a>
                </div>
                <div class="item item2" onclick="myclick('thumb2','thumb1','thumb3','thumb4')">
                  <a href="#thumb2">
                    <img src="uploads/gharko.png" alt="THUMB2">  
                   <span>
                    <i class="far fa-play-circle"></i>
                  </span>
                   </a>
                </div>
                <div class="item item3" onclick="myclick('thumb3','thumb1','thumb2','thumb4')">
                  <a href="#thumb3">
                  <img src="uploads/bhumi.png" alt="THUMB3">
                  <span>
                   <i class="far fa-play-circle"></i>
                  </span>
                   </a>
                </div>
                <div class="item item4" onclick="myclick('thumb4','thumb1','thumb2','thumb3')">
                  <a href="#thumb4">
                  <img src="uploads/mato.png" alt="THUMB4">
                  <span>
                    <i class="far fa-play-circle"></i>
                  </span>
                </a>  
                </div>
                <div class="item item3" onclick="myclick('thumb3','thumb1','thumb2','thumb4')">
                  <a href="#thumb3">
                  <img src="uploads/bhumi.png" alt="THUMB3">
                  <span>
                   <i class="far fa-play-circle"></i>
                  </span>
                   </a>
                </div>
            </div>
      </div>
    </div>
 
</div>

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
<script type="text/javascript" src="js/output.min.js"></script>
<!-- <script type="text/javascript">
               $('#playstop').on('click', function() {
$('#thumb1').contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');    
});
          </script> -->
<!-- <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script> -->
<!-- <script type="text/javascript">
	$(window).on('beforeunload', function(){
    $(window).scrollTop(0);
});
</script> -->

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
<script type="text/javascript">
  $('html, body').animate({
    scrollTop: $("#v-nav").offset().top
}, 1000);
</script>
  <script src="owl/owl.carousel.min.js"></script>
  <script>
            $(document).ready(function() {
              var owl = $('.video-carousel1');
              owl.owlCarousel({
                loop:true,
                margin:20,
                nav:true,
                navText: [ '','' ],
                dots: false,
                autoplay: true,
                autoplayTimeout: 9000,
                text: false,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 3
                  },
                  1000: {
                    items: 4
                  }
                }
              });
            });
          $(document).ready(function() {
  $('.item').click(function(){
    $('#thumb1').removeClass('active-iframe');
    $(this).find("span").css('top','0');
    $(this).find("i").css({"opacity":"1","visibility":"visible"});
  $('.youtube-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
  $('.youtube-video')[1].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
  $('.youtube-video')[2].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
  $('.youtube-video')[3].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
});
});
 </script>
 <script type="text/javascript">
   function myclick(data,data1,data2,data3){
    let dataIframe1 =  document.getElementById(data);
     let dataIframe2 =  document.getElementById(data1);
      let dataIframe3 =  document.getElementById(data2);
       let dataIframe4 =  document.getElementById(data3);
   dataIframe1.style.display ='block';
   dataIframe2.style.display ='none';
   dataIframe3.style.display ='none';
   dataIframe4.style.display ='none';
   }
 </script>
<!--End of Tawk.to Script-->
</body>

</html>

