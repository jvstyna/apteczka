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
$id_apt = $_GET["idapt"] ?? null;
echo "<div class='table_window'><div class='login_header'>Twoja apteczka</div>
<div class='options'><a href='./nowylek.php?idapt=".$id_apt."'>Nowy Lek</a></div>";
echo "<div class='options'><a href='./zazycia.php?idapt=".$id_apt."'>Historia zażyć</a></div>";
echo "<div class='options'><a href='./wybierzapt.php'>Wybierz inną apteczkę</a></div>";
echo "<div class='options'><a href='./wyloguj.php'>Wyloguj</a></div></div>";

$servername = "mysql.agh.edu.pl";
$username = "jkrzywdz";
$password = "87StdMvvAJYA9R60";
$dbname = "jkrzywdz";

$dbconn = mysqli_connect($servername, $username, $password, $dbname);
if (!$dbconn){
    die("Connection failed: ".mysqli_connect_error());
}
//przeterminowane leki
echo"<div class='table_window'><div class='login_header'>Przeterminowane leki</div>";
$sql_termin = "SELECT IdLeku, Nazwa, DataWazn FROM leki_w_apteczkach WHERE TO_DAYS(CURDATE())>TO_DAYS(DataWazn) and IdApteczki = $id_apt";
$result_termin = mysqli_query($dbconn, $sql_termin);

if (mysqli_num_rows($result_termin) > 0){
    echo"
                            <div class='table_div'><table border='1px solid'>
                            <tr>
                                <th>ID Leku</th>
                                <th>Nazwa</th>
                                <th>Data ważności</th>
                            </tr>";
    while($row = mysqli_fetch_assoc($result_termin)){
        echo "<tr><td>".$row["IdLeku"]."</td><td>".$row["Nazwa"]."</td><td>".$row["DataWazn"]."</td><td><a href='./zutylizuj.php?ajdi=".$row["IdLeku"]."&idapt=".$id_apt."'>Zutylizuj</a></td></tr></div>";
    }
}else {
    echo "<div class='login_header'>Brak wyników! Wszystkie leki są ważne!</div>";
}
echo"</table></div></div>";

//wyswietlanie leków
echo"<div class='table_window'><div class='login_header'>Zawartość apteczki</div>";
$sql_zawartosc = "SELECT IdLeku, Nazwa, DataWazn, Ilosc FROM leki_w_apteczkach WHERE IdApteczki = $id_apt";
$result_zawartosc = mysqli_query($dbconn, $sql_zawartosc);

if (mysqli_num_rows($result_zawartosc) > 0){
    echo "
    <div class='table_div'><table border='1px solid'>
    <tr>
        <th>ID Leku</th>
        <th>Nazwa</th>
        <th>Data ważności</th>
        <th>Ilość</th>
    </tr>";
    while($row = mysqli_fetch_assoc($result_zawartosc)){
        echo "<tr><td>".$row["IdLeku"]."</td><td>".$row["Nazwa"]."</td><td>".$row["DataWazn"]."</td><td>".$row["Ilosc"]."</td><td>
            <a href='./zazycie.php?ajdi=".$row["IdLeku"]."&ile=".$row["Ilosc"]."&idapt=".$id_apt."'>Zażyj</a></td>
            <td><a href='./zutylizuj.php?ajdi=".$row["IdLeku"]."&idapt=".$id_apt."'>Zutylizuj</a></td></tr>";
    }

}else {
    echo "<div class='table_window'><div class='login_header'>Brak wyników! Apteczka jest pusta!</div></div>";
}
mysqli_close($dbconn);
echo"</table></div></div>";
?>
</body>
</html>