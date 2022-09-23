<?php include "../db.php"; ?>

<body>
	<form enctype="multipart/form-data" method="post" id="save_img_form">
		<input type="file" id="myimg" name="userfile" class="inputfile" accept=".jpg, .jpeg, .png">
		<input type="submit" name="submit" value="Upload">
	</form>
</body>

<?php
?>