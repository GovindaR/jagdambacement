<?php include_once("library/config.php");

include_once("library/connection.php");

include_once("class/kml_class.php");	



$kml = new kml($conn);



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

<title>Jagdamba Cement</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Oswald|Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">


<script type="text/javascript" src="js/output.min.js"></script>
<link rel="stylesheet" href="css/index.css" type="text/css" media="screen" />

<link href="css/feedback.css" rel="stylesheet" type="text/css">

<link href="css/dropdown.css" rel="stylesheet" type="text/css">

<link href="css/bootstrap-overwrite.css" rel="stylesheet" type="text/css">

<script type='text/javascript' src='scripts/output.min.js'></script>

<link rel='stylesheet' id='camera-css'  href='css/camera.css' type='text/css' media='all'>


<!-- Slider Extraa -->
    <!--<script src="js/scriptimg.js" type="text/javascript"></script>-->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#iview').iView({
                pauseTime: 22000,
                directionNav: false,
                controlNav: true,
                tooltipY: -15
            });
        });
    </script>


<script>

jQuery(function(){

	

	// jQuery('#camera_wrap_1').camera({									

	// 	loader: 'none',

	// 	navigation:false,

	// 	playPause: false,

	// 	height:'29.333333333333333333333333333333%'	

	// });

	

	// $('#camera_wrap_1').css('margin-bottom','0');

	

});

</script>

<style>

.camera_pag {

	position:absolute;

	bottom:0;

	width:100%;

}

.camera_wrap .camera_pag .camera_pag_ul {

	text-align:center;

}

</style>
<link rel="stylesheet" href="css/style2.css" />

 <style type="text/css">
 .ws_controls{
  display: none;
 }
  .ws-title{
    display: none !important;
  }
      #screen {
        position: absolute;
        width: 100%;
        height: 300px;
        background: #000;
        overflow: hidden;
      }
      #screen img, canvas { 
        width: 100%;
        position: absolute;
        left: -9999px;
        cursor: pointer;
        image-rendering: optimizeSpeed;

      }
      #screen .href {
        border: #FFF dotted 1px;
      }
      #screen .fog { 
        position: absolute;
        background: #fff;
        opacity: 0.1;
        filter: alpha(opacity=10);
      }
      #command {
        position:absolute;
        left: 1em;
        top: 1em;
        width: 180px;
        z-index: 30000;
        background:url('img/black-Linen-opacity.png') repeat top left;
        display:none;
        border: #333 solid 1px;
      }
      #command .img-ribbon{
        width:60px; 
         z-index:30000; 
         height:30px;
         left: -8px;}
      #bar {
        position:relative;
        left: 1em;
        top: 1em;
        
        margin-top:40px;
        height: 250px;
      }
      #bar .button { 
        position: absolute;
        background: #222;
        width: 70px;
        height: 39px;
        cursor: pointer;
      }
      #bar .loaded { 
        background: #333;
      }
      #bar .viewed { 
        background: #00b8d2;
      }
      #bar .selected { 
        background: #0075a0;
      }
      #urlInfo {
        position: absolute;
        background: url(images/r.png) no-repeat;
        visibility: hidden;
        z-index: 30000;
        padding-left:30px;
        cursor: pointer;
      }
    </style>
    
    
      <link rel="stylesheet" type="text/css" href="css/responsive.css">
        
</head>



<body>
  
<!-- Google Tag Manager (noscript) -->

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MZ3NMML"

height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<!-- End Google Tag Manager (noscript) -->



<?php include("includes/pop-up.php");

include("includes/feedback.php");?>

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
<div class="banner">
    <!-- Start WOWSlider.com BODY section -->
    <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
