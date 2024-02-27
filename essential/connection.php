<?php 
    
    // $FTPserver = "127.0.0.1";
    // $FTPuser = "skola_css";
    // $FTPpassword = "pass";

    $servername = "localhost";
    $database = "skola_css";
    $username = "root";
    $password = "";
      
    $conn = mysqli_connect($servername, $username, $password, $database);
  
    // Check connection
  
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error); 
    }

?>