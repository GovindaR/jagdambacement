<?php

try {

	$conn = new PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME , DB_USER , DB_PASSWORD);

	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $err){

	echo "Failed to connection: " . $err->getMessage();

}



 $conn = mysql_connect('DB_HOST','DB_USER','DB_PASSWORD');

mysql_select_db('DB_NANE',$conn); 



?>

