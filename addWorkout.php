<?php

    session_start();
    require("database.php");
    $ucwid = $_SESSION["CWID"];
    ?>


<!doctype html>
<html>
<head>
    <title>Add Workout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
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

        #forms {
            margin-top: 50px;
        }

        form {
            width: 40%;
            height: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
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
        <form action="workoutLogInsert.php" method="post">
            <h1 class="mt-2">Add Workout</h1>
            <input type="hidden" name="form_type" value="routine_form" />
            <div class="form-group">
                <label for="workout_target">Workout target</label>
                <select id="workout_target" name="NameTarget" class="form-control">
                    <option value="Deltoids">Deltoids</option>
                    <option value="Biceps">Biceps</option>
                    <option value="Chest">Chest</option>
                    <option value="Forearm">Forearm</option>
                    <option value="Sideabs">Side Abs</option>
                    <option value="Abdominal">Abdominal</option>
                    <option value="Quads">Quads</option>
                    <option value="Calfs">Calves</option>
                    <option value="Tibialanterior">Tibialis Anterior</option>
                    <option value="Upper back">Upper Back</option>
                    <option value="Middle back">Middle Back</option>
                    <option value="Lower back">Lower Back</option>
                    <option value="Triceps">Triceps</option>
                    <option value="Hamstrings">Hamstrings</option>
                    <option value="Glutes">Glutes</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


