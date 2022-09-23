<?php include "../db.php";
	$no;
	$id = $_SESSION['id'];
	$pw = $_SESSION['pw'];
	$name = $_POST['name'];
	$motto = $_POST['motto'];
	$brand = $_POST['brand'];
	$item = $_POST['item'];
	$think = $_POST['think'];

	$sql = mq("INSERT into mycard(id,pw,name,motto,brand,item,think) values('".$id."','".$pw."','".$name."','".$motto."','".$brand."','".$item."','".$think."')");
?>
<script>
	window.alert("명함생성완료!");
	location.href="/";
</script>
