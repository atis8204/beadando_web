<?php session_start();?>
<?php if(file_exists('./pages/'.$keres['fajl'].'.php')) { include("./pages/{$keres['fajl']}.php"); } ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '' ) ?></title>
	<link rel="stylesheet" href="./styles/stilus.css" type="text/css">

         <script type="text/javascript" src="./js/main.js"></script>
	<?php if(file_exists('./styles/'.$keres['fajl'].'.css')) { ?><link rel="stylesheet" href="./styles/<?= $keres['fajl']?>.css" type="text/css"><?php } ?>
</head>
<body>
	<header>
	<p>
        <?php if(isset($_SESSION['login'])) { ?>Bejlentkezve: <strong><?= $_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")" ?></strong><?php } ?>
	</p>
        <a href="http://habibiklub.hu/beadando/"><img src="./images/<?=$fejlec['kepforras']?>" alt="<?=$fejlec['kepalt']?>"></a>
        <nav>
            <ul>
                <?php foreach ($oldalak as $url => $oldal) { ?>
                <?php if(! isset($_SESSION['login']) && $oldal['menun'][0] || isset($_SESSION['login']) && $oldal['menun'][1]) { ?>
                    <li<?= (($oldal == $keres) ? ' class="active"' : '') ?>>
                        <a href="<?= ($url == '/') ? '.' : ('?oldal=' . $url) ?>">
                            <?= $oldal['szoveg'] ?></a>
                    </li>
                <?php } ?>
                <?php } ?>
            </ul>
        </nav>
	</header>
    <div id="content">
        <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
    </div>
    <footer>
        <img src="./images/<?=$lablec['kepforras2']?>" alt="<?=$lablec['kepalt2']?>">
        <nav>
            <ul>
                <?php foreach ($oldalak as $url => $oldal) { ?>
                <?php if(! isset($_SESSION['login']) && $oldal['menun'][0] || isset($_SESSION['login']) && $oldal['menun'][1]) { ?>
                    <li<?= (($oldal == $keres) ? ' class="active"' : '') ?>>
                        <a href="<?= ($url == '/') ? '.' : ('?oldal=' . $url) ?>">
                            <?= $oldal['szoveg'] ?></a>
                    </li>
                <?php } ?>
                <?php } ?>
            </ul>
        </nav>
        <div class="lablec2">
        <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?> <?php } ?>
        <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>
        <?php if(isset($lablec['jog'])) { ?><?= $lablec['jog']; ?><?php } ?>
        </div>
    </footer>
</body>
</html>
