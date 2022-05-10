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
            <div class="login_window">
            <form method="POST" action="dodajlek.php">
                <div class="login_header">Domowa apteczka - dodaj lek</div>
                <div class="register_name"><input type="text" name="nazwaleku" placeholder="Nazwa Leku"></div>
                <div class="register_password"><input type="number" name="iloscleku" placeholder="Ilość tabletek"></div>
                <div class="register_password"><input type="date" name="datawaznosci"><br>
                <label for="datawaznosci">Data Ważności</label></div>
                <div class="two_buttons">
                    <div class="dodajlek_dodaj"><input type="submit" name="submit" value="Dodaj"></div>
                    <div class="dodajlek_powrot"><input type="button" name="return" value="Powrót" onclick="location.href='login.php'"></div>
                </div>
            </form>
            </div>
        </body>
    </html>


