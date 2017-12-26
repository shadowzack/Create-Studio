/*
$(function(){
// Find all YouTube videos
var $allVideos = $("iframe[src^='//www.youtube.com']"),

// The element that is fluid width
$fluidEl = $("body");

// Figure out and save aspect ratio for each video
$allVideos.each(function() {

$(this)
.data('aspectRatio', this.height / this.width)

// and remove the hard coded width/height
.removeAttr('height')
.removeAttr('width');

});

// When the window is resized
$(window).resize(function() {

var newWidth = $fluidEl.width();

// Resize all videos according to their own aspect ratio
$allVideos.each(function() {

var $el = $(this);
$el
  .width(newWidth)
  .height(newWidth * $el.data('aspectRatio'));

});

// Kick off one resize to fix all videos on page load
}).resize();

});

window.onload = function() {
if (window.jQuery) {  
    // jQuery is loaded  
    alert("Yeah!");
} else {
    // jQuery is not loaded
    alert("Doesn't Work");
}
}
*/
function feedElement(current) {

  var liElm = document.createElement('li');
  var divElm = document.createElement('div');

  var appendElms = function () {


    var tmp=document.getElementById('data_container').appendChild(liElm);
   
    tmp.appendChild(divElm);
    tmp.addEventListener('click',openModal);
 
  }
    var  openModal = function() {

      document.getElementById('myModal').style.display = "block";
     
    }



  appendElms();
}

function exploreFeed() {
  var obj;
  for (let index = 0; index < 20; index++) {
    obj = new feedElement(index);
   
  }

}



function closeModal() {
  document.getElementById('myModal').style.display = "none";
}




/*
// Open the Modal
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

// Close the Modal
function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}













*/
















































$('#right-button').click(function () {
  event.preventDefault();
  $('#content').animate({
    scrollLeft: "+=164px"
  }, "slow");
});

$('#left-button').click(function () {
  event.preventDefault();
  $('#content').animate({
    scrollLeft: "-=164px"
  }, "slow");
});


























/*


function onYouTubeIframeAPIReady() {
    var player;
    player = new YT.Player('muteYouTubeVideoPlayer', {
      videoId: 'ejX4OrNvqhE', // YouTube Video ID
      width: 560,               // Player width (in px)
      height: 316,              // Player height (in px)
      playerVars: {
        autoplay: 1,        // Auto-play the video on load
        controls: 1,        // Show pause/play buttons in player
        showinfo: 0,        // Hide the video title
        modestbranding: 1,  // Hide the Youtube Logo
        loop: 1,            // Run the video in a loop
        fs: 0,              // Hide the full screen button
        cc_load_policy: 0, // Hide closed captions
        iv_load_policy: 3,  // Hide the Video Annotations
        autohide: 0         // Hide video controls when playing
      },
      events: {
        onReady: function(e) {
          e.target.mute();
        }
      }
    });
   }
*/