<?php include_once("library/config.php");

include_once("library/connection.php");

include_once("class/kml_class.php");	



$kml = new kml($conn);



if(isset($_GET['title'])){

	$kml->selectData('products',$_GET['title']);

}else{

	$kml->selectData('content',21);

}



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

<title><?php echo $rows['Title'];?></title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Oswald|Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/index.css" type="text/css" media="screen" />

<link href="css/feedback.css" rel="stylesheet" type="text/css">

<link href="css/dropdown.css" rel="stylesheet" type="text/css">

<link href="css/bootstrap-overwrite.css" rel="stylesheet" type="text/css">


<link href="poll/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/style2.css" />
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style2.css" />
<link rel="stylesheet" type="text/css" href="css/responsive.css">

<script type="text/javascript" src="fancybox/jquery.fancybox.js?v=2.1.4"></script>

<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css?v=2.1.4" media="screen" />

<script>


$(document).ready(function() {

  var html = "";
     function myFunction() {
  $.ajax({
  url: "https://hamroghar.jagdambacement.com/search/report/0"
  success:  function( data ) {
   console.log(data);
for(var i=0;i<=data.length;i++){
html += '<div class="col-sm-3"><a class="fancybox report" rel="gallery1" href="http://hamroghar.jagdambacement.com/public/uploads/report/'+data[i].image+'" title="Twilight Memories (doraartem)"> \
 <img src="http://hamroghar.jagdambacement.com/public/uploads/report/'+data[i].image+'" alt="'+data[0].description+'" class="img-responsive" width="190"> \
</a><br><p>'+data[i].description+'</p></div>';
}

// $('#result').html(html);
alert(html);
}

});
}
myFunction();

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

  <div class="container top-shadow company__profile  industrial" style="position:relative;z-index:99;top:-1px;">

    <div class="row">

      <div class="col-sm-12">

      <div style="padding: 15px">

        <div class="row">

          <div class="col-sm-8 our__product">
<small style="margin-bottom: 10px;">
            <h1><?php echo $rows['Title']?></h1>
             </small>

            <?php echo $rows['Details'];?>

            

            <?php

			if(isset($_GET['title'])){

	$info_cat_sql = "SELECT Id, ProductId FROM brand";

	$info_cat_stmt = $conn->prepare($info_cat_sql);

	$info_cat_stmt->execute();

	$info_id = "";

	while($info_cat_rows = $info_cat_stmt->fetch()){

		foreach(explode(",",$info_cat_rows['ProductId']) as $info_cat){

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

            

           <h2>Our Brands from <?php echo $rows['Title']; ?></h2>
            
            <div class="row">

            <?php while($info_rows = $info_stmt->fetch()){?>

            	<div class="col-sm-6" style="margin-bottom:20px">

                	<center>

                      <a href="<?php echo URL_PATH."uploads/".$info_rows['Image'];?>" id="single_2"><img src="<?php echo URL_PATH."uploads/".$info_rows['Image'];?>" alt="<?php echo $info_rows['Title'];?>" class="img-responsive" width="190" /></a>

                    <p><?php echo $info_rows['Title'];?></p>

                    </center>

                </div>

            <?php }?>                

                

            </div>

            

            

            <?php

	}

	}else{

				

				$plant_sql = "SELECT * FROM products";

					$plant_stmt = $conn->prepare($plant_sql);

					$plant_stmt->execute();

					while($plant_rows = $plant_stmt->fetch()){?>

                    

            <div class="row x_box">

             <div class="col-sm-3"><img src="<?php echo URL_PATH."uploads/".$plant_rows['Image'];?>" class="img-responsive" /></div>

              <div class="col-sm-9">

              <h3><?php echo $plant_rows['Title']?></h3>

              <p><?php echo $kml->textLimit($plant_rows['Details'],200);?></p>

              <a href="product.php?title=<?php echo $plant_rows['Alias'];?>" class="more">Know More</a> 

             </div> 

             </div>

            <?php }

			}?>

            

			</div>

          <div class="col-sm-4">

            <div class="right-slide" style="padding-top:30px;">

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                  <?php

      	$slide_sql = "SELECT * FROM brand WHERE IsLocked='F' AND ProductId='".$rows['Id']."'";

		$slide_stmt = $conn->prepare($slide_sql);

		$slide_stmt->execute();?>

                  <!-- Indicators -->

  <!--<ol class="carousel-indicators">

    <?php

        	for($i=0;$i<$slide_stmt->rowCount();$i++){

				echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" '.(($i==0)?'class="active"':'').'></li>';

			}

		?>    

  </ol>--> 

                  

                  <!-- Controls -->

                  

                  <div class="carousel-inner">

                    <?php

        	$i=1;

			while($slide_rows = $slide_stmt->fetch()){

				echo '<div class="item '.(($i==1)?'active':'').'"> <img data-src="'.URL_PATH.'uploads/'.$slide_rows['Image'].'" alt="'.$slide_rows['Title'].'"> </div>';

			$i++;

			}

		?>

                  </div>

                  <!--<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>--> </div>

              </div>        

            

            <?php include("includes/right-menu.php"); ?>

            

            <div class="rightBox">

            	<h3>Creatives</h3>

                <?php

                if($rows['Id']==1){

					echo '<a href="img/ppc-creatives1.jpg" id="single_2"><img data-src="img/ppc-creatives1.jpg" class="img-responsive"/></a>';

				}elseif($rows['Id']==2){

					echo '<a href="img/opc-creatives.jpg" id="single_2"><img data-src="img/opc-creatives.jpg" class="img-responsive"/></a>';

				}elseif($rows['Id']==3){

					echo '<a href="img/psc-creatives.jpg" id="single_2"><img data-src="img/psc-creatives.jpg" class="img-responsive"/></a>';

				}else{

					echo '<a href="img/creative.jpg" id="single_2"><img data-src="img/creative.jpg" class="img-responsive"/></a>';

				}

				?>

              

             </div>

              

              <div class="rightBox">

              <h3>Our Commercials</h3>

			  <?php

              	$video_sql = 'SELECT * FROM videos WHERE ProductId='.$rows['Id'].' ORDER BY PostedDate DESC LIMIT 1';

				$video_stmt = $conn->prepare($video_sql);

				$video_stmt->execute();

				while($video_rows = $video_stmt->fetch()){

					$v = $kml->youtube_video($video_rows['v']);

					echo "<iframe width=\"100%\" height=\"200\" src=\"//www.youtube.com/embed/".$v."\" frameborder=\"0\" allowfullscreen></iframe>";
          // echo "<iframe width=\"100%\" height=\"200\" src=\"https://www.youtube.com/embed/K9InkLXQYO8" frameborder=\"0\" allowfullscreen></iframe>";
				}

				

				/*if($rows['Id']==1){

					echo "<iframe width=\"100%\" height=\"200\" src=\"//www.youtube.com/embed/L8ByLDhJ0LE\" frameborder=\"0\" allowfullscreen></iframe>";

				}elseif($rows['Id']==2){

					echo "<iframe width=\"100%\" height=\"200\" src=\"//www.youtube.com/embed/K9InkLXQYO8\" frameborder=\"0\" allowfullscreen></iframe>";

				}elseif($rows['Id']==3){

					echo "<iframe width=\"100%\" height=\"200\" src=\"//www.youtube.com/embed/9n-gAAUqOK0\" frameborder=\"0\" allowfullscreen></iframe>";

				}else{

					echo "<iframe width=\"100%\" height=\"200\" src=\"//www.youtube.com/embed/AvBd-TuD_o0\" frameborder=\"0\" allowfullscreen></iframe>";

				}*/

			  ?>

              </div>

          </div>

        </div>

        </div>

      </div>

    </div>

  </div>
  <!-- Lab Reports -->
  <div class="lab-report">
    <div class="container our__product">
     <small style="margin-bottom: 10px;">
            <h1>Cements test report</h1>
             </small>
     <div class="tab-wrap">
    
      <input type="radio" id="tab1" name="tabGroup1" class="tab" checked>
      <label for="tab1">Internal</label>

      <input type="radio" id="tab2" name="tabGroup1" class="tab">
      <label for="tab2">External</label>


      <div class="tab__content">
       <div class="col-sm-12 " id="result">
         <!-- <div class="col-sm-3">
          <a class="fancybox report" rel="gallery1" href="img/force-cement.png" title="Twilight Memories (doraartem)">
            <img src="img/force-cement.png" alt="force-cement" class="img-responsive" width="190">
          </a>
          <p>Force PSC Cement</p>
         </div> -->
         <!--  <div class="col-sm-3">
          <a class="fancybox report" rel="gallery1" href="img/force-cement.png" title="Twilight Memories (doraartem)">
            <img src="img/force-cement.png" alt="force-cement" class="img-responsive" width="190">
          </a>
           <p>Force PSC Cement</p>
         </div>
          <div class="col-sm-3">
          <a class="fancybox report" rel="gallery1" href="img/force-cement.png" title="Twilight Memories (doraartem)">
            <img src="img/force-cement.png" alt="force-cement" class="img-responsive" width="190">
          </a> <p>Force PSC Cement</p>
         </div>
          <div class="col-sm-3">
          <a class="fancybox report" rel="gallery1" href="img/force-cement.png" title="Twilight Memories (doraartem)">
            <img src="img/force-cement.png" alt="force-cement" class="img-responsive" width="190">
          </a> <p>Force PSC Cement</p>
         </div> -->
       </div>
<!--         <div class="col-sm-12">
         <div class="col-sm-3">
          <a class="fancybox report" rel="gallery1" href="img/force-cement.png" title="Twilight Memories (doraartem)">
            <img src="img/force-cement.png" alt="force-cement" class="img-responsive" width="190">
          </a> <p>Force PSC Cement</p>
         </div>
          <div class="col-sm-3">
          <a class="fancybox report" rel="gallery1" href="img/force-cement.png" title="Twilight Memories (doraartem)">
            <img src="img/force-cement.png" alt="force-cement" class="img-responsive" width="190">
          </a> <p>Force PSC Cement</p>
         </div>
          <div class="col-sm-3">
          <a class="fancybox report" rel="gallery1" href="img/force-cement.png" title="Twilight Memories (doraartem)">
            <img src="img/force-cement.png" alt="force-cement" class="img-responsive" width="190">
          </a> <p>Force PSC Cement</p>
         </div>
          <div class="col-sm-3">
          <a class="fancybox report" rel="gallery1" href="img/force-cement.png" title="Twilight Memories (doraartem)">
            <img src="img/force-cement.png" alt="force-cement" class="img-responsive" width="190">
          </a> <p>Force PSC Cement</p>
         </div>
       </div> -->
      </div>

      <div class="tab__content">
       <div class="col-sm-12">
         <div class="col-sm-3">
          <a class="fancybox report" rel="gallery1" href="img/force-cement.png" title="Twilight Memories (doraartem)">
            <img src="img/force-cement.png" alt="force-cement" class="img-responsive" width="190">
          </a> <p>Force PSC Cement</p>
         </div>
          <div class="col-sm-3">
          <a class="fancybox report" rel="gallery1" href="img/force-cement.png" title="Twilight Memories (doraartem)">
            <img src="img/force-cement.png" alt="force-cement" class="img-responsive" width="190">
          </a> <p>Force PSC Cement</p>
         </div>
          <div class="col-sm-3">
          <a class="fancybox report" rel="gallery1" href="img/force-cement.png" title="Twilight Memories (doraartem)">
            <img src="img/force-cement.png" alt="force-cement" class="img-responsive" width="190">
          </a> <p>Force PSC Cement</p>
         </div>
          <div class="col-sm-3">
          <a class="fancybox report" rel="gallery1" href="img/force-cement.png" title="Twilight Memories (doraartem)">
            <img src="img/force-cement.png" alt="force-cement" class="img-responsive" width="190">
          </a> <p>Force PSC Cement</p>
         </div>
       </div>
        <div class="col-sm-12">
         <div class="col-sm-3">
          <a class="fancybox report" rel="gallery1" href="img/force-cement.png" title="Twilight Memories (doraartem)">
            <img src="img/force-cement.png" alt="force-cement" class="img-responsive" width="190">
          </a> <p>Force PSC Cement</p>
         </div>
          <div class="col-sm-3">
          <a class="fancybox report" rel="gallery1" href="img/force-cement.png" title="Twilight Memories (doraartem)">
            <img src="img/force-cement.png" alt="force-cement" class="img-responsive" width="190">
          </a> <p>Force PSC Cement</p>
         </div>
          <div class="col-sm-3">
          <a class="fancybox report" rel="gallery1" href="img/force-cement.png" title="Twilight Memories (doraartem)">
            <img src="img/force-cement.png" alt="force-cement" class="img-responsive" width="190">
          </a> <p>Force PSC Cement</p>
         </div>
          <div class="col-sm-3">
          <a class="fancybox report" rel="gallery1" href="img/force-cement.png" title="Twilight Memories (doraartem)">
            <img src="img/force-cement.png" alt="force-cement" class="img-responsive" width="190">
          </a> <p>Force PSC Cement</p>
         </div>
       </div>
      </div>

    </div>
    </div>
  </div>
  <!-- footer section -->

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
 <!--  <script>
var myArray = [
{
"url": "https://hamroghar.jagdambacement.com/search/report/0"
}
];

myFunction(myArray);

function myFunction(data) {
    var out = "";
    var i;
    for(i = 0; i < data.length; i++) {
        out += '<img src="http://hamroghar.jagdambacement.com/public/uploads/report/'+data[i].image+'" alt="'+data[i].description+'" class="img-responsive" width="190">';
    }
    document.getElementById("result").innerHTML = out;
}
</script>
 -->

  <script type="text/javascript">
 $(document).ready(function() {
  $(".fancybox").fancybox({
    openEffect  : 'none',
    closeEffect : 'none'
  });
});
</script>
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

