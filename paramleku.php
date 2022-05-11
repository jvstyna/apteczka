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

echo "<div class='login_window'><form method=\"post\" action=\"./dodajlek.php?ajdi=$ajdi&idapt=$id_apt\">
<div class='login_header'>Wybierz lek</div>
<div class='register_name'><input type=\"number\" name=\"ilosc\" placeholder=\"Ilość\"></div>
<div class='data'><input type=\"date\" name=\"data\" placeholder=\"Data Waznosci\"><br>
<label for=\"data\">Data Ważności</label></div><br>
<div class='login_submit'><input type=\"submit\" name=\"submit\" value=\"Dodaj lek\"></div>
</form></div>";
?>

</body>
</html>

