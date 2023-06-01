<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tags || Final</title>

    <!-- normalize -->
    <link rel="stylesheet" href="singlerecipt.css" />
    <!-- font-awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
    <!-- main css -->
    <link rel="stylesheet" href="tagpage.css" />
  </head>
  <body>
    <!-- nav  -->
    <div class="topnav">
        <h1>Meal Generator</h1>
        <?php if(isset($_GET['username'])):?> <a href="frontpage.php"> Logout </a> <?php endif ;?>
		<a href=<?php if(isset($_GET['username'])){ echo "enterRecipe.php?username=$_GET[username]";} else { echo "enterRecipe.php"; }?>> New Recipe </a>
		<a class="active" href=<?php if(isset($_GET['username'])){ echo "tagpage.php?username=$_GET[username]";} else { echo "tagpage.php"; }?>> Tag Page </a>
        <a href=<?php if(isset($_GET['username'])){ echo "profilepage.php?username=$_GET[username]";} else { echo "user.php"; }?>>Profile</a>
        <a href=<?php if(isset($_GET['username'])){ echo "about.php?username=$_GET[username]";} else { echo "about.php"; }?>>About</a>
        <a href=<?php if(isset($_GET['username'])){ echo "recipes.php?username=$_GET[username]";} else { echo "recipes.php"; }?>>Recipes</a>
        <a href=<?php if(isset($_GET['username'])){ echo "frontpage.php?username=$_GET[username]";} else { echo "frontpage.php"; }?>>Home</a>
    </div>
    <!-- end of nav -->
    <main class="page">
         <section class="tags-wrapper">
          <!-- single tag -->
              <a href="beef.php" class="tag">
                <h5>beef</h5>
                <p>1 recipe</p>
              </a>
            <!-- end of single tag -->
          <!-- single tag -->
              <a href="chicken.php" class="tag">
                <h5>Chicken</h5>
                <p>3 recipes</p>
              </a>
            <!-- end of single tag -->
          <!-- single tag -->
              <a href="pie.php" class="tag">
                <h5>Pie</h5>
                <p>3 recipes</p>
              </a>
            <!-- end of single tag -->
          <!-- single tag -->
              <a href="dinner.php" class="tag">
                <h5>dinner</h5>
                <p>4 recipe</p>
              </a>
            <!-- end of single tag -->
        </section>
    </main>
    <!-- footer -->
    <div class="page-footer">
        &copy; MealGenerator | COSC 473
    </div>


    <script src="./js/app.js"></script>
  </body>
</html>