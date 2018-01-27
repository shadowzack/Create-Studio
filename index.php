<?php
include ('config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="include/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                    session_start();
                    if(isset($_POST['logout']))
                    {
                        if (session_status() == PHP_SESSION_ACTIVE){
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
                        if (session_status() == PHP_SESSION_ACTIVE){
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

        <section class="home_container">



            <div style="  position: absolute;
                top: 0;
                left: 0;
                 width:100%;
                 height:100%;
                 z-index:3;
                 background:rgba(0, 0, 0, 0);"></div>

            <div class="video-responsive">

        

             <!--   <video id="vid_vid" src="" autoplay loop muted poster="images/vid_poster.png"></video>
             -->

                <iframe id="vid_you" src="https://www.youtube.com/embed/ejX4OrNvqhE?rel=0&controls=0&showinfo=0&autoplay=1&loop=1&list=PLB18xrQgSkncvfC4H2NvLcooaqZBJzqn2&mute=1"
                    frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
            </div>


            <div class="text_block">


                <div>
                    <h1>CREATE.EXPRESS.INSPIRE</h1>
                </div>
                <div>
                    <h3>SHARE YOUR STORY</h3>
                </div>
                <button class="fill">create a movie</button>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
<script>
  /*  var ios = /(iPad|iPhone|iPod)/g.test(navigator.userAgent);
    if (ios) {
        document.getElementById("vid_you").style.display="none";
      document.getElementById("vid_you").style.display="none";
     // document.getElementById("vid_vid").src="images/vidTrim.mp4";
    }
    else{
        document.getElementById("vid_vid").style.display="block";
        document.getElementById("vid_you").style.display="block";
        document.getElementById("vid_you").src="https://www.youtube.com/embed/ejX4OrNvqhE?rel=0&controls=0&showinfo=0&autoplay=1&loop=1&list=PLB18xrQgSkncvfC4H2NvLcooaqZBJzqn2&mute=1";
    }
    */
    </script>

</body>

</html>