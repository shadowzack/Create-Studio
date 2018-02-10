<?php
 include ('config.php');
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
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Tangerine">
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
                //if (session_status() == PHP_SESSION_ACTIVE){
                    if(isset($_SESSION["user"])){
                    unset($_SESSION["user"]);
                    unset($_SESSION["user_id"]);
                    session_destroy();
                    }
                //}
            }
            if (!isset($_SESSION["user"])) {?>
              
            <a href="login.php">LOGIN</a>
            <a href="signup.php">SIGNUP</a>
            <?php }else{  $current=basename($_SERVER['PHP_SELF']);?>
                <div>hi <?=$_SESSION["user"]?></div> 
                <form action="<?=$current?>" method="post">
                <button  name="logout" type="submit">logout</button>
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
                <button  name="logout" type="submit">logout</button>
                </form>
               </li>
            <?php }?>
            
            </ul>
        </section>
    </div>
</nav>

</header>

    <main>

<?php
 if (!isset($_SESSION["user"])) {
    ?>
    <section class="mymovieslog"> <span>You Must Login First </span><a href="login.php">Here</a></section>
    <?php 
}
else{


   /* $sql="SELECT *
    FROM user_tb_user_movie_254
    INNER JOIN works
    ON has.id=works.engineer_id
    WHERE project_id IN(SELECT user_tb_movie_254.id AS mid,
    user_tb_movie_254.title AS tilte,user_tb_movie_img_254.img_path AS img_path
    FROM user_tb_movie_254
    INNER JOIN user_tb_movie_img_254
    WHERE user_tb_movie_254.id=user_tb_movie_img_254.movie_id)AS T
";*/
$uu=$_SESSION["user_id"];
/*
$sql="SELECT user_tb_movie_254.title
FROM  user_tb_movie_254
INNER JOIN user_tb_user_movie_254
ON user_tb_user_movie_254.movie_id=user_tb_movie_254.id
WHERE user_tb_user_movie_254.user_id='$uu' ";
*/

$sql="SELECT * FROM(SELECT user_tb_movie_254.title,user_tb_movie_254.id AS ID
FROM  user_tb_movie_254
INNER JOIN user_tb_user_movie_254
ON user_tb_user_movie_254.movie_id=user_tb_movie_254.id
WHERE user_tb_user_movie_254.user_id='$uu' )AS T
INNER JOIN user_tb_movie_img_254
ON user_tb_movie_img_254.movie_id=T.ID";



       $res=mysqli_query($conn,$sql);
       $r=mysqli_num_rows($res);
       if($res&&$r>0)
       {
           ?>
             <section class="wrapper">
           <section id="explore_data">
                    <h1>All Movies</h1>
                <ul id="data_container">

    
    

           <?php
      
      
       $counter=0;
       $lastId="fjedn";
      while($row=mysqli_fetch_assoc($res)){
          if($counter){
          if($row['ID']==$lastId){
          $k='display:none';
          echo "<li style=$k class=movie_".$row['ID']."><div><img src=".$row['img_path']." ></div></li>";
          }
         else{
        echo "<li class=movie_".$row['ID']."><div><img src=".$row['img_path']."></div></li>";
         }
        }
        else{
            echo "<li class=movie_".$row['ID']."><div><img src=".$row['img_path']."></div></li>";
        }
        $lastId=$row['ID'];
        $counter++;
        
      }

      ?>
      </ul>
        </section>
        </section>
      <?php
}
else
{
    ?>
     <section class="mymovieslog"> Create Your First Movie <a href="create.php">Here</a></section>
   
    <?php
}
}             
    
?>


  <!--     GOOGLE FONTS  <p style="font-family: 'Tangerine', serif;font-size: 48px;"> google fonts example yay!!!!!</p>-->


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

 
</body>

</html>