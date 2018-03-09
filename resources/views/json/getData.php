<?php
	if(empty($_POST['user_id'])){
	$objConnect = mysqli_connect("localhost","root","", "ttpk") or die(mysql_error());
	$user_id = (int)$_GET['user_id'];
	$strSQL = "SELECT * FROM maps WHERE users_id = '$user_id'";
	$objQuery = mysqli_query($objConnect, $strSQL) or die (mysql_error());
	$intNumField = mysqli_num_fields($objQuery);

	if($objQuery){
		while ($row = mysqli_fetch_array($objQuery)) {
			$result[] = $row;
		}
	}
	mysqli_close($objConnect);
	echo json_encode($result);
	}

?>