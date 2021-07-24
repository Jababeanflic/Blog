<?php
include_once 'header.php';
?>

        
<section class="signup-form">
<h2> Current Profile</h2>

<?php
        if(isset($_SESSION["useruid"])){  // if there is a session this will display user details
                    echo "<div>
                         <ul class='profile'>
                         <li><a>USER ID  : " .$_SESSION["useruid"]. "</a></li>
                         <li><a>USER Name: " .$_SESSION["username"]. "</a></li>
                         <li><a>Email    : " .$_SESSION["email"]. "</a></li>
                         </ul>
                         </div>";
                }
        if($_SESSION["status"]===1){
                    echo "<p> HOH " .$_SESSION["status"]. " You are admin</p>"; // If user is an admin this will be displayed
        }

echo
"<form action='includes/edit.inc.php' method='post'>    
<input type='hidden' name='userid' value='".$_SESSION['userid']."'>
<input type='text' name='name' placeholder='Full name...'>
<input type='text' name='email' placeholder='Email...'>
<input type='text' name='uid' placeholder='Username...'>
<button type='submit' name='submit'>Submit</button>
</form>"
?>

<?php
if(isset($_GET["error"])){ // example of get mothod error displayed if critiera not met

    if($_GET["error"] == "invalidUid"){
        echo "<p>Invalid User Id use a-z A-Z 0-9!</p>";
    }
    else if($_GET["error"] == "invalidEmail"){
        echo "<p>Please enter a valid email!</p>";
    }
    else if($_GET["error"] == "usernameTaken"){
        echo "<p>That username is already taken sorry!</p>";
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