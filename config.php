<?php
$host="182.50.133.55";
$user="auxstudDB7c";
$pass="auxstud7cDB1!";
$db= "auxstudDB7c";
$conn=mysqli_connect($host,$user,$pass,$db);

if(!$conn){
 
 die("Connection failed: " . mysqli_connect_error());
}



$sql="CREATE TABLE IF NOT EXISTS user_tb_users_254 (
    id INT(60) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    addresss VARCHAR(50),
    email VARCHAR(50),
    phone VARCHAR(50),
    gender VARCHAR(50),
    pass VARCHAR(50),
    UNIQUE (email)  )";
     

$query=mysqli_query($conn,$sql);
if(!$query)
{
echo "Error creating table: " . mysqli_error($conn)."<br>";
}

$sql="CREATE TABLE IF NOT EXISTS user_tb_movie_254 (
    id INT(60) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    title VARCHAR(30) NOT NULL,
    category VARCHAR(50),
    theme VARCHAR(50),
    sound VARCHAR(50)
      )";
     

$query=mysqli_query($conn,$sql);
if(!$query)
{
echo "Error creating table: " . mysqli_error($conn)."<br>";
}
$sql="CREATE TABLE IF NOT EXISTS user_tb_movie_img_254 (
        id INT(60) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
      img_path VARCHAR(30) NOT NULL,
      movie_id INT(60) UNSIGNED NOT NULL,
      FOREIGN KEY (movie_id) REFERENCES user_tb_movie_254(id)
       ON DELETE CASCADE ON UPDATE CASCADE
      )";
     

$query=mysqli_query($conn,$sql);
if(!$query)
{
echo "Error creating table: " . mysqli_error($conn)."<br>";
}

$sql="CREATE TABLE IF NOT EXISTS user_tb_user_movie_254 (
   user_id INT(60) UNSIGNED NOT NULL,
   movie_id INT(60) UNSIGNED NOT NULL,
   PRIMARY KEY (user_id, movie_id),
   CONSTRAINT Constr_movie_user_id_fk
       FOREIGN KEY (user_id) REFERENCES user_tb_users_254 (id)
       ON DELETE CASCADE ON UPDATE CASCADE,
   CONSTRAINT Constr_movie_user_m_id_fk
   FOREIGN KEY (movie_id) REFERENCES user_tb_movie_254(id)
       ON DELETE CASCADE ON UPDATE CASCADE
      )";
     

$query=mysqli_query($conn,$sql);
if(!$query)
{
echo "Error creating table: " . mysqli_error($conn)."<br>";
}