<?php
include_once 'header.php';
?>

        
<section class="signup-form">
<h2> Sign Up</h2>
<form action="includes/signup.inc.php" method="post"> 
<input type="text" name="name" placeholder="Full name...">
<input type="text" name="email" placeholder="Email...">
<input type="text" name="uid" placeholder="Username...">
<input type="password" name="pwd" placeholder="Password...">
<input type="password" name="pwdRepeat" placeholder="Repeat password...">
<button type="submit" name="submit">Sign Up</button>
</form>
<?php
if(isset($_GET["error"])){ // example of get mothod and error handeling
    if($_GET["error"] == "emptyinput"){
        echo "<p>Fill in all fields!</p>";
    }
    else if($_GET["error"] == "invalidUid"){
        echo "<p>Invalid User Id use a-z A-Z 0-9!</p>";
    }
    else if($_GET["error"] == "invalidEmail"){
        echo "<p>Please enter a valid email!</p>";
    }
    else if($_GET["error"] == "usernameTaken"){
        echo "<p>That username is already taken sorry!</p>";
    }
    else if($_GET["error"] == "passwordDontMatch"){
        echo "<p>Passwords do not match!</p>";
    }
    else if($_GET["error"] == "stmtFailed"){
        echo "<p>Ooops, Please try again!</p>";
    }
    else if($_GET["error"] == "none"){
        echo "<p>You have signed up!</p>";
    }
}
?>
</section>

<?php
include_once 'footer.php';
?>


