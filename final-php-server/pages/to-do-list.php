<?php
    error_reporting(E_ERROR | E_PARSE);
    
    session_start();
    $userID = $_SESSION['userID'];
    
    $pageName = 'To-do'; 
    include_once '../scripts/load-ui.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $head; ?>
    </head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <body>
        <?php 
            echo $body;
        ?>
        <div>
            <table id="task-container">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>time-to-finish</th>
                    <th>start</th>
                </tr>
            </table>
        </div>
        <?php 
            echo $footer;
        ?>
    </body>
</html>
<script>let userID = <?php echo $_SESSION['userID'];?>;</script>
<script src="../scripts/display-tasks.js"></script>