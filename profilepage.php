<?php
$q = $_GET['username'];
$con = mysqli_connect('localhost', 'root', '', 'recipes');
?>

<!DOCTYPE html>
<html>

<head>
    <link href="profilecss.css" type="text/css" rel="stylesheet" />
    <link href="frontpage.css" type="text/css" rel="stylesheet"/>
    <title>Meal Generator</title>
</head>

<body>
    <div class="topnav">
        <h1>Meal Generator</h1>
       <?php if(isset($_GET['username'])):?> <a href="frontpage.php"> Logout </a> <?php endif ;?>
		<a href=<?php if(isset($_GET['username'])){ echo "enterRecipe.php?username=$_GET[username]";} else { echo "enterRecipe.php"; }?>> New Recipe </a>
		<a href=<?php if(isset($_GET['username'])){ echo "tagpage.php?username=$_GET[username]";} else { echo "tagpage.php"; }?>> Tag Page </a>
        <a class="active" href=<?php if(isset($_GET['username'])){ echo "profilepage.php?username=$_GET[username]";} else { echo "user.php"; }?>>Profile</a>
        <a href=<?php if(isset($_GET['username'])){ echo "about.php?username=$_GET[username]";} else { echo "about.php"; }?>>About</a>
        <a href=<?php if(isset($_GET['username'])){ echo "recipes.php?username=$_GET[username]";} else { echo "recipes.php"; }?>>Recipes</a>
        <a href=<?php if(isset($_GET['username'])){ echo "frontpage.php?username=$_GET[username]";} else { echo "frontpage.php"; }?>>Home</a>
    </div>
    <div class="container">
        <section id="profile">
            <header class="header">
                <div class="details">
                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" class="profile-pic">
                    <h1 class="heading"><?php echo $q ?></h1>
                    <div class="stats">
                        <div class="col-4">
                            <h4><?= mysqli_num_rows(mysqli_query($con, "SELECT * FROM reviews WHERE Username = $_GET[username]")) ?></h4>
                            <p><a href="#reviews">Reviews</a></p>
                        </div>
                        <div class="col-4">
                            <h4>0</h4>
                            <p><a href="#favorites">Favorites</a></p>
                        </div>
                        <div class="col-4">
                            <h4><?= mysqli_num_rows(mysqli_query($con, "SELECT * FROM meals WHERE Username = $_GET[username]")) ?></h4>
                            <p><a href="#uploads">Uploads</a></p>
                        </div>
                    </div>
                </div>
            </header>
        </section>

        <section id="reviews">
            <h1>Reviews</h1>
            <?php
            $sql = "SELECT * FROM reviews WHERE Username = $_GET[username]";
            $result = mysqli_query($con, $sql);
            if ($result && mysqli_num_rows($result) != 0) {
            ?>

                <section class="cards">

                    <?php
                    $num_rows = mysqli_num_rows($result);
                    while ($review_row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="card">
                            <div class="card-body">
                                <img src=<?php
                                            $mealsql = "SELECT * FROM meals WHERE RecipeId = '$review_row[RecipeId]'";
                                            $result1 = mysqli_query($con, $mealsql);
                                            $row = mysqli_fetch_array($result1);

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
                            <button class="card-btn">View Recipe</button>
                        </div>
                </section>
            <?php
                    }
                } else {
            ?>

            <h4>Check out our <a href=recipes.php>recipes</a> to write your first review!</h4>
        <?php
                }
        ?>
        </section>

        <section id="favorites">
            <h1>Favorites</h1>
            <?php
            $result = mysqli_query($con, $sql);
            if (false) {
            ?>

                <section class="cards">

                    <?php
                    $num_rows = mysqli_num_rows($result);
                    while ($review_row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="card">
                            <div class="card-body">
                                <img src=<?php
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
                            <button class="card-btn">View Recipe</button>
                        </div>
                </section>
            <?php
                    }
                } else {
            ?>
            <h4>Choose your favorite <a href=recipes.php>recipes</a>!</h4>
        <?php
                }
        ?>
        </section>

        <section id="uploads">
            <h1>Uploads</h1>
            <?php
            $sql = "SELECT * FROM meals WHERE Username = $_GET[username]";
            $result = mysqli_query($con, $sql);
            if ($result && mysqli_num_rows($result) != 0) {
            ?>

                <section class="cards">

                    <?php
                    $num_rows = mysqli_num_rows($result);
                    while ($review_row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="card">
                            <div class="card-body">
                                <img src=<?php
                                            $mealsql = "SELECT * FROM meals WHERE RecipeId = '$review_row[RecipeId]'";
                                            $result1 = mysqli_query($con, $mealsql);
                                            $row = mysqli_fetch_array($result1);

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
                            <button class="card-btn">View Recipe</button>
                        </div>
                    <?php
                    }
                    ?>
                </section>

            <?php
                } else {
            ?>
            <h4>Upload youre own recipe <a href="enterRecipe.html">here</a>!</h4>
        <?php
                }
        ?>
        </section>
    </div>

    <div class="footer-bottom">
        &copy; MealGenerator | COSC 473
    </div>
</body>

</html>