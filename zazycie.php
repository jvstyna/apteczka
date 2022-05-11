<html>
    <head>
        <meta charset="UTF-8">
        <link rel ="stylesheet" href="style.css">
        <link rel="shortcut icon" href="apteczka_logo.ico"/>
        <title>Domowa Apteczka</title>
    </head>
    <body>

<?php 
session_start();
$id_apt = $_GET["idapt"] ?? null;
$ajdi = $_GET["ajdi"] ?? null;
$ile =  $_GET['ile'] ?? null;
echo"<div class='login_window'><form method=\"POST\" action=\"./zazyj.php?idapt=$id_apt\">
        <div class='login_header'>Wybierz lek</div>
        <div class='login_email'><input type=\"number\" name=\"IdLeku\" value=$ajdi placeholder=\"Nazwa\"></div>
        <div class='login_email'><input type=\"number\" name=\"Ilosc\" min=\"1\" max=$ile placeholder=\"Ilość\"></div>
        <div class='login_submit'><input type=\"submit\" name=\"submit\" value=\"Zażyj\"></div>
        </form></div>";
?>

</body>
</html>