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