<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HTML Contact Form</title>
<link href="frontpage.css" type="text/css" rel="stylesheet"/></head>
<body>
	<div class="topnav">
        <h1>Meal Generator</h1>
		<a class="active" href=<?php if(isset($_GET['username'])){ echo "enterRecipe.php?username=$_GET[username]";} else { echo "enterRecipe.php"; }?>>New Recipe</a>
        <a href=<?php if(isset($_GET['username'])){ echo "profilepage.php?username=$_GET[username]";} else { echo "user.php"; }?>>Profile</a>
        <a href=<?php if(isset($_GET['username'])){ echo "about.php?username=$_GET[username]";} else { echo "about.php"; }?>>About</a>
        <a href=<?php if(isset($_GET['username'])){ echo "recipes.php?username=$_GET[username]";} else { echo "recipes.php"; }?>>Recipes</a>
        <a href=<?php if(isset($_GET['username'])){ echo "frontpage.php?username=$_GET[username]";} else { echo "frontpage.php"; }?>>Home</a>
    </div>

<div class="form">
    <form method="POST" action="newRecipe.php">
        <h1>Contact Form</h1>
        <table>
            <tr>
                <td>
                    <label for="Username">Username:</label><br>
                    <input type="text" name="Username" placeholder="Username" id="">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Name">Recipe Name:</label><br>
                    <input type="text" name="Name" placeholder="Name" id="">
                </td>
            </tr>
			<tr>
                <td>
                    <label for="Ingredients">Ingredients:</label><br>
                    <input type="text" name="Ingredients" placeholder="Ingredients" id="">
                </td>
            </tr>
			<tr>
                <td>
                    <label for="Instructions">Instructions:</label><br>
                    <input type="text" name="Instructions" placeholder="Instructions" id="">
                </td>
            </tr>
			<tr>
                <td>
                    <label for="Picture">Picture (Enter URL):</label><br>
                    <input type="text" name="Picture" placeholder="Picture" id="">
                </td>
            </tr>
			<tr>
                <td>
                    <input type="submit" name="submit" value="Log In">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>