<?php
include ('config.php');
@ob_start();
session_start();
if (isset($_POST['id'])) {
    # code...ehc

    echo "lksdflksdjfklsdkfjsdklfsdk";
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

        <section class="wrapper">
                <h1>Search by Category</h1>


              
                           
                            
               <section class="cat_wrapper">
                   
                <button id="lft_btn">
                   &lt;
                  </button>
                

    
                <div class="cat_container" id="content"> 
                   
                </div>
                
                <button id="rit_btn">
                   &gt;
                  </button>
            </section>

            <div id="myModal" class="modal" >
                <span class="close cursor" onclick="closeModal()">&times;</span>
                <div class="modal_content">
                        

                   <section class="img_holder" >
                        <a class="prev" onclick="">&#10094;</a>
                        <a class="next" onclick="">&#10095;</a>
                    <img src="images/logo_png.png" id="current_modal_img" alt="">
                    <div id="playMovie">&#9654;</div>
                   </section>
                   <section class="content_holder" id="user_content">
                    <section>
                    <!--profile -->
                  
                <?php
                if( isset($_POST['id'])){
                    echo $_POST['id'];
                    
                   }
                ?>    
                
                </section>
                    <section>
                    <!--comments -->
                    </section>
                    <section>
                    <!--tiltle likes -->
                    </section>
                    <section>
                        <input type="text" placeholder="Add a comment ....">
                    </section>
                   </section>
                </div>
              </div>  


            <section id="explore_data">
                <h1>Explore</h1>
                
                <ul id="data_container" >
                <?php
                    $sql="SELECT * FROM(SELECT user_tb_movie_254.sound,user_tb_movie_254.theme,user_tb_movie_254.title,user_tb_movie_254.id AS ID,user_tb_movie_254.category
                    FROM  user_tb_movie_254
                    INNER JOIN user_tb_user_movie_254
                    ON user_tb_user_movie_254.movie_id=user_tb_movie_254.id )AS T
                    INNER JOIN user_tb_movie_img_254
                    ON user_tb_movie_img_254.movie_id=T.ID
                    ORDER BY T.ID";
                    
                    $res=mysqli_query($conn,$sql);
                    if($res)
                    {
                        $counter=0;
                        $lastId="fjedn";
                        $cat="cat_feed_";
                        
                       while($row=mysqli_fetch_assoc($res)){
                        $filter_Sound=$row['theme'].' '.$row['sound'];
                           if($counter){
                           if($row['ID']==$lastId){
                           $k='display:none';
                           echo "<li style=$k class=movie_".$row['ID']."><div class=dontshow ><img src=".$row['img_path']." class=".$cat.$row['category']." ></div></li>";
                           }
                          else{
                         echo "<li class=movie_".$row['ID']."><div class='".$filter_Sound."'><img src=".$row['img_path']." class=".$cat.$row['category']."></div></li>";
                          }
                         }
                         else{
                             echo "<li class=movie_".$row['ID']."><div class='".$filter_Sound."'><img src=".$row['img_path']." class=".$cat.$row['category']."></div></li>";
                         }
                         $lastId=$row['ID'];
                         $counter++;
                         
                       }

                       
                  /*  while($row=mysqli_fetch_assoc($res)){
                        echo '
                        <li id="'.$row['id'].'">
                        <div>
                        <img src="'.$row['img_path'].'" class="'.$cat.$row['category'].'">
                        </div>
                        </li>
                        
                        ';
                      }
                      */
                    }
                      ?>
                    
                    
                    
                </ul>
            </section>
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
                    <li >
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
        (function () {
         //   var explore = new exploreFeed();
         var cat= new loadCat();
         var explore=new exploreFeed_run();

       //  var listen=new addlistner();

               $('[id]').each(function(){
  var ids = $('[id="'+this.id+'"]');
  if(ids.length>1 && ids[0]==this)
    console.warn('Multiple IDs #'+this.id);
});
mark();
        })();


 
    </script>
  
</body>

</html>
<?php
mysqli_close($conn);
?>