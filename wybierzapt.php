<?php 
session_start(); 

$servername = "mysql.agh.edu.pl";
$username = "jkrzywdz";
$password = "87StdMvvAJYA9R60";
$dbname = "jkrzywdz";

$dbconn = mysqli_connect($servername, $username, $password, $dbname);
if (!$dbconn){
    die("Connection failed: ".mysqli_connect_error());
}
echo "Wybierz apteczkę<br>";
echo"<table border=1><tr><th>ID Apteczki</th><th>Nazwa</th></tr>";
$sql = "SELECT IdApteczki, NazwaApteczki FROM apteczki";
$result = mysqli_query($dbconn, $sql);

if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>".$row["IdApteczki"]."</td><td>".$row["NazwaApteczki"]."</td><td>
            <a href='./apteka.php?idapt=".$row["IdApteczki"]."'>Wybierz apteczkę</a></td></tr>";
    }
}else {
    echo "Brak wyników! W bazie nie ma żadnej apteczki!";
}
echo"</table>";
?>