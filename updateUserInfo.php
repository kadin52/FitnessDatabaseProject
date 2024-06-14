<?php
session_start();
require("database.php");

if (isset($_POST['user_weight']) && isset($_POST['user_calorie_intake']) && !empty($_POST['user_weight']) && !empty($_POST['user_calorie_intake'])) {
    


    $cwid = $_SESSION["CWID"];

    $weight = $_POST['user_weight'];

    $cal_intake = $_POST['user_calorie_intake'];

    $sql_select = "SELECT HEIGHT FROM USERS WHERE CWID = '$cwid' ";
    $result = mysqli_query($conn, $sql_select);
    $user = mysqli_fetch_assoc($result);
    $height = $user['HEIGHT'];

    if ($height != 0 && $weight !== NULL) 
    {
        $bmi = 703 * ($weight / ($height * $height));
    } 


    $sql = "UPDATE USERS SET WEIGHT = '$weight',CAL_INTAKE = '$cal_intake', BMI = '$bmi' 
            WHERE CWID = '$cwid' ";

    mysqli_query($conn,$sql);

}

header("location: userInfo.php");


?>



