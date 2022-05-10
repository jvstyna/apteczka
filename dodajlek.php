<?php
session_start();
echo "<meta charset ='UTF-8'>";
$id_apt = $_GET["idapt"];
$ajdi = $_GET["ajdi"] ?? null;
$iloscleku=$datawaznosci="";
$iloscErr=$dataErr="";

function chgw($dane)
{
    $dane=trim($dane);
    $dane=stripslashes($dane);
    $dane=htmlspecialchars($dane);
    return $dane;
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if (empty($_POST["ilosc"]))
    {
        $iloscErr = "Podaj ilość leku!";
    }
    else
    {
        $iloscleku=chgw($_POST["ilosc"]);
    }
    if(empty($_POST["data"]))
    {
        $dataErr = "Podaj datę ważności!";
    }
    else
    {
        $datawaznosci=chgw($_POST["data"]);
    }
}

$servername = "mysql.agh.edu.pl";
$username = "jkrzywdz";
$password = "87StdMvvAJYA9R60";
$dbname = "jkrzywdz";

$dbconn = mysqli_connect($servername, $username, $password, $dbname);
if (!$dbconn){
    die("Connection failed: ".mysqli_connect_error());
}
$sel_sql = "SELECT Nazwa FROM leki where IdLeku=$ajdi";
$row_nazwaleku = mysqli_fetch_assoc(mysqli_query($dbconn, $sel_sql));
$nazwaleku = $row_nazwaleku["Nazwa"];
$sql = "INSERT INTO leki_w_apteczkach (IdApteczki, IdLeku, Nazwa, Ilosc, DataWazn) VALUES ('$id_apt', '$ajdi', '$nazwaleku', '$iloscleku', '$datawaznosci')";
if (mysqli_query($dbconn, $sql)) {
        echo "Dopisano lek do apteczki!<br>";
    }
    else{
        echo "Błąd: ".$sql."<br>".mysqli_error($dbconn);
    }
    echo "<br><a href='./nowylek.php?idapt=".$id_apt."'>...:::Dodaj kolejny lek:::...</a><br>";
    echo "<br><a href='./apteka.php?idapt=".$id_apt."'>...:::Zawartość apteczki:::...</a><br>";
    ?>