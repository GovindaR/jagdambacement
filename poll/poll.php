<!-- <div class="poll">

<?php

	

	$query = mysqli_query($connect,"SELECT * FROM poll ORDER BY id DESC LIMIT 1");

	$rows = mysqli_num_rows($query);

	

	if($rows > 0){

		$poll = mysqli_fetch_array($query);

		$title = $poll['name'];

	} else {

		$title = 'Poll will be conducted soon.';

	}

	

	$query = mysqli_query($connect, "SELECT COUNT(`id`) as hits FROM `responses` GROUP BY `qid`");

	while($row = mysqli_fetch_array($query)){

		$me[] = $row['hits'];

	}

	if(is_array($me)){

		$max = max($me);

	}

	

	$query = mysqli_query($connect,"SELECT `questions`.`pid` FROM  `responses`, `questions` WHERE `responses`.`qid`=`questions`.`id` AND `responses`.`ip`='".$_SERVER['REMOTE_ADDR']."' AND pid='".$poll['id']."'");

	

	if(mysqli_num_rows($query) > 0){

	$total = mysqli_query($connect,"SELECT `questions`.`pid` FROM  `responses`, `questions` WHERE `responses`.`qid`=`questions`.`id` AND pid='".$poll['id']."'");

	$total = mysqli_num_rows($total);



?>

<table width="100%" cellpadding="0" cellspacing="0" border="0" class="maintable" align="center">

	<tr>

		<td valign="top" class="title"><?php echo $title; ?></td>

	</tr>

	<?php

		$query = mysqli_query($connect,"SELECT * FROM `questions` WHERE `pid`='".$poll['id']."'");

		$questions = mysqli_num_rows($query);

		if($questions > 0){		

	?>

	<tr>

		<td valign="top" style="padding: 5px;">

		<table width="100%" cellpadding="0" cellspacing="0" border="0" class="question">

			<?php

				while($question = mysqli_fetch_array($query)){

					$responses = mysqli_query($connect,"SELECT count(id) as total FROM `responses` WHERE qid='".$question['id']."'");

					$responses = mysqli_fetch_array($responses);

					

					if($total > 0 && $responses['total'] > 0){

						$percentage = round(($responses['total'] / $total) * 100,2);

					} else {

						$percentage = 0;

					}

					

					$percentage2 = 100 - $percentage;

			?>

				<tr>

					<td valign="top" nowrap="nowrap"><?php echo $question['question']; ?></td>

					<td valign="top" height="10" width="100%" style="padding: 0px 10px;">

					<table width="100%" cellpadding="0" cellspacing="2" border="0">

						<tr>

							<td valign="top" width="<?php echo $percentage; ?>%" <?php if($percentage > 0){?>style="background: #37353F;border-radius:3px;border:1px solid #4F4D56;"<?php } ?>>&nbsp;</td>

							<td valign="top" width="<?php echo $percentage2; ?>%"></td>

						</tr>

					</table>

					</td>

					<td valign="top"><?php echo $percentage; ?>%</td>

				</tr>

			<?php

			}

			?>			

		</table>

		</td>

	</tr>

	<?php

		}

	?>

</table>

<?php

	} else {

?>

<table width="100%" cellpadding="0" cellspacing="0" border="0" class="maintable" align="center">

	<tr>

		<td valign="top" align="center" class="title"><?php echo $title; ?></td>

	</tr>

	<?php

		$query = mysqli_query($connect,"SELECT * FROM `questions` WHERE `pid`='".$poll['id']."'");

		$questions = mysqli_num_rows($query);

		if($questions > 0){

	?>

	<tr>

		<td valign="top" style="padding: 5px;">

		<form name="poll" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

		<table width="100%" cellpadding="0" cellspacing="0" border="0" class="question">

		<?php

			if(isset($error)){

		?>

			<tr>

				<td valign="top" align="center" style="padding: 0px 0px 10px 0px;"><?php echo $error; ?></td>

			</tr>

		<?php

			}

		?>

			<?php

				while($question = mysqli_fetch_array($query)){

			?>

				<tr>

					<td valign="top" style="padding: 0px 10px 0px 0px;"><input type="radio" name="questions" value="<?php echo $question['id']; ?>" id="<?php echo $question['question']; ?>" /> <label for="<?php echo $question['question']; ?>"><?php echo $question['question']; ?></label></td>

				</tr>

			<?php

			}

			?>

			<tr>

				<td valign="top" align="center" style="padding: 10px 0px 0px 0px;"><input type="submit" name="vote" value="Submit Vote" /></td>

			</tr>

		</table>

		</form>

		</td>

	</tr>

	<?php

		}

	?>

</table>

<?php

	}

?>

</div>