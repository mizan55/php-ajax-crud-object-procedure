<?php

    $conn= mysqli_connect('localhost','root','','php-ajax') or die('connection failed');
    $q="select * from user_details";
    $r= mysqli_query($conn,$q)or die('sql query failed');
    $output="";
    if(mysqli_num_rows($r)>0){
        $output='  <table class="table">
        <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Age</th>
        <th>action</th>
        </tr>';
      
        foreach($r as  $user){
          $output.="<tr>
          <td>{$user['id']}</td>
          <td>{$user['first_name']} {$user['last_name']}</td>
          <td>{$user['age']}</td>
          <td> 
      <button class='btn btn-danger' data-id='{$user['id']}'>Delete</button>
      <button class='btn btn-primary ' data-bs-toggle='modal' data-bs-target='#staticBackdrop' data-id='{$user['id']}' id='eupdate' >update</button>
          </td>
          </tr>";
          
        }
        $output.="</table>";
        mysqli_close($conn);
        echo $output;
    }else{
        echo "<h1>no record found</h1>";
    }


?>