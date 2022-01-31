<?php
    $first_name= $_POST['first_name'];
    $last_name= $_POST['last_name'];
    $age= $_POST['age'];
    $conn=  mysqli_connect('localhost','root','','php-ajax')or die('connection failed');
    $q="INSERT INTO user_details(first_name, last_name, age)
     VALUES('$first_name','$last_name',' $age') ";
if(mysqli_query($conn,$q)){
            mysqli_close($conn);
            echo 1;
}else{
            echo 0;
}

    
   

?>