<html>
	<body>
		<?php

			session_start();
			$con = mysqli_connect('localhost', 'root', '','recipes');
			
			if(isset($_POST['Username']) && isset($_POST['Password'])) {
				function validate($data) {
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
				$uname = validate($_POST['Username']);
				$pass = validate($_POST['Password']);
				
				if(empty($uname)){
					header("Location: user.php?error=User Name is required");
					exit();
				} else if(empty($pass)){
					header("Location: user.php?error=Password is required");
					exit();
				} else {
					$sql = "SELECT * FROM user WHERE Username='$uname' AND Password='$pass'";
					$result = mysqli_query($con, $sql);
					if(mysqli_num_rows($result) === 1){
						$row = mysqli_fetch_assoc($result);
						if($row['Username'] === $uname && $row['Password'] === $pass) {
							echo "Login Successful.";
							$_SESSION['username'] = $row['Username'];
							header("Location: frontpage.php?username='$uname'");
							exit();
						}else {
							header("Location: user.php?error=Incorrect username or password");
							exit();
						}
					}
					else {
						header("Location: frontpage.php?username='$uname'");
						exit();
					}
				}
			}
		?>
		
	</body>
<html>