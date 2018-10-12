<?php include_once("../../library/userReqd.php");
include_once("../../library/config.php");
include_once("../../library/connection.php");
include_once("../../class/kml_class.php");
$kml = new kml($conn);
$table_name = "poll";
$page_title = "Poll";

if(isset($_GET['action']) && $_GET['action'] == 'delete'){
	$delete = "DELETE FROM poll WHERE Id=".$_GET['id'];
	$d_stmt = $conn->prepare($delete);
	$result = $d_stmt->execute();
	if($result){
		$delete = "DELETE FROM questions WHERE pid=".$_GET['id'];
		$d_stmt = $conn->prepare($delete);
		$result = $d_stmt->execute();
	}	
	header ("location:index.php?");
}

$order = "Change";
$order_display = "style=\"display:none\"";

if (isset($_POST['btnChange'])){
	$order_display = "";
	$order = "Save";
}

if(isset($_POST['btnSave'])){	
	$numrows=$_POST['hdnNumRows'];
	for($i=0; $i<$numrows; $i++){
		$sql="UPDATE ".$table_name." SET OrderBy='".$_POST['orderBy'][$i]."' WHERE Id='".$_POST['hdnId'][$i]."'";
		//echo $sql."<br />";
		$o_stmt = $conn->prepare($sql);
		$o_stmt->execute();
	}
	header("location:index.php?");
}

if(isset($_POST['btnDelete'])){
	$kml->checkedDelete($table_name,$_POST['hdnNumRows'],$_POST['OneChecked']);
}

unset($_SESSION['CatId']);
$filter = "";
if(isset($_POST['CatId'])){
	if($_POST['CatId'] == 0){
		$_SESSION['CatId'] = $_POST['CatId'];
		$filter = "";
	}else{
		$_SESSION['CatId'] = $_POST['CatId'];
		$filter = "WHERE CatId='".$_SESSION['CatId']."'";
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $page_title ." - Admin :: ".COMPANY_NAME ;?></title>
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

<script type="text/javascript">
	var arrayOfRolloverClasses = new Array();
	var arrayOfClickClasses = new Array();
	var activeRow = false;
	var activeRowClickArray = new Array();
	
	function highlightTableRow()
	{
		var tableObj = this.parentNode;
		if(tableObj.tagName!='TABLE')tableObj = tableObj.parentNode;

		if(this!=activeRow){
			this.setAttribute('origCl',this.className);
			this.origCl = this.className;
		}
		this.className = arrayOfRolloverClasses[tableObj.id];
		
		activeRow = this;
		
	}
	
	function clickOnTableRow()
	{
		var tableObj = this.parentNode;
		if(tableObj.tagName!='TABLE')tableObj = tableObj.parentNode;		
		
		if(activeRowClickArray[tableObj.id] && this!=activeRowClickArray[tableObj.id]){
			activeRowClickArray[tableObj.id].className='';
		}
		this.className = arrayOfClickClasses[tableObj.id];
		
		activeRowClickArray[tableObj.id] = this;
				
	}
	
	function resetRowStyle()
	{
		var tableObj = this.parentNode;
		if(tableObj.tagName!='TABLE')tableObj = tableObj.parentNode;

		if(activeRowClickArray[tableObj.id] && this==activeRowClickArray[tableObj.id]){
			this.className = arrayOfClickClasses[tableObj.id];
			return;	
		}
		
		var origCl = this.getAttribute('origCl');
		if(!origCl)origCl = this.origCl;
		this.className=origCl;
		
	}
		
	function addTableRolloverEffect(tableId,whichClass,whichClassOnClick)
	{
		arrayOfRolloverClasses[tableId] = whichClass;
		arrayOfClickClasses[tableId] = whichClassOnClick;
		
		var tableObj = document.getElementById(tableId);
		var tBody = tableObj.getElementsByTagName('TBODY');
		if(tBody){
			var rows = tBody[0].getElementsByTagName('TR');
		}else{
			var rows = tableObj.getElementsByTagName('TR');
		}
		for(var no=0;no<rows.length;no++){
			rows[no].onmouseover = highlightTableRow;
			rows[no].onmouseout = resetRowStyle;
			
			if(whichClassOnClick){
				rows[no].onclick = clickOnTableRow;	
			}
		}
		
	}
checked=false;
function ToggleCheck (lists) {
	var aa= document.getElementById('lists');
	if (checked == false){
		checked = true
    }else{
         checked = false
	}
	for (var i =0; i < aa.elements.length; i++) {
		aa.elements[i].checked = checked;
	}
}

//function DelConfirm(cvalue){
function DelConfirm(cvalue){
	if(confirm("Do you want to delete this record permanently?")){
		location.href = cvalue;
	}
}

function EditConfirm(cvalue){	
	if(confirm("Do you want to edit this record?")){
		//location.href = cvalue;
		return true;
	}else{
		
		return false;
	}
	//alert("DELETE action is currently disabled by administrator.");
}
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
        <div class="add"><h2><?php echo $page_title?> </h2><a href="add.php">Add New</a></div>
        
         <form name="lists" method="post" action="" id="lists">        
        <div class="list">         
          <table width="100%" border="0" cellpadding="0" cellspacing="1">
            <tr>
              <th width="4%">Sn.</th>
              <th width="29%">Question</th>
              <th width="47%">Options</th>
              <th width="12%" class="right" style="display:none;">Posted Date</th>
              <th width="8%" class="right">Action</th>
            </tr>
            
            <?php
            $i=1;
			$list_sql ="SELECT * FROM ".$table_name." ";
			$list_stmt = $conn->prepare($list_sql);
			$list_stmt->execute();
			while($list_rows = $list_stmt->fetch()){?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $list_rows['name']; ?></td>
              <td><?php
			  	$opt_sql = "SELECT * FROM questions WHERE pid='".$list_rows['id']."'";
				$opt_stmt = $conn->prepare($opt_sql);
				$opt_stmt->execute();
				while($opt_rows = $opt_stmt->fetch()){
					echo $opt_rows['question']."<br />";
				}
              ?></td>
              <td class="right" style="display:none;"><?php echo $list_rows['posted_date']; ?></td>
              <td class="right">
                  <a href="add.php?action=edit&amp;id=<?php print $list_rows['id'];?>"><img src="../img/edit.png" width="16" height="16" /></a>
                  <a href="javascript:DelConfirm('?action=delete&id=<?php print $list_rows['id'];?>')"><img src="../img/delete.png" width="16" height="16" /></a>
              </td>
            </tr>
            <?php 
			$i++;
			}
			?>
          </table>
         
        </div>
        <input type="hidden" name="hdnNumRows" id="hdnNumRows" value="<?php print $list_stmt->rowCount();?>" />
         <input type="hidden" name="hdnParentId" id="hdnParentId" value="<?php print $_GET['type'];?>" />
       </form>  

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