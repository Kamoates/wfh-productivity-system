<?php
    include_once '../scripts/database-setup.php';
    
    $task = $_POST['name'];
    $description = $_POST['description'];
    $type = $_POST['type'];

    $export = array();
    $index = 0;

    while ($index < count($type)) {
        $query = "SELECT avg_time FROM task_avg WHERE task_name='$type[$index]';";
        $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
        $objectInstance = array(
            "taskName" => $task[$index],
            "description" => $description[$index],
            "time" => $result["avg_time"]
        );
        array_push($export, $objectInstance);
        $index++;
    }

    echo json_encode($export);