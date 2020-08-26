<?php
    session_start();
    $pageName = 'Mail'; 
    include_once '../scripts/load-ui.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $headAdmin; ?>
</head>
</head>
<body>
    <?php 
        echo $bodyAdmin;
    ?>
    <div id="mail-box">
    </div>
    <?php
        echo $footer; 
    ?>
</body>
</html>