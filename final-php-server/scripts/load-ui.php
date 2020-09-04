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

    $headAdmin = <<<EOD
        <title>$pageName</title>
        <link rel="stylesheet" type="text/css" href="../stylesheets/admin-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    EOD;

    $bodyAdmin = <<<EOD
        <h1 class="header"><a href="admin-page.php">Walrus</a></h1>
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fa fa-reorder" id="bars"></i>
                
        </label>
        <div class="sidebar">
            <header>Menu</header>
            <ul>
                <li><a href="admin-message.php"><i class="fa fa-send"></i>Message</a></li>
                <li><a href="admin-mail.php"><i class="fa fa-envelope-open"></i> Inbox</a></li>
                <li><a href="send-mail.php"><i class="fa fa-envelope-o"></i> Send mail</a></li>
                <li><a href="view-stats.php"><i class="fa fa-bar-chart-o"></i> View stats</a></li>
                <li><a href="../pages/sign-out.php"><i class="fa fa-sign-out"></i> Sign out</a></li>
            </ul>
        
        </div>
    EOD;

    $footer = <<<EOD
        <footer id="footer">
            <p>Copyright &copy; 2020 Walrus</p>
        </footer>
    EOD;