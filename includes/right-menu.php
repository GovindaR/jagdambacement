<div class="rightMenu">

  <h3>Our Brands</h3>

  <ul>

  <?php

  	$right_menu = "SELECT * FROM brand WHERE IsLocked = 'F'";

	$right_stmt = $conn->prepare($right_menu);

	$right_stmt->execute();

	while($right_rows = $right_stmt->fetch()){

		echo "<li><a href=\"".URL_PATH."uploads/".$right_rows['Image']."\" id=\"single_2\">".$right_rows['Title']."</a></li>";

	}

  ?>    

    

  </ul>

</div>

