<?php
include_once 'header.php';
?>

<?php

if (isset($_GET["id"])){
$blogId = $_GET["id"];

require_once 'includes/dbh.inc.php';

$Query = "SELECT *  FROM BlogPost WHERE blogId=$blogId"; // query to select items from database
$Result = mysqli_query($DB, $Query); // Store the resulting data in the $Result array
if(mysqli_num_rows($Result)>0){
    while($posts = mysqli_fetch_assoc($Result)){
        $blogId = $posts['blogId'];
        $blogTitle = $posts['blogTitle'];
        $blogtext = $posts['blogtext'];
        $blogAuthor = $posts['blogAuthor'];
        $blogAuthorId = $posts['blogAuthorId'];
        $catagory = $posts['catagory'];
        $blogDescription = $posts['blogDescription'];        
?>

<div class="container">
    <div class="row">
        <div class="col-25">
            <a>Blog Title</a>
        </div>
        <div class="col-75">
            <a class="blog"><?php echo $blogTitle;?></a>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <a>Blog Description</a>
        </div>
        <div class="col-75">
            <a class="blog"><?php echo $blogDescription;?></a>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <a for="catagory">Catagorys</a>
        </div>
        <div class="col-75">
            <a class="blog"><?php echo $catagory;?></a>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <a for="content">Description</a>
        </div>
        <div class="col-75">
            <a class="blog"><?php echo $blogDescription;?></a>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <a for="content">Author</a>
        </div>
        <div class="col-75">
            <a class="blog"><?php echo $blogAuthor;?></a>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <a for="content">Content</a>
        </div>
        <div class="col-75">
            <a class="blog"><?php echo $blogtext;?></a>
        </div>
    </div>
    <?php
        if($_SESSION["status"]===1){
            echo "<a class='button' href='editBlogPost.php?id=".$blogId."'>Edit</a>
            <a class='button' href='deletBlogPost.php'>Delete</a>";
         }
    ?>
</div>
<div><br>
    <?php

        $Query = "SELECT * FROM BlogComments"; // query to select items from database
        $Result = mysqli_query($DB, $Query); // Store the resulting data in the $Result array
        if(mysqli_num_rows($Result)>0){
        while($posts = mysqli_fetch_assoc($Result)){
            $comId = $posts['comID'];
            $userId = $posts['userId'];
            $comment = $posts['comment'];
            $userUid = $posts['userUid'];
            $CblogId = $posts['blogId'];
            $sessionUderId = $_SESSION['userid'];

            if($blogId===$CblogId){
            ?>
            <div class="container">
    <div class="row">
        <div>
            <a>Author: <?php echo $userUid;?></a>
        </div>
    </div>
    <div class="row">
        <div class="col-26">
            <a for="content">Comment:&nbsp;&nbsp;   </a>
        </div>
        <div class="col-75">
            <a class="blog"><?php echo $comment;?></a>
        </div>
        <?php
        if($userId==$sessionUderId || $_SESSION["status"]===1){

            echo "<form class='deleteCom' action='includes/deleteBlogComment.inc.php' method='post'>
                    <input type='hidden' name='blogId' value='" . $blogId . "'>
                    <input type='hidden' name='comId' value='" . $comId . "'>
                    <input type='submit' name='submit' value='Delete Comment'>
                    </form>";
         }
         ?>
    </div><br>
        </div><br>
    <?php
        }
    }
}

         if(isset($_SESSION["useruid"])){

             echo "<form action='includes/addComment.inc.php' method='post'>
             <div class='row'>
             <div class='col-25'>
               <label style='float:right' for='Add Comment'>Add Comment:</label>
             </div>
             <div class='col-75'>
               <input type='text' id='comment' name='comment' placeholder='Add Comment...'>
             </div>
            <input type='hidden' name='id' value='" . $blogId . "'>
           <input type='submit' name='submit' value='Add Comment'>
         </div>
         </form>";
         }
         ?>
    </div>
</div>

<?php 
        }
    }
}

?>

<?php
include_once 'footer.php';
?>