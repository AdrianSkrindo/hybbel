<?php
include "../assets/inc/standar.include.php";
setlocale(LC_ALL, 'no_NO');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/chatstyle.css">
    <title>Innboks</title>
</head>
<body>

<div class="topnav">
        <a  href="hjem.php">Hjem</a>
        <a href="utleie.php">Annonser din hybel</a>
        <a href="minSide.php">Min side</a>
        <a class="active" href="innboks.php">Innboks</a>
        <div style="position:absolute;right:185px;"><a href="../assets/lib/loggUt.php">Logg ut</a></div>
        <div style="position:absolute;right:0px;"><a href="minSide.php"><?php echo $_SESSION['brukernavn']; ?></a></div>

    </div>

    <h1>Innboks</h1>

    <?php
        
    ?>

    </div>
    
</body>
</html>