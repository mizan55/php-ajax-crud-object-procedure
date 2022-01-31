<?php
  $user_id= $_POST['id'];

  $conn=  mysqli_connect('localhost','root','','php-ajax')or die('connection failed');
    $q= "delete  from user_details where id= $user_id";

    if(mysqli_query($conn,$q)){
        echo 1;
        }else{
            echo 0;
        }

?>