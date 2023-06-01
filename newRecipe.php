<html>
	<body>
		<?php


			$con = mysqli_connect('localhost', 'root', '','recipes');
	
			$postName = $_POST['Username'];
			$postTag = $_POST['Name'];
			$postIng = $_POST['Ingredients'];
			$postInst = $_POST['Instructions'];
			$postPic = $_POST['Picture'];

			$sql = "INSERT INTO meals (Username, Recipe Name, Ingredients, Instructions, picture) VALUES ('$postName', '$postTag', '$postIng', '$postInst', '$postPic' )";

			$rs = mysqli_query($con, $sql);
		?>
		<h1> Good </h1>
	</body>
<html>