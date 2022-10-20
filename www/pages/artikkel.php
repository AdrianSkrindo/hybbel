<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'hybelprosjekt') or die("Kunne ikke koble til database.");
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
    <p>Du er nå logget inn på brukeren <?php echo $_SESSION['brukernavn'] . "."; ?></p>

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

    <?php
    include "../assets/inc/footer.php";
    ?>
</body>

</html>