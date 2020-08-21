<?php
    // /error_reporting(E_ERROR | E_PARSE);
    session_start();
    try {
        if (!$_SESSION['userID']) {
            $_SESSION['userID'] = $_GET['userID'];
        }
        
    } catch (exception $e) {
        echo `<script>console.log($e)</script>`;
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
    <?php 
        echo $body; 
        echo $_SESSION['userID'];
    ?>
    
    <?php echo $footer; ?>
</body>
</html>