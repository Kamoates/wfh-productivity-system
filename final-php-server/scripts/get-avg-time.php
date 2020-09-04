<?php
    include_once '../scripts/database-setup.php';
    
    $task = $_POST['name'];
    $description = $_POST['description'];
    $type = $_POST['type'];

    $export = array();
    $index = 0;

    while ($index < count($type)) {
        $query = "SELECT * FROM task_avg WHERE task_name='$type[$index]';";
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)) {
            $objectInstance = array(
                "taskID" => $row["task_id"],
                "taskName" => $task[$index],
                "description" => $description[$index],
                "time" => $row["avg_time"]
            );
            array_push($export, $objectInstance);
        }
        
        
        $index++;
    }

    echo json_encode($export);