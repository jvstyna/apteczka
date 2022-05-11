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
echo"<meta charset='UTF-8'>";
$id_apt = $_GET["idapt"] ?? null;
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

$sql = "INSERT INTO zazycia (IdZazycia, user_id, IdApteczki, IdLeku, Ilosc, DataZazycia)
        VALUES (NULL, '$uzytkownik', '$id_apt', '$lekid', '$lekil', CURRENT_DATE())";

if (mysqli_query($dbconn, $sql)){
    echo "<div class='table_window'><div class='login_header'>Dopisano ";
} 
else {
    echo "Błąd: ".$sql."<br>".mysqli_error($dbconn);
}

$esql = "SELECT Ilosc FROM leki_w_apteczkach WHERE IdLeku = $lekid and IdApteczki = $id_apt";
$eresult = mysqli_query($dbconn, $esql);

if (mysqli_num_rows($eresult) > 0){
    while($erow = mysqli_fetch_assoc($eresult)){
        $zostalo=$erow["Ilosc"]-$lekil;
    }
}

$sqle = "UPDATE leki_w_apteczkach SET Ilosc = $zostalo WHERE IdLeku = $lekid and IdApteczki = $id_apt";


if (mysqli_query($dbconn, $sqle)){
    echo "i zaaktualizowano!</div>";
}
else{
    echo "Błąd: ".$sqle."<br>".mysqli_error($dbconn);
}

echo "<div class='options'><a href='./apteka.php?idapt=".$id_apt."'>Zawartość apteczki</a></div></div>";
?>

</body>
</html>