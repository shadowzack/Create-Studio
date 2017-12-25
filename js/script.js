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









































































$('#right-button').click(function() {
  event.preventDefault();
  $('#content').animate({
    scrollLeft: "+=164px"
  }, "slow");
});

 $('#left-button').click(function() {
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