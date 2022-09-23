<?php include "header.php"; ?>
<body>
	<div class="container main ">
		<div class="visual">
			<div class="slides">
				<ul>
					<li style="background:#D9DBE9;">
						<p>만들어봐!</p>
						<p>나만의&nbsp;패션&nbsp;명함</p>
						<div class="fBtn">나의&nbsp;패션&nbsp;MBTI&nbsp;알아보기<button onclick='location.href="mbti/mbti.php"'>〉</button></div>
						<p id="navi">패션&nbsp;<b>MBTI</b>&nbsp;없이&nbsp;바로&nbsp;명함&nbsp;만들기</p>
					</li>
					<li style="background:pink;">
						<p>만들어봐!</p>
						<p>나만의&nbsp;패션&nbsp;명함</p>
						<div class="fBtn">나의&nbsp;패션&nbsp;MBTI&nbsp;알아보기<button onclick='location.href="mbti/mbti.php"'>〉</button></div>
						<p id="navi">패션&nbsp;<b>MBTI</b>&nbsp;없이&nbsp;바로&nbsp;명함&nbsp;만들기</p>
					</li>
					<li style="background:skyblue;">
						<p>만들어봐!</p>
						<p>나만의&nbsp;패션&nbsp;명함</p>
						<div class="fBtn">나의&nbsp;패션&nbsp;MBTI&nbsp;알아보기<button onclick='location.href="mbti/mbti.php"'>〉</button></div>
						<p id="navi">패션&nbsp;<b>MBTI</b>&nbsp;없이&nbsp;바로&nbsp;명함&nbsp;만들기</p>
					</li>
					<li style="background:orange;">
						<p>만들어봐!</p>
						<p>나만의&nbsp;패션&nbsp;명함</p>
						<div class="fBtn">나의&nbsp;패션&nbsp;MBTI&nbsp;알아보기<button onclick='location.href="mbti/mbti.php"'>〉</button></div>
						<p id="navi">패션&nbsp;<b>MBTI</b>&nbsp;없이&nbsp;바로&nbsp;명함&nbsp;만들기</p>
					</li>
				</ul>
			</div>
		</div>
		<div class="pb">
			<span class="pb-title">가장 많이 본</span>
			<input type="radio" id="cards" name="popular">
			<input type="radio" id="brands" name="popular">
			<div class="pbBtn">
				<ul>
					<label for="cards">
						<li class="card" style="border-right-color:#aaaaaa;" >명함</li>
					</label>
					<label for="brands">
						<li class="brand" style="border-left-style: none;">브랜드</li>
					</label>
				</ul>
			</div>
			<div class="pbcon container">
				<ul>
					<li>
						<p class="pbimg" style="margin-top:3px;"><img src="img/리나.jpg" alt=""></p>
						<p class="pbname">유지민</p>
						<p class="pbint">FECD</p>
						<p class="pbint">"착하게 살자"</p>
					</li>
					<li>
						<p class="pbimg" style="margin-top:3px;"><img src="img/리나.jpg" alt=""></p>
						<p class="pbname">유지민</p>
						<p class="pbint">FECD</p>
						<p class="pbint">"착하게 살자"</p>
					</li>
					<li>
						<p class="pbimg" style="margin-top:3px;"><img src="img/리나.jpg" alt=""></p>
						<p class="pbname">유지민</p>
						<p class="pbint">FECD</p>
						<p class="pbint">"착하게 살자"</p>
					</li>
				</ul>
			</div>
			<div class="pbcon2 container">
				<ul>
					<li>
						<p class="pbimg" style="margin-top:3px;"><img src="img/리나.jpg" alt=""></p>
						<p class="pbname">김지민</p>
						<p class="pbint">FECD</p>
						<p class="pbint">"착하게 살자"</p>
					</li>
					<li>
						<p class="pbimg" style="margin-top:3px;"><img src="img/리나.jpg" alt=""></p>
						<p class="pbname">김지민</p>
						<p class="pbint">FECD</p>
						<p class="pbint">"착하게 살자"</p>
					</li>
					<li>
						<p class="pbimg" style="margin-top:3px;"><img src="img/리나.jpg" alt=""></p>
						<p class="pbname">김지민</p>
						<p class="pbint">FECD</p>
						<p class="pbint">"착하게 살자"</p>
					</li>
				</ul>
			</div>
		</div>
		<div class="archive">
			<div class="col-md-12" style="padding: 0 25px;">
				<div class="arcTitle">
					<p style="font-size:20px; margin:15px 0;">패션 명함 구경하기</p>
					<button class="arcBtn" onclick="location.href='archive.php'">더보기</button>
				</div>
				<div class="arcSearch">
					<button type="button"><img src="img/search.png" alt=""></button>
					<input type="text" placeholder="Search">
				</div>
				<div class="arcCon">
					<ul>
						<li>
							<p class="arcimg" style="margin-top:10px;"><img src="" alt=""></p>
						</li>
						<li>
							<p class="arcimg" style="margin-top:10px;"><img src="" alt=""></p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</body>

<script>

	//slides fadein out
	$('.slides > ul > li:gt(0)').hide();

	setInterval(function (){
		$(".slides > ul > li:first")
			.fadeOut(1000)
			.next()
			.fadeIn(1000)
			.end()
			.appendTo('.slides > ul');
	}, 3000);


	//click
	var currentBtn,
		pbBtn = document.querySelector('.pbBtn ul');

	function clickHandle(e){
		if(currentBtn){
			currentBtn.classList.remove('clicks');
		}
		e.target.classList.add('clicks');
		currentBtn = e.target;
	}

	pbBtn.addEventListener('click', clickHandle);


	$(document).ready(function(){
		
		setTimeout(function(){
			$('.card').trigger('click');
		}, 0);
	});

	
</script>
