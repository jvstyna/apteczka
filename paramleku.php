<?php 
session_start();
$id_apt = $_GET["idapt"] ?? null;
$ajdi = $_GET["ajdi"] ?? null;

echo "<meta charset='UTF-8'>";

echo "<form method=\"post\" action=\"./dodajlek.php?ajdi=$ajdi&idapt=$id_apt\">
<input type=\"number\" name=\"ilosc\" placeholder=\"Ilosc\"><br><br>
<label for=\"data\">Data Ważności</label><br>
<input type=\"date\" name=\"data\" placeholder=\"Data Waznosci\"><br>
<input type=\"submit\" name=\"submit\" value=\"Dodaj lek\"><br>
</form>";
?>

