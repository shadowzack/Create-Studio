<?php
 include ('config.php');
@ob_start();
session_start();


$userid=$_SESSION["user_id"];
$target_dir = "images/$userid/";
//$target_file = $target_dir . basename($_FILES["files"]["name"]);

if(is_array($_FILES))   
 {  
  

  $title=$_POST['title'];
  $theme=$_POST['theme'];
  $soundtrack=$_POST['sound'];
  $cat=$_POST['cat'];
      $sql="INSERT INTO user_tb_movie_254 (title, category, theme,sound)
      VALUES ('$title','$cat','$theme','$soundtrack')";
       $result=mysqli_query($conn,$sql);
       if($result){
          $last_id = mysqli_insert_id($conn);
         // $file_main="$target_dir"."/".pathinfo($_FILES['files']['name'], PATHINFO_FILENAME);
         foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
    
          // move_uploaded_file($_FILES["files"]["tmp_name"], $target_file);
       
          $temp = $_FILES["files"]["tmp_name"][$key];
        //  $name = $_FILES["files"]["name"][$key];
          $target_file = $target_dir . basename($_FILES["files"]["name"][$key]);
          move_uploaded_file($temp,$target_file);
     
           $sql="INSERT INTO user_tb_movie_img_254 (img_path, movie_id) VALUES('$target_file ','$last_id') ";
           $result=mysqli_query($conn,$sql);
          }
           if ($result) {
              $sql="INSERT INTO user_tb_user_movie_254 (user_id,movie_id) VALUES('$userid','$last_id')";
          
              $result=mysqli_query($conn,$sql);
              
          
          
            }
          header("Location: mymovies.php?id=".$last_id);
       }

     
     







     // header("Location: mymovies.php?res=".$result);
 }  

