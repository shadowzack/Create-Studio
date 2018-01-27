//chek jqury
/*
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



//explore load feed elemts from db
function feedElement(current) {

  var liElm = document.createElement('li');
  var divElm = document.createElement('div');
  var imgElm = document.createElement('img');
  var appendElms = function () {


    var tmp = document.getElementById('data_container').appendChild(liElm);

    var inner_div = tmp.appendChild(divElm);
    var inner_div_img = inner_div.appendChild(imgElm);
    if (current % 2 == 0) {
      inner_div_img.src = "images/creat1.jpeg"
    } else {
      inner_div_img.src = "images/vid_poster.png"
    }
    tmp.addEventListener('click', openModal);

  }
  var openModal = function () {

    document.getElementById('myModal').style.display = "block";
    var tmp = this.firstChild.firstChild;
    document.getElementById('current_modal_img').src = tmp.src;

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



//load catigores 
var arr = new Array();
arr[0] = 'adventure';
arr[1] = 'animal';
arr[2] = 'education';
arr[3] = 'food';
arr[4] = 'music';
arr[5] = 'sport';
arr[6] = 'tech';
arr[7] = 'travel';

function initCat(current) {

  var divElm = document.createElement('div');
  var imgElm = document.createElement('img');
  var appendElms = function () {


    var tmp = document.getElementById('content').appendChild(divElm);

    imgtmp = tmp.appendChild(imgElm);
    imgtmp.id = "cat_" + arr[current];
    imgtmp.src = "images/" + arr[current] + ".jpg";

    inner_div = divElm.appendChild(document.createElement('div'));
    inner_div.innerHTML += "<h1>" + arr[current] + "</h1>";
    // tmp.addEventListener('click',openModal);

  }
  var openModal = function () {

    document.getElementById('myModal').style.display = "block";

  }



  appendElms();
}

function loadCat() {
  var obj;
  for (let index = 0; index < 8; index++) {
    obj = new initCat(index);

  }

}



//back to top buuton
$('#back-to-top').on('click', function (e) {
  e.preventDefault();
  $('html,body').animate({
    scrollTop: 0
  }, 1000);
});









//create and explore buttons
$('button[id^="rit_btn"]').click(function () {
  event.preventDefault();
  
  $(this).parent().find('div').animate({
    scrollLeft: "+=164px"
  }, "slow");
});

$('button[id^="lft_btn"]').click(function () {
  event.preventDefault();
  $(this).parent().find('div').animate({
    scrollLeft: "-=164px"
  }, "slow");
});

//mark current page link
function mark() {

  var currentPage = window.location.href;

  var links_container = document.getElementsByTagName('nav');
  var links = links_container[0].getElementsByTagName('a');
  for (let index = 0; index < links.length; index++) {

    if ((sub_name(links[index].href) == sub_name(currentPage)) && sub_name(currentPage) != "signup.php" 
     && sub_name(currentPage) != "index.php"  && sub_name(currentPage) != "#"  && sub_name(currentPage) != "login.php") {
      links[index].style.color = "whitesmoke";
      links[index].style.background = "#383736";
      links[index].parentElement.style.background = "#383736";
    }

  }
}
mark();

function sub_name(str) {
  var currentpageindex = str.lastIndexOf('/');
  var temp = str.substring(currentpageindex + 1, str.length);
  return temp;


}