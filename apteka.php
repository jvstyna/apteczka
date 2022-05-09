<?php 
session_start(); 
echo "<meta charset='UTF-8'>";
echo "<a href='./nowylek.php'>...:::Nowy Lek:::...</a><br>";
echo "<a href='./zazycia.php'>...:::Kto co zażył:::...</a><br>";
echo "<a href='./wyloguj.php'>...:::Wyloguj:::...</a><br>";

$servername = "mysql.agh.edu.pl";
$username = "jkrzywdz";
$password = "87StdMvvAJYA9R60";
$dbname = "jkrzywdz";

$dbconn = mysqli_connect($servername, $username, $password, $dbname);
if (!$dbconn){
    die("Connection failed: ".mysqli_connect_error());
}
echo"<table border=1><tr><th>ID leku</th><th>Nazwa</th><th>Data ważności</th><th>Ilość</th><th>Zażyj</th></tr>";
$sql = "SELECT 'IdLeku', 'Nazwa', 'DataWazn', 'Ilosc' FROM 'leki'";
$result = mysqli_query($dbcon, $sql);

if (mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>".$row["IdLeku"]."</td><td>".$row["Nazwa"]."</td><td>".$row["DataWazn"]."</td><td>".$row["Ilosc"]."</td><td><a href='./zazycie.php?ajdi=".
    }
}