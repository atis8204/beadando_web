<?php
session_start();
include('../includes/config.inc.php');
$uzenet = array();

// Űrlap ellenőrzés:
    if (isset($_POST['kuld'])) {
        foreach ($_FILES as $fajl) {
            if ($fajl['error'] == 4) ;   // Nem töltött fel fájlt
            elseif (!in_array($fajl['type'], $MEDIATIPUSOK))
                $uzenet[] = " Nem megfelelő típus: " . $fajl['name'];
            elseif ($fajl['error'] == 1   // A fájl túllépi a php.ini -ben megadott maximális méretet
                or $fajl['error'] == 2   // A fájl túllépi a HTML űrlapban megadott maximális méretet
                or $fajl['size'] > $MAXMERET)
                $uzenet[] = " Túl nagy állomány: " . $fajl['name'];
            else {
                $vegsohely = $MAPPA2 . strtolower($fajl['name']);
                if (file_exists($vegsohely))
                    $uzenet[] = " Már létezik: " . $fajl['name'];
                else {
                    move_uploaded_file($fajl['tmp_name'], $vegsohely);
                    $uzenet[] = ' Rendben. A fájl neve: ' . $fajl['name'];
                }
            }
        }
    }

else
{
    $uzenet[] = "Csak bejelentkezett felhasználó tölthet fel képet! Kérem jelentkezzen be vagy regisztráljon!";

}
// Megjelenítés logika:
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Galéria</title>
    <style type="text/css">
        label { display: block; }
    </style>
</head>
<body>
<h3>Feltöltés a galériába:</h3>
<?php
if (!empty($uzenet))
{
    echo '<ul>';
    foreach($uzenet as $u)
        echo "<li>$u</li>";
    echo '</ul>';
}
header( "refresh:2; url=../?oldal=galeria" );
?>
</form>
</body>
</html>
