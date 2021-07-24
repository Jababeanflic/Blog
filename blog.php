<?php
include_once 'header.php';
?>
    
<?php

require_once 'includes/dbh.inc.php';//include db connection 

$Query = "SELECT *  FROM BlogPost"; // query to select items from database
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
      <a for="content">Author</a>
    </div>
    <div class="col-75">
    <a class="blog"><?php echo $blogAuthor;?></a>
    </div>
  </div>
    <div >
        <?php echo '<a class="button" href="viewBlogPost.php?id='.$blogId.'">View</a>'?>
        <?php
        if($_SESSION["status"]===1){
            echo "<a class='button' href='editBlogPost.php?id=".$blogId."'>Edit</a>
            <a class='button' href='includes/deletBlogPost.inc.php?id=".$blogId."'>Delete</a>";
         }
         ?>
    </div>
</div>


<?php
    }
}

?>

<?php
include_once 'footer.php';
?>


