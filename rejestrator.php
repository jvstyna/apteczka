<?php
session_start();
echo "<meta charset ='UTF-8'>";
$user_fullname=$user_email=$user_password="";
$imErr=$mailErr=$passErr="";
function chgw($dane)
{
    $dane=trim($dane);
    $dane=stripslashes($dane);
    $dane=htmlspecialchars($dane);
    return $dane;
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if (empty($_POST["name"]))
    {
        $imErr = "Musisz podać imię i nazwisko!";
    }
    else
    {
        $user_fullname=chgw($_POST["name"]);
    }
    if(empty($_POST["email"]))
    {
        $mailErr = "Musisz podać E-mail!";
    }
    else
    {
        $user_email=chgw($_POST["email"]);
    }
    if(empty($_POST["userpassword"]))
    {
        $passErr = "Musisz podać hasło!";
    }
    else
    {
        $user_password=chgw($_POST["userpassword"]);
    }
}

    $servername = "mysql.agh.edu.pl";
    $username = "jkrzywdz";
    $password = "87StdMvvAJYA9R60";
    $dbname = "jkrzywdz";

    $dbconn = mysqli_connect($servername, $username, $password, $dbname);
    $user_fullname = mysqli_real_escape_string($dbconn, $name);
    $user_email = mysqli_real_escape_string($dbconn, $email);
    $user_password = mysqli_real_escape_string($dbconn, $user_password);

    $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
    echo "<br>".$imErr."<br".$mailErr."<br>".$passErr;

    if (mysqli_query($dbconn, "INSERT INTO users (user_fullname, user_email, user_passwordhash) 
        VALUES ('$user_fullname', '$user_email', '$user_password_hash')")) {
            echo "Rejestracja przebiegła pomyślnie";
        }
        else{
            echo "Nieoczekiwany błąd";
        }
        ?>
        <br><a href="./logowanie.php">...:::Zaloguj się:::...</a><br>
        </body>
</html>