<?php 
session_start();
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>...:::Rejestracja:::...</title>
        </head>
        <body>
            <form method="POST" action="rejestrator.php">
            <input type="text" name="name" placeholder="Imię i nazwisko"><br>
            <input type="email" name="email" placeholder="E-mail"><br>
            <input type="password" name="password" placeholder="Hasło"><br>
            <input type="submit" name="submit" value="Wyślij"><br>
</form>
</body>
</html>