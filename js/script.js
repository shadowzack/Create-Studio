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
  for (let index = 0; index < 2; index++) {
    obj = new feedElement(index);

  }

}

function theme_run() {
  var content = document.getElementById('create_content').childNodes;
  var themeInput = document.getElementById('theme_input');
  var flag = 0;
  var lastvar;
  var select_func = function () {
    if (flag)
      lastvar.firstChild.className = "";
    flag++;
    lastvar = this;
    this.firstChild.className = "create_container_altr";
    themeInput.value = this.firstChild.id;
  }
  for (let index = 0; index < content.length; index++) {
    content[index].addEventListener('click', select_func);
  }
}

function soundtrack_run() {
  var content = document.getElementById('sound_track').childNodes;
  var themeInput = document.getElementById('sound_input');
  var flag = 0;
  var lastvar;
  var select_func = function () {
    if (flag)
      lastvar.firstChild.className = "";
    flag++;
    lastvar = this;
    this.firstChild.className = "create_container_altr";
    themeInput.value = this.firstChild.id;

  }
  for (let index = 0; index < content.length; index++) {
    content[index].addEventListener('click', select_func);
  }
}

function exploreFeed_run() {
  var openModal = function () {


    var content = document.getElementById('user_content').childNodes;
    var id = this.id;




    document.getElementById('myModal').style.display = "block";
    var tmp = this.firstChild.firstChild;
    document.getElementById('current_modal_img').src = tmp.src;


  }

  var tmp = document.getElementById('data_container').childNodes;
  var length = tmp.length;
  for (let index = 0; index < length; index++) {
    tmp[index].addEventListener('click', openModal);

  }


}


function closeModal() {
  document.getElementById('myModal').style.display = "none";
}





/*
  _____                                                                _        
 |_   _|   ___    __ _   _ __ ___       __ _    ___     ___     __ _  | |   ___ 
   | |    / _ \  / _` | | '_ ` _ \     / _` |  / _ \   / _ \   / _` | | |  / _ \
   | |   |  __/ | (_| | | | | | | |   | (_| | | (_) | | (_) | | (_| | | | |  __/
   |_|    \___|  \__,_| |_| |_| |_|    \__, |  \___/   \___/   \__, | |_|  \___|
                                       |___/                   |___/            

We dont check for IE
*/




function loadCat() {

  $.getJSON("include/json/category.json", function (data) {

    $.each(data.categories, function (key, val) {
      var divElm = document.createElement('div');
      var imgElm = document.createElement('img');
      var tmp = document.getElementById('content').appendChild(divElm);
      imgtmp = tmp.appendChild(imgElm);
      imgtmp.id = "cat_" + this.catId;
      imgtmp.src = "images/" + this.categoryName + ".jpg";
      inner_div = divElm.appendChild(document.createElement('div'));
      inner_div.innerHTML += "<h1>" + this.categoryName + "</h1>";
      inner_div.addEventListener('click',filter_feed);

    });

   
  });

  
  var feedNodes=document.getElementById('data_container').childNodes;
  var arrLenght=feedNodes.length;
  var filter_feed= function(){
    for (let index = 0; index < arrLenght; index++) {
     if(feedNodes[index].id!=this.parentElement.firstChild.id)
     alert();
      feedNodes[index].style.display="none";
    }

  }

}

(function (){
  alert(document.getElementById('data_container').childNodes);
})();

function selectLoad() {
  $.getJSON("include/json/category.json", function (data) {

    $.each(data.categories, function (key, val) {
      var optelm = document.createElement('option');

      var tmp = document.getElementById('category_input').appendChild(optelm);
      optelm.innerHTML = this.categoryName;
      optelm.value = this.catId;

    });
  });
}



//back to top buuton
$(document).ready(function () {
  $('#back-to-top').on('click', function (e) {
    e.preventDefault();
    $('html,body').animate({
      scrollTop: 0
    }, 1000);
  });
});








//create and explore buttons
$(document).ready(function () {
  $('button[id^="rit_btn"]').click(function () {
    event.preventDefault();

    $(this).parent().find('div').animate({
      scrollLeft: "+=164px"
    }, "slow");
  });
});
$(document).ready(function () {
  $('button[id^="lft_btn"]').click(function () {
    event.preventDefault();
    $(this).parent().find('div').animate({
      scrollLeft: "-=164px"
    }, "slow");
  });
});


//mark current page link
function mark() {

  var currentPage = window.location.href;

  var links_container = document.getElementsByTagName('nav');
  var links = links_container[0].getElementsByTagName('a');
  for (let index = 0; index < links.length; index++) {

    if ((sub_name(links[index].href) == sub_name(currentPage)) && sub_name(currentPage) != "signup.php" &&
      sub_name(currentPage) != "index.php" && sub_name(currentPage) != "#" && sub_name(currentPage) != "login.php") {
      links[index].style.color = "whitesmoke";
      links[index].style.background = "#383736";
      links[index].parentElement.style.background = "#383736";
    }

  }
}
(function () {

  mark();
})();


function sub_name(str) {
  var currentpageindex = str.lastIndexOf('/');
  var temp = str.substring(currentpageindex + 1, str.length);
  return temp;


}