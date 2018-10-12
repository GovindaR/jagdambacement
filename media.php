<?php session_start();

include_once("library/config.php");

include_once("library/connection.php");

include_once("class/kml_class.php");	

$kml = new kml($conn);

$kml->selectData('content',31);

$media_image = $rows['Image'];

isset($_GET['mediaid']) ? $kml->selectData('m_d_category',$_GET['mediaid']) : $kml->selectData('content',31);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <!-- Google Tag Manager -->
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

})(window,document,'script','dataLayer','GTM-MZ3NMML');</script>

<!-- End Google Tag Manager -->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $rows['Title'].' - '.COMPANY_NAME; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Oswald|Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
 <script type="text/javascript" src="js/output.min.js"></script>
  <!-- <script type="text/javascript" src="js/output.min.js"></script> -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

<link href="css/feedback.css" rel="stylesheet" type="text/css">

<link href="css/dropdown.css" rel="stylesheet" type="text/css">

<link href="css/bootstrap-overwrite.css" rel="stylesheet" type="text/css">

<link href="poll/css/style.css" rel="stylesheet" type="text/css">


<style>

.camera_thumbs * {

	box-sizing:initial;

	-moz-box-sizing:initial;

}

.selected img {

	opacity:0.5;

}

.carousel-indicators {

	width: 100%;

	left: 0;

	margin-left: 0;

	padding: 0 15px;

	bottom:0;

}

.carousel-indicators div{display:inline-block}

.carousel-indicators div, .carousel-indicators div.active {

	width: 80px;

	margin: 2px;

	cursor: pointer;

	padding: 1px;

	background: #e1e1e1;

	height: auto;

}

.carousel-indicators div img {

	width: 78px;

	opacity:0.7;

}

.carousel-indicators div.active img {

	opacity:1;

	cursor: auto;

}

</style>
<link rel="stylesheet" href="css/style2.css" />
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

