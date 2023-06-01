<?php
$con = mysqli_connect('localhost', 'root', '', 'recipes');
$query = mysqli_query($con, "SELECT * FROM 'meals' WHERE Name LIKE 'chicken' ORDER BY rand()");

?>
<!DOCTYPE html>
<html>



<link href="cards.css" type="text/css" rel="stylesheet" />
<body>

<div class="topnav">
        <h1>Chicken Recipes</h1>
        <a href="tagpage.html"> Tag Page </a>
        <a href=<?php if(isset($_GET['username'])){echo "profilepage.php?username=$_GET[username]";} else { echo "user.php"; }?>Profile</a>
	<a href="singlerecipe.html"> New Template </a>
	<a href="enterRecipe.html">Add recipe</a>
        <a href="about.html">About</a>
        <a href="recipes.php">Recipes</a>
        <a class="active" href="index.php">Home</a>
    </div>


 <section class="cards">
        
            <div class="card">
                <div class="card-body">
                    <img src=<?php
                                $row = mysqli_fetch_array($query);
                                $url = $row['Picture'];
                                if (@exif_imagetype($url) == IMAGETYPE_JPEG || @exif_imagetype($url) == IMAGETYPE_PNG) {
                                    echo $url;
                                } else {
                                    echo "https://ch0styu58r-flywheel.netdna-ssl.com/wp-content/uploads/2017/01/empty-plate.jpg";
                                }
                                ?> class="card-img">
                    <h2 class="card-title"> <?php echo $row['Name'] ?></h2>
                    <p class="card-desc"> <?php echo $row['Description'] ?>...</p>
                </div>
                <form method="GET" action=singlerecipt.php>
                    <input type="hidden" name='q' value=<?php echo $row['RecipeId'] ?>>
                    <input type="submit" class="card-btn" value="View Recipe">
                </form>
            </div>
    </section>
</body>
</html>
