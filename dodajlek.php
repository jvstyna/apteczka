<?php
session_start();
echo "<meta charset ='UTF-8'>";

$nazwaleku=$iloscleku=$datawaznosci="";
$nazwaErr=$iloscErr=$dataErr="";

function chgw($dane)
{
    $dane=trim($dane);
    $dane=stripslashes($dane);
    $dane=htmlspecialchars($dane);
    return $dane;
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if (empty($_POST["nazwaleku"]))
    {
        $nazwaErr = "Podaj nazwę leku!";
    }
    else
    {
        $nazwaleku=chgw($_POST["nazwaleku"]);
    }
    if(empty($_POST["iloscleku"]))
    {
        $iloscErr = "Podaj ilość!";
    }
    else
    {
        $iloscleku=chgw($_POST["iloscleku"]);
    }
    if(empty($_POST["datawaznosci"]))
    {
        $dataErr = "Podaj datę ważności!";
    }
    else
    {
        $datawaznosci=chgw($_POST["datawaznosci"]);
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

$sql = "INSERT INTO leki (Nazwa, DataWazn, Ilosc) VALUES ('$nazwaleku', '$datawaznosci', '$iloscleku')";
if (mysqli_query($dbconn, $sql)) {
        echo "Dopisano lek do apteczki";
    }
    else{
        echo "Błąd: ".$sql."<br>".mysqli_error($conn);
    }
    echo "<br><a href='./nowylek.php'>...:::Dodaj kolejny lek:::...</a><br>";
    echo "<br><a href='./apteka.php'>...:::Zawartość apteczki:::...</a><br>";
    ?>
    </body>
</html>