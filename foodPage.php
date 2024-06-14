<?php
    session_start();
    require("database.php");


    $ucwid = $_SESSION['CWID'];


    $sql = "SELECT * FROM USER_LINK WHERE UCWID = $ucwid";
    $result = mysqli_query($conn, $sql);

        //Boolean 
    $entryExists = mysqli_num_rows($result) > 0;
    if(!$entryExists)
    {

    $chooseFood = "SELECT FOOD_ID FROM MEAL_PLAN ORDER BY RAND() LIMIT 3";
    $result = $conn->query($chooseFood);


        while($row = $result -> fetch_assoc())
        {
            $foodID = $row['FOOD_ID'];


            $sql_insert = "INSERT INTO USER_LINK(UCWID,UFOOD) VALUES ('$ucwid', '$foodID')";
            if (mysqli_query($conn, $sql_insert)) {
                echo $ucwid; 
            } else {
                echo "Error: " . $insertQuery;

                
            }
        }
    }

    $sql = "SELECT MP.FOOD_NAME, MP.CALORIES, MP.CARBS, MP.FATS, MP.PROTEINS, MP.RATING
                            FROM MEAL_PLAN MP
                            INNER JOIN USER_LINK UL ON MP.FOOD_ID = UL.UFOOD
                            WHERE UL.UCWID = $ucwid";
    $result = mysqli_query($conn, $sql);
   
?>

<!doctype html>
<html>
<head>
    <title>Food Info</title>
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
        h1 {
            margin-top: 20px;
            margin-bottom: 20px;
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

   
    <div class="container">
        <h1>Assigned Food Info</h1>
    
       <?php while($row = $result->fetch_assoc())
        { ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['FOOD_NAME']; ?></h5>
                    <p class="card-text">
                        Calories: <?php echo $row['CALORIES']; ?><br>
                        Carbs: <?php echo $row['CARBS']; ?><br>
                        Fats: <?php echo $row['FATS']; ?><br>
                        Proteins: <?php echo $row['PROTEINS']; ?><br>
                        Rating: <?php echo $row['RATING']; ?>
                    </p>
                </div>
            </div>

         <?php }?>
    </div> 


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
