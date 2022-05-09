<?php
session_start();
echo "<meta charset='UTF-8'>";

$servername = "mysql.agh.edu.pl";
$username = "jkrzywdz";
$password = "87StdMvvAJYA9R60";
$dbname = "jkrzywdz";

$dbconn = mysqli_connect($servername, $username, $password, $dbname);
if (!$dbconn){
    die("Connection failed: ".mysqli_connect_error());
}

$sql = "DELETE FROM leki WHERE IdLeku =".$_GET["ajdi"];

if (mysqli_query($dbconn, $sql)){
    echo "Zutylizowano!<br>";
}
else{
    echo "Błąd: ".$esql."<br>".mysqli_error($dbconn);
}

echo "<a href='./apteka.php'>...:::Zawartość apteczki:::...</a><br>";
echo "<a href='./zazycia.php'>...:::Kto co zażył:::...</a><br>";
?>