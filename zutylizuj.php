<?php
session_start();
echo "<meta charset='UTF-8'>";
$id_apt = $_GET["idapt"] ?? null;
$ajdi = $_GET["ajdi"] ?? null;

$servername = "mysql.agh.edu.pl";
$username = "jkrzywdz";
$password = "87StdMvvAJYA9R60";
$dbname = "jkrzywdz";

$dbconn = mysqli_connect($servername, $username, $password, $dbname);
if (!$dbconn){
    die("Connection failed: ".mysqli_connect_error());
}

$sql = "DELETE FROM leki_w_apteczkach WHERE IdLeku = $ajdi and IdApteczki = $id_apt";

if (mysqli_query($dbconn, $sql)){
    echo "Zutylizowano!<br>";
}
else{
    echo "Błąd: ".$sql."<br>".mysqli_error($dbconn);
}

echo "<a href='./apteka.php?idapt=".$id_apt."'>...:::Zawartość apteczki:::...</a><br>";

?>