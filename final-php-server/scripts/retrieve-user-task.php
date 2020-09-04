<?php
    include_once '../scripts/database-setup.php';
    $userID = $_GET['userID'];
    
    $query = "SELECT * FROM tasks WHERE userID=$userID;";
    $result = mysqli_query($conn, $query);
    $export = array();

    if($result){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($export, $row);
        }
    }
    echo json_encode($export);