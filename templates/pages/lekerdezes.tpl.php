<html>
<head>
<style>
		table {
		width: 900px;
		border-collapse: collapse;
		}
		table, td, th {
 		 border: 1px solid black;
		text-align: center;
}


</style>
</head>
<body>
<table border="1">
<tr>
<td>Név</td>
<td>E-mail</td>
<td>Telefonszám</td>
<td>Üzenet</td>
</tr>
<?php
            // Kapcsolódás
            $db = new PDO('mysql:host=localhost;dbname=x001349_db', 'x001349_db', 'Nemmondommeg12',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $db->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            
            	$query="select nev, email, telefon,uzenet from urlap";
	$sth = $db->prepare($query);
    $sth->execute();
	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
	{
		?>
		<tr>
 <td><?php print ($row['nev']);?></td>
 <td><?php print ($row['email']);?></td>
 <td><?php print ($row['telefon']);?></td>
 <td><?php print ($row['uzenet']);?></td>
 </tr>
 <?php
 }
?>
</table>
</body>
</html>	
		
	

		
 