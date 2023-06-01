<!DOCTYPE html>
<html>
    <head>
        <link href="frontpage.css" type="text/css" rel="stylesheet"/>
        <title>Meal Generator</title>
    </head>
    <body>
        <div class="topnav">
            <h1>Meal Generator</h1>
			<?php if(isset($_GET['username'])):?> <a href="frontpage.php"> Logout </a> <?php endif ;?>
			<a href=<?php if(isset($_GET['username'])){ echo "enterRecipe.php?username=$_GET[username]";} else { echo "enterRecipe.php"; }?>> New Recipe </a>
			<a href=<?php if(isset($_GET['username'])){ echo "tagpage.php?username=$_GET[username]";} else { echo "tagpage.php"; }?>> Tag Page </a>
            <a href=<?php if(isset($_GET['username'])){ echo "profilepage.php?username=$_GET[username]";} else { echo "user.php"; }?>>Profile</a>
            <a href=<?php if(isset($_GET['username'])){ echo "about.php?username=$_GET[username]";} else { echo "about.php"; }?>>About</a>
            <a href=<?php if(isset($_GET['username'])){ echo "recipes.php?username=$_GET[username]";} else { echo "recipes.php"; }?>>Recipes</a>
            <a class="active" href="frontpage.php">Home</a>
        </div>

        <div class="display">
            <div class="display-elements">
                <h1>Find a Recipe</h1>
                <div class="display-search">
                    <form action=<?php if(isset($_GET['username'])){ echo "search.php?username=$_GET[username]";} else { echo "search.php"; }?> method="GET">
                        <input type="text" name="q" placeholder="Find a Recipe" /> 
                        <button type="submit" id="button" value="Submit search">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <h2 class="card-sec-head">Dinner Recipes</h2>
        <section class="cards">
            <?php
                $query = mysqli_query($con, "SELECT * FROM `meals` WHERE Category = 'dinner' ORDER BY rand()");
                for($x = 0; $x < 3; $x++){
            ?>
            <div class="card">
                <div class="card-body">
                <img src= 
                    <?php
                        $row = mysqli_fetch_array($query);
                        $url = $row['Picture'];
                        if (@exif_imagetype($url) == IMAGETYPE_JPEG || @exif_imagetype($url) == IMAGETYPE_PNG){ 
                            echo $url;
                        } else {
                            echo "https://ch0styu58r-flywheel.netdna-ssl.com/wp-content/uploads/2017/01/empty-plate.jpg";
                        }
                    ?>
                    class="card-img">
                    <h2 class="card-title"> <?php echo $row['Name'] ?></h2>
                    <p class="card-desc"> <?php echo $row['Description']?>...</p>
                </div>
                <form method="GET" action="singlerecipt.php">
                    <input type="hidden" name='q' value=<?php echo $row['RecipeId'] ?>>
                    <input type="submit" class="card-btn" value="View Recipe">
                </form>
            </div>
            <?php } ?>
        </section>
        
        <h2 class="card-sec-head">Delicious Desserts</h2>
        <section class="cards">
            <?php
                $query = mysqli_query($con, "SELECT * FROM `meals` WHERE Category = 'dessert' ORDER BY rand()");
                $x = 0;
                while(($row = mysqli_fetch_array($query)) && ($x < 3)){
            ?>
            <div class="card">
                <div class="card-body">
                <img src= 
                    <?php
                        $x++;
                        $url = $row['Picture'];
                        if (@exif_imagetype($url) == IMAGETYPE_JPEG || @exif_imagetype($url) == IMAGETYPE_PNG){ 
                            echo $url;
                        } else {
                            echo "https://ch0styu58r-flywheel.netdna-ssl.com/wp-content/uploads/2017/01/empty-plate.jpg";
                        }
                    ?>
                    class="card-img">
                    <h2 class="card-title"> <?php echo $row['Name'] ?></h2>
                    <p class="card-desc"> <?php echo $row['Description']?>...</p>
                </div>
                <form method="GET" action="singlerecipt.php">
                    <input type="hidden" name='q' value=<?php echo $row['RecipeId'] ?>>
                    <input type="submit" class="card-btn" value="View Recipe">
                </form>
            </div>
            <?php } ?>
        </section>

        <div class="footer-bottom">
            &copy; MealGenerator | COSC 473
        </div>
    </body>
</html>
