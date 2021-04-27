<!DOCTYPE html>
<html>
<head>
    <title>Űrlap</title>
    <meta charset="utf-8">
</head>
<body>
        <hr>
        <h2>Üzenet küldése:</h2>
        <form action="?oldal=adatok" method="post">
            <label>Név:</label></br><input type="text" id="nev" name="nev"><br>
        <label>E-mail:</label></br><input type="email" id="email" name="email"><br>
            <label>Telefonszám:</label></br><input type="text" id="tel" name="tel" ><br>
            <label id="tarea">Üzenet:</label></br><textarea id="text" name="text" rows="10" cols="40" required></textarea><br>
       <input type="submit" value="Küldés"><br></br>
        </form>
<hr>
</body>
</html>