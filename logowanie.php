
<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel ="stylesheet" href="arkuszstyli.css">
        <title>
            Domowa Apteczka
        </title>
    </head>
    <body>
        <h1>Witaj w domowej apteczce</h1>
        <p>Lorem ipsum nie mam na razie zielonego pojęcia</p>
        <br>...:::Zaloguj się:::...</br>
        <form method="POST" action="login.php">
        <input type="email" name="email" placeholder="E-mail"><br>
        <input type="password" name="password" placeholder="Hasło"><br>
        <input type="submit" name="submit" value="ZALOGUJ"><br>
        <br><a href="./rejestracja.php">...:::Zarejestruj się:::...</a><br>
    </body>
</html>