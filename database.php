<?php
//connect to mySQL database
//any page that needs database access will include this
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $db_name = "FITNESSDATABASE";
    $conn="";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db_name);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }





?>