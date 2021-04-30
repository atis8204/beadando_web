<!DOCTYPE html>
<html>
<head>
    <title>Beolvasott adatok</title>
    <meta charset="utf-8">
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

<script type = "text/javascript">  
    window.onload = function () {  
        document.onkeydown = function (e) {  
            return (e.which || e.keyCode) != 116;  
        };  
    }  
</script>  
<?php
$currentDateTime = date('Y-m-d H:i:s');
$re ='/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
?>

<?php if(!isset($_POST['nev']) || strlen($_POST['nev']) <8 || strlen($_POST['nev']) >30 && !isset($_POST['email']) ||  !preg_match($re,$_POST['email'])  && !isset($_POST['tel']) || strlen($_POST['tel'])>12 || strlen($_POST['tel'])<7 && !isset($_POST['text']) || strlen($_POST['text'])>1000 || strlen($_POST['text'])<10)
    { ?>
        <?php echo "<h3><hr>Mezők kitöltése kötelező.<br><br>Kérem a megfelelő karakterszámot adja meg! Használja a Kapcsolat menüpontot az űrlap kitöltéséhez.</h3><hr> ";
        header( "refresh:4; url=./?oldal=kapcsolat" ); ?>

  <?php  }
     else { ?>
<div class="adatok">
    <p align="center">
		<table>
		<caption><p><strong>ÜZENET</strong></p></caption>
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
    <td><?php echo "<strong>Üzenet: </strong>".$_POST["text"]."<br>"; ?></td>
</tr>
<tr>
    <td><?php echo "<strong>Dátum: </strong>"?><?php echo $currentDateTime."<br>"?></td>
</tr>
</table>
    </p>
</div>
<br></br>
<hr>
<?php
try {
    // Kapcsolódás
    $dbh = new PDO('mysql:host=localhost;dbname=x001349_db', 'x001349_db', 'Nemmondommeg12',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

    // Beszúrás
    $sqlInsert = "insert into urlap(id,nev,email,telefon,uzenet,datum) values(0, :nev, :email, :telefon, :uzenet, :datum)";
    $stmt = $dbh->prepare($sqlInsert);
    $stmt->execute(array(':nev' => $_POST['nev'], ':email' => $_POST['email'], ':telefon' => $_POST['tel'], ':uzenet' => $_POST['text'], ':datum' => $currentDateTime));

} catch
(PDOException $e) {
    echo "Hiba: " . $e->getMessage();
}
    }
    ?>
</body>
</html>