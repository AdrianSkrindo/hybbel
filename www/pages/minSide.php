<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'hybelprosjekt') or die ("Kunne ikke koble til database.");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/hjemstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Document</title>
</head>
<body>

<div class="topnav">
  <a href="hjem.php">Hjem</a>
  <a href="#news">Nyheter</a>
  <a class="active" href="minSide.php">Min side</a>
  <a class="loggUT" href="../assets/lib/loggUt.php">Logg ut</a>
</div>


    <p> Du er nå logget inn på brukeren <?php echo $_SESSION['brukernavn']."."; ?></p>


    <div>En mulighet for å endre brukeropplysninger, passord, brukernavn og navn osv. update query</div>



            <button class="button">Endre brukeropplysninger</button>


</body>
</html>