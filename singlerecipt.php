<?php
  $con = mysqli_connect('localhost', 'root', '','recipes');
  $q = $_GET['q'];
  $completed = false;
  
  //If post has been submittes
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "SELECT * FROM `reviews` WHERE Username = 'Test' AND RecipeId = '$q' ";
    $result = mysqli_query($con, $sql);  
    $num_rows = mysqli_num_rows($result);
    
    //Check that this user has not already made a review for this recipe
    if($num_rows == 0){
      $completed = true;
			$username = $_POST['Username'];
			$rating = $_POST['Rating'];
			$reviewTitle = $_POST['ReviewTitle'];
			$reviewText = $_POST['ReviewText'];
			$recipeId = $_POST['RecipeId'];

      $sql = "INSERT INTO `reviews` (`Username`, `Rating` , `ReviewTitle`, `ReviewText`, `RecipeId`, `ReviewId`) VALUES ('$username', '$rating', '$reviewTitle', '$reviewText', '$recipeId', NULL)";
      $rs = mysqli_query($con, $sql);
      }
		
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Single Recipe || Final</title>

    <!-- font-awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
    <!-- main css -->
    <link rel="stylesheet" href="singlerecipt.css" />
  </head>
  <body>
    <!-- nav  -->
    <div class="topnav">
      <h1>Meal Generator</h1>
      <a href="profilepage.html">Profile</a>
      <a href="#about">About</a>
      <a class="active" href="recipes.php">Recipes</a>
      <a href="frontpage.php">Home</a>
    </div>
    <!-- end of nav -->
    <main class="page">
      <div class="recipe-page">
        <section class="recipe-hero">
          <?php 
          if(isset($_GET['q'])){
            $q = $_GET['q'];
            $query = mysqli_query($con, "SELECT * FROM `meals` WHERE RecipeID = '$q'"); 
            $row = mysqli_fetch_array($query); 
          
          ?>
          <img
            src=<?php echo $row['Picture']?>
            class="img recipe-hero-img"
          />
          <article class="recipe-info">
            <h2><?php echo $row['Name'] ?></h2>
            <p>
            <?php echo $row['Description'] ?>
            </p>
            <div class="recipe-icons">
              <article>
                <i class="fas fa-clock"></i>
                <h5>prep time</h5>
                <p>30 min.</p>
              </article>
              <article>
                <i class="far fa-clock"></i>
                <h5>cook time</h5>
                <p>15 min.</p>
              </article>
              <article>
                <i class="fas fa-user-friends"></i>
                <h5>serving</h5>
                <p>6 servings</p>
              </article>
            </div>
            <p class="recipe-tags">
              Tags : <a href="tag-template.html">pie</a>
              <a href="tag-template.html">dessert</a>
              <a href="tag-template.html">food</a>
            </p>
          </article>
        </section>
        <!-- content -->
        <section class="recipe-content">
          <article>
            <h4>instructions</h4>
            <!-- single instruction -->
            <div class="single-instruction">
              <header>
                <p>step 1</p>
                <div></div>
              </header>
              <p>
                  Complete the first step.
              </p>
            </div>
            <!-- end of single instruction -->
            <!-- single instruction -->
            <div class="single-instruction">
              <header>
                <p>step 2</p>
                <div></div>
              </header>
              <p>
                  Complete the second step.
              </p>
            </div>
            <!-- end of single instruction -->
            <!-- single instruction -->
            <div class="single-instruction">
              <header>
                <p>step 3</p>
                <div></div>
              </header>
              <p>
                Done.
              </p>
            </div>
            <!-- end of single instruction -->
          </article>
          <article class="second-column">
            <div>
              <h4>ingredients</h4>
              <p class="single-ingredient">1 1/2 cups dry pancake mix</p>
              <p class="single-ingredient">1/2 cup flax seed meal</p>
              <p class="single-ingredient">1 cup skim milk</p>
            </div>
            <div>
              <h4>tools</h4>
              <p class="single-tool">Hand Blender</p>
              <p class="single-tool">Large Heavy Pot With Lid</p>
              <p class="single-tool">Measuring Spoons</p>
              <p class="single-tool">Measuring Cups</p>
            </div>
          </article>
        </section>
        <section class="recipe-review">
          <?php
            if($completed){ ?>
              <div id="review-post">
                <span id="review-heading">
                    <h4 id="review-sub-title">Thanks for submitting your review!</h4>
                </span>
              </div>
          <?php
            } else {
    
          ?>
          <form method="POST" action=<?php echo 'singlerecipt.php?q=' . $row['RecipeId']?>>
            <!--HIDDEN FORM VALUES -->
            <input type=hidden name='Username' value='Test'>
            <input type=hidden name='Rating' value='3'>
            <input type=hidden name='RecipeId' value=<?php echo $row['RecipeId']?>>

            <div id="review-post">
                <span id="review-heading">
                    <h4 id="review-title">Write A Review!</h4>
                </span><br>
                <input type=text id="reviewTitle" name="ReviewTitle" col=50 row=1
                    placeholder="Enter a Title"><br>
                <textarea type="text" id="review-text" name="ReviewText" col="50" row="5"
                    placeholder="Please write your review here!"></textarea>
                <input type="submit" id="review-submit" name="submit" value="submit">

            </div><br>
          </form>
            <?php 
              } //closing else statement
              ?>
            <div id="review-get">
                <h4> Reviews </h4>
                <div class="all-reviews">
                  <?php 
                    $query = mysqli_query($con, "SELECT * FROM `reviews` WHERE RecipeId = '$q'"); 
                    while($row = mysqli_fetch_array($query)){
                  ?>
                  <div class="each-review">
                      <h5 id='reviewer-title'><?php echo $row['ReviewTitle'] ?></h6>
                      <p id='reviewer-review'><?php echo $row['ReviewText'] ?></p>
                  </div>
                  <?php }?>
                </div>
            </div>
        </section>
        <?php
         } else { // initial if statement checking for a query value?>
        <h4> This page does not exist </h4>
        <?php }?>
      </div>
     
    </main>
    <!-- footer -->
    <footer class="page-footer">
      <p>
        &copy; <span id="date"></span>
        MealGenerator | COSC 473
      </p>
    </footer>
    <script src="./js/app.js"></script>
  </body>
</html>
