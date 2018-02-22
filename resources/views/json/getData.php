<?php
	$objConnect = mysqli_connect("localhost","root","", "ttpk") or die(mysql_error());
	$age = $_GET['users_id'];
	$strSQL = "SELECT * FROM maps WHERE users_id = 4";
	$objQuery = mysqli_query($objConnect, $strSQL) or die (mysql_error());
	$intNumField = mysqli_num_fields($objQuery);

	if($objQuery){
		while ($row = mysqli_fetch_array($objQuery)) {
			$result[] = $row;
		}
	}
	mysqli_close($objConnect);
	echo json_encode($result);

?>