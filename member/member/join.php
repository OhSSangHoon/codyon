<?php include "../db.php";
	$no;
	$id = $_POST['id'];
	$pw = $_POST['pw'];

	$sql = mq("INSERT into test(id,pw) values('".$id."','".$pw."')");
?>
<script>
	window.alert("가입이 완료되었습니다.");
	location.href="/";
</script>
