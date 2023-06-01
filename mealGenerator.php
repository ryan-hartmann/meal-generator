<html>
	<body>
		<?php


			$con = mysqli_connect('localhost', 'root', '','recipes');
	
			$postName = $_POST['Username'];
			$postTag = $_POST['Password'];

			$sql = "INSERT INTO user (Username, Password) VALUES ('$postName', '$postTag' )";

			$rs = mysqli_query($con, $sql);
		?>
		<h1> Good </h1>
	</body>
<html>