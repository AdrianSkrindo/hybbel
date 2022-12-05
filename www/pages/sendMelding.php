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


    if (isset($_REQUEST['submit'])) {

        $sql = "INSERT INTO chat
        (sender, mottaker, melding) 
        VALUES 
        (:sender, :mottaker, :melding)";

        $q = $pdo->prepare($sql);

        $q->bindParam(':sender', $sender, PDO::PARAM_STR);
        $q->bindParam(':mottaker', $mottaker, PDO::PARAM_STR);
        $q->bindParam(':melding', $melding, PDO::PARAM_STR);


        $sender = $_SESSION['brukernavn'];
        $mottaker = $_GET['sender'];
        $melding = $_REQUEST['melding'];


        try {
            $q->execute();
        } catch (PDOException $e) {
            echo "Error querying database: " . $e->getMessage() . "<br>";
        }

        if ($pdo->lastInsertId() > 0) {
            $messages[] = "Melding sendt!";
        } else {
            $messages[] = "Meldingen ble ikke sendt.";
        }
    }

    ?>

<div class="flex-container">

<div class="overskrift"> Send melding til <?php echo $_GET['sender']; ?></div>

<form method="post" action="">
    <p>Melding: <input type="text" name="melding" required> </p>
    <div class="knappPos"><input class="knapp" type="submit" name="submit" value="Send melding"></div>
</form>
</div>

<p>
<?php if (isset($messages)) {
    foreach ($messages as $message) {
        echo $message;
    }
}
?>
</p>

    </div>
    
</body>
</html>