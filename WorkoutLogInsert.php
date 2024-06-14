<?php
    session_start();
    require("database.php");
    $ucwid = $_SESSION["CWID"];

        

    $muscle = $_POST['NameTarget'];
    $date = date("Y-m-d");
    $sql = "INSERT INTO WORKOUT_LOG(UCWID,MUSCLES,LOG_DATE) VALUES ($ucwid, '$muscle','$date')";
    mysqli_query($conn,$sql);
        
        header("location: workoutLog.php");

    
    


?>