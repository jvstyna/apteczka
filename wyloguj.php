<?php
session_start();
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <link rel ="stylesheet" href="style.css">
            <link rel="shortcut icon" href="apteczka_logo.ico"/>
            <title>Domowa Apteczka</title>
        </head>
        <body>
            <?php
            session_unset();
            session_destroy();
            if (isset($_SESSION["current_user"])){
                echo "Użytkowik jest zalogowany: ".$_SESSION["current_user"];
            }
            else{
                echo "<div class='table_window'><div class='login_header'>Wylogowano!";
            }
            ?>

            <div class='options'><a href="./logowanie.php">Zaloguj</a></div>
        </body>
        </html>
        