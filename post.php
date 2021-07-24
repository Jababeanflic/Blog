<?php
include_once 'header.php';
?>

<div class="container">
  <form action="includes/post.inc.php" method="post">
  <div class="row">
    <div class="col-25">
      <label for="blogTitle">Blog Title</label>
    </div>
    <div class="col-75">
      <input type="text" id="blogTitle" name="blogTitle" placeholder="Blog Title..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="blogDescription">Blog Description</label>
    </div>
    <div class="col-75">
      <input type="text" id="blogDescription" name="blogDescription" placeholder="Blog Description..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="catagory">Catagorys</label>
    </div>
    <div class="col-75">
      <select id="catagory" name="catagory" onchange="myFunction()"> <!-- 0n change listiner -->
        <option value="movies">Movies</option>
        <option value="theater">Theater</option>
        <option value="books">Books</option>
      </select>
      <p id="selected"></p>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="content">Content</label>
    </div>
    <div class="col-75">
      <textarea id="content" name="content" placeholder="Write something.." style="height:200px"></textarea>
    </div>
  </div>
  <div class="row">
    <input type="submit" name="submit" value="Add Post">
  </div>
  </form>
</div>


<?php
include_once 'footer.php';
?>