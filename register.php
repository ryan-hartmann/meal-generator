<html>
	<body>
		<?php


			$con = mysqli_connect('localhost', 'root', '','recipes');
	
			$postName = $_POST['Username'];
			$postTag = $_POST['Password'];

			$sql = "INSERT INTO user (Username, Password) VALUES ('$postName', '$postTag')";

			$rs = mysqli_query($con, $sql);
			
			if ($rs)
			{
				echo "Registration Successful";
			}
			else
			{
				echo "Login Failed";
			}
		?>
		
		<form action="frontpage.html">
			<input type="submit" value="View Profile">
		</form>
		
	</body>
<html>