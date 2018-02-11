<?php
 include ('config.php');
 
if(isset($_POST['delete_btn']))
{
$img_id=$_POST['img'];
$last_id=$_GET['id'];

$sql="DELETE FROM user_tb_movie_img_254 WHERE id='$img_id'";
$res=mysqli_query($conn,$sql);
if($res){
    header("Location: edit.php?id=".$last_id);
}
}