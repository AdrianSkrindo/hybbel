<?php
include('../assets/inc/noSessionInclude.php');

$sql = "INSERT INTO brukere
        (brukernavn, passord, fnavn, enavn, rolle)
        VALUES
        (:brukernavn, :passord, :fnavn, :enavn, :rolle)";

$q = $pdo->prepare($sql);

$q->bindParam(':brukernavn', $brukernavn, PDO::PARAM_STR);
$q->bindParam(':passord', $passord, PDO::PARAM_STR);
$q->bindParam(':fnavn', $fnavn, PDO::PARAM_STR);
$q->bindParam(':enavn', $enavn, PDO::PARAM_STR);
$q->bindParam(':rolle', $rolle, PDO::PARAM_STR);

if (isset($_REQUEST['registrer'])) {
    /*$emailSjekk = filter_var($_REQUEST['brukernavn'], FILTER_VALIDATE_EMAIL);
    if($emailSjekk = false){
        $brukernavn = NULL;
    } else {
        $brukernavn =$emailSjekk;
    }*/
    $brukernavn = $_REQUEST['brukernavn'];
    $passord = password_hash($_REQUEST['passord'], PASSWORD_DEFAULT);
    $fnavn = $_REQUEST['fnavn'];
    $enavn = $_REQUEST['enavn'];
    $rolle = "bruker";

    try {
        $q->execute();
    } catch (PDOException $e) {
        echo "Error querying database: " . $e->getMessage() . "<br>"; // Never do this in production
    }

    if ($pdo->lastInsertId() > 0) {
        
        echo "Data inserted into database, identified by BID " . $pdo->lastInsertId() . ".";
        header("refresh:5; url=../index.php");
    } else {
        echo "Gratulerer med ny bruker, du blir nå sendt til innloggingsiden. ";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/indexstyle.css">
    <title>Registrer bruker</title>
</head>

<body>

    <div class="login">
        <h1>Registrer bruker</h1>
        <form method="post" action="">
            <p><input type="text" name="fnavn" placeholder="Fornavn"></p>
            <p><input type="text" name="enavn" placeholder="Etternavn"></p>
            <p><input type="text" name="brukernavn" placeholder="E-post adresse"></p>
            <p><input type="password" name="passord" placeholder="Passord"></p>
            <p class="submit"><input type="submit" name="registrer" value="Registrer bruker"></p>
        </form>
    </div>

</body>

</html>