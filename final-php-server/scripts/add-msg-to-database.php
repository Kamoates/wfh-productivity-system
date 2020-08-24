<?php 
    include_once '../scripts/database-setup.php';
    
    $userID = $_POST['userID'];
    $chatroomID = $_POST['chatroomID'];
    $message = $_POST['content'];
    
    //echo $userID.$chatroomID.$message;
    $getDate = "SELECT DATE(NOW());";
    $date = mysqli_fetch_row(mysqli_query($conn, $getDate))[0];
    
    $query = "INSERT INTO chat(userID, chatroomID, message, chat_date) VALUES($userID, $chatroomID, '$message', '$date');";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "success";
    }




