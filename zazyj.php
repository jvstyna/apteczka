<?php
session_start();
echo"<meta charset='UTF-8'>";

$lekid=$lekil=$uzytkownik=$zostalo="";

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $lekid = $_POST["IdLeku"];
    $lekil = $_POST["Ilosc"];
    $uzytkownik = $_SESSION["current_user"];
}

$servername = "mysql.agh.edu.pl";
$username = "jkrzywdz";
$password = "87StdMvvAJYA9R60";
$dbname = "jkrzywdz";

$dbconn = mysqli_connect($servername, $username, $password, $dbname);
if (!$dbconn){
    die("Connection failed: ".mysqli_connect_error());
}

$sql = "INSERT INTO zazycia (IdZazycia, user_id, IdLeku, Ilosc, DataZazycia)
        VALUES (NULL, '$uzytkownik', '$lekid', '$lekil', CURRENT_DATE())";

if (mysqli_query($dbconn, $sql)){
    echo "Dopisano ";
} 
else {
    echo "Błąd: ".$esql."<br>".mysqli_error($dbconn);
}

$esql = "SELECT Ilosc FROM leki WHERE IdLeku = $lekid";
$eresult = mysqli_query($dbconn, $esql);

if (mysqli_num_rows($eresult) > 0){
    while($erow = mysqli_fetch_assoc($eresult)){
        $zostalo=$erow["Ilosc"]-$lekil;
    }
}

$sqle = "UPDATE leki SET Ilosc = $zostalo WHERE IdLeku = $lekid";


if (mysqli_query($dbconn, $sqle)){
    echo "i zaaktualizowano!<br>";
}
else{
    echo "Błąd: ".$sqle."<br>".mysqli_error($dbconn);
}

echo "<a href='./apteka.php'>...:::Zawartość Apteczki:::...</a><br>";
echo "<a href='./zazycia.php'>...:::Kto co zażył:::...</a><br>";
?>