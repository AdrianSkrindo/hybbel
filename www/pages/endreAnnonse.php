<?php
include "../../private/standar.include.php";

$messages = []; //[] equals array()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/utleiestyle.css">
    <title>Endre annonse</title>
</head>

<body>

    <div class="topnav">
        <a href="hjem.php">Hjem</a>
        <a href="utleie.php">Annonser din hybel</a>
        <a href="minSide.php">Min side</a>
        <a href="innboks.php">Innboks</a>
        <div style="position:absolute;right:125px;"><a href="../assets/lib/loggUt.php">Logg ut</a></div>
        <div style="position:absolute;right:0px;"><a href="minSide.php"><?php echo $_SESSION['fnavn']; ?></a></div>
    </div>


    <?php

    $sql = "SELECT * 
        FROM hybel WHERE hybel_id='" . $_GET['hybel_id'] . "'";



    $q = $pdo->prepare($sql);

    try {
        $q->execute();
    } catch (PDOException $e) {
        echo "Error querying database.";
    }

    $hybler = $q->fetchAll(PDO::FETCH_OBJ);
    if ($q->rowCount() > 0) {
        foreach ($hybler as $hybel) {
        }
    }


    if (isset($_REQUEST['submit'])) {

        $sql = "UPDATE hybel 
        SET 
        navn = :navn,
        pris = :pris,
        depo = :depo, 
        sted = :sted, 
        btype = :btype, 
        ledigFra = :ledig,
        tv = :inklTV,
        strom = :inklStr,
        internett = :inklInt,
        adresse = :adresse,
        beskrivelse = :beskrivelse
        WHERE hybel_id = :id"; 
        
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
        $q->bindParam(':id', $id, PDO::PARAM_INT);


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

        $id = $_GET['hybel_id'];

        try {
            $q->execute();
            $messages[] = "Velykket endring av annonse, du blir sendt tilbake til hjemsiden et hvert øyeblikk."; 
            header("refresh:3; url=hjem.php");
        } catch (PDOException $e) {
            echo "Error querying database: " . $e->getMessage() . "<br>"; // Never do this in production
        }
    }

    ?>


    <br><br>

    <div class="overskrift">
    <?php if(isset($messages)) { 
        foreach($messages as $message) { 
            echo $message; 
            } 
        } 
    ?>

    </div>
    <div class="flex-container">

        <form method="post" action="" enctype="multipart/form-data">


            <h2>Overskrift: <input type="text" name="navn" value="<?php echo $hybel->navn; ?>" required></h2>

            <h2>Månedspris: <input type="text" name="pris" value="<?php echo $hybel->pris; ?>" required></h2>

            <h2>Depositum: <input type="text" name="depo" value="<?php echo $hybel->depo; ?>" required></h2>

            <h2>Sted: <input type="text" name="sted" value="<?php echo $hybel->sted; ?>" required></h2>

            <h2>Boligtype: <select id="type" name="btype" required>
                    <option value="hybel">Hybel</option>
                    <option value="kollektiv">Kollektiv</option>
                </select>
            </h2>

            <h2>Ledig fra: <input type="date" name="ledig" value="<?php echo $hybel->ledigFra; ?>" required></h2>



            <?php echo $hybel->tv ? 
            '<h2>Inkl. TV: <select id="tv" name="inklTv" required>
                    <option value="ja">Ja</option>
                    <option value="nei">Nei</option>
                </select>
            </h2>' : 
            
            '<h2>Inkl. TV: <select id="tv" name="inklTv" required>
                    <option value="nei">Nei</option>
                    <option value="ja">Ja</option>
                </select>
            </h2>'; ?>

            <?php echo $hybel->strom ? 
            '<h2>Inkl. Strøm: <select id="strom" name="inklStr" required>
                    <option value="ja">Ja</option>
                    <option value="nei">Nei</option>
                </select>
            </h2>' : 
            
            '<h2>Inkl. Strøm: <select id="strom" name="inklStr" required>
                    <option value="nei">Nei</option>
                    <option value="ja">Ja</option>
                </select>
            </h2>'; ?>


            <?php echo $hybel->internett ? 
            '<h2>Inkl. Internett: <select id="internett" name="inklInt" required>
                    <option value="ja">Ja</option>
                    <option value="nei">Nei</option>
                </select>
            </h2>' : 
            
            '<h2>Inkl. Internett: <select id="internett" name="inklInt" required>
                    <option value="nei">Nei</option>
                    <option value="ja">Ja</option>
                </select>
            </h2>'; ?>




            <h2>Adresse: <input type="text" name="adresse" value="<?php echo $hybel->adresse; ?>" required></h2>

            <h2>Beskrivelse: <input type="text" name="beskrivelse" value="<?php echo $hybel->beskrivelse; ?>" required></h2>



                <div class="knappPos"><input class="knapp" type="submit" name="submit" value="Endre annonse"></div>
        </form>


    </div>

    <?php
    include "../assets/inc/footer.php";
    ?>

</body>

</html>