<?php 
session_start();
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>...:::Nowy Lek:::...</title>
        </head>
        <body>
            <form method="POST" action="dodajlek.php">
            <input type="text" name="nazwaleku" placeholder="Nazwa Leku"><br>
            <input type="number" name="iloscleku" placeholder="Ilość tabletek"><br>
            <input type="date" name="datawaznosci"><br>
            <label for="datawaznosci">Data Ważności</label><br>
            <input type="submit" name="submit" value="Dodaj"><br>
</form>
</body>
</html>