<?php
    session_start();
    require("database.php");

        $user_ID = $_POST["user_ID"];
        $user_password = $_POST["user_password"];
    

        $sql = "SELECT * FROM USERS WHERE CWID = $user_ID AND PASSWORDS = '$user_password' ";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) >0)
        {
            $row = mysqli_fetch_assoc($result);
            /*echo $row["PASSWORDS"];
            echo $row["CWID"]; */
            $_SESSION["CWID"] = $row["CWID"];

            header("location: workoutLog.php");

        }
        else{
            header("location: index.php");
        }


    
?>