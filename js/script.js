

// example of change //

function myFunction() {
    var x = document.getElementById("catagory").value;
    document.getElementById("selected").innerHTML = "You selected: " + x;   // example of change 
  }

// example of submit ////

var form = document.getElementById('deletUser')

form.addEventListener('submit',function(event){
  //event.preventDefault() // prevent form from auto submitting

  var userUid = document.getElementById('userUid').value
  var reslult = document.getElementById('result');
  
  reslult.innerHTML = 'You have deleted ' + userUid;

  console.log("Form submitted")

  return confirm('Are oyu sure you want to delete this user?')
})

//// window key even /////

window.addEventListener("keydown", checkKeyPress, false);

function checkKeyPress(key){
  if (key.keyCode == "65"){
    alert("The 'a' letter has been pressed")
  }
}

function navbar() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

////// cookies ///////////

function setCookie(cname,cvalue,exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires=" + d.toGMTString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie() {
  var user=getCookie("username");
  if (user != "") {
    document.getElementById("cookie").innerHTML = "Welcome again " + user;
    //alert("Welcome again " + user);
  } else {
     user = prompt("Please enter your name:","");
     if (user != "" && user != null) {
       setCookie("username", user, 30);
     }
  }
}

function delete_cookie(){
  document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/";
  }