<div id="wowslider-container1">
<div class="ws_images"><ul>
    
    
   
    
    <li><a href="http://wowslider.net"><img src="data1/images/new/laminated-bora.jpg" alt="html5 slideshow" title="jc_Campaign_Slideshow_02" id="wows1_5"/></a></li>
     <li><img src="data1/images/new/nsaward_1200X352_opt.jpg" alt="Award-Ad" title="Award-Ad" id="wows1_2"/></li>
  
    <li><img src="data1/images/new/OPC_1200X352_opt.jpg" alt="web_site_banner_1200-x-352-px" title="web_site_banner_1200-x-352-px" id="wows1_6"/></li>
    <li><img src="data1/images/new/force_1200X352.jpg" alt="1200X352 elephant" title="1200X352 elephant" id="wows1_0"/></li>
    <li><img src="data1/images/new/PPC_1200X352_opt.jpg" alt="web_site_banner_1200-x-352-px" title="web_site_banner_1200-x-352-px" id="wows1_6"/></li>
    <li><img src="data1/images/new/JC_Elephant_1200X352_opt.jpg" alt="1200X352 workers" title="1200X352 elephant" id="wows1_1"/></li>
    <li><img src="data1/images/new/PSC_1200X352_opt.jpg" alt="web_site_banner_1200-x-352-px" title="web_site_banner_1200-x-352-px" id="wows1_6"/></li>
     <li><img src="data1/images/new/UPOPC_1200X352_opt.jpg" alt="web_site_banner_1200-x-352-px" title="web_site_banner_1200-x-352-px" id="wows1_6"/></li>
     <li><img src="data1/images/new/JC_flag_1200X352_opt.jpg" alt="jc_Campaign_Slideshow" title="jc_Campaign_Slideshow" id="wows1_3"/></li>
     <li><img src="data1/images/new/active-altimo-opt.jpg" alt="web_site_banner_1200-x-352-px" title="web_site_banner_1200-x-352-px" id="wows1_6"/></li>
     <li><img src="data1/images/new/bhusan-dahal.jpg" alt="web_site_banner_1200-x-352-px" title="web_site_banner_1200-x-352-px" id="wows1_6"/></li>
       <li><a href="http://wowslider.net"><img src="data1/images/new/JC_workers_1200X352_opt.jpg" alt="html5 slideshow" title="jc_Campaign_Slideshow_02" id="wows1_4"/></a></li>
      <li><img src="data1/images/new/app_1200X352_opt.jpg" alt="web_site_banner_1200-x-352-px" title="web_site_banner_1200-x-352-px" id="wows1_6"/></li>
    
  </ul></div>
  <!--<div class="ws_bullets"><div>-->
  <!--  <a href="#" title="1200X352 elephant"><span><img src="data1/tooltips/1200x352_elephant.jpg" alt="1200X352 elephant"/>1</span></a>-->
  <!--  <a href="#" title="1200X352 workers"><span><img src="data1/tooltips/1200x352_workers.jpg" alt="1200X352 workers"/>2</span></a>-->
  <!--  <a href="#" title="Award-Ad"><span><img src="data1/tooltips/awardad.jpg" alt="Award-Ad"/>3</span></a>-->
  <!--  <a href="#" title="jc_Campaign_Slideshow"><span><img src="data1/tooltips/jc_campaign_slideshow.jpg" alt="jc_Campaign_Slideshow"/>4</span></a>-->
  <!--  <a href="#" title="jc_Campaign_Slideshow_02"><span><img src="data1/tooltips/jc_campaign_slideshow_02.jpg" alt="jc_Campaign_Slideshow_02"/>5</span></a>-->
  <!--  <a href="#" title="jc_Campaign_Slideshow"><span><img src="data1/tooltips/Website banner_ultimo_1200x352 (1).jpg" alt="jc_Campaign_Slideshow"/>6</span></a>-->
  <!--  <a href="#" title="web_site_banner_1200-x-352-px"><span><img src="data1/tooltips/web_site_banner_1200x352px.jpg" alt="web_site_banner_1200-x-352-px"/>7</span></a>-->
  <!--</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">bootstrap carousel</a> by WOWSlider.com v8.8</div>-->
<div class="ws_shadow"></div><!-- <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">bootstrap carousel example</a> by WOWSlider.com v8.8</div> -->
<!-- <div class="ws_shadow"></div>
</div> -->  

