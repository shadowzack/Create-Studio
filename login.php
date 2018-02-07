<?php
   include ('config.php');
   session_start();
   if(isset($_POST['login']))
   {
    $email=$_POST['email'];
    $pass=$_POST['pass'];

    $sql="SELECT * FROM user_tb_users_254 WHERE email='$email' AND pass='$pass'";
     $result=mysqli_query($conn,$sql);
     $row=mysqli_fetch_assoc($result);
     if(isset($row)){
        
        $_SESSION["user"]=$row['firstname'];
        $_SESSION["user_id"]=$row['email'];
        header('Location: mymovies.php');
     }
     else {
        $message="wrong email or password";
     }
   
   }
    
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="include/style.css">
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
                    <a href="login.php">LOGIN</a>
                    <a href="signup.php">SIGNUP</a>
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
                        <a href="login.php">LOGIN</a>
            </li>
            <li>
            <a href="signup.php">SIGNUP</a>
            </li>
                    </ul>
                </section>
            </div>
        </nav>

    </header>

    <main>


  

        <div class="signup_container">
           
                <form action="login.php" method="post">
              <ul class="flex_outer">
                <li>
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" placeholder="Enter your email " required>
                </li>
             
                <li>
                    <label for="pass">password</label>
                    <input type="password" id="pass" name="pass" placeholder="Enter your password " required>
                  </li>
             
                <li>
                  <button name="login" type="submit">login</button>
                </li>
                <li>
                <?php if(isset($message)) { ?>
            <div style="border:1px solid red;padding:3px;"> 
                <?=$message?>
            </div>  <?php } ?>    
            </li>
              </ul>
            </form>




          </div>



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
</body>

</html>