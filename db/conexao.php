<?php
   
   $servername="aws.connect.psdb.cloud";     //"aws.connect.psdb.cloud";
   $username="wb51xsbc269xwzq6yn8d";       //"irs0wggsw028ysd9xjos";
   $password="pscale_pw_TRL2W3PTqGwFadSKpORvBgAcnxDa74ZGWDphG4Lo0zy";     //"pscale_pw_YkqLc7KCTPHFIFaxcA0p3RKyhZpiY5UE1ZtxFbkLFpa";
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
