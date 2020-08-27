<?php
    session_start();
    $pageName = 'Mail'; 
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
    <div id="container">
        <div id="mails">
            <p id="header">MAILS</p>
        </div>
        <div id="content">
        </div>
    </div>
    <script>
        var users = <?php echo $_SESSION['users']; ?>;
    </script>
    <script src="../scripts/load-mails.js"></script>
    <?php
        echo $footer; 
    ?>
</body>
</html>