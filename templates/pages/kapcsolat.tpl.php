<!DOCTYPE html>
<html>
<head>
    <title>Űrlap</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="./js/main.js"></script>
    <style>
        header nav ul li:hover {
            border-bottom: 2px solid;
        }
        header nav ul li.active {
            color: #fff9fb;
            font-weight: bold;
        }
        footer nav ul li:hover {
            color: #fff9fb;
            border-bottom: 1px solid;
        }
    </style>
</head>
<body>
        <h2>Üzenet küldése:</h2>
        <div class="uzenet" id="uzenetk" >
        <fieldset>
        <form action="?oldal=adatok" onsubmit="return ellenoriz();" method="post">
            <label>Név:</label></br><input type="text" id="nev" name="nev" minlength="8" maxlength="30" required><br>
        <label>E-mail:</label></br><input type="email" id="email" name="email" required><br>
            <label>Telefonszám:</label></br><input type="text" id="tel" name="tel" minlength="7" maxlength="12"  pattern="[0-9]{7}[0-9]*" required ><br>
            <label id="tarea">Üzenet:</label></br><textarea id="text" name="text" rows="10" cols="40" minlength="10" maxlength="1000" required></textarea><br>
       <input id="kuld "type="submit" "value="Küldés"><br></br>
        </form>
            </fieldset>
        </div>
<hr>
</body>
</html>