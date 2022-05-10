<?php 
session_start();
$id_apt = $_GET["idapt"] ?? null;
echo "<meta charset='UTF-8'>";

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
echo "Wyszukaj lek<br>";

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="text" name="nazwaleku" placeholder="Nazwa leku" <?php if (isset($_POST['nazwaleku']) || isset($_GET['nazwaleku'])): ?>value="<?= $_POST["nazwaleku"] ?? $_GET['nazwaleku'] ?>"<?php endif ?>><br>
<input type="submit" name="submit" value="Wyszukaj"><br>
</form>

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
    echo"<table border=1><tr><th>ID leku</th><th>Nazwa leku</th><th>Substancja czynna</th><th>Cena</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["IdLeku"]."</td><td>".$row["Nazwa"]."</td><td>".$row["SubstancjaCzynna"]."</td><td>".$row["Cena"]."</td><td>
            <a href='./paramleku.php?ajdi=".$row["IdLeku"]."&idapt=".$id_apt."'>Dodaj</a></td></tr>";
    }
    echo "</table>";

    $i = 1;
    echo "<br>";
    echo "<div>";
    do {
        echo "<span><a href=\"?nazwaleku=$nazwaleku&page=$i\">$i</a></span>&nbsp;";
    } while ($i++ < ceil($total/$limit));
    echo "</div>";

} else {
    echo "Brak wyników! Nie ma takiego leku!";
}
?>
