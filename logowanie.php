
<?php 
session_start();

phpversion();
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <link rel ="stylesheet" href="style.css">
            <link rel="shortcut icon" href="apteczka_logo.ico"/>
            <title>Domowa Apteczka</title>
        </head>
        <body>
            <div class="login_window">
            <form method="POST" action="login.php">
                <div class="login_header">Domowa apteczka - logowanie</div>
                <div class="login_email"><input type="email" name="email" placeholder="E-mail"></div>
                <div class="login_password"><input type="password" name="userpassword" placeholder="Hasło"></div>
                <div class="login_submit"><input type="submit" name="submit" value="Zaloguj"></div>
                <div class="login_register">Nie masz konta? <a href="./rejestracja.php">Zarejestruj się!</a></div>
            </form>
            </div>
        </body>
    </html>