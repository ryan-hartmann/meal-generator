<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

.topnav {
    background-color: #cbe3ff57;
    overflow: hidden;
    margin: 10px 0px 0px 0px;
    border-radius: 5px 5px 0px 0px;
    text-align: center;
}

.topnav h1{
    text-align: left;
    font-family: serif;
    color: #000000;
    font-size: 25px;
    display:inline-flex;
}

.topnav a{
    float: right;
    color: #000000;
    text-align: center;
    vertical-align: text-bottom;
    padding: 20px 16px;
    text-decoration: none;
    font-size: 17px;
    text-transform: uppercase;
    font-family:'Lucida Sans', 'Lucida Sans Regular', Verdana, sans-serif;
}

.topnav a:hover{
    background-color: #4b9fff;
    color:rgb(255, 255, 255);
}

.topnav a.active{
    background: #4b9fff;
    color:rgb(255, 255, 255);
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>
</div>

<div class="topnav">
    <h1>Meal Generator</h1>
	<a href=<?php if(isset($_GET['username'])){ echo "enterRecipe.php?username=$_GET[username]";} else { echo "enterRecipe.php"; }?>>Add Recipe</a>
    <a href=<?php if(isset($_GET['username'])){ echo "profilepage.php?username=$_GET[username]";} else { echo "user.php"; }?>>Profile</a>
    <a class="active" href=<?php if(isset($_GET['username'])){ echo "about.php?username=$_GET[username]";} else { echo "about.php"; }?>>About</a>
    <a href=<?php if(isset($_GET['username'])){ echo "recipes.php?username=$_GET[username]";} else { echo "recipes.php"; }?>>Recipes</a>
    <a href=<?php if(isset($_GET['username'])){ echo "frontpage.php?username=$_GET[username]";} else { echo "frontpage.php"; }?>>Home</a>

</div>

<div class="about-section">
  <h1>About Page</h1>
  <p>Recipe website making dieting easier!</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Regina</h2>
        <p class="title">Programmer</p>
        <p>Worked on html pages plus other things</p>
        <p>jbgbc@iup.edu</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Ryan</h2>
        <p class="title">Programmer</p>
        <p>Worked on database plus other things</p>
        <p>qscy@iup.edu</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Yunuo</h2>
        <p class="title">Programmer</p>
        <p>Worked on some of the html pages plus other things.</p>
        <p>hmbbc@iup.edu</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div>

  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Damon</h2>
        <p class="title">Programmer</p>
        <p>Worked on some of the database plus other things.</p>
        <p>kbsy@iup.edu</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div>
</body>
</html>