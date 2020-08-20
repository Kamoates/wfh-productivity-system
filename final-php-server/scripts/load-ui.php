<?php
    $head = <<<EOD
        <title>$pageName</title>
        <link rel="stylesheet" type="text/css" href="../stylesheets/ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    EOD;

    $body = <<<EOD
        <h1 class="header"><a href="welcome.php">Walrus</a></h1>
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fa fa-reorder" id="bars"></i>
                
        </label>
        <div class="sidebar">
            <header>Menu</header>
            <ul>
                <li><a href="message.php"><i class="fa fa-send"></i> Message</a></li>
                <li><a href="mail.php"><i class="fa fa-envelope-o"></i> Mail</a></li>
                <li><a href="to-do-list.php"><i class="fa fa-list-alt"></i> To-do-list</a></li>
                <li><a href="sign-out.php"><i class="fa fa-sign-out"></i> Sign out</a></li>
                </ul>
        
        </div>
    EOD;

    $footer = <<<EOD
        <footer id="footer">
            <p>Copyright &copy; 2020 Walrus</p>
        </footer>
    EOD;