<!-- End WOWSlider.com BODY section -->
        <!--  <div id="iview">
             <div id="screen">
              <div id="command">
                <img src="img/top_ribbon.png" class="img-ribbon" alt="" />
                <div id="bar"></div>
              </div>
              <div id="urlInfo"></div>
            </div>
         </div>
 -->

    <!-- <div class="camera_wrap camera_azure_skin" id="camera_wrap_1"> -->

      <?php

		// $slide_sql = "SELECT * FROM slideshow WHERE IsLocked='F'";

		// $slide_stmt = $conn->prepare($slide_sql);

		// $slide_stmt->execute();

		// while($slide_rows = $slide_stmt->fetch()){	

		// 	echo '<div data-src="'.URL_PATH.'uploads/'.$slide_rows['Image'].'"></div>';			

		// }
		?>

    </div>

  </div>

  
  <?php /*

  <!--<div class="container">

    <div class="row" style="padding:0 5px;">

      <div class="slide">

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

          <?php

      	$slide_sql = "SELECT * FROM slideshow WHERE IsLocked='F'";

		$slide_stmt = $conn->prepare($slide_sql);

		$slide_stmt->execute();?>

          <ol class="carousel-indicators">

            <?php

        	for($i=0;$i<$slide_stmt->rowCount();$i++){

				echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" '.(($i==0)?'class="active"':'').'></li>';

			}

		?>

          </ol>

          <div class="carousel-inner">

            <?php

        	$i=1;

			while($slide_rows = $slide_stmt->fetch()){

				echo '<div class="item '.(($i==1)?'active':'').'"> <img src="'.URL_PATH.'uploads/'.$slide_rows['Image'].'" alt="'.$slide_rows['Title'].'"> </div>';

			$i++;

			}

		?>

          </div>

        </div>

      </div>

    </div>

  </div>

  

  <section id="feature_slider" class="lol">

    <article class="slide" id="showcasing" style="background: url('img/img/landscape.png') repeat-x top center;"> <img class="asset left-30 sp600 t120 z1" src="img/img/macbook.png" />

      <div class="info">

        <h2>Excellent Products for Your Dream Projects.</h2>

      </div>

    </article>

    <article class="slide" id="ideas" style="background: url('img/img/aqua.jpg') repeat-x top center;">

      <div class="info">

        <h2>wide range of products for your dream home</h2>

      </div>

      <img class="asset left-480 sp600 t260 z1" src="img/img/left.png" /> <img class="asset left-210 sp600 t213 z2" src="img/img/middle.png" /> <img class="asset left60 sp600 t260 z1" src="img/img/right.png" /> </article>

    <article class="slide" id="tour" style="background: url('img/img/color-splash.jpg') repeat-x top center;"> <img class="asset left-472 sp650 t210 z3" src="img/img/ipad.png" /> <img class="asset left-365 sp600 t270 z4" src="img/img/iphone.png" /> <img class="asset left-350 sp450 t135 z2" src="img/img/desktop.png" /> <img class="asset left-185 sp550 t220 z1" src="img/img/macbook3.png" />

      <div class="info">

        <h2>A World Class Products</h2>

        <a href="features.html">SEE	THE PRODUCTS</a> </div>

    </article>

    <article class="slide" id="responsive" style="background: url('img/img/indigo.jpg') repeat-x top center;"> <img class="asset left-472 sp600 t120 z3" src="img/img/html5.png" /> <img class="asset left-190 sp500 t120 z2" src="img/img/css3.png" />

      <div class="info">

        <h2> Completed <strong>200 Prestigious Projects</strong> and still counting </h2>

      </div>

    </article>

  </section>-->
  */?>

  

  <div class="container top-shadow home-top" style="position:relative;">

    <div class="row">

      <div class="col-sm-12">

        <div style="padding: 30px 15px 0 15px;" class="our__product">
<small style="margin-bottom: 30px;">
         <h1>Jagdamba Cement Industries Pvt. Ltd. </h1>
          </smal>
        </div>

        <div class="row worker">

          <div class="col-sm-9" style="padding-bottom:20px;">

            <div style="padding: 0 15px 15px 15px;">

              <h3>We Realize the Vision of Our Clients</h3>

              <p><?php echo $kml->textLimit($kml->getValue('content',26,'Details'),500);?></p>

              <a href="<?php echo URL_PATH . "company-profile.html";?>" class="more">more infos »</a></div>

          </div>

          <div class="col-sm-3"></div>

        </div>

      </div>

    </div>

  </div>
  <!-- <div class="row__background">
     &nbsp;
  </div> -->
 <div class="offer-banner">
    <img data-src="img/award-banner-jagdamba-cement.jpg" class="img-responsive">
  </div>
  
  <br /><br />
  

  <div class="container reviewBox">

    <div class="row">

      <div class="col-sm-12">

        <?php 

	  	$review_sql = "SELECT * FROM reviews WHERE IsLocked='F' ORDER BY PostedDate DESC LIMIT 1";

		$review_stmt = $conn->prepare($review_sql);

		$review_stmt->execute();

		$review_rows = $review_stmt->fetch();

	  ?>

        <p><?php echo $kml->textLimit($review_rows['Details'],200)?></p>

        <span><?php echo $review_rows['Title'].(($review_rows['Address'])?", ".$review_rows['Address']:"");?></span> <!-- <a href="clients-testimonials.php">more  >></a> --> </div>

    </div>

  </div>
