<?php
include_once 'header.php';
?>

<h2> Login</h2>

<div class="container">
  <form action="includes/login.inc.php" method="post">
  <div class="row">
    <div class="col-25">
      <label for="blogTitle">Username/Email</label>
    </div>
    <div class="col-75">
      <input class="login" id="uid" name="uid" placeholder="Username/Email..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="blogDescription">Password</label>
    </div>
    <div class="col-75">
      <input type="password" id="pwd" name="pwd" placeholder="Password...">
    </div>
  </div>
  <div class="row">
    <input type="submit" name="submit" value="Login">
  </div>
  </form>
</div>

<?php
if(isset($_GET["error"])){ // example of get mothod
    if($_GET["error"] == "emptyinput"){
        echo "<p>Fill in all fields!</p>";
    }
    else if($_GET["error"] == "wronglogin"){
        echo "<p>Wrong login information!</p>";
    }
}
?>

<?php
include_once 'footer.php';
?>