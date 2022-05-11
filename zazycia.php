<?php 
session_start();
echo "<meta charset='UTF-8'>";
$id_apt = $_GET["idapt"] ?? null;

echo "<a href='./nowylek.php?idapt=".$id_apt."'>...:::Nowy Lek:::...</a><br>";
echo "<a href='./apteka.php?idapt=".$id_apt."'>...:::Zawartość apteczki:::...</a><br>";
echo "<a href='./wyloguj.php'>...:::Wyloguj:::...</a><br>";

$servername = "mysql.agh.edu.pl";
$username = "jkrzywdz";
$password = "87StdMvvAJYA9R60";
$dbname = "jkrzywdz";

$dbconn = mysqli_connect($servername, $username, $password, $dbname);
if (!$dbconn){
    die("Connection failed: ".mysqli_connect_error());
}

echo"<table border=1><tr><th>ID zażycia</th><th>Kto zażył</th><th>Co zażył</th>
    <th>Ile zażył</th><th>Kiedy zażył</th></tr>";

$sql = "SELECT zazycia.IdZazycia, users.user_fullname, leki_w_apteczkach.Nazwa, zazycia.Ilosc, zazycia.DataZazycia
    FROM ((zazycia INNER JOIN users ON zazycia.user_id = users.user_id) 
    INNER JOIN leki_w_apteczkach ON zazycia.IdLeku = leki_w_apteczkach.IdLeku) WHERE zazycia.IdApteczki = $id_apt";
    
$result = mysqli_query($dbconn, $sql);

if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>".$row["IdZazycia"]."</td><td>".$row["user_fullname"]."</td>
            <td>".$row["Nazwa"]."</td><td>".$row["Ilosc"]."</td><td>".$row["DataZazycia"]."</td></tr>";
    }
}
else {
    echo "Brak wyników!";
}

mysqli_close($dbconn);
echo "</table>";
?>