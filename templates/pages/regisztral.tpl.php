<!DOCTYPE html>
<html>
    <head>
        <title>Regisztráció</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php if(isset($uzenet)) { ?>
            <h3><?= $uzenet ?></h3>
            <?php if($ujra) { ?>
                <a href="?oldal=belepes"><strong>Próbálja újra!</strong></a>
            <?php } ?>
        <?php } ?>
    </body>  
</html>