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
            $taskID = $task['taskID'];
            $query = "INSERT INTO tasks(taskID, name, description, time, start_time, userID) VALUES($taskID,'$name', '$description', $time, NOW(), $id);";
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
    