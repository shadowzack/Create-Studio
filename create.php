<?php

@ob_start();
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="include/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="js/script.js"></script>
 <title>Create Studio</title>
 
</head>

<body>
<header>
<nav class="top_nav">
    <div class="nav_wrapper">

        <section class="create_logo">
            <a href="index.php">

                
            </a>



        </section>
        <ul class="main_menu">
            <li>
                <a href="create.php">Create</a>
            </li>
            <li>
                <a href="explore.php">Explore</a>
            </li>
            <li>
                <a href="#">Features</a>
            </li>
            <li>
                <a href="#">Connect</a>
            </li>
            <li>
                <a href="mymovies.php">My Movies</a>
            </li>

        </ul>
        <section class="user">
            <section class="user_profile">
            <?php 
           
            if(isset($_POST['logout']))
            {
                if(isset($_SESSION["user"])){
                    unset($_SESSION["user"]);
                    unset($_SESSION["user_id"]);
                    session_destroy();
                    }
            }
            if (!isset($_SESSION["user"])) {?>
              
            <a href="login.php">LOGIN</a>
            <a href="signup.php">SIGNUP</a>
            <?php }else{  $current=basename($_SERVER['PHP_SELF']);?>
                <div>hi <?=$_SESSION["user"]?></div> 
                <form action="<?=$current?>" method="post">
                <button id="logoutbtn" name="logout" type="submit">logout</button>
                </form>
               
            <?php }?>
            </section>

        </section>


        <section id="hamburger">
     
            <input type="checkbox" />


            <span></span>
            <span></span>
            <span></span>

     
            <ul id="hamburger_menu">
                <li>
                    <a href="index.php">

                       
                    </a>
                </li>
                <li>
                    <a href="create.php">Create</a>
                </li>
                <li>
                    <a href="explore.php">Explore</a>
                </li>
                <li>
                    <a href="#">Features</a>
                </li>
                <li>
                    <a href="#">Connect</a>
                </li>
                <li>
                    <a href="mymovies.php">My Movies</a>
                </li>
                <li>
                <?php 
           
            if(isset($_POST['logout']))
            {
                if(isset($_SESSION["user"])){
                    unset($_SESSION["user"]);
                    unset($_SESSION["user_id"]);
                    session_destroy();
                    }
            }
            if (!isset($_SESSION["user"])) {?>
              
            <a href="login.php">LOGIN</a>
            </li>
            <li>
            <a href="signup.php">SIGNUP</a>
            </li>
            <?php }else{  $current=basename($_SERVER['PHP_SELF']);?>
               <li> <div> hi <?=$_SESSION["user"]?> </div></li>
              <li>  <form action="<?=$current?>" method="post">
                <button id="logoutbtn" name="logout" type="submit">logout</button>
                </form>
               </li>
            <?php }?>
            
            </ul>
        </section>
    </div>
</nav>

</header>

    <main>

<section class="clear parallax parallax-1">
    <div class="container create_imgData" >
      <h1>First Step</h1>
      <h2>Upload photos and short videos</h2>
      
    </div>
  </section>
<section class="clear content">
  <div class="container ">
      
   
<script>
 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#upload_img')
                        .attr('src', e.target.result)
                        .height(230);
                };
                $('#upload_img').css("display","block");

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

<section class="steps_wrapper " style="justify-content: flex-start;padding: 20px;">

     <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data"> 
     <section class="flex_upload">
 <section class="upload_feild">
     <h1>UPLOAD PHOTOS</h1>
     <label class="fileContainer">
         Upload....
     <input name="files" type="file" onchange="readURL(this);" multiple>
     </label>
     </section>

   <img id="upload_img" src="#" alt="your image" />
    
   </section>
   </section>
</section>

<section class="clear parallax parallax-2">
    <div class="container create_imgData" >
        <h1>Second Step</h1>
        <h2>Choose Themes and filters</h2>
        
      </div>
</section>

