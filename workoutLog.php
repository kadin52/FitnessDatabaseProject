<?php
    session_start();
    require("database.php");

    echo "Current User CWID: ";
    echo $_SESSION["CWID"];
    $ucwid = $_SESSION["CWID"];



?>
<!doctype html>
<html>
<head>
    <title>Workout Logs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
        <h1>Workout Logs</h1>
        <div>
            <ul id="myList"></ul>

            

            <script>
                let logs = [
                    <?php

    
                $sql= "SELECT * FROM WORKOUT_LOG WHERE UCWID = $ucwid";
                    if($result = $conn->query($sql))
                    {
                        while($row = $result->fetch_assoc())
                        {
                            
                            $date = $row['LOG_DATE'];
                            $muscle = $row['MUSCLES'];
                            
                            echo "{ id: \"{$row['LOG_ID']}\",name: \"$muscle\", date: \"$date\" },";
                            

                        }
                    }


                ?>
                ];
                let list = document.getElementById("myList");

                function clearLogs() {
                    list.innerHTML = "";
                    logs = [];
                }

                function deleteLog(index) {
                    list.removeChild(list.childNodes[index]);
                    logs.splice(index, 1);  


                }

                for (let i = 0; i < logs.length; i++) {
                    let li = document.createElement('li');
                    li.innerText = `Workout target: ${logs[i].name} \u00A0 \u00A0 \u00A0 
                                     Date: ${logs[i].date}`;

                   
                    let form = document.createElement('form');
                    form.action = 'deleteLog.php';
                    form.method = 'post';

                    let hiddenField = document.createElement('input');
                    hiddenField.type = 'hidden';
                    hiddenField.name = 'log_ID';
                    hiddenField.value = logs[i].id;

                        

                    let deleteBtn = document.createElement('button');
                    deleteBtn.innerText = 'Delete';

                   
                    form.appendChild(hiddenField);
                    form.appendChild(deleteBtn);

                    li.appendChild(form);
                    list.appendChild(li);

                    
                   
                }
            </script>
        </div>
    </div>


    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>



  

