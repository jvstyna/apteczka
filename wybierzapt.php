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
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <link rel ="stylesheet" href="style.css">
            <link rel="shortcut icon" href="apteczka_logo.ico"/>
            <title>Domowa Apteczka</title>
        </head>
        <body>
            <?php
                $sql = "SELECT IdApteczki, NazwaApteczki FROM apteczki";
                $result = mysqli_query($dbconn, $sql);

                if (mysqli_num_rows($result) > 0){
                    echo "<div class='table_window'>
                            <div class='login_header'>Wybierz apteczkę</div><div class='table_div'><table border='1px solid'>
                            <tr>
                                <th>ID Apteczki</th>
                                <th>Nazwa</th>
                            </tr>";
                    while($row = mysqli_fetch_assoc($result)){
                        echo "
                                    <tr>
                                        <td>".$row['IdApteczki']."</td>
                                        <td>".$row['NazwaApteczki']."</td>
                                        <td><a href='./apteka.php?idapt'=".$row['IdApteczki'].">Wybierz apteczkę</a></td>
                                    </tr>";
                    } 
                    "</table>
                    </div>
                    </div>";
                }
                else {
                    echo "Brak wyników! W bazie nie ma żadnej apteczki!";
                }
            ?>
            </body>
            </html>