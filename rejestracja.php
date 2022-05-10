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
            <div class="register_window">
            <form method="POST" action="rejestrator.php">
                <div class="register_header">Domowa apteczka - rejestracja</div>
                <div class="register_name"><input type="text" name="name" placeholder="Imię i nazwisko"></div>
                <div class="register_email"><input type="email" name="email" placeholder="E-mail"></div>
                <div class="register_password"><input type="password" name="userpassword" placeholder="Hasło"></div>
                <div class="register_submit"><input type="submit" name="submit" value="Zarejestruj"></div>
                <div class="register_login">Masz już konto? <a href="./logowanie.php">Zaloguj się!</a></div>
            </form>
            </div>
        </body>
    </html>