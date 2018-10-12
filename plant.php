<?php include_once("library/config.php");

include_once("library/connection.php");

include_once("class/kml_class.php");	



$kml = new kml($conn);



if($_GET['title']){

	$kml->selectData('plant',$_GET['title']);

}else{

	$kml->selectData('content',20);

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

<title><?php echo $rows['Title'];?></title>

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

<script type="text/javascript" src="fancybox/jquery.fancybox.js?v=2.1.4"></script>

<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css?v=2.1.4" media="screen" />

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
<div class="banner"><img src="<?php echo ($rows['Image'] == "" || empty($rows['Image']))? "img/slide-01.jpg" : URL_PATH."uploads/".$rows['Image'];?>" class="img-responsive" /></div>

  <div class="container top-shadow industrial company__profile" style="position:relative;z-index:99;top:-1px;">

    <div class="row">

      <div class="col-sm-12">

      <div style="padding: 15px">

        <div class="row">

          <div class="col-sm-8 plat__border our__product">
<small style="margin-bottom: 10px;">
            <h1><?php echo $rows['Title']?></h1>
            </small>

            <?php echo $rows['Details'];?>

            <?php			

			if($_GET['title']){			

	$info_cat_sql = "SELECT Id, PlantId FROM brand";

	$info_cat_stmt = $conn->prepare($info_cat_sql);

	$info_cat_stmt->execute();

	$info_id = "";

	while($info_cat_rows = $info_cat_stmt->fetch()){

		foreach(explode(",",$info_cat_rows['PlantId']) as $info_cat){

			//echo $info_cat."==".$cat_id."<br />";

			if($info_cat==$rows['Id']){

				$info_id .= (($info_id=="")?"":",").$info_cat_rows['Id'];

			}

			

		}

	}

	

	$info_id = ($info_id)? $info_id : "0";

	

	$info_sql = "SELECT * FROM brand WHERE Id IN (".$info_id.")";

	//$info_sql.

	$info_stmt = $conn->prepare($info_sql);

	$info_stmt->execute();	

	if($info_stmt->rowCount() > 0){?>

    <div class="clearfix"></div>
    <div class="small__industrial our__product">
      <small style="margin-bottom: 10px;">
            <h2>Brands from this plant</h2>
            </small>
            <div class="row">

              <?php while($info_rows = $info_stmt->fetch()){?>

              

              <div class="col-sm-6" style="margin-bottom:20px">

               <center><a href="<?php echo URL_PATH."uploads/".$info_rows['Image'];?>" id="single_2"><img src="<?php echo URL_PATH."uploads/".$info_rows['Image'];?>" alt="<?php echo $info_rows['Title'];?>" width="190" class="img-responsive" /></a>

                <p><?php echo $info_rows['Title'];?></p>

                </center>


              </div>

              <?php }?>

            </div>
 </div>
            <?php

	}

			}else{

				

				$plant_sql = "SELECT * FROM plant ";

					$plant_stmt = $conn->prepare($plant_sql);

					$plant_stmt->execute();

					while($plant_rows = $plant_stmt->fetch()){?>

            <div class="row x_box">

              <div class="col-sm-3"><img src="<?php echo URL_PATH."uploads/".$plant_rows['Image'];?>" class="img-responsive" /></div>

              <div class="col-sm-9">

              <h3><?php echo $plant_rows['Title']?></h3>

              <p><?php echo $kml->textLimit($plant_rows['Details'],200);?></p>

              <a href="plant.php?title=<?php echo $plant_rows['Alias'];?>" class="more">Know More</a> 

             </div> 

             </div>

            <?php }

			}?>

          </div>

          <div class="col-sm-4">

            <?php include("includes/right-menu.php"); ?>

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

