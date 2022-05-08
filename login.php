<?php 
session_start();
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>...:::Logowanie:::...</title>
        </head>
        <body>
            <?php
                $servername = "mysql.agh.edu.pl";
                $username = "jkrzywdz";
                $password = "87StdMvvAJYA9R60";
                $dbname = "jkrzywdz";

                $dbconn=mysqli_connect($servername, $username, $password, $dbname);
                $user_password=mysqli_real_escape_string($dbconn, $_POST["password"]);
                $user_email=mysqli_real_escape_string($dbconn, $_POST["email"]);
                $query=mysqli_query($dbconn, "SELECT * FROM users WHERE user_email = '$user_email'");

                if(mysqli_num_rows($query) > 0) {
                    $record = mysqli_fetch_assoc($query);
                    $hash = $record["user_passwordhash"];

                    if (password_verify($user_password, $hash)){
                        $_SESSION["current_user"] = $record["user_id"];
                    }
                }

                if (isset($_SESSION["current_user"])) {
                    echo "Użytkownik jest zalogowany: ".$_SESSION["current_user"]."<br>";
                    echo "<a href='./nowylek.php'>...:::Nowy Lek:::...</a><br>";
                    echo "<a href='./apteka.php'>...:::Zawartosc apteczki:::...</a><br>";
                }
                else {
                    echo "Użytkownik nie jest zalogowany";
                }
                ?>
            <a href="./wyloguj.php">...:::Wyloguj:::...</a><br>
            </body>
            <html>