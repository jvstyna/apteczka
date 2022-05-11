<html>
    <head>
        <link rel ="stylesheet" href="style.css">
        <link rel="shortcut icon" href="apteczka_logo.ico"/>
        <title>Domowa Apteczka</title>
    </head>
    <body>
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
        $imErr = "Musisz podać imię i nazwisko!<br>";
    }
    else
    {
        $name=chgw($_POST["name"]);
    }
    if(empty($_POST["email"]))
    {
        $mailErr = "Musisz podać E-mail!<br>";
    }
    else
    {
        $email=chgw($_POST["email"]);
    }
    if(empty($_POST["userpassword"]))
    {
        $passErr = "Musisz podać hasło!<br>";
    }
    else
    {
        $passwd=chgw($_POST["userpassword"]);
    }
}

    $servername = "mysql.agh.edu.pl";
    $username = "jkrzywdz";
    $password = "87StdMvvAJYA9R60";
    $dbname = "jkrzywdz";

    $dbconn = mysqli_connect($servername, $username, $password, $dbname);
    $user_fullname = mysqli_real_escape_string($dbconn, $name);
    $user_email = mysqli_real_escape_string($dbconn, $email);
    $user_password = mysqli_real_escape_string($dbconn, $passwd);

    $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
    
    if($mailErr=="" && $imErr=="" && $passErr==""){

        if (mysqli_query($dbconn, "INSERT INTO users (user_fullname, user_email, user_passwordhash) 
            VALUES ('$user_fullname', '$user_email', '$user_password_hash')")) {
                echo '<div class="login_window"><div class="login_header">Rejestracja przebiegła pomyślnie<br><a href="./logowanie.php">Zaloguj się</a></div></div>';
            }
            else{
                echo "Nieoczekiwany błąd";
            }
        }
    else{

        echo '<div class="login_window"><div class="register_wrong_data">'.$imErr.''.$mailErr.''.$passErr.'<a href="./rejestracja.php">Spróbuj ponownie</a></div></div>';

    }
            ?>
    </body>
</html>