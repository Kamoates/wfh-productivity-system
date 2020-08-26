<?php
    error_reporting(E_ERROR | E_PARSE);
    $userID = $_GET['userID'];
    session_start();
    if($userID) {
        $_SESSION['userID'] = $userID;
    }
    $pageName = 'Welcome'; 
    include_once '../scripts/load-ui.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <?php echo $headAdmin ?>
    </head>
    <body>
        <?php
            echo $bodyAdmin;
            include_once '../scripts/retrieve-name.php';
            $_SESSION['users'] = $users;
        ?>
        <?php echo $footer ?>

    </body>
</html>