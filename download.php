<?php session_start();

include_once("library/config.php");

include_once("library/connection.php");

include_once("class/kml_class.php");	



$kml = new kml($conn);

$kml->selectData('content',32);

if(isset($_GET['title'])){

	$_SESSION['header'] = "http://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];

	//echo $_SESSION['header']."sdfsadfsa";

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

<title><?php echo $rows['Title']?></title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Oswald|Roboto' rel='stylesheet' type='text/css'>

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

<script type="text/javascript" src="fancybox/jquery.fancybox.js?v=2.1.4"></script>

<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css?v=2.1.4" media="screen" />
<link rel="stylesheet" href="css/style2.css" />
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<script>

$(document).ready(function() {

	$(".various").fancybox({

		maxWidth	: 800,

		maxHeight	: 600,

		fitToView	: false,

		width		: '70%',

		height		: '70%',

		autoSize	: false,

		closeClick	: false,

		openEffect	: 'none',

		closeEffect	: 'none'

	});

});



$("#single_2").fancybox({

    	openEffect	: 'elastic',

    	closeEffect	: 'elastic',



    	helpers : {

    		title : {

    			type : 'inside'

    		}

    	}

    });

</script>
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
<div class="banner"><img src="<?php echo ($rows['Image'] == "" || empty($rows['Image']))? "img/slide-01.jpg" : URL_PATH."uploads/".$rows['Image'];?>" class="img-responsive" /></div>

  <div class="container top-shadow" style="position:relative;z-index:97;top:-1px;">

    <div class="row">

      <div class="col-sm-12">

      <div style="padding: 15px">        

        <div class="row">

          <div class="col-sm-8 dwonload__h1 our__product ">
<small style="margin-bottom: 10px;">
            <h1><?php echo $rows['Title']?></h1>
            </small>

           <?php echo $rows['Details']?>

          <?php

            	$m_d_sql = 'SELECT * FROM m_d_category WHERE TypeId=2';

				$m_d_stmt = $conn->prepare($m_d_sql);

				$m_d_stmt->execute();

				while($m_d_rows = $m_d_stmt->fetch()){?>

          <div style="overflow:hidden;">

            <h3><?php echo $m_d_rows['Title'];?></h3>

            <p><?php echo $kml->textLimit($m_d_rows['Details'],150);?></p>

            <div class ="row download-row">

              <?php

              	$md_sql = 'SELECT * FROM m_d WHERE CatId='.$m_d_rows['Id'];

				$md_stmt = $conn->prepare($md_sql);

				$md_stmt->execute();

				$i=1;

				while($md_rows = $md_stmt->fetch()){

					if(!empty($md_rows['Video'])){

						$link = '//www.youtube.com/watch?v='.$kml->youtube_video($md_rows['Video']);

					}else if(!empty($md_rows['Image'])){

						$link = URL_PATH.'uploads/'.$md_rows['Image'];

					}else{

						$link = '#';

					}

					

					echo '<div class="col-sm-4" style="margin-bottom:20px;text-align:left;"><a href="'.$link.'" target="_blank"><img src="uploads/'.$md_rows['ThumbImage'].'" width="185" height="104" /></a><h4><a href="'.$link.'" target="_blank">'.$md_rows['Title'].'</a></h4></div>';

					echo $i%3==0?'<div style="clear:both;height:20px;"></div>':'';
				$i++;

				}

			  ?>

              

            </div>

           <!-- <a href="#" style="text-align:right;">read more</a>-->

           </div>

          <?php }?>

         </div>

          <div class="col-sm-4">

          	  

			  <?php include("includes/facebook.php");?>

              <?php include("poll/index.php");?>

              

          </div>

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

 <!--/end siteWrap/-->
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
