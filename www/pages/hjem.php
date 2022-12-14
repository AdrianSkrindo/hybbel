<?php
    include "../../private/standar.include.php";
    include_once "../assets/lib/hentArtikkler.php";
    header("Cache-Control: no cache");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/hjemstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Hjemside</title>
</head>

<body>

    <div class="topnav">
        <a class="active" href="hjem.php">Hjem</a>
        <a href="utleie.php">Annonser din hybel</a>
        <a href="minSide.php">Min side</a>
        <a href="innboks.php">Innboks</a>
        <div style="position:absolute;right:125px;"><a href="../assets/lib/loggUt.php">Logg ut</a></div>
        <div style="position:absolute;right:0px;"><a href="minSide.php"><?php echo $_SESSION['fnavn']; ?></a></div>
    </div>


    <form method="post" action="">

        <div class="sort-container">

            <card><input class="button" type="submit" name="etterPrisDyr" value="Sorter pris (Høy -> Lav)"></card>
            <card><input class="button" type="submit" name="etterPrisBillig" value="Sorter pris (Lav -> Høy)"></card>
            <card><input class="button" type="submit" name="nyeste" value="Sorter etter nylige"></card>
            <card><input class="button" type="submit" name="eldste" value="Sorter etter eldste"></card>

        </div>

    </form>

</div>
    <?php

    //Sorter etter pris
    if (isset($_REQUEST['etterPrisDyr'])) {

        echo '<div class="flex-container">';

        $etterPris = new Artikkel;
        $etterPris->byPrisLavHoy();

        echo '</div>';

        //Sorter etter dato
    } elseif (isset($_REQUEST['etterPrisBillig'])) {

        echo '<div class="flex-container">';

        $sortNyeste = new Artikkel;
        $sortNyeste->byPrisHoyLav();

        echo '</div>';
    } elseif (isset($_REQUEST['nyeste'])) {

        echo '<div class="flex-container">';

        $sortNyeste = new Artikkel;
        $sortNyeste->nyeste();

        echo '</div>';

        //Sorter etter dato
    } elseif (isset($_REQUEST['eldste'])) {

        echo '<div class="flex-container">';

        $etterPris = new Artikkel;
        $etterPris->byPrisLavHoy();

        echo '</div>';
    } else {

        echo '<div class="flex-container">';
        $hentAlle = new Artikkel;
        $hentAlle->fetchAll();
        echo '</div>';
    }

    ?>

    <?php
    include "../assets/inc/footer.php";
    ?>
</body>

</html>