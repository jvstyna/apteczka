<?php 
session_start();

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
                $servername = "mysql.agh.edu.pl";
                $username = "jkrzywdz";
                $password = "87StdMvvAJYA9R60";
                $dbname = "jkrzywdz";

                //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $dbconn=mysqli_connect($servername, $username, $password, $dbname);
                $user_password=mysqli_real_escape_string($dbconn, $_POST["userpassword"] ?? NULL);
                $user_email=mysqli_real_escape_string($dbconn, $_POST["email"]?? NULL);
                $query=mysqli_query($dbconn, "SELECT * FROM users WHERE user_email = '$user_email'");

                if(mysqli_num_rows($query) > 0) {
                    $record = mysqli_fetch_assoc($query);
                    $hash = $record["user_passwordhash"];
                    if (password_verify($user_password, $hash)){
                        $_SESSION["current_user"] = $record["user_id"];
                    }
                }

                if (isset($_SESSION["current_user"])): ?>
                <div class='login_window'>
                    <div class="login_window_left">
                        <div class='login_header'>Stwórz nową apteczkę</div>
                        <form id="newaptform" method="POST" action="stworzapt.php">
                            <div class='register_name'><input type="text" name="apteczkanowa" placeholder="Nazwa apteczki"></div>
                        </form>
                        <input form="newaptform" type="submit" name="submit" value="Utwórz">
                    </div>
                    <div class="login_window_right">
                        <div class='login_header'>Wybierz apteczkę</div>
                        <input type="button" onclick="location.href='./wybierzapt.php'" value="Wybierz">
                    </div>
                </div>
                <?php else:?>
                    <div class="login_window"><div class="login_header">Nieprawidłowy e-mail lub hasło! <br><a href="./logowanie.php">Spróbuj ponownie</a></div></div>';
                <?php endif;?>
            </body>
            </html>