<?php include_once("../../library/userReqd.php");
include_once("../../library/config.php");
include_once("../../library/connection.php");
include_once("../../class/kml_class.php");
//include("../../fckeditor/fckeditor.php");
ob_start();

$kml = new kml($conn);

$table_name = "plant";
$page_title = "Plant";

$labal="Add";
$value = array();

if(isset($_POST['btnAdd']) || isset($_POST['btnUpdate'])){

$alias = $_POST['Title'];
$alias = preg_replace('/\&/',' and ',$alias);
$alias = preg_replace('/\s[\s]+/','-',$alias);    // Strip off multiple spaces
$alias = preg_replace('/[\s\W]+/','-',$alias);    // Strip off spaces and non-alpha-numeric
$alias = preg_replace('/^[\-]+/','',$alias); // Strip off the starting hyphens
$alias = preg_replace('/[\-]+$/','',$alias); // // Strip off the ending hyphens
$alias = strtolower($alias);

$value = array(
'Title'=> $_POST['Title'],
'Alias'=> $alias,
'Details'=> $_POST['Details'],
);

$image = array(
	'image_name' => $_FILES['Image']['name'],
	'image_tmp' => $_FILES['Image']['tmp_name'],
	'image_dir' => '../../uploads'
);
}
if(isset($_GET['action']) && $_GET['action'] == "edit"){
	$labal = "Update";
	$kml->selectData($table_name,$_GET['id']);
}else{
	$value += array(
	'OrderBy'=> $kml->orderBy($table_name),
	'PostedDate'=> date("Y-m-d H:i:s"),	
	);
}
if(isset($_POST['btnAdd'])){
	$kml->insertData($table_name,$value,$_POST['Title'],$image);
}// ADD
if(isset($_POST['btnUpdate'])){
	$kml->updateData($table_name,$_GET['id'],$value,$image);
}// UPDATE

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

<script src="../../filemanager/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea.editor",
  height:'250px',
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu textcolor paste responsivefilemanager"
    ],    
  toolbar: "bold italic underline  | alignleft aligncenter alignright alignjustify | styleselect | forecolor backcolor | bullist numlist | link unlink image | code",
  external_filemanager_path:"/filemanager/",
  filemanager_title:"Filemanager" ,
  //external_plugins: { "filemanager" : "/filemanager/plugin.min.js"}
});
</script>

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
              <th width="12%" valign="top" class="right">Title</th>
              <td width="44%"><input type="text" name="Title" id="Title" class="textBox medium" value="<?php echo isset($rows['Title'])?$rows['Title']:NULL; ?>" <?php echo isset($border)?$border:NULL;?> /> &nbsp; </td>
              <td width="44%"><?php echo isset($msg)?$msg:NULL;?> </td>
            </tr>
            <tr>
              <th valign="top" class="right">Details</th>
              <td colspan="2"><textarea class="form-control editor" id="Details" name="Details"><?php echo isset($rows['Details'])?$rows['Details']:NULL;?></textarea></td>
            </tr>
            <tr>
              <th valign="top" class="right">Image</th>
              <td colspan="2"><input type="file" name="Image" id="Image" class="" /></td>
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