<section class="clear content">
  <div class="container">

        <div class="create_wrapper">
                <h1>Choose Theme or Filter</h1>
                <section class="create_data_wrapper">
                       <form action="">
                        <button id="lft_btn1" name="lftbtn">
                           &lt;
                          </button>
                        
                          </form>
            
                        <div class="create_container" id="create_content"> 
                            
                            <div><img src="images/food.jpg" alt=""></div> 
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                        </div>
                        
                        <button id="rit_btn1" name="ritbtn">
                           &gt;
                          </button>
                    </section>
        </div>

  </div>
</section>

<section class="clear parallax parallax-3">
    <div class="container create_imgData" >
        <h1>Third Step</h1>
        <h2>Choose the soundTrack</h2>
      </div>
</section>

<section class="clear content ">
  <div class="container">

        <div class="create_wrapper">
                <h1>Choose Movie SoundTrack </h1>
                <section class="create_data_wrapper">
                       
                        <button id="lft_btn2" name="lftbtn">
                           &lt;
                          </button>
                        
        
            
                        <div class="create_container" > 
                            <div><img src="images/food.jpg" alt=""></div> 
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                            <div><img src="images/food.jpg" alt=""></div>
                        </div>
                        
                        <button id="rit_btn2" name="ritbtn">
                           &gt;
                          </button>
                    </section>
        </div>

  </div>
</section>

<section class="clear parallax parallax-4">
    <div class="container create_imgData" >
      <h1>Last Step</h1>
      <h2>Enter Your Movie Tilte</h2>




     
      <input type="text" name="title" placeholder="Enter Your Movie Tiltle">
      
      <input type="submit" value="Make My Movie">

      
      </form>
    </div>
  </section>

    </main>






    <footer>
        <section class="footer_f">
            <img src="images/logo_png.png" alt="">
            <p>
                inspiring people around the world
                <br> everyday to be more
                <br> creative.
            </p>
            <section class="icons">
                <div> <a href="#"> <img src="images/facebook_icon1.png" alt=""></a> </div>
                <div> <a href="#"> <img src="images/twitter_icon.png" alt=""></a></div> 
                 <div><a href="#"> <img src="images/instagram_icon.png" alt=""></a></div>
              
              
        
            </section>
        </section>
        <section class="footer_s">



            <section>
                <ul>
                    <li>
                        <a href="create.php">Create</a>
                    </li>
                    <li>
                        <a href="#">get started</a>
                    </li>
                    <li>
                        <a href="#">movie</a>
                    </li>
                    <li>
                        <a href="#">contact support</a>
                    </li>
                    <li>
                        <a href="#">help center</a>
                    </li>
                </ul>
            </section>

            <section>
                <ul>
                    <li>
                        <a href="explore.php">Explore</a>
                    </li>
                    <li>
                        <a href="#">Catigories</a>
                    </li>
                    <li>
                        <a href="#">popular</a>
                    </li>
                    <li>
                        <a href="#">Latest</a>
                    </li>
                    <li>
                        <a href="#">Stories</a>
                    </li>
                </ul>
            </section>


            <section>
                <ul>
                    <li>
                        <a href="#">Connect</a>
                    </li>
                    <li>
                        <a href="#">Blog</a>
                    </li>
                    <li>
                        <a href="#">faceBook</a>
                    </li>
                    <li>
                        <a href="#">Instagram</a>
                    </li>
                    <li>
                        <a href="#">Twitter</a>
                    </li>
                </ul>
            </section>
        </section>
        <section class="footer_t">
            <div class="go_up">
                <a href="#" id="back-to-top" title="Back to top"> Back TO Top <span>&uArr;</span></a>

            </div>
            <div>
                <p>® 2017 Create Studio Ltd.</p>
            </div>
        </section>
    </footer>

<script>
/*
$(document).ready(function(){  
      $('#uploadForm').on('submit', function(e){  
           $.ajax({  
                url: "upload.php",  
                type: "POST",  
                data: new FormData(this),  
                contentType: false,  
                processData:false  
               /* success: function(data)  
                {  

                     
                     alert("Image Uploaded");  
                } */ 
          /* });  
      });  
 });  */
 (function () {
    
         var theme= new theme_run();
    
         
        })();
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>