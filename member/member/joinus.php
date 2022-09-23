<?php include_once "../lib/header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script language="JavaScript" type="text/javascript" src="../js/jquery-1.12.3.js"></script>
	<link rel="stylesheet" href="../css/css.css">
	<title>Document</title>
</head>
<body>
	<form name="join" action="../member/join.php" method="post">
		<ul class="sec1">
			<li><span>여러분을 알려주세요!</span></li>
			<li style="margin-top:50px;">
				<label for="id"></label>
				<input type="text" id="id" name="id" placeholder="닉네임을 알려주세요">
			</li>
			<li>
				<label for="pw"></label>
				<input type="password" id="pw" name="pw" placeholder="비밀번호 4자리를 입력해주세요.">
			</li>
			<li class="info">해당 정보는 패션 명함을 구분하기 위해 필요합니다</li>
			<li style="margin-top:150px;">
				<button type="submit" class="tBtn">회원가입하기</button>
			</li>
		</ul>
	</form>
</body>
</html>