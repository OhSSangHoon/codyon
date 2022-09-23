<?php
	include "../db.php";


	//login에서 입력 받은 id와 pw;
	$userid = $_POST['id'];
	$userpass = $_POST['pw'];

	//SELECT * FROM DB명 WHERE id pw
	$sql = "SELECT * FROM test WHERE id = '$userid' AND pw='$userpass'";

	$result = $db->query($sql); //결과
	$row = mysqli_fetch_array($result );

	$g_id = !empty($row['id'])?$row['id']:'';
	$g_pw = !empty($row['pw'])?$row['pw']:'';

	if($userid != $g_id){
		echo"<script>
			alert('아이디가 혹은 비밀번호가 일치하지 않습니다.');
			history.back();
		</script>";
		exit;
	}else{
		$_SESSION['no'] = $row['no'];
		$_SESSION['id'] = $row['id'];
		$_SESSION['pw'] = $row['pw'];

		mysqli_close($db);

		echo "<script>
			alert('".$_SESSION['id']."님 환영합니다.');
			location.href='/';
		</script>";
	}


	// //결과가 존재하면 세션 생성
	// if($row != null){
	// 	$_SESSION['username'] = $row['id'];
	// 	echo "<script> alert('로그인이 되었습니다.');
	// 			location.replace('/');
	// 	 </script>";
	// 	 exit;
	// }


	// //결과가 존재하지 않으면 로그인 실패
	// if($row == null){
	// 	echo "<script>alert('로그인 실패');</script>";
	// 	echo "<script>location.replace('/login.php');</script>";
	// }

?>
<!-- <script>
	alert('123');
	history.back();
</script> -->