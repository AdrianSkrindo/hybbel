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
        <a href="hjem.php">Hjem</a>
        <a href="utleie.php">Annonser din hybel</a>
        <a href="minSide.php">Min side</a>
        <a class="active" href="innboks.php">Innboks</a>
        <div style="position:absolute;right:125px;"><a href="../assets/lib/loggUt.php">Logg ut</a></div>
        <div style="position:absolute;right:0px;"><a href="minSide.php"><?php echo $_SESSION['fnavn']; ?></a></div>
    </div>

    <h1>Innboks</h1>

    <?php

        $sql = "SELECT * 
        FROM chat 
        WHERE mottaker = '{$_SESSION['brukernavn']}'
        ORDER BY timestamp DESC";
        

        $q = $pdo->prepare($sql);

        try {
            $q->execute();
        } catch (PDOException $e) {
            echo "Error querying database: " . $e->getMessage() . "<br>"; // Never do this in production
        }

        $meldinger = $q->fetchAll(PDO::FETCH_OBJ);
        echo '<div class="flex-container">';
        if ($q->rowCount() > 0) {
            foreach ($meldinger as $melding) {
                echo '<div class="container">';
                $timeStamp = $melding->timestamp;
                echo '<span class="time-right">'. date('d.M.Y', strtotime($timeStamp)) .'</span>';
                echo '<br>';
                echo '<h2>'.$melding->sender.':</h2>';
                echo '<p><i>'.$melding->melding.'</i></p>';
                echo '<a href="sendMelding.php?sender='.$melding->sender.'"><button> Svar </button></a>';
                echo '</div>';
            }
        } else {
            echo "The query resulted in an empty result set.";
        }
    
?>

    </div>
    
</body>
</html>