<?php
    session_start();
    $pageName = 'Send Mail'; 
    include_once '../scripts/load-ui.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $headAdmin; ?>
    <link rel="stylesheet" href="../stylesheets/send-mail.css">
</head>
</head>
<body>
    <?php 
        echo $bodyAdmin;
    ?>

    <div id="container">
        <form id="mail-form">
            <input type="text" name="subject" id="subject" placeholder="Subject" required>
            <textarea name="content" id="content" placeholder="content" required></textarea>
            <input type="submit" value="Send" id="send">
        </form>
    </div>
    <script>
        var userID = Number(<?php echo $_SESSION['userID']?>);
    </script>
    <script src="../scripts/submit-mail.js"></script>
    <?php
        echo $footer; 
    ?>
</body>
</html>