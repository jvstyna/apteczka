<?php
session_start();
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>...:::Wyloguj:::...</title>
        </head>
        <body>
            <?php
            session_unset();
            session_destroy();
            if (isset($_SESSION["current_user"])){
                echo "Użytkowik jest zalogowany: ".$_SESSION["current_user"];
            }
            else{
                echo "Użytkownik nie jest zalogowany";
            }
            ?>

            <a href="./logowanie.php">...:::Zaloguj:::...</a><br>
        </body>
        </html>
        