<?php include_once("../../library/userReqd.php");
include_once("../../library/config.php");
include_once("../../library/connection.php");
include_once("../../class/kml_class.php");
include("../../fckeditor/fckeditor.php");
ob_start();

$kml = new kml($conn);

$table_name = "videos";
$page_title = "Video";

$labal="Add";

$alias = $_POST['Title'];
$alias = preg_replace('/\&/',' and ',$alias);
$alias = preg_replace('/\s[\s]+/','-',$alias);    // Strip off multiple spaces
$alias = preg_replace('/[\s\W]+/','-',$alias);    // Strip off spaces and non-alpha-numeric
$alias = preg_replace('/^[\-]+/','',$alias); // Strip off the starting hyphens
$alias = preg_replace('/[\-]+$/','',$alias); // // Strip off the ending hyphens
$alias = strtolower($alias);

if(is_array($_POST['palnt'])){
	$plant_id = implode(",",$_POST['palnt']);
}
if(is_array($_POST['product'])){
	$product_id = implode(",",$_POST['product']);
}

$value = array(
'Title'=> $_POST['Title'],
'v'=> $_POST['v'],
'PlantId'=> $plant_id,
'ProductId'=> $product_id
);

$image = array(
	'image_name' => $_FILES['Image']['name'],
	'image_tmp' => $_FILES['Image']['tmp_name'],
	'image_dir' => '../../uploads'
);

if($_GET['action'] && $_GET['action'] == "edit"){
	$labal = "Update";
	$kml->selectData($table_name,$_GET['id']);
	$value += array(
		'LastModifyDate'=> date("Y-m-d H:i:s"),
		'LastModifyBy'=> $_SESSION['AdminUsers']	
	);
}else{
	$value += array(
	'OrderBy'=> $kml->orderBy($table_name),
	'PostedDate'=> date("Y-m-d H:i:s"),
	'PostedBy'=> $_SESSION['AdminUsers']	
	);
}
if(isset($_POST['btnAdd'])){
	$kml->insertData($table_name,$value,$_POST['Title'],$image);
}// ADD
if(isset($_POST['btnUpdate'])){
	$kml->updateData($table_name,$_GET['id'],$value,$image);
}// ADD

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $labal." ".$page_title ." - Admin :: ".COMPANY_NAME ;?> </title>
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<link href='http://fonts.googleapis.com/css?family=Averia+Libre|Marmelad' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="../../css/ddsmoothmenu.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="../../js/ddsmoothmenu.js"></script>
<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "smoothmenu1", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

ddsmoothmenu.init({
	mainmenuid: "smoothmenu2", //Menu DIV id
	orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
	method: 'toggle', // set to 'hover' (default) or 'toggle'
	arrowswap: true, // enable rollover effect on menu arrow images?
	//customtheme: ["#804000", "#482400"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>
<link rel="stylesheet" type="text/css" href="../css/layout.css" />
<style>
body {
	background:url(../../img/footer_bg_pattern.jpg) repeat;
}
</style>
</head>

<body>

<div id="siteWrap">

	<div id="header">
       <?php include_once("../../library/admin_header.php");?>
    </div><!-- end header -->
    
    <div id="menu">
    
    <?php include_once("../../library/admin_menu.php");?>
    </div><!-- end menu-->
    
    <div id="content">
      <div class="wrap">
        <div class="add"><h2><?php echo $labal." : ".$page_title ?> </h2><a href="index.php">View All</a></div>
        
        <div class="addTable">
          <form action="" method="post" name="add-edit" enctype="multipart/form-data">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="addTable">
            <tr>
              <th width="17%" valign="top" class="right">Title</th>
              <td width="42%"><input type="text" name="Title" id="Title" class="textBox medium" value="<?php echo $rows['Title']; ?>" <?php echo $border;?> /> &nbsp; </td>
              <td width="41%"><?php echo $msg;?> </td>
            </tr>
            <tr>
              <th valign="top" class="right">Embed Code / Link</th>
              <td colspan="2"><input type="text" name="v" id="v" class="textBox medium" value="<?php echo $rows['v']; ?>" /></td>
            </tr>
            <tr>
              <th valign="top" class="right">Show on </th>
              <td colspan="2">
              <h3>Plant</h3>
              	<?php
					$plant_sql="SELECT * FROM plant WHERE Islocked='F'";
					$plant_stmt = $conn->prepare($plant_sql);
					$plant_stmt->execute();
					While($plant_rows = $plant_stmt->fetch()){
						$checked = "";
						foreach(explode(",",$rows['PlantId']) as $pant_id){
							if($plant_rows['Id'] == $pant_id){
								$checked = "checked='checked'";
							}
						}
						echo "<span style=\"margin:0 0 5px 20px;display:block\"><input type=\"checkbox\" name=\"palnt[]\" id=\"".$plant_rows['Alias']."\" value='".$plant_rows['Id']."' $checked> &nbsp; <label for=\"".$plant_rows['Alias']."\">".$plant_rows['Title']."</label></span>";
					}
					
				?><br />
                <h3>Product</h3>
              	<?php
					$product_sql="SELECT * FROM products WHERE Islocked='F'";
					$product_stmt = $conn->prepare($product_sql);
					$product_stmt->execute();
					While($product_rows = $product_stmt->fetch()){
						$checked = "";
						foreach(explode(",",$rows['ProductId']) as $product_id){
							if($product_rows['Id'] == $product_id){
								$checked = "checked='checked'";
							}
						}
						echo "<span style=\"margin:0 0 5px 20px;display:block\"><input type=\"checkbox\" name=\"product[]\" id=\"".$product_rows['Alias']."\" value='".$product_rows['Id']."' $checked> &nbsp; <label for=\"".$product_rows['Alias']."\">".$product_rows['Title']."</label></span>";
					}
					
				?>
              </td>
            </tr>
            <tr>
              <th valign="top" class="right"></th>
              <td colspan="2"><input type="submit" name="btn<?php echo $labal; ?>" id="btn<?php echo $labal; ?>" class="addBtn" value="<?php echo $labal; ?>" /></td>
            </tr>
          </table>
          
          </form>
        </div>
        

      </div>
    </div>
    

  
  <div id="footer">
    <div id="footerWrap">      
      <?php include_once("../../library/admin_footer.php");?>
    </div>
  </div>

</div><!-- end siteWrap -->
</body>
</html>