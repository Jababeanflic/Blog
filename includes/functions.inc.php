<?php

////////// Functions for sign up ///////

function emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat){
    $result;
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) { // fuction checking id variable is empty
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){ // fuction checks that the user id it formated correctly
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ // fuction built into php to validate an email
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd,$pwdRepeat){
    $result;
    if($pwd !== $pwdRepeat){ // fuction checks that passwords are matching
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExists($DB,$username,$email){
    $sql = "SELECT * FROM users WHERE userUid = ? OR userEmail = ?;";  // prepared statement
    $stmt = mysqli_stmt_init($DB);
    if(!mysqli_stmt_prepare($stmt, $sql)){ // check for error
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultsData = mysqli_stmt_get_result($stmt); // pass results

    if($row = mysqli_fetch_assoc($resultsData)){ // create row while running function
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt); // close prepared statement
}

function createUser($DB,$name,$email,$username,$pwd){
    $sql = "INSERT INTO users (userName, userEmail, userUid, userPwd) VALUES(?,?,?,?);";  // prepared statement
    $stmt = mysqli_stmt_init($DB);
    if(!mysqli_stmt_prepare($stmt, $sql)){ // check for error
        header("location: ../signup.php?error=createUserFailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); // hash password

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); // close prepared statement
    header("location: ../signup.php?error=none");
    exit();  
}

/////// Functions for login /////////

function emptyInputLogin($username, $pwd){
    $result;
    if(empty($username) || empty($pwd)) { // fuction checking id variable is empty
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($DB, $username, $pwd){
    $uidExists = uidExists($DB,$username,$username); // same perameter twice for function to run correctly 

    if ($uidExists === false){
        header("location: ../login.php?error=wronglogin"); // error message wrong login
        exit(); //stop script
    }

   $pwdHashed = $uidExists["userPwd"]; //set hashed password to variable
   $checkPwd = password_verify($pwd, $pwdHashed);

   if($checkPwd === false){
    header("location: ../login.php?error=wronglogin"); // error message wrong login
    exit(); //stop script
   }
   else if ($checkPwd === true){
       session_start();
       $_SESSION["userid"] = $uidExists["userId"];
       $_SESSION["username"] = $uidExists["userName"];
       $_SESSION["useruid"] = $uidExists["userUid"];
       $_SESSION["status"] = $uidExists["admin"];
       $_SESSION["email"] = $uidExists["userEmail"];
       //$_SESSION["pwd"] = $uidExists["userPwd"];
       header("location: ../index.php"); // CHANGE TO BLOG
    exit(); //stop script
   }
}

/////// Function edit user ///////////

function editUser($DB,$username,$email,$userUid,$userId){
    //$sql = "INSERT INTO users (userName, userEmail, userUid, userPwd) VALUES(?,?,?,?);";  // prepared statement
    $sql = "UPDATE users SET userName=?,userEmail=?,userUid=? WHERE userId=?;";
    $stmt = mysqli_stmt_init($DB);
    if(!mysqli_stmt_prepare($stmt, $sql)){ // check for error
        header("location: ../profile.php?error=createUserFailed");
        exit();
    }

    //$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); // hash password

    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $userUid, $userId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); // close prepared statement
    
    $uidExists = uidExists($DB,$userUid,$userUid);
    
    $_SESSION["username"] = $uidExists["userName"];
    $_SESSION["useruid"] = $uidExists["userUid"];
    $_SESSION["status"] = $uidExists["admin"];
    $_SESSION["email"] = $uidExists["userEmail"];
    $_SESSION["userId"] = $uidExists["userId"];
    //$_SESSION["pwd"] = $uidExists["userPwd"];
    header("location: ../profile.php"); // CHANGE TO BLOG
 exit(); //stop script
} 


//////// Function delete user ////////////

function deleteUser($DB,$userId){
    $sql = "DELETE from users WHERE userId=?;";
    $stmt = mysqli_stmt_init($DB);
    if(!mysqli_stmt_prepare($stmt, $sql)){ // check for error
        header("location: ../profile.php?error=deleteFailed");
        exit();
    }
        mysqli_stmt_bind_param($stmt, "s", $userId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt); // close prepared statement
        
        session_unset();
        session_destroy();

        header("location: ../index.php?error=userDeleted"); // CHANGE TO BLOG
     exit(); //stop script
}


/////// Function add post //////////

function addPost($DB,$blogTitle,$catagory,$content,$userId,$userUid,$blogDescription){

    $sql = "INSERT INTO BlogPost (blogTitle, blogtext, blogAuthor, blogAuthorId, catagory, blogDescription) VALUES(?,?,?,?,?,?);";  // prepared statement;
    $stmt = mysqli_stmt_init($DB);
    if(!mysqli_stmt_prepare($stmt, $sql)){ // check for error
        header("location: ../post.php?error=Failed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssss", $blogTitle, $content, $userUid, $userId,$catagory,$blogDescription);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); // close prepared statement
    
    header("location: ../index.php"); // CHANGE TO BLOG
 exit(); //stop script
} 


////////  Function add comment /////////

function addComent($DB,$userId,$comment,$userUid,$blogId){
    $sql = "INSERT INTO `BlogComments` (`comID`,`userId`,`comment`,`userUid`,`blogId`) VALUES (NULL,?,?,?,?);";  // prepared statement;
    $stmt = mysqli_stmt_init($DB);
    if(!mysqli_stmt_prepare($stmt, $sql)){ // check for error
        header("location: ../test.php?error=Failed");
       exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $userId, $comment, $userUid, $blogId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); // close prepared statement
    
    header("location: ../viewBlogPost.php?id='$blogId'"); // CHANGE TO BLOG
 exit(); //stop script
}


///////// Function delete comment //////

function deleteComment($DB,$comId,$blogId){
    $sql = "DELETE FROM BlogComments  WHERE comID=?;";  // prepared statement;
    $stmt = mysqli_stmt_init($DB);
    if(!mysqli_stmt_prepare($stmt, $sql)){ // check for error
        header("location: ../test.php?error=Failed");
       exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $comId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); // close prepared statement
    
    header("location: ../viewBlogPost.php?id='$blogId'"); // CHANGE TO BLOG
 exit(); //stop script
}

/////////// Function edit post //////////

function editPost($DB,$blogTitle,$catagory,$content,$blogDescription,$blogId){

    $sql = "UPDATE BlogPost SET blogTitle=?,catagory=?,blogtext=?, blogDescription=? WHERE blogId=?;";  // prepared statement;
    $stmt = mysqli_stmt_init($DB);
    if(!mysqli_stmt_prepare($stmt, $sql)){ // check for error
        header("location: ../test.php?error=Failed");
       exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $blogTitle, $catagory, $content, $blogDescription, $blogId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); // close prepared statement

    
    
    header("location: ../viewBlogPost.php?id='$blogId'"); // CHANGE TO BLOG
 exit(); //stop script
}

//////// Function delete user as admin ////////////

function deleteUseradmin($DB,$userId){
    $sql = "DELETE from users WHERE userUid=?;";
    $stmt = mysqli_stmt_init($DB);
    if(!mysqli_stmt_prepare($stmt, $sql)){ // check for error
        header("location: ../profile.php?error=deleteFailed");
        exit();
    }
        mysqli_stmt_bind_param($stmt, "s", $userId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt); // close prepared statement

        header("location: ../profile.php?error=userDeleted"); // CHANGE TO BLOG
     exit(); //stop script
}

//////// Function delete blog post ////////////

function deleteBlogPost($DB,$blogId){
    $sql = "DELETE from BlogPost WHERE blogId=?;";
    $stmt = mysqli_stmt_init($DB);
    if(!mysqli_stmt_prepare($stmt, $sql)){ // check for error
        header("location: ../profile.php?error=deleteFailed");
        exit();
    }
        mysqli_stmt_bind_param($stmt, "s", $blogId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt); // close prepared statement

    $sql2 = "DELETE from BlogComments WHERE blogId=?;";
    $stmt = mysqli_stmt_init($DB);
    if(!mysqli_stmt_prepare($stmt, $sql2)){ // check for error
        header("location: ../profile.php?error=deleteFailed");
        exit();
    }
        mysqli_stmt_bind_param($stmt, "s", $blogId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt); // close prepared statement    

        

        header("location: ../blog.php?error=postDeleted"); // CHANGE TO BLOG
     exit(); //stop script
}

///////// Function Make user admin ///////

function makeUseradmin($DB,$userUid){

    $sql = "UPDATE users SET admin=1 WHERE userUid=?;";  // prepared statement;
    $stmt = mysqli_stmt_init($DB);
    if(!mysqli_stmt_prepare($stmt, $sql)){ // check for error
        header("location: ../test.php?error=Failed");
       exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $userUid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); // close prepared statement
    
    header("location: ../profile.php?error=userPromoted"); // CHANGE TO BLOG
 exit(); //stop script
}