<div class="banner"><img data-src="uploads/content_31.jpg" alt="slide" style="display: block;width: 100%;"></div>

  <div class="container top-shadow" style="position:relative;z-index:;top:-1px;">

    <div class="row">

      <div class="col-sm-12">

        <div style="padding: 15px">

          <div class="row">

            <div class="col-sm-8 media__border our__product">
            <small style="margin-bottom: 10px;">
              <h1><?php echo $rows['Title']?></h1>
            </small>

              <?php //echo $rows['Details'];

		   if(isset($_GET['mediaid'])):

		   $sub_md_sql = 'SELECT * FROM m_d_category WHERE ParentId='.$rows['Id'];

			$sub_md_stmt = $conn->prepare($sub_md_sql);

			$sub_md_stmt->execute();

			while($sub_md_rows = $sub_md_stmt->fetch()):?>

              <div class="panel panel-default">

                <div class="panel-heading">

                  <h3><?php echo $sub_md_rows['Title'];?></h3>

                </div>

                <div class="panel-body">

                  <div style="row">

                    <center>

                      <?php

              	$md_sql = 'SELECT * FROM m_d WHERE CatId='.$sub_md_rows['Id'];

				$md_stmt = $conn->prepare($md_sql);

				$md_stmt->execute();

				$i=1;

				while($md_rows = $md_stmt->fetch()){

					if(!empty($md_rows['Video'])){

						$link = '//www.youtube.com/watch?v='.$kml->youtube_video($md_rows['Video']);

						$lightbox = NULL;

					}else if(!empty($md_rows['Image'])){

						$link = URL_PATH.'uploads/'.$md_rows['Image'];

						$lightbox = 'id="single_2"';

					}else{

						$link = '#';

						$lightbox = NULL;

					}

					echo '<div class="col-sm-4 media_box"><a '.$lightbox.' href="'.$link.'" target="_blank"><img src="uploads/'.$md_rows['ThumbImage'].'" class="img-responsive" /></a><h4><a '.$lightbox.' href="'.$link.'" target="_blank">'.$md_rows['Title'].'</a></h4></div>';



					echo $i%3==0?'<div style="clear:both;"></div>':'';



				$i++;



				}



			  ?>

                    </center>

                  </div>

                  <div class="clearfix"></div>

                  <?php echo $sub_md_rows['Details'];?> </div>

              </div>

              <?php endwhile;

			  

			  echo '<a href="javascript:history.back();" class="btn btn-primary">Back </a>';

			  

              else:		  



            	$m_d_sql = 'SELECT * FROM m_d_category WHERE TypeId=1';

				$m_d_stmt = $conn->prepare($m_d_sql);

				$m_d_stmt->execute();				



				while($m_d_rows = $m_d_stmt->fetch()){

					$sub_m_d_sql = 'SELECT * FROM m_d_category WHERE ParentId='.$m_d_rows['Id'].' ORDER BY PostedDate DESC';

					$sub_m_d_stmt = $conn->prepare($sub_m_d_sql);

					$sub_m_d_stmt->execute();

					if($sub_m_d_stmt->rowCount() > 0):?>

              <div class="panel panel-default">

                <div class="panel-heading">

                  <h3><?php echo $m_d_rows['Title'];?></h3>

                </div>

                <div class="panel-body">

                  <div style="row">

                    <?php while($md_rows = $sub_m_d_stmt->fetch()){

						  $sub_image = 'uploads/'.$kml->get_value('m_d',$md_rows['Id'],'ThumbImage','CatId');

						  //echo $md_rows['Id'];

						  echo '<div class="col-sm-4 media_box"><center><a href="#" data-toggle="modal" data-target=".myModal_'.$m_d_rows['Id'].'_'.$md_rows['Id'].'" ><img src="'.$sub_image.'" class="img-responsive" /></a><h4>'.$md_rows['Title'].'</h4></center></div>';?>

                    

                    <!-- Modal -->

                    <div class="modal fade bs-example-modal-lg <?php echo 'myModal_'.$m_d_rows['Id'].'_'.$md_rows['Id'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

                      <div class="modal-dialog modal-lg">

                        <div class="modal-content">

                          <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            <h4 class="modal-title"><?php echo $md_rows['Title'];?></h4>

                          </div>

                          <div class="modal-body">

                          

                          <div class="row">

                          <div class="col-sm-12 text-center">

                          <script>

$(document).ready(function(){

	$('.carousel_<?php echo $md_rows['Id'];?>').carousel();

});



</script>

                       

                      <div id="carousel-example-generic_<?php echo $md_rows['Id']?>" class="carousel_<?php echo $md_rows['Id']?> slide" data-ride="carousel" data-interval="false">

                    <?php	  

              	$thumb_md_sql = 'SELECT ThumbImage FROM m_d WHERE CatId='.$md_rows['Id'];

				$thumb_md_stmt = $conn->prepare($thumb_md_sql);

				$thumb_md_stmt->execute();

				$thumb_md_data  = $thumb_md_stmt->rowCount();

				if($thumb_md_data > 1):

					echo ' <div class="carousel-indicators">';

					$i=0;

					while($thumb_md_rows = $thumb_md_stmt->fetch()){

						echo '<div data-target="#carousel-example-generic_'.$md_rows['Id'].'" data-slide-to="'.$i.'" class="'.(($i==0)?'active' : '').'"><img src="'.URL_PATH.'uploads/'.$thumb_md_rows['ThumbImage'].'"></div>';

					$i++;}

					echo '</div>'; 

				endif;

				?>                  

               

                

                <div class="carousel-inner">     

                <?php	  

              	$thumb_md_sql = 'SELECT * FROM m_d WHERE CatId='.$md_rows['Id'];

				$thumb_md_stmt = $conn->prepare($thumb_md_sql);

				$thumb_md_stmt->execute();

				$thumb_md_data  = $thumb_md_stmt->rowCount();

				$i=1;

				while($thumb_md_rows = $thumb_md_stmt->fetch()){

					if(!empty($md_rows['Video'])){

						$link = '//www.youtube.com/watch?v='.$kml->youtube_video($thumb_md_rows['Video']);

						$lightbox = NULL;

					}else if(!empty($thumb_md_rows['Image'])){

						$link = 'uploads/'.$thumb_md_rows['Image'];

						$lightbox = 'class="fancybox-thumb" rel="fancybox-thumb_'.$md_rows['Id'].'"';

					}else{

						$link = '#';

						$lightbox = NULL;

					}

					echo '<div class="item '.(($i==1)?'active':'').'"> <img src="'.$link.'" alt=""></div>';

					

					

					//echo '<div data-thumb="uploads/'.$thumb_md_rows['ThumbImage'].'" data-src="'.$link.'"></div>';



				$i++;



				}?>

                </div>               

				</div>

                </div>

                </div>

				<?php echo !empty($md_rows['Details']) && $thumb_md_data > 0 ? '<div class="clearfix"></div><hr />':'';?>

                            <?php echo $md_rows['Details']?>

                            <div class="clear"></div>

                          </div>

                          <div class="modal-footer">

                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                          </div>

                        </div>

                      </div>

                    </div>

                    <?php }?>

                    <div class="clearfix"></div>

                  </div>

                </div>

                <!--<div class="panel-footer"> <a href="?mediaid=<?php echo $m_d_rows['Id'];?>" class="btn btn-sm btn-default pull-right">read more</a>

                  <div class="clearfix"></div>

                </div>--> 

              </div>

              <?php endif;

			  }



		  endif;



		  ?>

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
<div class="tooltip slide"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>

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

