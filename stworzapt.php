<?php
session_start();
echo "<meta charset ='UTF-8'>";

$nazwaapteczki=$current_id="";
$nazwaErr="";

function chgw($dane)
{
    $dane=trim($dane);
    $dane=stripslashes($dane);
    $dane=htmlspecialchars($dane);
    return $dane;
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if (empty($_POST["apteczkanowa"]))
    {
        $nazwaErr = "Podaj nazwę apteczki!";
    }
    else
    {
        $nazwaapteczki=chgw($_POST["apteczkanowa"]);
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

$sql = "INSERT INTO apteczki (NazwaApteczki) VALUES ('$nazwaapteczki')";

if (mysqli_query($dbconn, $sql)) {
    echo "Utworzono nową apteczkę!<br>";
    $current_id=mysqli_insert_id($dbconn);
    echo "<br><a href='./nowylek.php?idapt=".$current_id."'>...:::Dodaj lek:::...</a><br>";
    echo "<br><a href='./apteka.php?idapt=".$current_id."'>...:::Zawartość apteczki:::...</a><br>";
}
else{
    echo "Błąd: ".$sql."<br>".mysqli_error($conn);
}
echo "<br><a href='./wyloguj.php'>...:::Wyloguj:::...</a><br>";
?>