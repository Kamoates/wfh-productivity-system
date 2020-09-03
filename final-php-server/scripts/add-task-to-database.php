<?php
    include_once '../scripts/database-setup.php';
    $distribution = json_decode($_POST['task'], true);
    $error = false;

    foreach($distribution as $user) {
        $id = $user['id'];
        foreach ($user['toDo'] as $task) {
            $name = $task['taskName'];
            $description = $task['description'];
            $time = $task['time'];
            $query = "INSERT INTO tasks(name, description, time, userID) VALUES('$name', '$description', $time, $id);";
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo "Something goes wrong!";
                break;
            }
        }
    }
    if(!$error) {
        echo "Success!";
    }
    