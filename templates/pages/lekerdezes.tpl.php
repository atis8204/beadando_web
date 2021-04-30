<html>
<head>
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
<div style="tabla" id="tablak">
<table class="center" >
<tr>
<td bgcolor="#f28500"><strong>Név</strong></td>
<td bgcolor="#f28500"><strong>E-mail</strong></td>
<td bgcolor="#f28500"><strong>Telefonszám</strong></td>
<td bgcolor="#f28500"><strong>Üzenet</strong></td>
<td bgcolor="#f28500"><strong>Dátum</strong></td>
</tr>
<?php
            // Kapcsolódás
            $db = new PDO('mysql:host=localhost;dbname=x001349_db', 'x001349_db', 'Nemmondommeg12',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $db->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            
            	$query="select nev, email, telefon,uzenet,datum from urlap order by datum DESC";
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
 <td><?php print ($row['datum']);?></td>
 </tr>
 <?php
 }
?>
</table>
</div>
</body>
</html>	
		
	

		
 