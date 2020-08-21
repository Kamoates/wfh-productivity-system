<?php
    include_once 'database-setup.php';

    $query = 'SELECT * FROM chatroom';
    $result = mysqli_query($conn, $query);
    $import = array();
    if ($result) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            array_push($import, $row);
            
        }
    }

    echo json_encode($import);