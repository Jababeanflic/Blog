const blade = document.querySelector('.blade');

document.querySelector('.switch-btn').
addEventListener('click',function(){
    blade.classList.toggle('blade-height')   // button event
});

let audioArr = document.getElementsByTagName('audio');
let clash = document.querySelector('.blade');
let ignite = document.querySelector('.switch-btn');

clash.addEventListener('mouseenter', ()=>{  // mouse over event
    audioArr[0].play()
});

ignite.addEventListener('click', ()=>{
    audioArr[1].play()
});

/////// Make dragble /////////

let dragndrop = (function() {
    let myX = '';
    let myY = '';
    let whichArt = '';
  

  
    function moveStart(e) {
      whichArt = e.target;
      myX = e.offsetX === undefined ? e.layerX : e.offsetX;
      myY = e.offsetY === undefined ? e.layerY : e.offsetY;
    }
  
   function moveDragOver(e) {
      e.preventDefault();
    }
  
    function moveDrop(e) {
      e.preventDefault();
      whichArt.style.left = e.pageX - myX + 'px';
      whichArt.style.top = e.pageY - myY + 'px';
    }
  
  function touchStart(e) {
    e.preventDefault();
    var whichArt = e.target;
    var touch = e.touches[0];
    var moveOffsetX = whichArt.offsetLeft - touch.pageX;
    var moveOffsetY = whichArt.offsetBottom - touch.pageY;
    resetZ();
    whichArt.style.zIndex = 10;
  
    whichArt.addEventListener('touchmove', function() {
      var positionX = touch.pageX + moveOffsetX;
      var positionY = touch.pageY + moveOffsetY;
      whichArt.style.left = positionX + 'px';
      whichArt.style.top = positionY + 'px';
    }, false);
  } 
  
    document.querySelector('html').addEventListener('dragstart', moveStart, false);
    document.querySelector('html').addEventListener('dragover', moveDragOver, false);
    document.querySelector('html').addEventListener('drop', moveDrop, false);
  
    document.querySelector('html').addEventListener('touchstart', touchStart, false);  // touch event
  
  
  })();