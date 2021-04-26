<!DOCTYPE html>
<html>
<head>
    <title>Űrlap</title>
    <meta charset="utf-8">
</head>
<body>
        <h2>Üzenet küldése:</h2>
        <form action="?oldal=adatok" method="post">
            <label>Név:</label><input type="text" id="nev" name="nev" minlength="8" maxlength="30" required><br>
        <label>E-mail:</label><input type="email" id="email" name="email" required><br>
            <label>Telefonszám:</label><input type="text" id="tel" name="tel" minlength="7" maxlength="10"  pattern="[0-9]{7}[0-9]*" required><br>
            <label id="tarea">Üzenet:</label><textarea id="text" name="text" rows="7" cols="20" required> </textarea><br>
        <label></label><input type="submit" value="Küldés">
        </form>
</body>
</html>
