<?php include_once "../db.php"; ?>
<?php include "../header/header-category.php"; ?>
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
	<div class="container">
		<div class="catetitle">
			<p>패션&nbsp;MBTI가&nbsp;궁금해?</p>
		</div>
		<div class="cateBtn">
			<input type="radio" id="fs" name="category">
			<input type="radio" id="eo" name="category">
			<input type="radio" id="cm" name="category">
			<input type="radio" id="dg" name="category">
			<ul>
				<label for="fs">
					<li class="catechoice1" style="border-right-color:#aaaaaa;" >F/S</li>
				</label>
				<label for="eo">
					<li class="catechoice2" style="border-left-style: none;">E/O</li>
				</label>
				<label for="cm">
					<li class="catechoice3" style="border-left-style: none;">C/M</li>
				</label>
				<label for="dg">
					<li class="catechoice4" style="border-left-style: none;">D/G</li>
				</label>
			</ul>
			<div class="catecontent fs container">
				<ul>
					<li>fs</li>
				</ul>
				<p>1Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum natus cumque ratione numquam voluptatem dolores perferendis. Perferendis dicta, vel est tempore eligendi expedita consequatur quod debitis, maxime quasi voluptatem, quos!</p>
			</div>
			<div class="catecontent eo container">
				<ul>
					<li>eo</li>
				</ul>
				<p>2Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum natus cumque ratione numquam voluptatem dolores perferendis. Perferendis dicta, vel est tempore eligendi expedita consequatur quod debitis, maxime quasi voluptatem, quos!</p>
			</div>
			<div class="catecontent cm container">
				<ul>
					<li>cm</li>
				</ul>
				<p>3Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum natus cumque ratione numquam voluptatem dolores perferendis. Perferendis dicta, vel est tempore eligendi expedita consequatur quod debitis, maxime quasi voluptatem, quos!</p>
			</div>
			<div class="catecontent dg container">
				<ul>
					<li>dg</li>
				</ul>
				<p>4Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum natus cumque ratione numquam voluptatem dolores perferendis. Perferendis dicta, vel est tempore eligendi expedita consequatur quod debitis, maxime quasi voluptatem, quos!</p>
			</div>
		</div>
	</div>
</body>
</html>


<script>
		//click
	var currentBtn,
		cateBtn = document.querySelector('.cateBtn ul');

	function clickHandle(e){
		if(currentBtn){
			currentBtn.classList.remove('clicks');
		}
		e.target.classList.add('clicks');
		currentBtn = e.target;
	}

	cateBtn.addEventListener('click', clickHandle);


	$(document).ready(function(){
		
		setTimeout(function(){
			$('.catechoice1').trigger('click');
		}, 0);
	});
</script>