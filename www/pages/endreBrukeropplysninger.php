<?php

//Mangler fortsatt optimalisering rundt at brukeren blir logget ut automatisk, sånn man kan se oppdatering med en gang.

include "../assets/inc/standar.include.php";
 echo $_SESSION['id'];

 
$sql = "UPDATE brukere 
        SET 
        brukernavn = :brukernavn,
        fnavn = :fnavn,
        enavn = :enavn,
        passord = :passord
        WHERE ID = :id";

$q = $pdo->prepare($sql);

$q->bindParam(':brukernavn', $brukernavn, PDO::PARAM_STR);
$q->bindParam(':fnavn', $fnavn, PDO::PARAM_STR);
$q->bindParam(':enavn', $enavn, PDO::PARAM_STR);
$q->bindParam(':passord', $passord, PDO::PARAM_STR);
$q->bindParam(':id', $id, PDO::PARAM_INT);

if (isset($_REQUEST['endre'])) {
    $fnavn = $_REQUEST['fnavn'];
    $enavn = $_REQUEST['enavn'];
    $brukernavn = $_REQUEST['brukernavn'];
    $passord = $_REQUEST['passord'];
    $id = $_SESSION["id"];
}

try {
    $q->execute();
} catch (PDOException $e) {
    echo "Error querying database: " . $e->getMessage() . "<br>"; // Never do this in production
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/utleiestyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Endre brukeropplysninger</title>
</head>

<body>

    <div class="topnav">
        <a href="hjem.php">Hjem</a>
        <a href="utleie.php">Annonser din hybel</a>
        <a class="active" href="minSide.php">Min side</a>
        <a class="loggUT" href="../assets/lib/loggUt.php">Logg ut</a>
    </div>
<br><br>
    <div class="flex-container">
        <form method="post" action="">
            <h2>Fornavn: <input type="text" name="fnavn" value="<?php echo $_SESSION["fnavn"]; ?>"  required><br></h2>
            <h2>Etternavn: <input type="text" name="enavn" value="<?php echo $_SESSION["enavn"]; ?>"  required><br></h2>
            <h2>E-post: <input type="email" name="brukernavn" value="<?php echo $_SESSION["brukernavn"]; ?>"  required><br></h2>
            <h2>Passord: <input type="password" name="passord" value="<?php echo $_SESSION["passord"]; ?>"  required><br></h2>

            <input class="button" type="submit" name="endre" value="Endre brukeropplysninger">
        </form>
    </div>


    <?php
    include "../assets/inc/footer.php";
    ?>
</body>

</html>