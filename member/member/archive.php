	<?php include_once "../db.php"; ?>

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
		<?php
			if(isset($_SESSION['id']) == null){
		?>
		<div class="joinus container">
		</div>
		<div class="joinus_form">
			<ul>
				<li><h2>회원가입이&nbsp;필요해요!</h2></li>
				<li>회원가입을 하시면 더욱 많은 기능을<br>이용할 수 있습니다.</li>
				<li><button class="tBtn" onclick="location.href='/member/joinus.php'">회원가입하러&nbsp;가기</button></li>
				<li style="margin-top:-17px;"><button class="tBtn2" onclick="location.href='/'">취소</button></li>
			</ul>
		</div>
		<div class="container main">
			<div class="cardform">
				<div class="slider">
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
							<button type="button" class="tBtn">다음으로</button>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</body>
	<?php
		}else{
	?>
	<div class="container main">
			<div class="cardform">
				<div class="slider">
					<form name="join" action="/member/createcard.php" method="post" onkeydown="return event.key != 'Enter';">
						<ul>
							<li class="cardTitle">
								<a href="/" ><</a>
								<span>명함 만들기</span>
							</li>
							<li class="sec2">
								<span>이름을 알려주세요</span>
								<input type="text" name="name" id="name" style="background:#f3f4f6; width:315px; height:40px;">
							</li>
							<li style="margin-top:155px;">
								<button type="button"  class="tBtn tBtn">다음으로</button>
							</li>
						</ul>
						<ul>
							<li class="cardTitle">
								<a href="/" ><</a>
								<span>명함 만들기</span>
							</li>
							<li class="sec2">
								<span>패션 좌우명 한마디</span>
								<input type="text" name="motto" id="motto" style="background:#f3f4f6; width:315px; height:40px;">
							</li>
							<li style="margin-top:155px;">
								<button type="button"  class="tBtn tBtn2">다음으로</button>
							</li>
							<li>
								<button type="button"  class="tBtn prev pr">뒤로가기</button>
							</li>
						</ul>
						<ul>
							<li class="cardTitle">
								<a href="" ><</a>
								<span>명함 만들기</span>
							</li>
							<li class="sec2">
								<span>어떤 브랜드를 좋아하세요?</span>
								<input type="text" name="brand" id="brand" style="background:#f3f4f6; width:315px; height:40px;">
							</li>
							<li style="margin-top:155px;">
								<button type="button"  class="tBtn tBtn3">다음으로</button>
							</li>
							<li>
								<button type="button"  class="tBtn prev2 pr">뒤로가기</button>
							</li>
						</ul>
						<ul>
							<li class="cardTitle">
								<a href="" ><</a>
								<span>명함 만들기</span>
							</li>
							<li class="sec2">
								<span>패션 최애템은 무엇인가요?</span>
								<input type="text" name="item" id="item" style="background:#f3f4f6; width:315px; height:40px;">
							</li>
							<li style="margin-top:155px;">
								<button type="button"  class="tBtn tBtn4">다음으로</button>
							</li>
							<li>
								<button type="button"  class="tBtn prev3 pr">뒤로가기</button>
							</li>
						</ul>
						<ul>
							<li class="cardTitle">
								<a href="" ><</a>
								<span>명함 만들기</span>
							</li>
							<li class="sec2">
								<span>내가 생각했을 때 나는...</span>
								<!-- <input type="text" name="think" id="think" style="background:#f3f4f6; width:315px; height:40px;"> -->
								<select name="think" id="think" class="think" style="background:#f3f4f6; width:315px; height:40px;"> 
									<option value="패션 고수">패션&nbsp;고수</option>
									<option value="패션 중수">패션&nbsp;중수</option>
									<option value="패션 초보">패션&nbsp;초보</option>
								</select>
							</li>
							<li style="margin-top:155px;">
								<button class="tBtn" value="check" onclick="check_onclick()">다음으로</button>
							</li>
							<li>
								<button type="button"  class="tBtn prev4 pr">뒤로가기</button>
							</li>
						</ul>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

<script>
	//enter key binding
	document.join.addEventListener("keydown", evt => {
	  if (evt.code === "Enter") evt.preventDefault();
	});
	//slide
	var slides = document.querySelector(".slider"),
		slide = document.querySelectorAll(".slider ul"),
		
		tBtn = document.querySelector(".tBtn"),
		tBtn2 = document.querySelector(".tBtn2"),
		tBtn3 = document.querySelector(".tBtn3"),
		tBtn4 = document.querySelector(".tBtn4"),

		prev = document.querySelector(".prev"),
		prev2 = document.querySelector(".prev2"),
		prev3 = document.querySelector(".prev3"),
		prev4 = document.querySelector(".prev4"),

		currentIdx = 0,
		slideCount = slide.length,
		slideWidth = 414;
		//console.log(slideCount);

		slides.style.width = (slides + slideWidth)*slideCount + 'px';

		function moveSlide(num){
			slides.style.left = -num * 414 + 'px';
			currentIdx = num;
		}

		//next
		tBtn.addEventListener('click', function (){
			moveSlide(currentIdx + 1);
		});

		tBtn2.addEventListener('click', function (){
			moveSlide(currentIdx + 1);
		});

		tBtn3.addEventListener('click', function (){
			moveSlide(currentIdx + 1);
		});

		tBtn4.addEventListener('click', function (){
			moveSlide(currentIdx + 1);
		});


		// prev
		prev.addEventListener('click', function (){
			moveSlide(currentIdx -1);
		});

		prev2.addEventListener('click', function (){
			moveSlide(currentIdx -1);
		});

		prev3.addEventListener('click', function (){
			moveSlide(currentIdx -1);
		});

		prev4.addEventListener('click', function (){
			moveSlide(currentIdx -1);
		});



</script>
<?php } ?>