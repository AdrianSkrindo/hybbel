<?php

include "../assets/inc/standar.include.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/artikkelstyle.css">
    <title>artikkel</title>
</head>

<body>

    <div class="topnav">
        <a href="hjem.php">Hjem</a>
        <a href="utleie.php">Annonser din hybel</a>
        <a href="minSide.php">Min side</a>
        <a class="loggUt" href="../assets/lib/loggUt.php">Logg ut</a>
    </div>
    <p>Du er nå logget inn på brukeren <?php echo $_SESSION['fnavn'] . "."; ?></p>
    <p>Sjekk hybelid sendt gjennem, slett dette til slutt <?php echo $_GET['hybel_id'] . "."; ?></p>

    <?php



    $sql = "SELECT * 
        FROM hybel WHERE hybel_id='" . $_GET['hybel_id'] . "'";



    $q = $pdo->prepare($sql);

    try {
        $q->execute();
    } catch (PDOException $e) {
        echo "Error querying database: " . $e->getMessage() . "<br>"; // Never do this in production
    }
    //$q->debugDumpParams();

    $hybler = $q->fetchAll(PDO::FETCH_OBJ);
    echo '<div class="flex-container">';
    if ($q->rowCount() > 0) {
        foreach ($hybler as $hybel) {

            echo '<box1> <img src="../assets/img/' . $hybel->bilde . '"</box1>';
            echo '<div class="tekstbox">';
            echo '<p>' . $hybel->navn . '</p>';
            echo '</div>';
            echo '<div class="overview">';
            echo '<ul class="no-bullets">';
            echo  '<li>Pris: <span>' . $hybel->pris . '</span></li>';
            echo  '<li>Depositum: <span>' . $hybel->depo . '</span></li>';
            echo    '<li>Adresse: <span>' . $hybel->adresse . '</span></li>';
            echo    '<li>Ledig fra:<span>' . $hybel->ledigFra . '</span></li>';
            echo  '</ul>';
            echo '</div>';

            echo '<div class="overview">';
            echo    '<ul class="no-bullets">';
            echo       '<li>Bolig type: <span>' . $hybel->btype . '</span></li>';

            //Printer boolean status som ja eller nei
            echo       '<li>Inkl. strøm: <span>';
            echo       $hybel->strom ? 'Ja' : 'Nei' . '</span></li>';

            echo        '<li>Inkl. internett: <span>';
            echo        $hybel->internett ? 'Ja' : 'Nei' . '</span></li>';

            echo        '<li>Inkl. tv: <span>';
            echo        $hybel->tv ? 'Ja' : 'Nei' . '</span></li>';

            echo        '<li>Kjønnsdiskriminering: <span>' . $hybel->kjonn . '</span></li>';

            $status = $hybel->status;

            if ($status <= 0) {
                echo        '<div class="status">IKKE TILGJENGLIG</div>';
            } else {
                echo "";
            } 

            echo    '</ul>';
            echo '</div>';

            //Knapper
            //echo '<button class="button"><a href="">Send melding til utleier</a></button>';
            echo '<div class="container">';
            echo '<a href=""><button class="button"><a>Lei denne leigliheten</a></button></a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "The query resulted in an empty result set.";
    }

    ?>
    <!--  HARD KODET OVERBLIKK OVER HYBELEN, GAMMELT UTKAST
    <div class="flex-container">
        <box1>
            <img src="../assets/img/testbilde2.jpg" />
        </box1>
        <div class="tekstbox">
            <p>Rom i bofelleskap</p>
        </div>
        <div class="overview">
            <ul class="no-bullets">
                <li>Pris: <span>8 000</span></li>
                <li>Depositum: <span>24 000</span></li>
                <li>Adresse: <span>Tjuvhelleren 93</span></li>
                <li>Ledig fra:<span>1. Desember 2022</span></li>
                <li>Areal:<span>12m^2</span></li>
            </ul>
        </div>

        <div class="overview">
            <ul class="no-bullets">
                <li>Inkl. strøm: <span>Nei</span></li>
                <li>Inkl. internett: <span>Ja</span></li>
                <li>Inkl. tv: <span>Nei</span></li>
                <li>Inkl. møbler: <span>Nei</span></li>
                <li>Inkl. hvitevarer: <span>Nei</span></li>
            </ul>
        </div>

        <div class="info">
            Det er ledig 2 rom i et trivelig jentebofellesskap i Skippergata 87 studieåret 2022-2023
            Er du ei hyggelige, pålitelig og ryddig studine er det bare og ta kontakt.
            3 soverom,
            Felles stue, kjøkken og bad.
            Leies ut fult møblert
            Midt i sentrum. Nærhet til turområder, badevann, UIA, treningssenter, butikker og sentrum
            

        </div>


        <button class="button"><a href="">Send melding til utleier</a></button>
    </div>

-->

    <?php
    include "../assets/inc/footer.php";
    ?>
</body>

</html>