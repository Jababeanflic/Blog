<?php
include_once 'header.php';
?>
<!-- cookies function will run on page load -->
<body onload="checkCookie()">  

<div class="header">
    <h2 id="cookie"></h2>
    <h2> <?php
if(isset($_GET["error"])){ // example of get mothod
    if($_GET["error"] == "userDeleted"){
        echo "<h1>USER DELETED</h1>";
    }
}
        if(isset($_SESSION["useruid"])){
                    echo "<p> Hello " .$_SESSION["useruid"]. "</p>";
                
                if($_SESSION["status"]===1){
                    echo "<p>" .$_SESSION["status"]. " You are admin</p>"; 
                }
            }
            else{
                echo "<h1>Welcom To Our<br> Theater Blog</h1>"; 
            }
                ?></h2>
</div>
    <div class="row">
        <div class="column">Column</div>
        <div class="column">Push the button to Ignite me!!<br>Mouse over the blade!
            <div class="lightsaber" draggable="true">
                <div class="blade">
                    <audio src="snd/clash.mp3" id="clash"></audio>
                    <audio src="snd/ignite.mp3" id="ignite"></audio>
                </div>
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom">
                    <div class="switch-btn"></div>
                    
                </div>
            </div>
        </div>
        <div class="column">Column</div>
    </div>

    <input type="button" value ="delete cookie" onclick="delete_cookie()"/>

<script src="js/saber.js"></script> <!--link to light saber javaScript -->
<?php
include_once 'footer.php';
?>