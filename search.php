<?php session_start();

include_once("library/config.php");

include_once("library/connection.php");

include_once("class/kml_class.php");	



$kml = new kml($conn);

if(isset($_GET['keywords'])):

	$search_sql = 	"SELECT Alias FROM content WHERE Title LIKE CONCAT('%', :keywords, '%')

					 UNION					

					 SELECT Alias FROM plant WHERE Title LIKE CONCAT('%', :keywords, '%')

					 UNION

					 SELECT Alias FROM products WHERE Title LIKE CONCAT('%', :keywords, '%')";

	$search_stmt = $conn->prepare($search_sql);

	$search_stmt->bindParam(':keywords',$_GET['keywords']);

	$search_stmt->execute();

else :

	header('location:'.URL_PATH.'index.php');

endif;

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

<title><?php if(isset($_GET['keywords']))$search =  $_GET['keywords']." - ";

echo $search . "Search - ".COMPANY_NAME;?></title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Oswald|Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

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
 <div class="banner"><img data-src="img/slide-01.jpg" alt="slide" style="display: block;width: 100%;"></div>
 

  <div class="container top-shadow" style="position:relative;z-index:99;top:-1px;">

    <div class="row">

      <div class="col-sm-12">        

        <div style="padding: 15px">

        <div class="row">

        

          <div class="col-sm-8 search-header our__product">
<small style="margin-bottom: 10px;">
            <h1><?php if(isset($_GET['keywords']))$search =  $_GET['keywords']." - ";

echo $search . "Search";?></h1>
</small>

           <?php if(isset($_GET['keywords'])):

		   		while ($search_rows = $search_stmt->fetch()):

					$content_sql = "SELECT * FROM content WHERE Alias='".$search_rows['Alias']."'";

					$content_stmt = $conn->prepare($content_sql);

					$content_stmt->execute();

					if($content_stmt->rowCount()>0){

						$content_rows = $content_stmt->fetch();

						$link = URL_PATH.(($content_rows['Urls'])? $content_rows['Urls']:'inner.php?title='.$content_rows['Alias']);

						$details = $content_rows['Details'];

						$title = $content_rows['Title'];

					}

					

					$plant_sql = "SELECT * FROM plant WHERE Alias='".$search_rows['Alias']."'";

					$plant_stmt = $conn->prepare($plant_sql);

					$plant_stmt->execute();

					if($plant_stmt->rowCount()>0){

						$plant_rows = $plant_stmt->fetch();

						$link = URL_PATH.'plant.php?title='.$plant_rows['Alias'];

						$details = $plant_rows['Details'];

						$title = $plant_rows['Title'];

					}

					$products_sql = "SELECT * FROM products WHERE Alias='".$search_rows['Alias']."'";

					$products_stmt = $conn->prepare($products_sql);

					$products_stmt->execute();

					if($products_stmt->rowCount()>0){

						$products_rows = $products_stmt->fetch();

						$link = URL_PATH.'product.php?title='.$products_rows['Alias'];

						$details = $products_rows['Details'];

						$title = $products_rows['Title'];

					}

			?>

            <div class="panel panel-default">

                <div class="panel-body">

                    <h4 style="margin-top:0;"><a href="<?php echo $link;?>" style="color:#525252;text-decoration:none;"><?php echo $title;?></a></h4>

                    <a href="<?php echo $link;?>"><?php echo $link;?></a>

                    <p><?php echo $kml->textLimit($details,150);?></p>

                </div>

            </div>

            <?php endwhile;

		endif;?>		

        



         </div>

        

          <div class="col-sm-4">          	  
			  <?php include("includes/facebook.php");?>
              <!-- <?php include("poll/index.php");?> -->
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
<!-- footer -->
<?php include('includes/footer-last.php');?>
<script type="text/javascript" src="js/output.min.js"></script>
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

