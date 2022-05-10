<?php 
session_start(); 
$id_apt = $_GET["idapt"];
echo "<meta charset='UTF-8'>";
echo "<a href='./nowylek.php?idapt=".$id_apt."'>...:::Nowy Lek:::...</a><br>";
echo "<a href='./zazycia.php?idapt=".$id_apt."'>...:::Kto co zażył:::...</a><br>";
echo "<a href='./wybierzapt.php'>...:::Wybierz inną apteczkę:::...</a><br>";
$servername = "mysql.agh.edu.pl";
$username = "jkrzywdz";
$password = "87StdMvvAJYA9R60";
$dbname = "jkrzywdz";

$dbconn = mysqli_connect($servername, $username, $password, $dbname);
if (!$dbconn){
    die("Connection failed: ".mysqli_connect_error());
}
//przeterminowane leki
echo"<br>Przeterminowane leki<br>";
echo"<table border=1><tr><th>ID leku</th><th>Nazwa</th><th>Data ważności</th></tr>";
$sql_termin = "SELECT IdLeku, Nazwa, DataWazn FROM leki_w_apteczkach WHERE TO_DAYS(CURDATE())>TO_DAYS(DataWazn)";
$result_termin = mysqli_query($dbconn, $sql_termin);

if (mysqli_num_rows($result_termin) > 0){
    while($row = mysqli_fetch_assoc($result_termin)){
        echo "<tr><td>".$row["IdLeku"]."</td><td>".$row["Nazwa"]."</td><td>".$row["DataWazn"]."</td><td><a href='./zutylizuj.php?ajdi=".$row["IdLeku"]."?idapt=".$id_apt."'>Zutylizuj</a></td></tr>";
    }
}else {
    echo "Brak wyników! Wszystkie leki są ważne!";
}
echo"</table><br>";

//wyswietlanie leków
echo"Zawartość apteczki<br>";
echo"<table border=1><tr><th>ID leku</th><th>Nazwa</th><th>Data ważności</th><th>Ilość</th></tr>";
$sql_zawartosc = "SELECT IdLeku, Nazwa, DataWazn, Ilosc FROM leki_w_apteczkach WHERE IdApteczki = $id_apt";
$result_zawartosc = mysqli_query($dbconn, $sql_zawartosc);

if (mysqli_num_rows($result_zawartosc) > 0){
    while($row = mysqli_fetch_assoc($result_zawartosc)){
        echo "<tr><td>".$row["IdLeku"]."</td><td>".$row["Nazwa"]."</td><td>".$row["DataWazn"]."</td><td>".$row["Ilosc"]."</td><td>
            <a href='./zazycie.php?ajdi=".$row["IdLeku"]."&ile=".$row["Ilosc"]."&idapt=".$id_apt."'>Zażyj</a></td>
            <td><a href='./zutylizuj.php?ajdi=".$row["IdLeku"]."&idapt=".$id_apt."'>Zutylizuj</a></td></tr>";
    }
}else {
    echo "Brak wyników! Apteczka jest pusta!";
}
mysqli_close($dbconn);
echo"</table>";
echo "<a href='./wyloguj.php'>...:::Wyloguj:::...</a><br>";
?>