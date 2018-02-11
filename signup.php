<?php
   include ('config.php');
   session_start();
   if(isset($_POST['signup']))
   {
      
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $pass=$_POST['pass'];
    $repass=$_POST['repass'];
if($pass==$repass){
    $sql="INSERT INTO user_tb_users_254 (firstname, lastname, addresss,email,phone,gender,pass)
    VALUES ('$firstname','$lastname','$address','$email','$phone','$gender','$pass')";
     $result=mysqli_query($conn,$sql);
     if($result){
        $last_id = mysqli_insert_id($conn);
         $sql="SELECT * FROM user_tb_users_254 WHERE email='$email' ";
         $result=mysqli_query($conn,$sql);
         $row=mysqli_fetch_assoc($result);
        $_SESSION["user"]=$row['firstname'];
        $_SESSION["user_id"]=$row['id'];
        mkdir("images/$last_id",0777);
        header("Location: mymovies.php");
     }
     else {
        $message="email already exists";
     }
    }
    else{
        $message="passwords are not the same try again";
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
           
                <form action="signup.php" method="post">
              <ul class="flex_outer">
                <li>
                  <label for="firstname">First Name</label>
                  <input type="text"  name="firstname" placeholder="Enter your first name" required>
                </li>
                <li>
                  <label for="lastname">Last Name</label>
                  <input type="text" name="lastname" placeholder="Enter your last" required>
                </li>
                <li>
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" placeholder="Enter your email " required>
                </li>
                <li>
                  <label for="phone">Phone</label>
                  <input type="tel" id="phone" name="phone" placeholder="Enter your phone " required>
                </li>
                <li>
                    <label for="pass">password</label>
                    <input type="password" id="pass" name="pass" placeholder="Enter your password " required>
                  </li>
                  <li>
                    <label for="re-pass">re-password</label>
                    <input type="password" id="re-pass" name="repass" placeholder="renter your password " required>
                  </li>
                  <li>
                    <label for="address">address</label>
                    <input type="text" id="address" name="address" placeholder="enter your address " required>
                  </li>
              <!--  <li>
                  <p>Age</p>
                  <ul class="flex-inner">
                    <li>
                      <input type="checkbox" id="other">
                      <label for="other">Other</label>
                    </li>
                  </ul>
                </li>-->

                <li>
                    <p>Gender</p>
                    <ul class="flex_inner" style=" justify-content:flex-start; ">
                      <li>
                        <input type="radio" id="0" name="gender">
                        <label for="0">male</label>
                      </li>
                      <li>
                        <input type="radio" id="1"  name="gender">
                        <label for="1">female</label>
                      </li>
                    </ul>
                  </li>

                <li>
                  <button name="signup" type="submit">SIGNUP</button>
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