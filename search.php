<!DOCTYPE html>
<html>
    <style>
        .display {
            position: relative;
            height: 10vh;
        }

        .display-elements{
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color:white;
        }

        .display-search{
            display: inline-block;
        }

        .display input{
            padding: 15px 20px;
            background-color: #cbe3ff57;
            border: none;
            border-radius: 5px;
            border-width: 2px;
            font-weight: bold;
        }

        .display button{
            color:white;
            background-color:#4b9fff;
            padding: 15px 20px;
            border: solid;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
    <head>
        <link href="recipes.css" type="text/css" rel="stylesheet"/>
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
            <a class="active" href=<?php if(isset($_GET['username'])){ echo "recipes.php?username=$_GET[username]";} else { echo "recipes.php"; }?>>Recipes</a>
            <a href=<?php if(isset($_GET['username'])){ echo "frontpage.php?username=$_GET[username]";} else { echo "frontpage.php"; }?>>Home</a>
        </div>

        <?php 
            if($_GET['q'] !== ''){
                $q = $_GET['q'];
                $con = mysqli_connect('localhost', 'root', '', 'recipes');
                if(!isset($q)){
                    echo 'No Results Found';
                }
                else{
                    $sql = "SELECT * FROM `meals` WHERE Name LIKE '% $q %' OR Description LIKE '% $q %' OR Category LIKE '%$q%'";
                    $result = mysqli_query($con, $sql);  
                    $num_rows = mysqli_num_rows($result);
        ?>

        <div class="display">
            <div class="display-elements">
                <div class="display-search">
                    <form action="search.php" method="GET">
                        <input type="text" name="q" value=<?php echo $q ?> /> 
                        <button type="submit" id="button" value="Submit search">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <h2 class="card-sec-head"><?php echo $num_rows ?> Recipes Found</h2>
        <section class="cards">
            <?php
                    while($row = mysqli_fetch_array($result)){
            ?>
                        <div class="card">
                            <div class="card-body">
                            <img src= 
                                <?php
                                    $url = $row['Picture'];
                                    if (@exif_imagetype($url) == IMAGETYPE_JPEG || @exif_imagetype($url) == IMAGETYPE_PNG){ 
                                        echo $url;
                                    } else {
                                        echo "https://ch0styu58r-flywheel.netdna-ssl.com/wp-content/uploads/2017/01/empty-plate.jpg";
                                    }
                                ?>
                                class="card-img">
                                <h2 class="card-title"> <?php echo $row['Name']?></h2>
                                <p class="card-desc"> <?php echo $row['Description']?>...</p>
                            </div>
                            <form method="GET" action="singlerecipt.php">
                                <input type="hidden" name='q' value=<?php echo $row['RecipeId'] ?>>
                                <input type="submit" class="card-btn" value="View Recipe">
                            </form>
                        </div>
            <?php   
                    }
                }
            } else {
                header('Location: recipes.php');
            }
             ?>
        </section>
        <div class="footer-bottom">
            &copy; MealGenerator | COSC 473
        </div>
    </body>
</html>