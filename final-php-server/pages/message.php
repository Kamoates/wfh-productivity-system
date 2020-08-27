<?php
    session_start();
    $pageName = 'Message'; 
    include_once '../scripts/load-ui.php';
    include_once '../scripts/load-msg-interface.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $head; ?>
    <link rel="stylesheet" href="../stylesheets/message.css">
</head>
</head>
<body>
    <?php 
        echo $body;
        echo $content;
    ?>
    <script>
        var userID = <?php echo $_SESSION['userID'];?>;
        var users = <?php echo $_SESSION['users']; ?>;
    </script>
    <script src="../scripts/load-message-content.js"></script>
    <?php
        echo $footer; 
    ?>
</body>
</html>