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
    <title>utleie</title>
</head>
<body>

<div class="topnav">
        <a href="hjem.php">Hjem</a>
        <a class="active" href="utleie.php">Annonser din hybel</a>
        <a href="minSide.php">Min side</a>
        <a class="loggUt" href="../assets/lib/loggUt.php">Logg ut</a>
    </div>
    en form, men ønskelig inputs, som pusher en query opp til databasen
</body>
</html>