<div class="container top-shadow" style="position:relative;z-index:99;top:-1px;">
    <div class="row">
      <div class="col-sm-12"> 
      <div style="padding:30px 15px 18px 15px">       
        <div class="row">
          <div class="col-sm-12 clearfix our__product">
            <small style="margin-bottom: 30px;">
              <h1>Clients &amp; Testimonials</h1>
            </small>
                    <div class="reviewin-boxwrap clearfix">
          <div class="reviewPhoto"><div class="img"><img data-src="uploads/reviews_1.jpg" width="100" alt="Aankhu Khola Jalbidhyut Company Ltd." class="img-responsive"></div></div>
          <div class="reviewin-box">
          <div class="reviewin-box-txt"> <p>We would like to extend our warmest appreciation to your company for  regular and timely supply of required Ultra Premium OPC Cement for the  construction of Aankhukhola-1 Hydropower project (8.4 MW) in Dhading  district promoted by this Company.</p></div>
                        <div class="reviewin-box-see"><a href="uploads/reviews_thumb_1.jpg" class="various" data-fancybox-type="iframe">see the letter from Aankhu Khola Jalbidhyut Company Ltd.</a></div>
                        </div>
          <div class="reviewin-by"><span>-Aankhu Khola</span> 
            <br>Jalbidhyut Company Ltd.,<br> Dhading, Nepal</div>
        </div>
        
                  <div class="reviewin-boxwrap clearfix" style="margin-left: 39px;">
          <div class="reviewPhoto"><div class="img"><img data-src="uploads/reviews_2.jpg" width="100" alt="Om Prakash Subedi, General Manager, Panchakanya Group" class="img-responsive"></div></div>
          <div class="reviewin-box">
          <div class="reviewin-box-txt"><p>We are happy to announce that in due course of our business we found the  quality as well as the delivery of the product highly satisfactory to  our need.</p>
<p>We majorly appreciate M/S Jagdamba Cement Industries Pvt.  Ltd., Tinkune, for providing consistent quality product and efficient  service to us and wish its further progress in the years to come.</p></div>
                        <div class="reviewin-box-see"><a href="uploads/reviews_thumb_2.jpg" class="various" data-fancybox-type="iframe">see the letter from Om Prakash Subedi, General Manager, Panchakanya Group</a></div>
                        </div>
          <div class="reviewin-by"><span>-Om Prakash Subedi</span>
            <br>General Manager,Panchakanya Group <br> Krishna Galli, Lalitpur</div>
        </div>
        <a href="clients-testimonials.php" class="testa">more  &gt;&gt;</a>
         </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  

  <div class="ourClients">
    <div class="container">
      <div class="row">

      <div class="col-sm-12 our__product">
<small style="margin-bottom: 40px;">
        <h4>Our Clients
        </h4>
</small>
        <a href="clients-testimonials.php?id=2" class="panchakanya"> </a> <a href="clients-testimonials.php?id=6" class="nih"> </a> <a href="clients-testimonials.php?id=3" class="bhat-bhateni"> </a> <a href="clients-testimonials.php" class="hbl"> </a> <a href="clients-testimonials.php?id=1" class="aankhukhola-hydropower"> </a> </div>

    </div>
    </div>
  </div>

  

  <div class=" footerIcon">
    <div class="container">
     <!--  <img src="img/house.png" alt="img"> -->
    </div>
   </div>
  <div id="footerWrap">

    <div class="container footer">

      <div class="row">

        <?php include('includes/footer.php');?>

      </div>

    </div>

    <div class="container">

      <?php 

			$s_hit_sql = "SELECT * FROM hit_count";

			$s_hit_stmt = $conn->prepare($s_hit_sql);

			$s_hit_stmt->execute();

			$s_hit_rows = $s_hit_stmt->fetch();

			$new_hit = $s_hit_rows['Hit']+1;			

			$u_hit_sql = "UPDATE hit_count SET Hit='".$new_hit."' WHERE Id='".$s_hit_rows['Id']."'";

			$u_hit_stmt = $conn->prepare($u_hit_sql);

			$u_hit_stmt->execute();

			?>

      <div class="hit_counter"> This website has been viewed : <span><?php echo $new_hit?></span>&nbsp;times</div>

    </div>

  </div>

</div>
<!-- footer -->
<?php include('includes/footer-last.php');?>
<!-- <script type="text/javascript">
    /* ==== start script ==== */
    setTimeout(function () {
        m3D.init(
    [
      { src: 'photo1.jpg' },
      { src: 'photo2.jpg' },
      { src: 'photo3.jpg' },
      { src: 'photo4.jpg' },
      { src: 'photo5.jpg' },
      { src: 'photo6.jpg' },
      { src: 'photo7.jpg' },
      { src: 'photo8.jpg' },
      { src: 'photo9.jpg' },
      { src: 'photo10.jpg' },
      { src: 'photo11.jpg' },
      { src: 'photo6.jpg' },
      { src: 'photo1.jpg' },
      { src: 'photo5.jpg' },
      { src: 'photo2.jpg' },
      { src: 'photo16.jpg' },

    ]
  );
    }, 500);
</script> -->
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>

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