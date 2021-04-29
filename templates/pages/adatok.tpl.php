<!DOCTYPE html>
<html>
<head>
    <title>Beolvasott adatok</title>
    <meta charset="utf-8">
	<style>
		table {
		border-collapse: collapse;
		}
		table, td, th {
 		 border: 1px solid black;
            padding: 5px 5px 5px 5px;
}
td {
	width: 600px;
}

</style>
</head>
<body>
<?php
$re ='/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
?>

<?php if(!isset($_POST['nev']) || strlen($_POST['nev']) <8 || strlen($_POST['nev']) >30 && !isset($_POST['email']) ||  !preg_match($re,$_POST['email'])  && !isset($_POST['tel']) || strlen($_POST['tel'])>10 || strlen($_POST['tel'])<7 && !isset($_POST['text']) || strlen($_POST['text'])>1000 || strlen($_POST['text'])<10)
    { ?>
        <?php echo "<h3><hr>Mezők kitöltése kötelező.<br><br>Kérem a megfelelő karakterszámot adja meg! Használja a Kapcsolat menüpontot az űrlap kitöltéséhez.</h3><hr> ";
        header( "refresh:4; url=./?oldal=kapcsolat" ); ?>

  <?php  }
     else { ?>
        <hr>
		<table>
		<caption><p><strong>ÜZENETEK</strong></p></caption>
		  <tr>
			<td colspan="2"><?php echo "<strong>Név: </strong>".$_POST["nev"]."<br>"; ?></td>
</tr>
<tr>
    <td colspan="2"><?php echo "<strong>Email: </strong>".$_POST["email"]."<br>"; ?></td>
</tr>
<tr>
    <td colspan="2"><?php echo "<strong>Telefonszám: </strong>".$_POST["tel"]."<br>"; ?></td>
</tr>
<tr>
    <td><?php echo "<strong>Üzenet:</strong>".$_POST["text"]."<br>"; ?></td>
</tr>
</table>
<br></br>
<hr>
<?php
try {
    // Kapcsolódás
    $dbh = new PDO('mysql:host=localhost;dbname=x001349_db', 'x001349_db', 'Nemmondommeg12',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

    // Beszúrás
    $sqlInsert = "insert into urlap(id,nev,email,telefon,uzenet) values(0, :nev, :email, :telefon, :uzenet)";
    $stmt = $dbh->prepare($sqlInsert);
    $stmt->execute(array(':nev' => $_POST['nev'], ':email' => $_POST['email'], ':telefon' => $_POST['tel'], ':uzenet' => $_POST['text']));

} catch
(PDOException $e) {
    echo "Hiba: " . $e->getMessage();
}
    }
    ?>
</body>
</html>