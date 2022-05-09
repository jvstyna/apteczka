<?php 
session_start();
?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>...:::Zażywanie:::...</title>
</head>
<body>
    <form method="POST" action="./zazyj.php">
        <input type="number" name="IdLeku" value="<?php echo $_GET['ajdi']; ?>" placeholder="Nazwa"><br>
        <input type="number" name="Ilosc" min="1" max="<?php echo $_GET['ile']; ?>" placeholder="Ilość"><br>
        <input type="submit" name="submit" value="Zażyj">
</form>
</body>
</html>
