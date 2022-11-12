<?php

include "../assets/inc/standar.include.php";


$sql = "INSERT INTO hybel 
        (navn, pris, depo, sted, btype, ledigFra, tv, strom, internett, adresse, kjonn, bilde, status) 
        VALUES 
        (:navn, :pris, :depo, :sted, :btype, :ledig, :inklTV, :inklStr, :inklInt, :adresse, :kjonn, :bilde, :status)";

$q = $pdo->prepare($sql);

$q->bindParam(':navn', $navn, PDO::PARAM_STR);
$q->bindParam(':pris', $pris, PDO::PARAM_INT);
$q->bindParam(':depo', $depo, PDO::PARAM_INT);
$q->bindParam(':sted', $sted, PDO::PARAM_STR);
$q->bindParam(':btype', $btype, PDO::PARAM_STR);
$q->bindParam(':ledig', $ledigFra, PDO::PARAM_STR);
$q->bindParam(':inklTV', $inklTV, PDO::PARAM_BOOL);
$q->bindParam(':inklStr', $inklStr, PDO::PARAM_BOOL);
$q->bindParam(':inklInt', $inklInt, PDO::PARAM_BOOL);
$q->bindParam(':adresse', $adresse, PDO::PARAM_STR);
$q->bindParam(':kjonn', $kjonn, PDO::PARAM_STR);
$q->bindParam(':bilde', $bilde, PDO::PARAM_STR);
$q->bindParam(':status', $status, PDO::PARAM_BOOL);

if (isset($_REQUEST['submit'])) {
    $navn = $_REQUEST['navn'];
    $pris = $_REQUEST['pris'];
    $depo = $_REQUEST['depo'];
    $sted = $_REQUEST['sted'];
    $btype = $_REQUEST['btype'];
    $ledigFra = $_REQUEST['ledig'];

    if ($_REQUEST['inklTV'] = "ja") {
        $inklTV = 1;
    } else {
        $inklTV =  0;
    }

    if ($_REQUEST['inklStr'] = "ja") {
        $inklStr = 1;
    } else {
        $inklStr =  0;
    }

    if ($_REQUEST['inklInt'] = "ja") {
        $inklInt = 1;
    } else {
        $inklInt =  0;
    }

    //$inklStr = $_REQUEST['inklStr'];
    //$inklInt = $_REQUEST['inklInt'];
    $adresse = $_REQUEST['adresse'];
    $kjonn = $_REQUEST['kjonn'];
    $bilde = $_REQUEST['bilde'];
    $status = 1;


    try {
        $q->execute();
    } catch (PDOException $e) {
        echo "Error querying database: " . $e->getMessage() . "<br>"; // Never do this in production
    }
    //$q->debugDumpParams();

    //Sjekker om noe er satt inn, returnerer UID.
    if ($pdo->lastInsertId() > 0) {
        echo "Data inserted into database, identified by BID " . $pdo->lastInsertId() . ".";
    } else {
        echo "Data were not inserted into database.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/utleiestyle.css">
    <title>utleie</title>
</head>

<body>

    <div class="topnav">
        <a href="hjem.php">Hjem</a>
        <a class="active" href="utleie.php">Annonser din hybel</a>
        <a href="minSide.php">Min side</a>
        <a class="loggUt" href="../assets/lib/loggUt.php">Logg ut</a>
    </div>
    <br><br>
    <div class="flex-container">

        <form method="post" action="">


            <h2>Overskrift: <input type="text" name="navn" placeholder="Rom i kollektiv" required></h2>

            <h2>Månedspris: <input type="text" name="pris" placeholder="3999" required></h2>

            <h2>Depositum: <input type="text" name="depo" placeholder="12 000" required></h2>

            <h2>Sted: <input type="text" name="sted" placeholder="By" required></h2>

            <h2>Boligtype: <select id="type" name="btype" required>
                    <option value="hybel">Hybel</option>
                    <option value="kollektiv">Kollektiv</option>
                </select>
            </h2>

            <h2>Ledig fra: <input type="text" name="ledig" placeholder="<?php echo "kan styre med kalender og date datatype om vi ønsker her" ?>" required></h2>

            <h2>Inkl. TV: <select id="tv" name="inklTv" required>
                    <option value="ja">Ja</option>
                    <option value="nei">Nei</option>
                </select>
            </h2>

            <h2>Inkl. Strøm: <select id="strom" name="inklStr" required>
                    <option value="ja">Ja</option>
                    <option value="nei">Nei</option>
                </select>
            </h2>

            <h2>Inkl. Internett: <select id="internett" name="inklInt" required>
                    <option value="ja">Ja</option>
                    <option value="nei">Nei</option>
                </select>
            </h2>

            <h2>Adresse: <input type="text" name="adresse" placeholder="Gatenavn og nummer" required></h2>

            <h2>Ønsket kjønn: <select id="kjonn" name="kjonn" required>
                    <option value="mann">Menn</option>
                    <option value="kvinne">Kvinner</option>
                    <option value="blanding">Lett blanding</option>
                </select>
            </h2>

            <h2>Bilde opplastning: <input type="bilde" name="bilde" placeholder="Last opp bilde her" required></h2>

            <input class="knapp" type="submit" name="submit" value="Publiser annonse">
        </form>

    </div>

    <?php
    include "../assets/inc/footer.php";
    ?>
</body>

</html>