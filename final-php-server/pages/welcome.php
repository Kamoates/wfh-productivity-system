<?php
    // /error_reporting(E_ERROR | E_PARSE);
    session_start();
    
    if(!$_SESSION['userID']) {
        $_SESSION['userID'] = $_GET['userID'];
    }
    $pageName = 'Welcome'; 
    include_once '../scripts/load-ui.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $head; ?>
</head>
<body>
    <?php echo $body; ?>
    <?php echo $footer; ?>
</body>
</html>