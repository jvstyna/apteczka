<html>
        <head>
            <meta charset="UTF-8">
            <link rel ="stylesheet" href="style.css">
            <link rel="shortcut icon" href="apteczka_logo.ico"/>
            <title>Domowa Apteczka</title>
        </head>
        <body>

<?php 
session_start();
$id_apt = $_POST['idapt'] ?? $_GET["idapt"];

$nazwaleku="";


$servername = "mysql.agh.edu.pl";
$username = "jkrzywdz";
$password = "87StdMvvAJYA9R60";
$dbname = "jkrzywdz";

$dbconn = mysqli_connect($servername, $username, $password, $dbname);
if (!$dbconn){
    die("Connection failed: ".mysqli_connect_error());
}
mysqli_set_charset($dbconn, "utf8");
echo "<div class='table_window'><div class='login_header'>Wyszukaj lek</div>";

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="register_name"><input type="text" name="nazwaleku" placeholder="Nazwa leku" <?php if (isset($_POST['nazwaleku']) || isset($_GET['nazwaleku'])): ?>value="<?= $_POST["nazwaleku"] ?? $_GET['nazwaleku'] ?>"<?php endif ?>>
<input type="hidden" name="idapt" value="<?= $_POST['idapt'] ?? $_GET['idapt'] ?>"></div>
    <div class="login_submit"><input type="submit" name="submit" value="Wyszukaj"></div>
</form></div>

<?php
if (!isset($_POST['nazwaleku']) && !isset($_GET['nazwaleku'])) return;

$nazwaleku = $_POST["nazwaleku"] ?? $_GET['nazwaleku'];
$page = $_GET['page'] ?? 1;
$limit = 10;

$offset = ($page - 1) * $limit;

$sql = "SELECT IdLeku, Nazwa, SubstancjaCzynna, Cena FROM leki WHERE Nazwa LIKE \"%$nazwaleku%\" LIMIT $offset, $limit";
$sqlTotal = "SELECT COUNT(*) as total FROM leki WHERE Nazwa LIKE \"%$nazwaleku%\"";

$result = mysqli_query($dbconn, $sql);
$total = mysqli_fetch_assoc(mysqli_query($dbconn, $sqlTotal))['total'];

if (mysqli_num_rows($result) > 0) {
    echo"<div class='table_window'><div class='table_div'>
        <table border=1>
            <tr>
                <th>ID leku</th>
                <th>Nazwa leku</th>
                <th>Substancja czynna</th>
                <th>Cena</th>
            </tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>".$row["IdLeku"]."</td>
                <td>".$row["Nazwa"]."</td>
                <td>".$row["SubstancjaCzynna"]."</td>
                <td>".$row["Cena"]."</td>
                <td><a href='./paramleku.php?ajdi=".$row["IdLeku"]."&idapt=".$id_apt."'>Dodaj</a></td>
            </tr>";
    }
    echo "</table></div>";

    $i = 1;
    echo "<div class='pages'>";
    do {
        echo "<span><a href=\"?nazwaleku=$nazwaleku&page=$i\">$i</a></span>&nbsp;";
    } while ($i++ < ceil($total/$limit));

} else {
    echo "<div class='table_window'><div class='login_header'>Brak wyników! Nie ma takiego leku!";
}
echo"</div></div>";
?>
</body>
</html>
