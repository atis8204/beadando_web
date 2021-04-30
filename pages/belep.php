<?php
    if(isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
        try {
            // Kapcsolódás
            $dbh = new PDO('mysql:host=localhost;dbname=x001349_db', 'x001349_db', 'Nemmondommeg12',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            
            // Felhasználó keresése
            $sqlSelect = "select id, csaladi, utonev from azonositas where username = :bejelentkezes and password = sha1(:jelszo)";
            $sth = $dbh->prepare($sqlSelect);
            $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo'], ':jelszo' => $_POST['jelszo']));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            if($row) {
                $_SESSION['csn'] = $row['csaladi']; $_SESSION['un'] = $row['utonev']; $_SESSION['login'] = $_POST['felhasznalo'];
            }
        }
        catch (PDOException $e) {
            echo "Hiba: ".$e->getMessage();
        }      
    }
    else {
        header("Location: .");
    }
?>
