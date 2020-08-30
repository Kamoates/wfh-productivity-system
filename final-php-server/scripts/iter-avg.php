<?php
    include_once 'database-setup.php';

    $task_id = $_POST['task_id'];
    $new_item = $_POST['new_item'];

    //get information from the database

    $query = "SELECT * FROM task_avg WHERE task_id=$task_id;";
    $result = mysqli_query($conn, $query);

    if($result) {
        while($row = mysqli_fetch_assoc($result)){
            $number_of_curr_items = $row['n'];
            $curr_avg = $row['avg_time'];
        }
    }


    $new_avg = (($number_of_curr_items)*$curr_avg + $new_item) / ($number_of_curr_items + 1);
    $number_of_curr_items++;

    $change = "UPDATE task_avg SET avg_time=$new_avg,  n=$number_of_curr_items WHERE task_id=$task_id;";
    $new_query = mysqli_query($conn, $change);

    if(!$new_query){
        echo "not successful";
    } else {
        echo "added!";
    }