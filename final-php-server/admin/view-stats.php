<?php
    session_start();
    $pageName = 'Statistics'; 
    include_once '../scripts/load-ui.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $headAdmin; ?>
    <link rel="stylesheet" href="../stylesheets/mail.css">
</head>
</head>
<body>
    <?php 
        echo $bodyAdmin;
    ?>
    <?php
        echo $footer; 
    ?>
</body>
</html>