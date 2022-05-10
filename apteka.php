<html>
    <head>
    <meta charset="UTF-8">
            <link rel ="stylesheet" href="style.css">
            <link rel="shortcut icon" href="apteczka_logo.ico"/>
            <title>Domowa Apteczka</title>
    </head><?php 
session_start(); 

echo '<div class="login_window"><div class="logged_in_header">Zawartość apteczki </div>
        <div class="logged_in_options"><a href="./nowylek.php">Dodaj nowy lek</a></div>
        <div class="logged_in_options"><a href="./zazycia.php">Zażycia leków</a></div>
        <div class="logged_in_options"><a href="./login.php">Powrót do strony głównej</a></div>
        <div class="logged_in_options"><a href="./wyloguj.php">Wyloguj się</a></div></div>';

$servername = "mysql.agh.edu.pl";
$username = "jkrzywdz";
$password = "87StdMvvAJYA9R60";
$dbname = "jkrzywdz";

$dbconn = mysqli_connect($servername, $username, $password, $dbname);
if (!$dbconn){
    die("Connection failed: ".mysqli_connect_error());
}
$sql = "SELECT IdLeku, Nazwa, DataWazn, Ilosc FROM leki";
$result = mysqli_query($dbconn, $sql);

if (mysqli_num_rows($result) > 0){
    echo "<div class='login_window'><div class='login_header'><table><tr><th>ID leku</th><th>Nazwa</th><th>Data ważności</th><th>Ilość</th></tr></div></div>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>".$row["IdLeku"]."</td><td>".$row["Nazwa"]."</td><td>".$row["DataWazn"]."</td><td>".$row["Ilosc"]."</td><td>
            <a href='./zazycie.php?ajdi=".$row["IdLeku"]."&ile=".$row["Ilosc"]."'>Zażyj</a></td>
            <td><a href='./zutylizuj.php?ajdi=".$row["IdLeku"]."'>Zutylizuj</a></td></tr>";
    }
}else {
    echo "<div class='table_window'><div class='login_header'>Brak wyników! Apteczka jest pusta!</div></div>";
}
mysqli_close($dbconn);
echo"</table>";
?>