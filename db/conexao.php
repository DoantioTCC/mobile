<?php
   
   $servername="aws.connect.psdb.cloud";     //"aws.connect.psdb.cloud";
   $username="";       //"";
   $password="";     //"";
   $database="donatio";

   
     // Create a connection 
     $conexao = mysqli_connect($servername, 
         $username, $password, $database);
   
    // Code written below is a step taken
    // to check that our Database is 
    // connected properly or not. If our 
    // Database is properly connected we
    // can remove this part from the code 
    // or we can simply make it a comment 
    // for future reference.
   
    if(!$conexao){
        die("Error". mysqli_connect_error()); 
    } 
?>
