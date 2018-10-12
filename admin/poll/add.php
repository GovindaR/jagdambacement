<?php include_once("../../library/userReqd.php");
include_once("../../library/config.php");
include_once("../../library/connection.php");
include_once("../../class/kml_class.php");
include("../../fckeditor/fckeditor.php");
ob_start();

$kml = new kml($conn);

$table_name = "poll";
$page_title = "Poll";

$labal="Add";

$alias = $_POST['Title'];
$alias = preg_replace('/\&/',' and ',$alias);
$alias = preg_replace('/\s[\s]+/','-',$alias);    // Strip off multiple spaces
$alias = preg_replace('/[\s\W]+/','-',$alias);    // Strip off spaces and non-alpha-numeric
$alias = preg_replace('/^[\-]+/','',$alias); // Strip off the starting hyphens
$alias = preg_replace('/[\-]+$/','',$alias); // // Strip off the ending hyphens
$alias = strtolower($alias);

$value = array(
'name'=> $_POST['Title']
);

$image = array(
	'image_name' => $_FILES['Image']['name'],
	'image_tmp' => $_FILES['Image']['tmp_name'],
	'image_dir' => '../../uploads'
);

if($_GET['action'] && $_GET['action'] == "edit"){
	$labal = "Update";
	$kml->selectData($table_name,$_GET['id']);
	$id = $_GET['id'];
}
if(isset($_POST['btnAdd'])){
	//$kml->insertData($table_name,$value,$_POST['Title']);
	$fields = array_keys($value);
	$sql = "INSERT INTO $table_name (".implode(', ', $fields).") VALUES (:".implode(", :", $fields).") ";
	$stmt = $conn->prepare($sql);
	$stmt->execute($value);
	
	$insert_id = $conn->lastInsertId();	
	for($i=0; $i<5; $i++){
		if(!empty($_POST['Option'][$i]) || $_POST['Option'][$i] !== ""){
			$opt_value = array('pid'=>$insert_id, 'question'=>$_POST['Option'][$i]);
			$opt_fields = array_keys($opt_value);
			$opt_sql = "INSERT INTO questions (".implode(', ', $opt_fields).") VALUES (:".implode(", :", $opt_fields).") ";
			$opt_stmt = $conn->prepare($opt_sql);
			$opt_stmt->execute($opt_value);
		}
	}
	header("location:index.php?");
}// ADD
if(isset($_POST['btnUpdate'])){
	foreach ($value as $field => $data){
		$set[] = $field."=:".$field."";
	}
	$update = "UPDATE $table_name SET ".implode(", ",$set)." WHERE  Id='".$id."'";
	//print $update;
	$u_stmt = $conn->prepare($update);
	$result = $u_stmt->execute($value);
	
	$to = count($_POST['Option']);
	for($i=0; $i<$to; $i++){
		if(!empty($_POST['Option'][$i]) || !$_POST['Option'][$i] == ""){
			$opt_value = array('pid'=>$id, 'question'=>$_POST['Option'][$i]);
			$opt_fields = array_keys($opt_value);
			foreach ($opt_value as $opt_field => $opt_data){
				$opt_set[] = $opt_field."=:".$opt_field."";
			}
			$opt_update = "UPDATE questions SET ".implode(", ",$opt_set)." WHERE  id='".$_POST['OptionId'][$i]."'";
			//print $opt_update;
			$opt_u_stmt = $conn->prepare($opt_update);
			$opt_result = $opt_u_stmt->execute($opt_value);
		}
	}
	header("location:index.php?");
	//$kml->updateData($table_name,$_GET['id'],$value);
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
              <th width="12%" valign="top" class="right">Question</th>
              <td width="44%"><input type="text" name="Title" id="Title" class="textBox medium" value="<?php echo $rows['name']; ?>" <?php echo $border;?> /> &nbsp; </td>
              <td width="44%"><?php echo $msg;?> </td>
            </tr>
            <tr>
              <th valign="top" class="right">Option</th>
              <td colspan="2">
              <?php
			  	$opt_sql = "SELECT * FROM questions WHERE pid='".$rows['id']."'";
				$opt_stmt = $conn->prepare($opt_sql);
				$opt_stmt->execute();
				while($opt_rows = $opt_stmt->fetch()){
					echo "<input type=\"text\" name=\"Option[]\" class=\"textBox\" value=\"".$opt_rows['question']."\" ><input type=\"hidden\" name=\"OptionId[]\" value=\"".$opt_rows['id']."\" ><br />";
				}
              ?>
             <?php if(!$_GET['action'] && $_GET['action'] != "edit"){
             ?>
              <input type="text" name="Option[]" class="textBox" ><br />
              <input type="text" name="Option[]" class="textBox" ><br />
              <input type="text" name="Option[]" class="textBox" ><br />
              <input type="text" name="Option[]" class="textBox" ><br />
             <?php }
			 ?>
              <input type="text" name="Option[]" class="textBox" ><br /></td>
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