<?php 
session_start();
$id_apt = $_GET["idapt"] ?? null;
$ajdi = $_GET["ajdi"] ?? null;
$ile =  $_GET['ile'] ?? null;
echo"<form method=\"POST\" action=\"./zazyj.php?idapt=$id_apt\">
        <input type=\"number\" name=\"IdLeku\" value=$ajdi placeholder=\"Nazwa\"><br>
        <input type=\"number\" name=\"Ilosc\" min=\"1\" max=$ile placeholder=\"Ilość\"><br>
        <input type=\"submit\" name=\"submit\" value=\"Zażyj\"><br>
        </form>";
?>
