<?php

    session_start();
    require("database.php");


    $log_id = $_POST["log_ID"];
    $sql = "DELETE FROM WORKOUT_LOG WHERE LOG_ID = '$log_id' ";


    if(mysqli_query($conn, $sql))
    {

        header ("location: workoutLog.php");
    }
    else
    {
    echo "Failed";
    }



?>