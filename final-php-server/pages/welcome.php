<?php
    error_reporting(E_ERROR | E_PARSE);
    $userID = $_GET['userID'];
    session_start();
    if($userID) {
        $_SESSION['userID'] = $userID;
    }
    
    $_SESSION['access'] = FALSE;
    $pageName = 'Welcome'; 
    include_once '../scripts/load-ui.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $head; ?>
</head>
<body>
    <?php 
        echo $body;
    ?>
    
    <?php 
        echo $footer;
        include_once '../scripts/retrieve-name.php';
        $_SESSION['users'] = $users;
    ?>
</body>
</html>