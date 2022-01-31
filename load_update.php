<?php

$user_id = $_POST["id"];
$conn=  mysqli_connect("localhost","root","","php-ajax")or die('connection failed');
$q="SELECT* FROM user_details WHERE id = {$user_id}";
$r= mysqli_query($conn, $q) or die("SQL Query Failed.");
$output="";
if(mysqli_num_rows($r)>0){
   $row= mysqli_fetch_assoc($r);
   $output.="
   
   <input type='text' id='id' value='{$row["id"]}'/>
   <input type='text' id='f' value='{$row["first_name"]}'/>
   <input type='text' id='l' value='{$row["last_name"]}'/>
   <input type='text' id='a' value='{$row["age"]}'/>";
  
   mysqli_close($conn);
   echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}


    
   

?>