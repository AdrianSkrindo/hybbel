<?php
include "../assets/inc/standar.include.php";
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
        <a class="loggUt" href="../assets/lib/loggUt.php">Logg ut</a>
    </div>

    <p>Rolle session value = <?php echo $_SESSION['rolle'];?></p>
    <p>Logget inn som <?php echo $_SESSION['fnavn'] . "."; ?></p>

    <!--
    <div class="flex-container">

        <a href="artikkel.php">
            <card>
                <box1><img src="../assets/img/testbilde2.jpg" /></box1>
                <div class="tekstbox">
                    <h2>Rom i kollektiv</h2>
                    <p>Tjuvhelleren 93</p>
                    <p>7 000,-</p>
                </div>
            </card>
        </a>

    </div> -->
    <?php
    $sql = "SELECT hybel_id, navn, adresse, pris, bilde 
        FROM hybel WHERE status =1";

    $q = $pdo->prepare($sql);

    try {
        $q->execute();
    } catch (PDOException $e) {
        echo "Error querying database: " . $e->getMessage() . "<br>"; // Never do this in production
    }
    //$q->debugDumpParams();
    
    //lager array, overskrives i loopen, om vi lagrer rett i "session"
    $artikkel_id = []; 
    //$_SESSION['hybel_id']= []; 


    $hybler = $q->fetchAll(PDO::FETCH_OBJ);
    echo '<div class="flex-container">';
    if ($q->rowCount() > 0) {

        foreach ($hybler as $hybel) {

            //$_SESSION['hybel_id'][] = $hybel->hybel_id;
            $artikkel_id[$hybel->hybel_id] = $hybel->hybel_id;

            echo '<a href="artikkel.php?hybel_id=';
            echo $artikkel_id[$hybel->hybel_id]. '"</a>';
    
            echo "<card>";
            echo '<box1> <img src="../assets/img/' . $hybel->bilde. '"</box1>';
            echo '<div class="tekstbox">';
            echo "<h2>" . $hybel->navn . "</h2>";
            echo "<p>" . $hybel->adresse . "</p>";
            echo "<p>" . $hybel->pris . ",-</p>";
            echo "<p>" . $hybel->hybel_id . "</p>";
            echo "</div>";
            echo "</card>";
            echo "</a>";
        }
    } else {
        echo "The query resulted in an empty result set.";
    }

    echo '</div>';


    //Test array, sjekk verdien
    /*
    $_SESSION['hybel_id'] = $artikkel_id;
    print_r($artikkel_id);
    echo "<br>";
    print_r($_SESSION['hybel_id']);
    */

    ?>
    <?php
    include "../assets/inc/footer.php";
    ?>
</body>

</html>