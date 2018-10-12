<!-- <div class="rightBox">
<?php

$header = $_SESSION['header'];
	// include('config.php');
		// $hostname = 'localhost';
		// $username = 'sumanjun_jc_usr';
		// $password = 'jcement123!@#';
		// $dbname = 'sumanjun_jagdamba_jc';	
	//echo "Location:".$rows['Alias'].".html";
	
	if(isset($_POST['vote']) && isset($_POST['questions'])){
		$query = mysqli_query($connect,"SELECT `questions`.`pid` FROM  `responses`, `questions` WHERE `responses`.`qid`=`questions`.`id` AND `responses`.`ip`='".$_SERVER['REMOTE_ADDR']."' AND pid=(SELECT pid FROM `questions` WHERE id='".$_POST['questions']."' LIMIT 1)");
		if(mysqli_num_rows($query) == 0){
			$query = mysqli_query($connect,"INSERT INTO `responses` (`qid`, `ip`) VALUES ('".$_POST['questions']."', '".$_SERVER['REMOTE_ADDR']."')");
			if($query){
				header("Location:".$header);
			}
		} else {
			$error = 'You Already Voted';
		}		
	} else if(!isset($_POST['questions']) && isset($_POST['vote'])){
		$error = 'You Need To Select a Question';
	}
	
	include('poll.php');
?>
</div>