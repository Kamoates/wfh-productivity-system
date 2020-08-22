<?php
    include_once 'database-setup.php';
    $roomNumber = $_GET['roomNumber'];

    $query = "SELECT * FROM chat WHERE chatroomID=$roomNumber;";
    $result = mysqli_query($conn, $query);
    $import = array();
    
    if ($result) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            array_push($import, $row);
            
        }
    }
    echo json_encode($import);