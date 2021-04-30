<?php
    include('includes/config.inc.php');
     $uzenet = array();   

   
    // adatok összegyűjtése:    
    $kepek = array();
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false)
        if (is_file($MAPPA.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK))
                $kepek[$fajl] = filemtime($MAPPA.$fajl);            
        }
    closedir($olvaso);
    
    // Megjelenítés logika:
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Galéria</title>
    <style type="text/css">
        div#galeria {margin: 0 auto; width: auto;}
        div.kep { display: inline-block; }
        div.kep img { width: 200px; }

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
    <div id="galeria">
        <?php  if(isset($_SESSION['login']))  { ?> <h2>Feltöltés a galériába:</h2><?php } else { ?><h2>Kérem jelentkezzen be a képek feltöltéséhez!</h2><?php } ?>
        <div class="galeri" id="galeriak" >
        <fieldset>
            <legend background-color="#fff">Feltöltés</legend>
        <?php
        if (!empty($uzenet))
        {
            echo '<ul>';
            foreach($uzenet as $u)
                echo "<li>$u</li>";
            echo '</ul>';
        }
        ?>
        <form action="./pages/feltolt.php" method="post"
              enctype="multipart/form-data">
            <label>Első:
                <input type="file" name="elso" required>
            </label>
            </br>
            <label>Második:
                <input type="file" name="masodik">
            </label>
            </br>
            <label>Harmadik:
                <input type="file" name="harmadik">
            </label></br>
       <?php  if(isset($_SESSION['login']))  { ?>
            <input type="submit" name="kuld" />
<?php } else { ?>
    <input type="submit" name="kuld" disabled="disabled" />
    
    <?php } ?>
        </form>
            </fieldset>
        </div>
</br>
        <hr>
        <h1>Galéria</h1>
    <?php
    arsort($kepek);
    foreach($kepek as $fajl => $datum)
    {
    ?>
        <div class="kep">
            <a href="<?php echo $MAPPA.$fajl ?>">
                <img src="<?php echo $MAPPA.$fajl ?>">
            </a>            
            <p>Név:  <?php echo $fajl; ?></p>
            <p>Dátum:  <?php echo date($DATUMFORMA, $datum); ?></p>
        </div>
    <?php
    }
    ?>
    </div>
</body>
</html>
