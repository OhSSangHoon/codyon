<?php include_once "../db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
		<script language="JavaScript" type="text/javascript" src="../js/jquery-1.12.3.js"></script>
	<link rel="stylesheet" href="../css/css.css">
</head>
<header class="container" style="text-align:center; background:none;">
		<div class="myTitle">
			<ul>
				<li><a href="/">〈</a></li>
			</ul>
			<ul>
				<li style="margin:3px -32px;">스타일&nbsp;유형&nbsp;설명</li>
			</ul>
		</div>
		<input type="checkbox" name="bur" id="bur">
		<label for="bur">
			<div class="burger col-md-1 col-right">
				<ul>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			</div>
		</label>
		<div class="burgermenu" >
			<div class="bleft"></div>
			<div class="bright">
				<div style="height: 65px;">
					<label for="bur">
						<div class="closeBtn">
							<span class="line1"></span>
							<span class="line2"></span>
						</div>
					</label>
				</div>
				<div class="burBtn">
					<?php
						if(isset($_SESSION['id']) == null){
					?>
					<button onclick="location.href='archive.php'">패션 유형 검사하기</button>
				<?php }else{ ?>
					<button onclick="location.href='/mypage/mypage.php'">내 명함 보러가기</button> 
				<?php }?>
				</div>
				<div class="burlist">
					<ul>
						<li onclick="location.href='/'">&nbsp;메인 홈</li>
						<li onclick="location.href='/mypage/mypage.php';">&nbsp;나의 패션 명함</li>
						<li>&nbsp;패션 명함첩</li>
						<li onclick="location.href='/style/category.php';">&nbsp;스타일 유형 설명</li>
					</ul>
				</div>
				<div class="log">
					<?php
						if(isset($_SESSION['id']) == null){
					?>
					<a href="../login.php" style="margin:0 10px;">로그인</a>
					<?php }else{
						echo $_SESSION['id'] .'님';
						echo "<a href='/member/logout.php' style='margin:0 10px;'>로그아웃</a>";
						}
					 ?>	
				</div>
			</div>
		</div>
</header>