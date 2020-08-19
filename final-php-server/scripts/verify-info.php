<?php
    //import database-setup.php
    include_once 'database-setup.php';

    //check wether the user input a username
    if (isset($_POST['username']) && isset($_POST['password'])) {
        //get the user info using the POST method
        $username = $_POST['username'];
        $password = $_POST['password'];

        //initialized the MySQL query
        $query = "SELECT * FROM user WHERE username='$username'";
        //run the query from the $conn variable
        $result = mysqli_query($conn, $query);

        //check if it runs
        if ($result) {
            //if it is then collect the matching row
            $row = mysqli_fetch_assoc($result);
            echo json_encode($row);
        }
    }