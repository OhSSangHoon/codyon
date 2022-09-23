<?php include_once "../db.php"; ?>

<?php

	$userid = $_SESSION['id'];
	$userpw = $_SESSION['pw'];

	$sql = "SELECT * FROM mycard WHERE id = '$userid' AND pw='$userpw'";
	$result =  $db->query($sql);
	$row = mysqli_fetch_array($result);

	$g_id = !empty($row['id'])?$row['id']:'';
	$g_pw = !empty($row['pw'])?$row['pw']:'';

	if($userid != $g_id){
		
	}else{
		$_SESSION['no'] = $row['no'];
		$_SESSION['id'] = $row['id'];
		$_SESSION['pw'] = $row['pw'];
	}
?>