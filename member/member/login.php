<?php include "../db.php"?>
<?php include "../lib/header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<div class="container main" style="margin-top:20px;">
		<form action="../member/login_ok.php" method="post">
			<div>
				<input type="text" name="id" placeholder="아이디">
			</div>
			<div>
				<input type="password" name="pw" placeholder="패스워드">
			</div>
			<div>
				<input type="submit" value="로그인" >
			</div>
		</form>
	</div>
</body>
</html>