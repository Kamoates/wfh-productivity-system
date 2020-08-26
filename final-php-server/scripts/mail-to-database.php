<?php
    include_once '../scripts/database-setup.php';
    $userID = $_POST['userID'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];

    $getDate = "SELECT DATE(NOW());";
    $date = mysqli_fetch_row(mysqli_query($conn, $getDate))[0];

    $query = "INSERT INTO `mails`(`userID`, `subject`, `content`, `date`) VALUES($userID, '$subject', '$content', '$date');";
    
    $result = mysqli_query($conn, $query);

    if($result){
        echo "success";
    } else {
        echo mysqli_error($conn);
    }