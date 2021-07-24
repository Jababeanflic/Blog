<?php
include_once 'header.php';
?>

<?php

if (isset($_GET["id"])){ // get methods
$blogId = $_GET["id"];

require_once 'includes/dbh.inc.php';

$Query = "SELECT *  FROM BlogPost WHERE blogId=$blogId"; // query to select items from database
$Result = mysqli_query($DB, $Query);                        // Store the resulting data in the $Result array
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

<h2>Edit Post</h2>
<p>Resize the browser window to see the effect. When the screen is less than 600px wide, make the two columns stack on
    top of each other instead of next to each other.</p>

<div class="container">
    <form action="includes/editBlogPost.inc.php" method="post">
        <div class="row">
            <div class="col-25">
                <label for="blogTitle">Blog Title</label>
            </div>
            <div class="col-75">
                <input type="text" id="blogTitle" name="blogTitle" value="<?php echo $blogTitle;?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="blogDescription">Blog Description</label>
            </div>
            <div class="col-75">
                <input type="text" id="blogDescription" name="blogDescription" value="<?php echo $blogDescription;?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="catagory">Catagorys</label>
            </div>
            <div class="col-75">
                <select id="catagory" name="catagory">
                    <option selected="selected"><?php echo $catagory;?></option>
                    <option value="Movies">Movies</option>
                    <option value="Theater">Theater</option>
                    <option value="Books">Books</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="content">Content</label>
            </div>
            <div class="col-75">
                <textarea id="content" name="content" style="height:200px"><?php echo $blogtext;?></textarea>
            </div>
        </div>
        <div class="row">
            <input type='hidden' name='blogId' value='<?php echo $blogId;?>'>
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>
</div>

<?php 
        }
    }
}
?>

<?php
include_once 'footer.php';
?>