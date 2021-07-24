<?php
include_once 'header.php';
?>
<h1>Profile</h1>
<?php
        if(isset($_SESSION["useruid"])){ // if there is a session user details will be read from database and displayed
                    echo "<div'>
                         <FORM METHOD='POST' ACTION='editProfile.php'>
                         <ul class='profile'>
                         <li><a>USER UID  : " .$_SESSION["useruid"]. "</a></li>
                         <li><a>USER Name: " .$_SESSION["username"]. "</a></li>
                         <li><a>Email    : " .$_SESSION["email"]. "</a></li>
                         </ul>
                         <INPUT TYPE='submit' name='edit' VALUE='Edit Profile '>
                         </form>
                         <form method='POST' action='includes/deleteProfile.inc.php'>
                        <button type='submit'>DELETE PROFILE</button>
                        </form>
                         </div>";
                }
        if($_SESSION["status"]===1){ // extra option will be added if the user is an admin
                    echo "<p> You are admin you may delete any user. Enter Username you wish to delete.</p>
                    <form id='deletUser' method='POST' action='includes/deleteUser.inc.php'>
                    <input type='text' id='userUid' name='userUid' placeholder='Username...'>
                    <input type='submit' name='submit' value='Delete User'>
                    </form>
                    <p id='result'></p>
                    
                    <form method='POST' action='includes/makeAdmin.inc.php'>
                    <input type='text' id='userUid' name='userUid' placeholder='Username...'>
                    <input type='submit' name='submit' value='Make User Admin'>
                    </form>";

        }
?>

<?php
include_once 'footer.php';
?>

