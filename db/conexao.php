<?php
   
   $servername="aws.connect.psdb.cloud";     //"aws.connect.psdb.cloud";
   $username="os9orjbotqfi9k1fne5d";       //"irs0wggsw028ysd9xjos";
   $password="pscale_pw_3y2LcX57Dx19jYphW7Hhz3g7AkHF71yE6jUgqxp5jbM";     //"pscale_pw_YkqLc7KCTPHFIFaxcA0p3RKyhZpiY5UE1ZtxFbkLFpa";
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