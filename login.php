<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
                $servername = "mysql.agh.edu.pl";
                $username = "jkrzywdz";
                $password = "87StdMvvAJYA9R60";
                $dbname = "jkrzywdz";

                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $dbconn=mysqli_connect($servername, $username, $password, $dbname);
                $user_password=mysqli_real_escape_string($dbconn, $_POST["userpassword"]);
                $user_email=mysqli_real_escape_string($dbconn, $_POST["email"]);
                $query=mysqli_query($dbconn, "SELECT * FROM users WHERE user_email = '$user_email'");

                if(mysqli_num_rows($query) > 0) {
                    $record = mysqli_fetch_assoc($query);
                    $hash = $record["user_passwordhash"];
                    if (password_verify($user_password, $hash)){
                        $_SESSION["current_user"] = $record["user_id"];
                    }
                }

                if (isset($_SESSION["current_user"])) {
                    echo '<div class="login_window"><div class="login_header">Oto twoja apteczka <br>
                    <a href="./nowylek.php">Dodaj nowy lek</a><br>
                    <a href="./apteka.php">Zawartość apteczki</a></div></div>';    
                }
                else {
                    echo '<div class="login_window"><div class="login_header">Nieprawidłowy e-mail lub hasło! <br><a href="./logowanie.php">Spróbuj ponownie</a></div></div>';
             
                }
                ?>
            
            </body>
            <html>