<?php
    include_once 'database-setup.php';
    $userID = $_GET['userID'];

    $query = "SELECT first_name, last_name FROM user;";
    $result = mysqli_query($conn, $query);
    $users = array();

    if ($result) {
        while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            array_push($users, $row[0].' '.$row[1]);
        }
    }

    $users = json_encode($users);