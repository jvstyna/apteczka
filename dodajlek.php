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
        echo "<div class='table_window'><div class='login_header'>Dopisano lek do apteczki!</div>";
    }
    else{
        echo "Błąd: ".$sql."<br>".mysqli_error($dbconn);
    }
    echo "<div class='options'><a href='./nowylek.php?idapt=".$id_apt."'>Dodaj kolejny lek</a></div>";
    echo "<div class='options'><a href='./apteka.php?idapt=".$id_apt."'>Zawartość apteczki</a></div></div>";


    ?>
    </body>
    </html>