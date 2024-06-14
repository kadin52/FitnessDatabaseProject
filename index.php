<?php

    require("database.php");


?>

    <!doctype html>
    <html>
    <head>
        <title>User Registration & Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            body {
                background-color: #f8f9fa;
                font-family: Arial, sans-serif;
            }

            #forms {
                margin-top: 50px;
            }

            .form-container {
                width: 40%;
                height: auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }

            .form-title {
                margin-top: 0;
                margin-bottom: 20px;
                font-size: 24px;
                font-weight: bold;
                color: #333;
                text-align: center;
            }
        </style>
    </head>
    <body>

        <div id="forms" class="row justify-content-center">
            <form action="index.php" method="post" class="form-container">
                <h1 class="form-title">Registration</h1>
                <input type="hidden" name="form_type" value="registration_form" />

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="user_name" class="form-control" placeholder="Enter name" />
                </div>

                <div class="form-group">
                    <label>CWID</label>
                    <input type="number" name="user_cwid" class="form-control" placeholder="Enter CWID" />
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="user_pw" class="form-control" placeholder="Password" />
                </div>

                

                <div class="form-group">
                    <label>Height (in)</label>
                    <input type="number" name="user_height" class="form-control" placeholder="Enter Height" />
                </div>

                <div class="form-group">
                    <label>Weight (lbs)</label>
                    <input type="number" name="user_weight" class="form-control" placeholder="Enter Weight" />
                </div>

                <div class="form-group">
                    <label>Calorie Intake</label>
                    <input type="number" name="user_calorie_intake" class="form-control" placeholder="Enter Calorie Intake" />
                </div>

                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>

            <form action="login.php" method="post" class="form-container">
                <h1 class="form-title">Login</h1>
                <input type="hidden" name="form_type" value="login_form" />

                <div class="form-group">
                    <label>CWID</label>
                    <input type="number" name="user_ID" class="form-control" placeholder="Enter CWID" />
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="user_password" class="form-control" placeholder="Password" />
                </div>

                <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
    </html>

    <?php
    //Takes user input and inserts into USERS table
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            
            if(isset($_POST['form_type']) == 'registration_form' )
            {
                
                $name = $_POST["user_name"];
                $cwid = $_POST["user_cwid"];
                $password = $_POST["user_pw"];
                
                $height = $_POST["user_height"];
                $weight = $_POST["user_weight"];
                $calorieIntake = $_POST["user_calorie_intake"];
                
                $bmi = 703 * ($weight / ($height * $height));
            
                $sql = "INSERT INTO USERS(UNAME,CWID,PASSWORDS, HEIGHT, WEIGHT,CAL_INTAKE,BMI) 
                    VALUES ('$name','$cwid','$password','$height','$weight','$calorieIntake','$bmi')";

                mysqli_query($conn,$sql);
            
            }
            
        
        }



        mysqli_close($conn);
    ?>
