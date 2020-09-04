<?php
    include_once 'database-setup.php';

    $task_id = $_POST['task_id'];
    $curr_time = $_POST['curr_time'];
    $new_time = $_POST['new_time'];
    $id = $_POST['id'];

    //get information from the database

    $query = "SELECT * FROM task_avg WHERE task_id=$id;";
    $result = mysqli_query($conn, $query);

    if($result) {
        while($row = mysqli_fetch_assoc($result)){
            $number_of_curr_items = $row['n'];
            $curr_avg = $row['avg_time'];
        }
    }

    //delete the task from the tasks table
    mysqli_query($conn, "DELETE FROM tasks WHERE id=$task_id;");

    $new_avg = (($number_of_curr_items*$curr_avg) + $new_time) / ($number_of_curr_items + 1);
    
    $number_of_curr_items++;

    
    $change = "UPDATE task_avg SET avg_time=$new_avg,  n=$number_of_curr_items WHERE task_id=$id;";
    echo $change;
    $new_query = mysqli_query($conn, $change);

    if(!$new_query){
        echo "not successful";
    } else {
        echo "updated!";
    }