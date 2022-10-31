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
    <title>Endre brukeropplysninger</title>
</head>

<body>

    <div class="topnav">
        <a href="hjem.php">Hjem</a>
        <a href="utleie.php">Annonser din hybel</a>
        <a class="active" href="minSide.php">Min side</a>
        <a class="loggUT" href="../assets/lib/loggUt.php">Logg ut</a>
    </div>

    <div class="brukerBox">
        <form method="post" action="">
            <h2>Fornavn: <input type="text" name="fnavn" value="<?php echo "spørring" ?>" required><br></h2>
            <h2>Etternavn: <input type="text" name="enavn" value="<?php echo "spørring" ?>" required><br></h2>
            <h2>E-post: <input type="email" name="epost" value="<?php echo "spørring" ?>" required><br></h2>
            <h2>Passord: <input type="tel" name="tlf" value="<?php echo "spørring" ?>" required><br></h2>

            <input type="submit" name="registrer" value="Endre brukeropplysninger" class="button">
        </form>
    </div>


    <?php
    include "../assets/inc/footer.php";
    ?>
</body>

</html>