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
    echo "<div class='table_window'><div class='login_header'>Utworzono nową apteczkę!</div>";
    $current_id=mysqli_insert_id($dbconn);
    echo "<div class='options'><a href='./nowylek.php?idapt=".$current_id."'>Dodaj lek</a></div>
    <div class='options'><a href='./apteka.php?idapt=".$current_id."'>Zawartość apteczki</a></div></div>";
}
else{
    echo "Błąd: ".$sql."<br>".mysqli_error($conn);
}
?>
</body>
</html>