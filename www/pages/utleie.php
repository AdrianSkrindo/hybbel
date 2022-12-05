<?php

include "../assets/inc/standar.include.php";


$sql = "INSERT INTO hybel 
        (navn, pris, depo, sted, btype, ledigFra, tv, strom, internett, adresse, beskrivelse, bilde, status, eier) 
        VALUES 
        (:navn, :pris, :depo, :sted, :btype, :ledig, :inklTV, :inklStr, :inklInt, :adresse, :beskrivelse, :bilde, :status, :eier)";

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
$q->bindParam(':beskrivelse', $beskrivelse, PDO::PARAM_STR);
$q->bindParam(':bilde', $bilde, PDO::PARAM_STR);
$q->bindParam(':status', $status, PDO::PARAM_BOOL);
$q->bindParam(':eier', $eier, PDO::PARAM_STR);

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

    $adresse = $_REQUEST['adresse'];

    //Henter beskrivelsen
    $beskrivelse = $_REQUEST['beskrivelse'];

    if (is_uploaded_file($_FILES['upload-file']['tmp_name'])) {
        // Henter informasjon om filen som er sendt
        $file_type = $_FILES['upload-file']['type'];
        $file_size = $_FILES['upload-file']['size'];

        $acc_file_types = array(
            "jpeg" => "image/jpeg",
            "jpg" => "image/jpg",
            "png" => "image/png"
        );
        $max_file_size = 2000000; // i bytes
        $dir = $_SERVER['DOCUMENT_ROOT'] . "/hybbel/www/assets/img/";

        // Mekker katalog, hvis den ikke allerede finnes
        if (!file_exists($dir)) {
            if (!mkdir($dir, 0777, true))
                die("Cannot create directory..." . $dir);
        }

        // Sjekker hvilke filtype det er, gir dette til variablene, som brukes i navngenerering
        $suffix = array_search($_FILES['upload-file']['type'], $acc_file_types);

        // mekker navnet på filen, ved hjelp av ønskelig input + filtype
        do {
            $filename  = substr(md5(date('YmdHis')), 0, 5) . '.' . $suffix;
        } while (file_exists($dir . $filename));

        /* Errors? */
        if (!in_array($file_type, $acc_file_types)) {
            $types = implode(", ", array_keys($acc_file_types));
            $messages['error'][] = "Invalid file type (only <em>" . $types . "</em> are accepted)";
        }
        if ($file_size > $max_file_size)
            $messages['error'][] = "The file size (" . round($file_size / 1048576, 2) . " MB) exceeds max file size (" . round($max_file_size / 1048576, 2) . " MB)"; // Bin. conversion

        // Hvis alt går etter planen
        if (empty($messages)) {
            //Bestemmer hvor filen skal plasseres, og laster den opp. 
            $filepath = $dir . $filename;
            $uploaded_file = move_uploaded_file($_FILES['upload-file']['tmp_name'], $filepath);

            if (!$uploaded_file)
                $messages['error'][] = "The file could not be uploaded";
            else
                $messages['success'][] = "The file was uploaded and can be found here: <strong>" . $filepath . "</strong>";
        }
    } else {
        $messages['error'][] = "No file is selected";
    }

    

    //Brukes for å sette bildepath i databasen
    $bilde = $filename;

    //Publiseres som tilgjengelig
    $status = 1;

    //Henter eier fra innlogget bruker
    $eier = $_SESSION["brukernavn"];

    try {
        $q->execute();
    } catch (PDOException $e) {
        echo "Error querying database.";
    }
    


    //Sjekker om noe er satt inn, returnerer UID. I dette tilfelle, redirecter til hjem.php
    if ($pdo->lastInsertId() > 0) {
        //echo "Data inserted into database, identified by BID " . $pdo->lastInsertId() . ".";
        header("location:hjem.php");
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
        <a href="innboks.php">Innboks</a>
        <div style="position:absolute;right:185px;"><a href="../assets/lib/loggUt.php">Logg ut</a></div>
        <div style="position:absolute;right:0px;"><a href="minSide.php"><?php echo $_SESSION['brukernavn']; ?></a></div>
    </div>
    <br><br>
    <div class="flex-container">

        <form method="post" action="" enctype="multipart/form-data">


            <h2>Overskrift: <input type="text" name="navn" placeholder="Rom i kollektiv" required></h2>

            <h2>Månedspris: <input type="text" name="pris" placeholder="3999" required></h2>

            <h2>Depositum: <input type="text" name="depo" placeholder="12 000" required></h2>

            <h2>Sted: <input type="text" name="sted" placeholder="By" required></h2>

            <h2>Boligtype: <select id="type" name="btype" required>
                    <option value="hybel">Hybel</option>
                    <option value="kollektiv">Kollektiv</option>
                </select>
            </h2>

            <h2>Ledig fra: <input type="date" name="ledig" value="" required></h2>

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

            <h2>Beskrivelse: <textarea name="beskrivelse" placeholder="Maks 750 tegn" required></textarea>


            <h2>Bilde opplastning: <input name="upload-file" type="file" required> </h2>

            <div class="knappPos"><input class="knapp" type="submit" name="submit" value="Publiser annonse"></div>
        </form>

    </div>

    <?php
    include "../assets/inc/footer.php";
    ?>
</body>

</html>