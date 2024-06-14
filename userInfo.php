<?php
    session_start();
    require("database.php");

    $cwid = $_SESSION["CWID"];

    $sql_select = "SELECT * FROM USERS WHERE CWID = '$cwid' ";
    $result = mysqli_query($conn, $sql_select);

    $user_details = mysqli_fetch_assoc($result);


?>



<!doctype html>
<html>
<head>
    <title>User Info</title>
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

        nav.navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav .nav-item {
            margin-right: 15px;
        }

            .navbar-nav .nav-item:last-child {
                margin-right: 0;
            }

        h1 {
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: center;
        }

        #myList {
            list-style: none;
            padding: 0;
        }

            #myList li {
                margin-bottom: 10px;
                background-color: #fff;
                padding: 10px;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent sticky-top">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="AddWorkout.php">Add Workout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="workoutLog.php">Workout Logs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="foodPage.php">Food Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="userInfo.php">User Info</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div id="forms" class="row justify-content-center">
        <form action="updateUserInfo.php" method="post" class="form-container">
            <h1 class="form-title">Update User Info</h1>
            <input type="hidden" name="form_type" value="registration_form" />

            <div class="form-group">
                <label>Weight</label>
                <input type="number" name="user_weight" class="form-control" placeholder="Enter Weight" />
            </div>

            <div class="form-group">
                <label>Calorie Intake</label>
                <input type="number" name="user_calorie_intake" class="form-control" placeholder="Enter Calorie Intake" />
            </div>

            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>

    </div>

 
    <div class="container">
        <h1></h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>CWID</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>BMI</th>
                    <th>Calorie Intake</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- display USERS attributes -->
                    <td><?php echo $user_details['UNAME']; ?></td>
                    <td><?php echo $user_details['CWID']; ?></td>
                    <td><?php echo $user_details['HEIGHT']; ?></td>
                    <td><?php echo $user_details['WEIGHT']; ?></td>
                    <td><?php echo number_format($user_details['BMI'], 1); ?></td>
                    <td><?php echo $user_details['CAL_INTAKE']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
