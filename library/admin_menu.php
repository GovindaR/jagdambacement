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
<div class="menu">
      <div id="smoothmenu1" class="ddsmoothmenu">
        <ul>
          <li><a href="<?php echo ADMIN_PATH; ?>index.php">Home</a></li>
          <li><a href="<?php echo ADMIN_PATH; ?>content/">Contents</a></li>
          <li><a href="<?php echo ADMIN_PATH; ?>category/">Plant</a></li>          
          <li><a href="<?php echo ADMIN_PATH; ?>products/">Products</a></li>
          <li><a href="<?php echo ADMIN_PATH; ?>brand/">Brand</a></li>
          <li><a href="<?php echo ADMIN_PATH; ?>testimonial/">Testimonial</a></li>
          <li><a href="<?php echo ADMIN_PATH; ?>slideshow/">Slideshow</a></li>
          <li><a href="<?php echo ADMIN_PATH; ?>poll/">Poll</a></li>
          <li><a href="<?php echo ADMIN_PATH; ?>video/">Video</a></li>
          <li><a href="<?php echo ADMIN_PATH; ?>md/">Media/Download</a>
          	<ul class="ddsmoothmenu">
            	<li><a href="<?php echo ADMIN_PATH; ?>md/add.php">Add</a></li>
                <li><a href="<?php echo ADMIN_PATH; ?>md/category/">Add Category</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>