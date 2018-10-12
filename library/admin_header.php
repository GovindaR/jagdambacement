<div id="headerWrap">
      
      	<div class="logo">
          <a href="<?php echo ADMIN_PATH; ?>index.php"><img src="<?php echo URL_PATH;?>img/logo01.png" height="100" /></a>         
        </div>
        
        <div class="headerRight">
          <div class="topNav">
          	<div class="logout"><a href="<?php echo ADMIN_PATH;?>logout.php">Logout</a></div>
            <div class="user"><?php echo $_SESSION['AdminUsers'];?></div>            
          </div>  
          
          <div class="lastlogon">Last login on: <?php echo $_SESSION['LastLogin'];?></div>
        </div>
      
      </div>