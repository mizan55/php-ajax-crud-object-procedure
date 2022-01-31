<?php
    $userid = $_POST["id"];
    $first_name= $_POST["first_name"];
    $last_name= $_POST["last_name"];
    $age= $_POST["age"];
    $conn=  mysqli_connect('localhost','root','','php-ajax')or die('connection failed');
    $q="UPDATE user_details SET first_name = '{$first_name}', last_name = '{$last_name}',age = '{$age}' WHERE id = {$userid}"; 
if(mysqli_query($conn,$q)){
    mysqli_close($conn);
echo 1;
}else{
    echo 0;
}


    
   

?>